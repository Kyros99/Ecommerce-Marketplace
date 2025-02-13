<?php

namespace App\Http\Controllers;


use App\Services\Marketplace\Product;
use App\Services\Marketplace\User;
use Illuminate\Http\Request;

class SearchController extends AccessController
{

    private $priceRanges = [
        100 => [
            'min' => 0,
            'max' => 100
        ],
        500 => [
            'min' => 100,
            'max' => 500
        ],
        1000 => [
            'min' => 500,
            'max' => 1000
        ],
        'inf' => [
            'min' => 1000,
            'max' => PHP_INT_MAX
        ],
    ];

    public function searchResults(Request $request, User $user, Product $product)
    {

        $this->init($request, $user);



        //Get Search Query
        $payload = $request->all();

        $search = $payload['search'] ?? '';
        $categories = $payload['categories'] ?? $payload['category_id'] ?? [];
        $priceRange = $payload['priceRange'] ?? null;
        $priceMin = $priceRange ? $this->priceRanges[$priceRange]['min'] : 0;
        $priceMax = $priceRange ? $this->priceRanges[$priceRange]['max'] : PHP_INT_MAX;
        $inStockOnly = $payload['in_stock'] ?? false;
        $orderBy = $payload['order_by'] ?? 'price_asc';

        //Search for products
        $pager = $product->search($search, $categories, $priceMin, $priceMax, $inStockOnly, $payload['page'] ?? 1, $payload['maxPerPage'] ?? 25, $orderBy);
        $productList = [];
        $productList['pager'] = [
            'page' => $pager->getPage(),
            'last_page' => $pager->getLastPage(),
        ];

        $productList['products'] = $pager->getResults()->toArray();


        //Get Filter Values
        $productCategories = [];
        $priceCounter = [];
        $stockCounter = 0;
        $pager = $product->search($search, [], 1, PHP_INT_MAX, false, 1, PHP_INT_MAX);

        foreach ($pager->getResults() as $product) {
            $productCategories[$product->getCategoryId()]['title'] = $product->getProductCategory()->getTitle();
            $productCategories[$product->getCategoryId()]['counter'] = $productCategories[$product->getCategoryId()]['counter'] ?? 0;
            $productCategories[$product->getCategoryId()]['counter']++;


            //Prices

            $priceCounter[100] = $priceCounter[100] ?? 0;
            $priceCounter[500] = $priceCounter[500] ?? 0;
            $priceCounter[1000] = $priceCounter[1000] ?? 0;
            $priceCounter['inf'] = $priceCounter['inf'] ?? 0;

            if ($product->getPrice() < 100) {
                $priceCounter[100]++;
            } else if ($product->getPrice() < 500) {
                $priceCounter[500]++;
            } else if ($product->getPrice() < 1000) {
                $priceCounter[1000]++;
            } else {
                $priceCounter['inf']++;
            }

            if ($product->getAmount() > 0) {
                $stockCounter++;
            }
        }


        return view('search_results', [
            'payload' => $payload,
            'productList' => $productList,
            'productCategories' => $productCategories,
            'priceCounter' => $priceCounter,
            'stockCounter' => $stockCounter,
        ]);

    }


}
