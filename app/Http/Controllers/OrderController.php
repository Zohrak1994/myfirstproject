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

class OrderController extends Controller
{
    public function orders(){
        $data = Order::all();
        $request->session()->put('orders', $data);
        return view("inc.orders",['data' => $data  ]);
    }
}
