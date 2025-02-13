<?php

namespace App\Services\Marketplace;

use App\Services\PropelService;
use Exception;
use Throwable;

class OrderProduct extends PropelService
{

    public function getPropelModelName()
    {
        return 'OrderProduct';
    }
    public function getNewPropelModel(){
        return new \App\Propel\OrderProduct();
    }
}
