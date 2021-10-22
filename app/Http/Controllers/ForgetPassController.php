<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\ForgetPass;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
class ForgetPassController extends Controller
{
    public static $email;
    public function ajax(Request $request){
        $user = User::where(["email" => $request->email])->first();
        $code=rand(1,999999);
        if(isset($user->email)){
        Mail::to($user)->send(new ForgetPass($code));
        User::where(["email" => $request->email])->update(['email_code' => $code]);
        self::$email = $request->email;
            return "sended";
        }else{
            return "not";
        }
        
    }
    public function createNewPass(Request $request){
        $password = Hash::make($request['password']);
        $user = User::where(["email_code" => $request->code])->first();
        if(isset($user->email)){
            User::where(["email_code" => $request->code])->update(['password' => $password ,'email_code' => null]);
            return "updated";
        }
        return "Email code is not valid";  
    }
}