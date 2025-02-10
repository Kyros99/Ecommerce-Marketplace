<?php

namespace App\Http\Controllers;


use Error;
use Throwable;
use Illuminate\Http\Request;
use Propel\Runtime\Map\TableMap;
use App\Services\Marketplace\User;
use App\Services\Marketplace\Address;
use Propel\Runtime\ActiveQuery\Criteria;

class UserProfileController extends AccessController
{

    public function profilePage(Request $request,User $user,$section = 'personal'){


        if(!$this->init($request, $user)){
            return redirect('/login');
        }

        //Get User Info
        return view('user', $this->getViewPayload($user,$section));

    }

    public function personalInfo(Request $request,User $user){

        if(!$this->init($request, $user)){
            return redirect('/login');
        }

        //Check if user exists with the same email
        try{

            $payload = $request->all();
            if(!$user->updateWithArray($payload))  {
                 throw new Error('Failed to update user');
            }

            //Get user info
            $payload = $user->getPropelModel()->toArray(TableMap::TYPE_FIELDNAME);
            $payload['section'] = 'personal';
            $payload['personal_info_success'] = true;
            $payload['personal_info_success_message'] = 'Personal info updated successfully';

            return view('user', $payload);

        }catch(Throwable $exception){

            $payload = $user->getPropelModel()->toArray(TableMap::TYPE_FIELDNAME);
            $payload['section'] = 'personal';
            $payload['personal_info_error'] = true;
            $payload['personal_info_error_message'] = $exception->getMessage(). ' ' . $exception->getFile() . ' ' . $exception->getLine();

            return view('user', $payload);
        }
    }
    private function getViewPayload(User $user,$section){

        //Get User Info
        $payload = [];
        $payload += $user->getPropelModel()->toArray(TableMap::TYPE_FIELDNAME);
        $payload += $user->getPropelModel()->getAddress() ? $user->getPropelModel()->getAddress()->toArray(TableMap::TYPE_FIELDNAME) : [];
        $payload['section'] = $section;


        //Add orders
        $criteria =( new Criteria())->addDescendingOrderByColumn('created_at');
        $orders = $user->getPropelModel()->getOrderss($criteria);
        $payload['orders'] = [];

        foreach ($orders as $order) {

            $order_info = $order->toArray(TableMap::TYPE_FIELDNAME);

            //Get order products
            $orderProducts = $order->getOrderProductsJoinProduct();
            $order_info['products'] = [];

            foreach ($orderProducts as $orderProduct) {

                $productInfo = $orderProduct->toArray(TableMap::TYPE_FIELDNAME);
                $productInfo['product'] = $orderProduct->getProduct()->toArray(TableMap::TYPE_FIELDNAME);
                $productInfo['product']['business'] = $orderProduct->getProduct()->getBusiness()->toArray(TableMap::TYPE_FIELDNAME);
                $order_info['products'][] = $productInfo;
            }

            $payload['orders'][] = $order_info;
        }


        return $payload;



    }
    public function addressInfo(Request $request,User $user,Address $address){

        if(!$this->init($request, $user)){
            return redirect('/login');
        }

        //Check if user exists with the same email
        try{

            //Load Payload
            $payload = $request->all();

            //Load addrss
            $exists = $address->loadByUserId($user->getPropelModel()->getUserId());
            $payload['user_id'] = $user->getPropelModel()->getUserId();


            $status = $exists ? $address->updateWithArray($payload) : $address->createWithArray($payload);

            if(!$status)  {
                 throw new Error('Failed to update user address');
            }

            //Get user info

            $payload = $this->getViewPayload($user,'address');
            $payload['address_info_success'] = true;
            $payload['address_info_success_message'] = 'user address info updated successfully';

            return view('user', $payload);

        }catch(Throwable $exception){

            $payload = $this->getViewPayload($user,'address');
            $payload['address_info_error'] = true;
            $payload['address_info_error_message'] = $exception->getMessage();

            return view('user', $payload);
        }
    }

    public function securityInfo(Request $request,User $user){

        if(!$this->init($request, $user)){
            return redirect('/login');
        }

        //Check if user exists with the same email
        try{

            $payload = $request->all();
            //Authenticate User

            if (!$user->authenticate($payload['current_password'])){
                throw new Error('Current password does not match');
            }

            //Check if Passwork are the same
            if(!empty($payload['new_password']) && $payload['new_password'] != $payload['repeat_password']){
                throw new Error('Gieven passwordsa are not the same');
            }

            //Update User
            $payload['password'] = $payload['new_password'];
            if(!$user->updateWithArray($payload)) {
                    throw new Error('Failed to update user security info');
                }

            //Get user info

            $payload = $this->getViewPayload($user,'security');
            $payload['security_info_success'] = true;
            $payload['security_info_success_message'] = 'user security info updated successfully';

            return view('user', $payload);

        }catch(Throwable $exception){

            $payload = $this->getViewPayload($user,'security');
            $payload['security_info_error'] = true;
            $payload['security_info_error_message'] = $exception->getMessage() . ' ' . $exception->getFile() . ' ' . $exception->getLine();

            return view('user', $payload);
        }

    }


}
