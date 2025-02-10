<?php

namespace App\Http\Controllers;


use Error;
use Throwable;
use Illuminate\Http\Request;
use App\Services\Marketplace\User;
use Illuminate\Support\Facades\Cookie;

class RegisterController extends AccessController
{
    public function registerPage(Request $request,User $user)
    {
        if($this->hasUser($request,$user)){
            return redirect('/');
        }

        return view('register');
    }

    public function register(Request $request,User $user)
    {

        if($this->hasUser($request,$user)){
            return redirect('/');
        }

        try{
            // Get Payload
            $payload = $request->all();

            // Validate Same Email
            if ($payload['email'] != $payload['repeat_email'])
            {
                throw new Error('Emails are not the same');
            }

            //Check if user exists with same email
            $email =  $payload['email'];
            if ($user->loadByEmail($email))
            {
                throw new Error('User already exists with this email');
            }

            //Create User
            $names = explode(' ',$payload['full_name']);
            $payload['first_name'] = $names[0];
            unset($names[0]);
            $payload['last_name'] = implode(' ',$names);
            if(!$user->createWithArray($payload)){
                throw new Error('There was an error creating the user');
            }

            //Generate Token
            $token = $user->getUserToken(true);
            Cookie::queue('user_token',$token,60*24*30);

            //Return/Redirect
            return redirect('/onboarding');

        }catch (Throwable $ex){
            $payload['error'] = true;
            $payload['error_message'] = $ex->getFile() . ' ' . $ex->getLine() . ' ' . $ex->getMessage();
            unset($payload['password']);

            return view('register',$payload);
        }
    }
}
