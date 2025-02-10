<?php

namespace App\Http\Controllers;


use App\Propel\Map\ProductReviewTableMap;
use App\Services\Marketplace\Product;
use App\Services\Marketplace\ProductReview;
use App\Services\Marketplace\User;
use Error;
use Illuminate\Http\Request;
use Propel\Runtime\Map\TableMap;
use Throwable;

class ProductController extends AccessController
{

    public function productPage(Request $request,User $user,Product $product,ProductReview $productReview,$productId,$section = 'details'){

        //Initialize
        $this->init($request,$user);

        //Load Product
        if(!$product->load($productId)){
            return redirect('/');
        }

        $productInfo = $product->getPropelModel()->toArray(TableMap::TYPE_FIELDNAME);
        $productInfo['product_category'] = $product->getPropelModel()->getProductCategory()->toArray(TableMap::TYPE_FIELDNAME);

        //GetProductReviews
        $productReviews = $productReview->getList($productId)->toArray();

        // Get Similar Products
        $threshold = 50;
        $similarProducts = $product->search('',[$product->getPropelModel()->getCategoryId()],(float)$product->getPropelModel()->getPrice()- $threshold,(float)$product->getPropelModel()->getPrice()+ $threshold,true,1,10)->getResults()->toArray(null,TableMap::TYPE_COLNAME);
            return view('product',[
            'section' => $section,
            'productReviews' => $productReviews,
            'similarProducts' => $similarProducts,
            'productInfo'=>$productInfo
        ]);
    }

    public function addReview(Request $request,User $user,ProductReview $productReview,$productId){


        try{
            //Check if user is already logged in
            if(!$this->hasUser($request,$user)) {
                return redirect('/login');
            }

            //Get Payload
            $payload = $request->all();

            //Create Review
            $payload['product_id'] = $productId;
            $payload['score'] = 1;
            $payload['user_id'] = $user->getPropelModel()->getUserId();
            $payload['created_at'] = new \DateTime();

            //Create review
            if(!$productReview->createWithArray($payload)){
                throw new Error('Could not add review');
            }
            return redirect(sprintf('/product/%d/reviews',$productId));



        }catch(Throwable $exception){
            $payload['error'] = true;
            $payload['error_message'] = $exception->getMessage();

            return redirect(sprintf('/product/%d/reviews?error=true',$productId));
        }

    }
}
