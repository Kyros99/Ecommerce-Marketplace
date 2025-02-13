<?php

namespace App\Services\Marketplace;

use App\Localization\DateTimerInterface;
use App\Propel\CartProductQuery;
use App\Propel\Map\CartProductTableMap;
use App\Services\PropelService;
use Error;
use Exception;
use Psr\Log\LoggerInterface;
use Throwable;

class CartProduct extends PropelService
{

    private $product;

    public function __construct(Product $product,LoggerInterface $logger,DateTimerInterface $dateTimer = null)
    {
        parent::__construct($logger,$dateTimer);
        $this->product = $product;
    }
    public function updateProductAmount($userId,$productId,$amount){


        try{

            //Check if product exists
            if(!$this->load($userId, $productId) && $amount > 0){
                // Add product to cart

                return $this->addProduct($userId,$productId);
            }

            //Check if we need to remove the product
            if($this->getPropelModel()->getAmount() == 1 && $amount < 0){

                return $this->delete();
            }

            //Check if product has enough amount
            if($amount > 0){
                $this->product->load($productId);
                if($this->product->getPropelModel()->getAmount() == $this->getPropelModel()->getAmount()){
                    throw new Exception('Product does not have enough amount');
                }
            }

            //Update
            $arguments =[
                'amount' => $this->getPropelModel()->getAmount() + $amount,
            ];

            return $this->updateWithArray($arguments);
        }catch (Throwable $exception){
            throw new Exception("Cart failed to be updaeddd");
        }
    }
    public function load($userId, $productId){

        $query = CartProductQuery::create();

        //Setup Model
        $model = $query
                ->filterByUserId($userId)
                ->filterByProductId($productId)
                ->findOne();


        $this->setPropelModel($model);
        return !is_null($this->getPropelModel());
    }
    public function addProduct($userId, $productId){

        try {
            //Check if product exists
            if($this->load($userId, $productId)) {

                //Update product amount
                return $this->updateProductAmount($userId, $productId,1);
            }

            //Create Model
            $model = new \App\Propel\CartProduct();
            $this->setPropelModel($model);

            //Update
            $arguments = [
                'user_id' => $userId,
                'product_id' => $productId,
                'amount' => 1
            ];

            return $this->updateWithArray($arguments);
        }catch (Throwable $exception){
            throw new Error('Could not create cart Product');

        }
    }


    public function getPropelModelName()
    {
        return 'CartProduct';
    }

    public function getNewPropelModel(){
        return new \App\Propel\CartProduct();
    }

    public function getList($userId)
    {
        return CartProductQuery::create()
            ->filterByUserId($userId)
            ->joinWithProduct()
            ->find($this->getConnection());
    }
}
