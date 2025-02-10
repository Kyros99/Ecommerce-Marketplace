<?php

namespace App\Services\Marketplace;

use App\Propel\ProductCategoryQuery;
use App\Services\PropelService;

class ProductCategory extends PropelService
{

    public function getList(){
        return ProductCategoryQuery::create()->find();

    }

    public function getPropelModelName(){
        return 'ProductCategory';
    }
}
