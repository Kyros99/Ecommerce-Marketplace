<?php

namespace App\Http\Controllers;

use App\Helpers\TokenHelper;
use App\Services\Marketplace\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class AccessController
{

    protected function init(Request $request,User $user){
        //Check if user is logged and renew cookie

        $hasUser = $this->hasUser($request,$user);
        if($hasUser){

            $token = Cookie::get('user_token');
            $rememberMe = TokenHelper::getTokenPayload($token)['remember_me'];

            Cookie::queue('user_token',$token, $rememberMe ? 60*24*30 : 0);
        }

        return $hasUser;
    }

    protected function hasUser(Request $request,User $user){

        //Get token
        $token = $request->cookie('user_token');
        
        if (empty($token)){
            return false;
        }

        //Verify Token
        if (!TokenHelper::verifyToken($token)){

            Cookie::unqueue('user_token');
            return false;
        }

        if(!$user->loadByToken($token)) {

            //Remove Cookie
            Cookie::unqueue('user_token');
            return false;
        }

        return true;
    }
}
