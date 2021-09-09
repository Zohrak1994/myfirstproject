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
            $product->category_id =$request['category'];
            $product->user_id =$request->session()->get("data")->id;
            $product->save();
            if($request->hasfile('images'))
            {
                foreach($request->file('images') as $file)
                {
                    $photo = new Photo;
                    $name = time().'.'.$file->getClientOriginalName();
                    $file->move(public_path().'/themes/images/products', $name);  
                    $data[] = $name; 
                    $photo->photo = $name;
                    $photo->products_id = $product->id;
                    $photo->save();
                }
            }
               
            
            
            return redirect('/all');
         }

    }

    public function showAllProducts(){
        $data = Categories::all();
        $datas =Products::with(['categories','photo'])->get();
        // $article = \App\Models\Products::with(['user','categories'])->first();
         return view("allProducts",['datas' => $datas,'data' => $data]);
    }
}
// DB::table('photos')->select('photos.photo','product_id')
// ->leftJoin('products', 'products.id', '=', 'photos.product_id')
// ->groupBy('products.id');
// $products = DB::table('photos')->select('products.id', 'photos.photo', 'products.name', 'products.description')
// ->leftJoin('products', 'products.id', '=', 'photos.product_id')
// // ->groupBy('products.id')
// ->get();
// select products.id,  MIN(photos.photo), products.name, products.description 
// from photos 
//      left join 
//      products 
//      on products.id = photos.product_id 
// group by products.id

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