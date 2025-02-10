<?php

namespace App\Services\Marketplace;

use App\Helpers\TokenHelper;
use App\Propel\Map\UserTableMap;
use App\Propel\UserQuery;
use App\Services\PropelService;
use Exception;
use Throwable;

class User extends PropelService
{
    public function loadByEmail($email)
    {
        $query = UserQuery::create();
        $model = $query->findOneByEmail($email);
        $this->setPropelModel($model);

        return !is_null($this->getPropelModel());
    }

    public function loadByToken($token)
    {


        if(!TokenHelper::verifyTokenPayload($token)){
            return false;
        }

        $payload = TokenHelper::getTokenPayload($token);
        $userId = $payload['user_id'];


        $query = UserQuery::create();
        $model = $query->findOneByUserId($userId);

        $this->setPropelModel($model);

        return !is_null($this->getPropelModel());
    }

    public function createWithArray($arguments = []) {
        try{
            //Create Model
            $model = new \App\Propel\User();
            $this->setPropelModel($model);
            //Set Password
            $password = $arguments['password'];

            if (!empty($password)){
                $arguments['password'] = password_hash($password, PASSWORD_BCRYPT);
            }else{
                unset( $arguments['password'] );
            }
            return parent::updateWithArray($arguments);

        }catch (Throwable $ex){


        }


    }

    public function updateWithArray($arguments = []) {

            $password = $arguments['password'] ?? null;
            if (!empty($password)){
                $arguments['password'] = password_hash($password, PASSWORD_BCRYPT);
            }else{
                unset( $arguments['password'] );
            }
        return parent::updateWithArray($arguments);



    }

    function getPropelModelName()
    {
        return 'User';
    }

    public function getUserToken($rememberMe = false)
    {
        //Check Model
        $this->checkPropelModel();

        //Create Payload
        $payload = [
            'user_id' => $this->getPropelModel()->getUserId(),
            'remember_me' => $rememberMe,
        ];

        return TokenHelper::generateToken($payload);

    }

    public function authenticate($password){

        $this->checkPropelModel();
        //Get hashed Password
        $hashedPassword = $this->getPropelModel()->getPassword();
        return password_verify($password, $hashedPassword);
    }
}
