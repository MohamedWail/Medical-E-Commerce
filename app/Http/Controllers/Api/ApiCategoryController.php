<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\BaseController as BaseController;

use Illuminate\Http\Request;
use App\Models\Category;

class ApiCategoryController extends BaseController
{
    public function index() {
        $categories = Category::all()->pluck('name');
        return $this->sendResponse($categories, 'Categories obtained successfully.', '200');
    }
}
