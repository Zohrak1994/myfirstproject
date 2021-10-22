<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Auth\SessionGuard;
use Illuminate\Contracts\Session\Session;
use App\Http\Middleware\Authenticate;
class Auth 
{
    public $auth=false;
    public function check(){
        // dd(Authenticate::$session);
            if(!is_null(Authenticate::$session)){

                // $this->auth = true;
                return true;
            }
                 return false;

        // $this->auth = false;
       

    }
}