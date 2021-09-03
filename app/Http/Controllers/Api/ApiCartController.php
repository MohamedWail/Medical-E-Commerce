<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Http\Resources\CartResource;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Api\BaseController as BaseController;



class ApiCartController extends BaseController
{
     public function addToCart(Request $request)
    {
        $user= User::where('id', $request->user_id)->first();
        if($user) {
            $product = Product::find($request->product_id);
            if(!$product) {
                return $this->sendError('product is not found');
            }
            Cart::instance('cart')->restore($user->id);
            Cart::instance('cart')->add([
                'id' => $request->product_id,
                'name' => $product->name,
                'price' => $product->price,
                'qty' => 1
            ])->associate('App\Models\Product');
            Cart::instance('cart')->store($request->user_id);
            return $this->sendResponse('', 'Product added successfully to cart.', '200');
        }
        return $this->sendError('Wrong Credentials');
    }

    public function getCartContent(Request $request) {
        $user= User::where('id', $request->user_id)->first();
        if($user) {
            Cart::instance('cart')->restore($request->user_id);
            $cart = [];
            foreach(Cart::instance('cart')->content() as $row) {
                array_push($cart, $row);
            }
            return $this->sendResponse([CartResource::collection($cart), 'total ' => Cart::subtotal()], 'Cart obtained successfully.', '200');
        }
        return $this->sendError('Wrong Credentials');
    }

    public function removeFromCart(Request $request) {
        $user= User::where('id', $request->user_id)->first();
        if($user) {
            Cart::instance('cart')->restore($request->user_id);
            Cart::instance('cart')->remove($request->rowId);
            Cart::instance('cart')->store($request->user_id);
            return $this->sendResponse('', 'Product removed successfully from cart.', '200');
        }
        return $this->sendError('Wrong Credentials');
    }
    
}

