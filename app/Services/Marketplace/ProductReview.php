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

    public function getNewPropelModel(){
        return new \App\Propel\ProductReview();
    }

}
