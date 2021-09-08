<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\ProductResource;
use App\Models\Product;


use Illuminate\Http\Request;

class ApiProductController extends BaseController
{
    public function index() {
        $products =  ProductResource::collection(Product::all());
        // dd($products);

        return $this->sendResponse($products, 'Products obtained successfully.', '200');
    }

    public function search(Request $request) {
        $products = Product::latest()->filter()->get();
        return $this->sendResponse($products, 'Products found successfully.', '200');
    }

    public function latestProducts() {
        $products =  ProductResource::collection(Product::latest()->get());
        return $this->sendResponse($products, 'Latest Products obtained successfully.', '200');
    }

    public function hotProducts() {
        $products = ProductResource::collection(Product::where('is_Hot_deal', '1')->get());
        return $this->sendResponse($products, 'Hot Products obtained successfully.', '200');
    }
}
