<?php

namespace App\Services\Marketplace;

use App\Localization\DateTimerInterface;
use App\Propel\Map\AddressTableMap;
use App\Propel\Map\OrderProductTableMap;
use App\Propel\Map\OrdersTableMap;
use App\Propel\OrdersQuery;
use App\Services\PropelService;
use Exception;
use Psr\Log\LoggerInterface;
use Throwable;

class Order extends PropelService
{

    private $cartProduct;
    private $address;
    private $orderProduct;

    public function __construct(CartProduct $cartProduct, Address $address,OrderProduct $orderProduct,LoggerInterface $logger,DateTimerInterface $dateTimer = null)
    {
        parent::__construct($logger,$dateTimer);
        $this->cartProduct = $cartProduct;
        $this->address = $address;
        $this->orderProduct = $orderProduct;
    }
    public function createWithCart($userId, $arguments = [])
    {

        try {
            //begin transaction
            $this->beginTransaction();

            //load products from cart
            $cartProducts = $this->cartProduct->getList($userId);
            if (empty($cartProducts)) {
                throw new Error('There are no products in the cart');
            }

            //Calculate total price
            $totalAmount = 0;
            $totalPrice = 0;
            foreach ($cartProducts as $cartProduct) {
                $totalAmount += $cartProduct->getAmount();
                $totalPrice += $cartProduct->getAmount() * $cartProduct->getProduct()->getPrice();
            }

            //Get user Address
            $userAddress = $cartProducts[0]->getUser()->getAddress();
            if (empty($userAddress)) {
                //Create address
                $addressArguments = $arguments + [AddressTableMap::COL_USER_ID => $userId];
                $this->address->createWithArray($addressArguments);
                $userAddress = $this->address->getPropelModel();
            }

            // Create Order
            $orderArguments = $arguments + [
                    'user_id'=> $userId,
                    'total_amount' => $totalAmount,
                    'total_price' => $totalPrice,
                    'address_street' => $userAddress->getStreet(),
                    'address_number'=> $userAddress->getNumber(),
                    'addresss_city' => $userAddress->getCity(),
                    'address_postal_code'=> $userAddress->getPostalCode(),
                ];

            $this->createWithArray($orderArguments);

            //Add products to order
            foreach ($cartProducts as $cartProduct) {
                $orderProductArguments = [
                    'order_id' => $this->getPropelModel()->getOrderId(),
                    'product_id' => $cartProduct->getProductId(),
                    'amount' => $cartProduct->getAmount(),
                    'initial_price' => $cartProduct->getProduct()->getPrice(),
                    'total_price' => $cartProduct->getAmount() * $cartProduct->getProduct()->getPrice(),
                ];
                $this->orderProduct->createWithArray($orderProductArguments);

                //Reduce product amount
                $cartProduct
                    ->getProduct()
                    ->setAmount($cartProduct->getProduct()->getAmount() - $cartProduct->getAmount())
                    ->save();


                //Delete product from cart
                $cartProduct->delete();
            }

            //Commit transaction
            return $this->commitTransaction();
        } catch (Throwable $exception) {
            $this->rollbackTransaction();
            throw $exception;
        }
    }

    public function createWithArray($arguments = []) {
        try{
            //Create Model
            $model = new \App\Propel\Orders();
            $this->setPropelModel($model);
            return $this->updateWithArray($arguments);

        }catch (Throwable $exception){
            throw new Exception(sprintf('%s failed to be created',$this->getPropelModelName()),0,$exception);
        }
    }
    public function getPropelModelName()
    {
        return 'Order';
    }

    public function getBusinessOrders($getBusinessId)
    {
        $query = OrdersQuery::create();

        $query
            ->useOrderProductQuery()
            ->useProductQuery()
            ->filterByBusinessId($getBusinessId)
            ->endUse()
            ->endUse();

        //Joins
        $query->joinWithUser();

        return $query->find();
    }
}
