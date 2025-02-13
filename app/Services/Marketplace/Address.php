<?php

namespace App\Services\Marketplace;

use App\Helpers\TokenHelper;
use App\Propel\AddressQuery;
use App\Services\PropelService;
use Exception;
use Throwable;

class Address extends PropelService
{

    public function loadByUserId($userId)
    {
        $query = AddressQuery::create();
        $model = $query->findOneByUserId($userId);
        $this->setPropelModel($model);

        return !is_null($this->getPropelModel());
    }

    public function getNewPropelModel(){
        return new \App\Propel\Address();
    }

    public function getPropelModelName()
    {
        return 'Address';
    }




}
