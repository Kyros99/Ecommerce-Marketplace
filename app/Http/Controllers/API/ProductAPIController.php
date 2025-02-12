<?php

namespace App\Http\Controllers\API;

use App\Services\Marketplace\Product;
use Illuminate\Http\Request;
use Propel\Runtime\Map\TableMap;

class ProductAPIController extends APIAccessController
{

    public function search(Request $request, Product $product)
    {
        if(!$this->checkAuth($request,'products.search')) {
            $response =  [
                'status' => 'Unauthorized',
                'message' => 'Token is not valid',
            ];

            return response(json_encode($response), 401)
                ->header('Content-Type', 'application/json');
        }


        //Search Products
        $pager = $product->search($request->get('search'));
        $pagerResponse = [
            'results' => $pager->getResults()->toArray(null, false,TableMap::TYPE_FIELDNAME),
            'total_results' => $pager->getNbResults(),
            'page' => $pager->getPage(),
            'max_per_page' => $pager->getMaxPerPage(),
            'total_pages' => $pager->getLastPage()
        ];

        return response(json_encode($pagerResponse),200)
            ->header('Content-Type', 'application/json');
    }
}
