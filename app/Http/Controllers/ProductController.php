<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;



class ProductController extends Controller
{
    public function showCategories(){
        $categories = Categories::all();
       return view("addProduct",['categories' => $categories]);
    }

    public function addProduct(Request $request){
        $validator=Validator::make($request->all(), [
            'name' => 'required',
            'images' => 'required',
            'count' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::back()
            ->withErrors($validator)
            ->withInput();
        }
        else{
            $product = new Products; 
            $product->name =$request['name'];
            $product->count =$request['count'];
            $product->price =$request['price'];
            $product->description =$request['description'];
            $product->category =$request['category'];
            $product->save();
            if($request->hasfile('images'))
            {
                foreach($request->file('images') as $file)
                {
                   
                    $name = time().'.'.$file->extension();
                    $file->move(public_path().'/themes/images/products', $name);  
                    $data[] = $name;  
                }
            }
               
            
            
            return redirect('/login');
         }

    }
}




// $this->validate($request, [
//     'filenames' => 'required',
//     'filenames.*' => 'mimes:doc,pdf,docx,zip'
// ]);


// if($request->hasfile('filenames'))
// {
// foreach($request->file('filenames') as $file)
// {
//     $name = time().'.'.$file->extension();
//     $file->move(public_path().'/files/', $name);  
//     $data[] = $name;  
// }
// }


// $file= new File();
// $file->filenames=json_encode($data);
// $file->save();