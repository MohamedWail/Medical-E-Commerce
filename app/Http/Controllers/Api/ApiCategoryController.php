<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\CategoryResource;

use Illuminate\Http\Request;
use App\Models\Category;

class ApiCategoryController extends BaseController
{
    public function index() {
        $categories = CategoryResource::collection(Category::get());
        return $this->sendResponse($categories, 'Categories obtained successfully.', '200');
    }
}
