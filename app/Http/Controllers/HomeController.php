<?php

namespace App\Http\Controllers;



use Error;
use Throwable;
use Illuminate\Http\Request;
use Propel\Runtime\Map\TableMap;
use App\Services\Marketplace\User;
use App\Services\Marketplace\Address;
use App\Services\Marketplace\ProductCategory;

class HomeController extends AccessController
{

    public function home(Request $request,User $user, ProductCategory $productCategory){


        $this->init($request, $user);

        $categories = $productCategory->getList()->toArray();
        $colors = ['#dfdcfa','#d4e2df','#e5e3d3','#ebdfde','d7e5f5','#f1d9dd'];
        return view('home',['ProductCategories' => $categories, 'colors'=>$colors]);

    }

    public function onboardingPage(Request $request,User $user){


        //Initialize
        if(!$this->init($request,$user)){
            return redirect('/register');
        }

        return view('onboarding', $user->getPropelModel()->toArray(TableMap::TYPE_FIELDNAME));
    }

    public function onboarding(Request $request,User $user,Address $address){

        //Initialize
        if(!$this->init($request,$user)){
            return redirect('/register');
        }

        try{

            $payload = $request->all();
            $user->beginTransaction();

            //Update User
            if(!$user->updateWithArray($payload)){
                throw new Error('There was an error updating the user');
            }

            //Create Address
            $addressArguments = $payload;
            $addressArguments['user_id'] = $user->getPropelModel()->getUserId();
            if(!$address->createWithArray($addressArguments)){
                throw new Error('There was an error creating the address');
            }

            if(!$user->commitTransaction()){
                throw new Error('There was an error committing the transaction');
            }


            return redirect('/');

        }catch(Throwable $exception){

            $user->rollbackTransaction();

            $payload['error'] = true;
            $payload['error_message'] = $exception->getFile() . ' ' . $exception->getLine() . ' ' . $exception->getMessage();

            return view('onboarding',$payload);
        }

    }


}
