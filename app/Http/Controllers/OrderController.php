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
use App\Models\Feedback;
use App\Models\Order_details;

class OrderController extends RegisterController
{
    public static function myOrders(){
        $session=parent::$session_data;
        // dd($session);
        $orders = Order::all();
        return $orders;
    }
    public function orders(Request $request){
        $products =Order_details::with(['products','products.photos'])
        ->where('orders_id','=',$request['id'])
        ->paginate(3);
        return view("orders",['products'=>$products]);
    }
    public function feedback(Request $request){
        $feedback=new Feedback;
        $feedback->feedback = $request->feedback;
        $feedback->products_id = $request->id;
        $feedback->user_id = $request->session()->get("data")->id;
        $feedback->save();
        return Redirect::back();
    }
}
