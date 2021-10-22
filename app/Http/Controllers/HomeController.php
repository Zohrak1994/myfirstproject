<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Session\CookieSessionHandler;
use Illuminate\Session\Store;
use App\Models\User;
use App\Models\Order;
use App\Http\Controllers\Auth\Auth;
use App\Http\Middleware\Authenticate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //  dd(Auth::check());
        if(isset($request->session()->get("data")->id)){
        $orders = Order::all()->where("user_id","=",$request->session()->get("data")->id);
        return view("index",['orders' => $orders]);
        }
        return view("index");
    }
    public function loginpage(Request $request){
        if(!isset($request->session()->get("data")->id)){
                return view('login');
            }
        return redirect('/');
    }
    public function forgetpassPage(Request $request){
        if(!isset($request->session()->get("data")->id)){
            return view('forgetpass');
        }
        return redirect('/');
    }
    public function showRegister(Request $request){
        if(!isset($request->session()->get("data")->id)){
            return view('register');
        }
        return redirect('/');
    }
}