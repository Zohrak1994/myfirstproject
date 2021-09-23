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
                ->delete(); 
                return "deleted";
            }
            DB::table('carts')
            ->where('products_id', '=',$request->id)
            ->update(['count' => $request->count]);
        }
        if($request->name == 'deleteCart'){
            DB::table('carts')
            ->where('products_id', '=',$request->id)
            ->delete(); 
        }
        if($request->name == 'moveToWishlist'){
            DB::table('carts')
            ->where('products_id', '=',$request->id)
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
            ->delete(); 

            $cart = new Cart; 
            $cart->user_id =$request->session()->get("data")->id;
            $cart->products_id =$request->productId;
            $cart->count = 1;
            $cart->save();
            return $request->id;
        }
        if($request->name == 'deleteWishlist'){
            DB::table('wishlists')
            ->where('products_id', '=',$request->id)
            ->delete(); 
        }

    }
}