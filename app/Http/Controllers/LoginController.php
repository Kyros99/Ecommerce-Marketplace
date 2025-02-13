<?php

namespace App\Http\Controllers;

use App\Helpers\TokenHelper;
use App\Services\Marketplace\User;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Throwable;

class LoginController extends AccessController
{
    public function loginPage(Request $request,User $user){

        //Check for logged-in user
        if($this->hasUser($request,$user)){
            return redirect('/');
        }

        return view('login',['redirect'=> $request->get('redirect') ?: '']);
    }

    public function login(Request $request,User $user){

        if($this->hasUser($request,$user)){
            return redirect('/');
        }

        try{
            // Get Payload
            $payload = $request->all();

            //Check if user exists with same email
            $email =  $payload['email'];
            if (!$user->loadByEmail($email))
            {
                throw new Error('User does not exist with this email');
            }
            //Check for password match
            $password = $payload['password'];
            if(!$user->authenticate($password)){
                throw new Error('Password does not match');
            }

            //Generate Token
            $rememberMe = isset($payload['remember_me']);
            $token = $user->getUserToken($rememberMe);
            Cookie::queue('user_token',$token, $rememberMe ? 60*24*30 : 0);

            session(['first_name' => $user->getPropelModel()->getFirstname()]);
            session(['last_name' => $user->getPropelModel()->getLastname()]);




            //Return/Redirect
            return redirect($request->get('redirect') ?: '/');

        }catch (Throwable $ex){
            $payload['error'] = true;
            $payload['error_message'] = $ex->getMessage();
            unset($payload['password']);

            return view('login',$payload);
        }

    }

}
