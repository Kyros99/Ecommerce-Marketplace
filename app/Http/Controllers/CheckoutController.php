<?php

namespace App\Http\Controllers;

use App\Services\Marketplace\CartProduct;
use App\Services\Marketplace\Order;
use App\Services\Marketplace\User;
use Error;
use Illuminate\Http\Request;
use Propel\Runtime\Map\TableMap;
use Throwable;

class CheckoutController extends AccessController
{


    public function checkoutPage(Request $request,User $user,CartProduct $cartProduct)
    {
        //Init
        if(!$this->init($request,$user)){
            return redirect('/login');
        }

        $userAddress = $user->getPropelModel()->getAddress() ? $user->getPropelModel()->getAddress()->toArray(TableMap::TYPE_FIELDNAME) : [];

        //Get all cart products
        $totalPrice = 0;
        $cartProducts = $cartProduct->getList($user->getPropelModel()->getUserId());
        foreach ($cartProducts as $cartProduct) {
            $totalPrice += $cartProduct->getAmount() * $cartProduct->getProduct()->getPrice();
        }

        return view('checkout',[
            'cartProducts'=>$cartProducts->toArray(null,false,TableMap::TYPE_FIELDNAME),
            'totalPrice'=>$totalPrice,
            'userAddress'=>$userAddress,
        ]);
    }
    public function createOrder(Request $request,User $user,Order $order)
    {
        try{
            if(!$this->init($request,$user)){
                return redirect('/login');
            }

            //Create order
            $payload = $request->all();
            if (!$order->createWithCart($user->getPropelModel()->getUserId(),$payload)) {
                throw new Error('There was an error creating the order');
            }

            return redirect('/user/orders');
        }catch(Throwable $exception){
            return redirect(sprintf('/cart?error=%s', $exception->getMessage()));
        }
    }
}
