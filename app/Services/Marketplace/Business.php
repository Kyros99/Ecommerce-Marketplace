<?php

namespace App\Services\Marketplace;


use App\Propel\Base\BusinessQuery;
use App\Services\PropelService;

class Business extends PropelService{

    public function loadByUserId($userId)
    {
        $query = BusinessQuery::create();
        $model = $query->findOneByUserId($userId);
        $this->setPropelModel($model);

        return !is_null($this->getPropelModel());
    }

    public function getPropelModelName()
    {
        return 'Business';
    }

    public function getNewPropelModel(){
        return new \App\Propel\Business();
    }
}
