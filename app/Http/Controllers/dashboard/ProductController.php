<?php
namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use Validator;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $products = Product::all();
        return view('product.index', compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required',
            'description'=>'required',
            'price'=>'required',
            'path'=>'sometimes|nullable',
            'path.*'=>'image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);

        if ($validator->fails()) {

            // redirect back to post create page
            // with submitted form data
            return redirect()->route('product.create')
                ->withErrors($validator)
                ->withInput();
        }


        if($request->hasFile('path')){
            $filename = time() . '.' . $request->path->getClientOriginalExtension();
            $imageName= '/assets/images/products/'. $filename;
            request()->file('path')->move(public_path('assets/images/products'), $filename);
        }

        $data = $request->all();
        $data['path']=$imageName;


        Product::create($data);

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('product.edit', compact(['product', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes',
            'category_id' => 'sometimes',
            'description'=>'sometimes',
            'price'=>'sometimes',
            'path'=>'sometimes|nullable',
            'path.*'=>'image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);

        if ($validator->fails()) {

            // redirect back to post create page
            // with submitted form data
            return redirect()->route('product.create')
                ->withErrors($validator)
                ->withInput();
        }


        if($request->hasFile('path')){
            $filename = time() . '.' . $request->path->getClientOriginalExtension();
            $imageName= '/assets/images/products/'. $filename;
            request()->file('path')->move(public_path('assets/images/products'), $filename);
        }

        $data = request(['name','category_id', 'description', 'price']);
        $data['path']=$imageName;

        Product::where('id', $id)->update($data);

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        unlink(public_path($product->path));
        $product->delete();
        return redirect()->route('product.index');
    }
}
