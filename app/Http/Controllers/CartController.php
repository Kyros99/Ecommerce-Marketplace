<?php

namespace App\Http\Controllers;

use App\Services\Marketplace\CartProduct;
use App\Services\Marketplace\User;
use Error;
use Illuminate\Http\Request;
use Propel\Runtime\Map\TableMap;
use Throwable;

class CartController extends AccessController
{


    public function cartPage(Request $request,User $user,CartProduct $cartProduct){

        if (!$this->init($request,$user)) {
            return redirect('/login');
        }

        //Get all products from the cart
        $cartProducts = $cartProduct->getList($user->getPropelModel()->getUserId())->toArray(null,false,TableMap::TYPE_FIELDNAME);

        return view('cart',['cartProducts'=>$cartProducts]);
    }
    public function addProduct(Request $request,User $user,CartProduct $cartProduct, $productId)
    {

        try {
            //Check if user is already logged in
            if (!$this->hasUser($request, $user)) {
                return redirect('/login');
            }

            //Add product to cart
            if (!$cartProduct->addProduct($user->getPropelModel()->getUserId(), $productId)) {
                throw new Error('There was an error adding the product to your cart');
            }

            return redirect('/cart');
        } catch (Throwable $exception) {
            return redirect(sprintf('/cart?error=%s', $exception->getMessage()));
        }
    }
        public function updateProduct(Request $request,User $user,CartProduct $cartProduct, $productId){

            try{
                //Check if user is already logged in
                if (!$this->hasUser($request,$user)) {
                    return redirect('/login');
                }

                //Add product to cart
                if(!$cartProduct->updateProductAmount($user->getPropelModel()->getUserId(),$productId,$request->get('amount'))){
                    throw new Error('There was an error updating the product in your cart');
                }

                return redirect('/cart');
            }catch (Throwable $exception){
                return redirect(sprintf('/cart?error=%s',$exception->getMessage()));
            }
    }
}
