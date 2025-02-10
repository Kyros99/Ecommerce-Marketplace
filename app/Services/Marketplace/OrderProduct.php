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

    public function createWithArray($arguments = [])
    {
        try {
            //Create Model
            $model = new \App\Propel\OrderProduct();
            $this->setPropelModel($model);
            return $this->updateWithArray($arguments);

        } catch (Throwable $exception) {
            throw new Exception(sprintf('%s failed to be created', $this->getPropelModelName()), 0, $exception);
        }
    }
}
