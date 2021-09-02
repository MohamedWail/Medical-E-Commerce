<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Validator;


class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('category.index', compact(['categories']));
    }

    public function create() {
        return view('category.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {

            // redirect back to post create page
            // with submitted form data
            return redirect()->route('category.create')
                ->withErrors($validator)
                ->withInput();
        }
        $data = $request->all();

        Category::create($data);

        return redirect()->route('category');
    }

    public function edit($id){
        $category = Category::find($id);
        return view('category.edit',compact('category'));
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {

            // redirect back to post create page
            // with submitted form data
            return redirect()->route('category.edit')
                ->withErrors($validator)
                ->withInput();
        }
        $data = request(['name']);
    
        Category::where('id',$id)->update($data);

        return redirect()->route('category');
    }

    public function destroy($id) {
        $category = Category::find($id)->delete();
        return redirect()->route('category');
    }
}
