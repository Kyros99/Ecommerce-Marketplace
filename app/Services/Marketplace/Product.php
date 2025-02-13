<?php

namespace App\Services\Marketplace;


use App\Propel\Base\ProductQuery;
use App\Services\PropelService;
use Propel\Runtime\ActiveQuery\Criteria;


class Product extends PropelService
{

    public function load($productId){

        //Setup Query
        $query = ProductQuery::create();
        $model = $query->findOneByProductId($productId);
        $this->setPropelModel($model);

        return !is_null($this->getPropelModel());
    }

    public function search($search, $categories = [], $priceMin = 0, $priceMax = PHP_INT_MAX, $inStockOnly = null, $page = 1, $maxPerPage = 25,$orderBy = 'price_asc')
    {

        $query = ProductQuery::create();

        //Search by Title or id
            $query->filterByProductId($search)
                ->_or()
                ->filterByTitle('%' . $search . '%', Criteria::LIKE)
                ->_or()
                ->filterByShortDescription('%' . $search . '%', Criteria::LIKE)
                ->_or()
                ->filterByLongDescription('%' . $search . '%', Criteria::LIKE);

        //Apply category filters
        if (!empty($categories)) {
            $query->filterByCategoryId($categories, CRITERIA::IN);
        }


        //Apply price filters
        $query->filterByPrice($priceMin, CRITERIA::GREATER_THAN)
            ->filterByPrice($priceMax, CRITERIA::LESS_EQUAL);

        //Apply stock filters
        if ($inStockOnly) {
            $query->filterByAmount(0, CRITERIA::GREATER_THAN);
        }

        //Order products
        switch ($orderBy) {
            case 'price_asc':
                $query->orderByPrice(Criteria::ASC);
                break;
            case 'price_desc':
                $query->orderByPrice(Criteria::DESC);
                break;
            case 'title_asc':
                $query->orderByTitle(Criteria::ASC);
                break;
            case 'title_desc':
                $query->orderByTitle(Criteria::DESC);
                break;
        }

        //Join with product category
        $query->joinWithProductCategory();

        //Get results
        $page = (int)$page ?? 1;
        $maxPerPage = (int)$maxPerPage ?? 25;

        return $query->paginate($page, $maxPerPage);
    }

    public function getPropelModelName()
    {
        return 'Product';
    }


    public function getNewPropelModel(){
        return new \App\Propel\Product();
    }
}
