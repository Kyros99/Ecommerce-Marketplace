<?php

namespace App\Http\Controllers;

use App\Services\Marketplace\Order;
use App\Services\Marketplace\Product;
use App\Services\Marketplace\ProductCategory;
use Error;
use Illuminate\Http\Request;
use App\Services\Marketplace\User;
use App\Services\Marketplace\Business;
use Propel\Runtime\Map\TableMap;
use Throwable;


class BusinessController extends AccessController
{

    private $productCategory;

    private $order;
    public function __construct(ProductCategory $productCategory,Order $order)
    {
        $this->productCategory = $productCategory;
        $this->order = $order;
    }
    public function createBusinessPage(Request $request,User $user,Business $business)
    {

        if(!$this->init($request,$user)){
            return redirect('/login');
        }

        //check if business already exists
        if($business->loadByUserId($user->getPropelModel()->getUserId())){
            return redirect('/business');
        }
        return view('create_business');
    }

    public function createBusiness(Request $request,User $user,Business $business)
    {

        if(!$this->init($request,$user)){
            return redirect('/login');
        }

        //Get Payload
        $payload = $request->all();
        $payload['user_id'] = $user->getPropelModel()->getUserId();
        if(!$business->createWithArray($payload)){
            throw new Error('Failed to create business');
        }

        return redirect('/business');
    }

    public function businessPage(Request $request,User $user,Business $business,$section = 'basic')
    {
        if(!$this->init($request,$user)){
            return redirect('/login');
        }

        //Check if there is not a business created
        if(!$business->loadByUserId($user->getPropelModel()->getUserId())){
            return redirect('/business/register');
        }

        return view('business',$this->getViewPayload($user,$section));
    }

    public function getViewPayload(User $user,$section = 'basic'){

        //Get business
        $business = $user->getPropelModel()->getBusinesses()[0];

        $payload = [];
        $payload['section'] = $section;
        $payload['businessInfo'] = $user->getPropelModel()->getBusinesses()[0]->toArray(TableMap::TYPE_FIELDNAME);

        //Load product Categories
        $payload['categories'] = $this->productCategory->getList()->toArray(null,false,TableMap::TYPE_FIELDNAME);

        //Products
        $payload['products'] = $business->getProducts()->toArray(null,false,TableMap::TYPE_FIELDNAME);

        //Orders
        $payload['orders'] = [];
        $orders = $this->order->getBusinessOrders($business->getBusinessId());
        foreach ($orders as $order) {
            $orderInfo = $order->toArray(TableMap::TYPE_FIELDNAME);
            $orderInfo['user'] = $order->getUser()->toArray(TableMap::TYPE_FIELDNAME);
            $orderProducts = $order->getOrderProductsJoinProduct();
            $orderInfo['products'] = [];
            foreach ($orderProducts as $orderProduct) {
                if($orderProduct->getProduct()->getBusinessId() != $business->getBusinessId()){
                    continue;
                }

                $orderProductInfo = $orderProduct->toArray(TableMap::TYPE_FIELDNAME);
                $orderProductInfo['product'] = $orderProduct->getProduct()->toArray(TableMap::TYPE_FIELDNAME);
                $orderInfo['products'][] = $orderProductInfo;
            }
            $payload['orders'][] = $orderInfo;
        }
        return $payload;
    }

    public function basicInfo(Request $request,User $user,Business $business){

        try{
            if(!$this->hasUser($request,$user)){
                return redirect('/login');
            }

            //Get Payload
            $payload = $request->all();

            //Update Business
            $business->loadByUserId($user->getPropelModel()->getUserId());
            if(!$business->updateWithArray($payload)){
                throw new \Exception('Failed to update business');
            }

            //Setup View Payload
            $payload = $this->getViewPayload($user);

            //Setup success message
            $payload['section'] = 'basic';
            $payload['basic_info_success'] = true;
            $payload['basic_info_success_message'] = 'Business information updated successfully';

            return view('business',$payload);

        }catch(Throwable $exception){

            $payload = $this->getViewPayload($user);

            $payload['section'] = 'basic';
            $payload['basic_info_error'] = true;
            $payload['basic_info_error_message'] = $exception->getMessage();

            return view('business',$payload);


        }
    }

    public function createProduct(Request $request,User $user,Product $product){

        try{
            if(!$this->hasUser($request,$user)){
                return redirect('/login');
            }

            //Get Payload
            $payload = $request->all();

            //Update Business
            $payload['business_id'] = $user->getPropelModel()->getBusinesses()[0]->getBusinessId();
            if(!$product->createWithArray($payload)){
                throw new \Exception('Failed to create product in business');
            }

            //Setup View Payload
            $payload = $this->getViewPayload($user);

            //Setup success message
            $payload['section'] = 'products';
            $payload['products_success'] = true;
            $payload['products_success_message'] = 'Business information updated successfully';

            return view('business',$payload);

        }catch(Throwable $exception){

            $payload = $this->getViewPayload($user);

            $payload['section'] = 'products';
            $payload['products_error'] = true;
            $payload['products_error_message'] = $exception->getMessage();

            return view('business',$payload);


        }
    }

    public function updateProduct(Request $request,User $user,Product $product,$productId){

        try{
            if(!$this->hasUser($request,$user)){
                return redirect('/login');
            }

            //Get Payload
            $payload = $request->all();

            //Load product and update
            $product->load($productId);
                if(!$product->updateWithArray($payload)){
                throw new \Exception('Failed to update product in business');
            }

            //Setup View Payload
            $payload = $this->getViewPayload($user);

            //Setup success message
            $payload['section'] = 'products';
            $payload['products_success'] = true;
            $payload['products_success_message'] = 'Business information updated successfully';

            return view('business',$payload);

        }catch(Throwable $exception){

            $payload = $this->getViewPayload($user);

            $payload['section'] = 'products';
            $payload['products_error'] = true;
            $payload['products_error_message'] = $exception->getMessage();

            return view('business',$payload);


        }
    }

}
