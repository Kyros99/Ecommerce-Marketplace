<?php

namespace App\Services\Marketplace;

use App\Propel\ProductReviewQuery;
use App\Services\PropelService;
use Exception;
use Propel\Runtime\ActiveQuery\Criteria;

class ProductReview extends PropelService
{

    public function getList($product_id){
        return ProductReviewQuery::create()
            ->filterByProductId($product_id)
            ->orderByCreatedAt(Criteria::DESC)
            ->joinWithUser()
            ->find($this->getConnection());
    }

    function getPropelModelName()
    {
        return 'ProductReview   ';
    }

    public function createWithArray($arguments = []){

        try{
            //Create model
            $model = new \App\Propel\ProductReview();
            $this->setPropelModel($model);
            //Update
            return $this->updateWithArray($arguments);
        }catch (\Throwable $exception){
            throw new Exception(sprintf('%s failed to be created',$this->getPropelModelName()),0,$exception);

        }
    }

}
