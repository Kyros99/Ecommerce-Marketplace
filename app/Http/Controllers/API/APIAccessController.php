<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\SignatureInvalidException;
use Illuminate\Http\Request;

class APIAccessController extends Controller
{

    public function checkAuth(Request $request, $scope)
    {
        // Get Token
        $token = $request->bearerToken();
        if(empty($token)) {
            return false;
        }

        try{
            $key = config('auth.jwt_secret');

            $decoded = (array)JWT::decode($token, new Key($key, 'HS256'));

            $scopes = explode(',', $decoded['scopes'] ?? '');
            if(empty($scopes) || !in_array($scope, $scopes)){
                return false;
            }
        }catch(SignatureInvalidException $ex){
            return false;
        }
        return true;
    }
}
