<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller{
    public function addPerson(Request $request){
        $validator=Validator::make($request->all(), [
                'name' => 'required|min:2|max:45',
                'surname' => 'required|min:2|max:45',
                'gender' => 'required',
                'age' => 'required|min:7|max:100|int',
                'email' =>  'required|email|unique:users,email',
                'password' => 'required|min:6|same:cpassword|required_with:password|',
                'cpassword' => 'same:password'
            ]);
            if ($validator->fails()) {
                return Redirect::back()
                ->withErrors($validator)
                ->withInput();
                
            }
            
            else{
               
               $user = new User; 
               $user->name =$request['name'];
               $user->surname =$request['surname'];
               $user->title =$request['gender'];
               $user->age =$request['age'];
               $user->email =$request['email'];
               $user->password = Hash::make($request['password']);
               $user->save();
               
               return redirect('/login');
            }
              
        }
        public function login(Request $request){
            $validator=Validator::make($request->all(), [
                    'mEmail' =>  'required|email|',
                    'mPassword' => 'required|min:6',
                ]);
                    $checkInfo = User::where('email', "=",request('mEmail'))->first();
                   if(isset($checkInfo)){
                     if(Hash::check(request('mPassword'), $checkInfo->password)){
                        $request->session()->put('data', $checkInfo);
                        $data = $request->session()->get("data");
                        //compact($data);
                        return redirect('/profil');
                     }else{
                        $validator->after(function ($validator) use($checkInfo,$request){
                            $validator->errors()->add('mPassword', 'Your password is not valid');
                        });
                     }
                   }else{
                    $validator->after(function ($validator) use($checkInfo,$request){
                            $validator->errors()->add('mEmail', 'This email is not valid');
                    });
                   }
                   if ($validator->fails()) {
                    return Redirect::back()
                    ->withErrors($validator)
                    ->withInput();
                    
                }

            }
            public function update(Request $request){
                $validator=Validator::make($request->all(), [
                    'name' => 'required|min:2|max:45',
                    'surname' => 'required|min:2|max:45',
                    'gender' => 'required',
                    'age' => 'required|min:7|max:100|int',
                    'email' =>  'required|email|unique:users,email',
                ]);
                if ($validator->fails()) {
                    return Redirect::back()
                    ->withErrors($validator)
                    ->withInput();
                    
                }else{
                $value = session('data');
                $UpdateDetails = User::where('id', '=',  $value['id'])->first();
                $UpdateDetails->name =$request['name'];
                $UpdateDetails->surname =$request['surname'];
                $UpdateDetails->title = $request['gender'];
                $UpdateDetails->age =$request['age'];
                $UpdateDetails->email =$request['email'];
                $UpdateDetails->save();
                $request->session()->put('data', $UpdateDetails);
                }
            }
            public function uppassword(Request $request){
                $validator=Validator::make($request->all(), [
                    'oldPassword' => 'required',
                    'password' => 'required|min:6|same:cpassword|required_with:password|',
                    'cpassword' => 'same:password'
                ]);
                // dd(session('data'));
                $email = session('data')['email'];
                $checkInfo = User::where('email', "=",$email)->first();
                if(isset($checkInfo)){
                    if(Hash::check(request('oldPassword'), $checkInfo->password)){
                        $value = session('data');
                        $UpdateDetails = User::where('id', '=',  $value['id'])->first();
                        $UpdateDetails->password = Hash::make($request['password']);
                        $UpdateDetails->save();
                    }
                  }else{
                    if ($validator->fails()) {
                        return Redirect::back()
                        ->withErrors($validator)
                        ->withInput(); 
                    }
                }
            }
//dzel sranq


                
}
