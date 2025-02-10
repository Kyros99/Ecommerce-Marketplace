<?php

namespace App\Helpers;

class TokenHelper
{
    CONST SIGN_KEY = 'collegelink';
     public static function generateToken($payload)
     {
         #Encode Payload
         $payloadEncoded = base64_encode(json_encode($payload));

         //Generate Signature
         $signature = hash_hmac('sha256', $payloadEncoded, self::SIGN_KEY);

         return sprintf('%s.%s', $payloadEncoded, $signature);

     }

     public static function verifyTokenPayload($token)
     {
         //Get Payload
         $payload = self::getTokenPayload($token);


         //Generate Signature and compare
         return static::generateToken($payload)=== $token;

     }

     public static function getTokenPayload($token)
     {
         //Get payload from token
         [$payloadEncoded] = explode('.', $token);


         //Decode Payload
         return json_decode(base64_decode($payloadEncoded), true);
     }


     public static function verifyToken($token)
     {
         $payload = self::getTokenPayload($token);

         //Generate Signature and Compare
         return static::generateToken($payload) == $token;
     }
}
