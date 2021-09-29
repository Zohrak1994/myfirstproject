<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Photo;
use App\Models\User;
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\Order;
use App\Models\Order_details;
class CartController extends Controller
{
    public function cart(Request $request){
        
        $id = $request->session()->get("data")->id;
        $product = Cart::with(['products','products.photos'])
        ->where('user_id','=',$id)
        ->get(); 
        return view('shopingcart',['products'=>$product]);
    }
    public function wishlist(Request $request){
        
        $id = $request->session()->get("data")->id;
        $product = Wishlist::with(['products','products.photos'])
        ->where('user_id','=',$id)
        ->get(); 
        return view('wishlist',['products'=>$product]);
    }
    public function ajax(Request $request){
        if($request->name == 'minus' || $request->name == 'plus'){
            if($request->count == 0){
                DB::table('carts')
                ->where('products_id', '=',$request->id)
                ->where('user_id', '=',$request->session()->get("data")->id)
                ->delete(); 
                return "deleted";
            }
            DB::table('carts')
            ->where('products_id', '=',$request->id)
            ->where('user_id', '=',$request->session()->get("data")->id)
            ->update(['count' => $request->count]);
        }
        if($request->name == 'deleteCart'){
            DB::table('carts')
            ->where('products_id', '=',$request->id)
            ->where('user_id', '=',$request->session()->get("data")->id)
            ->delete(); 
        }
        if($request->name == 'moveToWishlist'){
            DB::table('carts')
            ->where('products_id', '=',$request->id)
            ->where('user_id', '=',$request->session()->get("data")->id)
            ->delete(); 

            $wishlist = new Wishlist; 
            $wishlist->user_id =$request->session()->get("data")->id;
            $wishlist->products_id =$request->productId;
            $wishlist->save();
            return $request->id;
        }
        if($request->name == 'moveToCart'){
            DB::table('wishlists')
            ->where('products_id', '=',$request->id)
            ->where('user_id', '=',$request->session()->get("data")->id)
            ->delete(); 

            $cart = new Cart; 
            $cart->user_id =$request->session()->get("data")->id;
            $cart->products_id =$request->id;
            $cart->count = 1;
            $cart->save();
            return $request->name;
        }
        if($request->name == 'deleteWishlist'){
            DB::table('wishlists')
            ->where('products_id', '=',$request->id)
            ->where('user_id', '=',$request->session()->get("data")->id)
            ->delete(); 
        }
        if($request->name == 'checkout'){

            $orders = new Order;
            $orders->user_id =$request->session()->get("data")->id;
            $orders->total = $request->total;
            $orders->save();

            foreach($request->products as $product){
                $order_details = new Order_details;
                $order_details->products_id =$product['id'];
                $order_details->orders_id = $orders->id;
                $order_details->count = $product['count'];
                $order_details->save();
                DB::table('carts')
                ->where('products_id', '=',$product['id'])
                ->where('user_id', '=',$request->session()->get("data")->id)
                ->delete(); 
                DB::table('products')
                ->where('id', '=',$product['id'])
                ->update(['count' => $product['productCount']-$product['count']]);
                // if($product['productCount']-$product['count'] == 0){
                //     DB::table('products')
                //     ->where('id', '=',$product['id'])
                //     ->delete(); 
                // }
            }
        }

    }
}