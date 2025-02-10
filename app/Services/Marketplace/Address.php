<?php

namespace App\Services\Marketplace;

use App\Helpers\TokenHelper;
use App\Propel\AddressQuery;
use App\Services\PropelService;
use Exception;
use Throwable;

class Address extends PropelService
{
    public function createWithArray($arguments = []) {
        try{
            //Create Model
            $model = new \App\Propel\Address();

            $this->setPropelModel($model);
            return $this->updateWithArray($arguments);

        }catch (Throwable $exception){
            throw new Exception(sprintf('%s failed to be created',$this->getPropelModelName()),0,$exception);
        }
    }

    public function loadByUserId($userId)
    {
        $query = AddressQuery::create();
        $model = $query->findOneByUserId($userId);
        $this->setPropelModel($model);

        return !is_null($this->getPropelModel());
    }

    function getPropelModelName()
    {
        return 'Address';
    }




}
