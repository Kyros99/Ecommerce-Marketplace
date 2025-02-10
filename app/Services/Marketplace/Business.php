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

    public function createWithArray($arguments = []) {
        //Create Model
        $model = new \App\Propel\Business();

        $this->setPropelModel($model);
        return $this->updateWithArray($arguments);
    }

    public function getPropelModelName()
    {
        return 'Business';
    }
}
