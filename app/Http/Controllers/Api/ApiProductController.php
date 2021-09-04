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
}
