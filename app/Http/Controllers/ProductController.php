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
    
    public function showAllProducts(Request $request){
        // $orders = session()->get("orders");
        $data = Categories::all();
        $datas =Products::with(['categories','photos'])->paginate(3);
        // $datasUser::paginate(15);
        $myproducts =Products::with(['categories','photos'])->where('user_id','=',session()->get("data")->id)->paginate(3);
        // dd($myproducts);
        if($request->ajax()){
           if($request->priceStarting!=null && $request->priceOver!=null && $request->name == 'search' ){
                $products = Products::with(['categories','photos'])
                            ->where('price', '>=', $request->priceStarting)
                            ->where('price', '<=', $request->priceOver)
                            ->get();
                return view("ajax.search",['datas' => $products,'data' => $data  ])->render();
           }elseif($request->priceStarting==null && $request->priceOver!=null && $request->name == 'search' ){
                $products = Products::with(['categories','photos'])
                            ->where('price', '<=', $request->priceOver)
                            ->get();
                return view("ajax.search",['datas' => $products,'data' => $data  ])->render();
           }elseif($request->priceStarting!=null && $request->priceOver==null && $request->name == 'search' ){
                $products = Products::with(['categories','photos'])
                            ->where('price', '>=', $request->priceStarting)
                            ->get();
                return view("ajax.search",['datas' => $products,'data' => $data  ])->render();
            }elseif($request->priceStarting==null && $request->priceOver==null && $request->name == 'search' ){
                $products = Products::with(['categories','photos'])
                            ->get();
                            // dd($products[0]['count']);
                            foreach($products as $key=>$product){
                                if($product['count']==0){
                                    unset($products[$key]);
                                }
                            }
                return view("ajax.search",['datas' => $products,'data' => $data  ])->render();
            }
        }else{
            return view("allProducts",['datas' => $datas,'data' => $data ,'myproducts' => $myproducts]);
         }
    }
    public function details($id){
        $thisproduct =Products::with(['categories','photos','feedback'])
                    ->where('id','=',$id)
                    ->get();
        return view("product_details",['thisproduct' => $thisproduct]);
    }
    public function headerSearch(Request $request){
        $headerSearchInput = $request['headerSearchInput'];
        $headerSearchSelect = $request['headerSearchSelect'];
        if($headerSearchSelect=="All"){
            $products = Products::with(['categories','photos'])
                        ->where('name', 'like', '%' . $headerSearchInput . '%')
                        ->get();
            return view("search",['products' => $products]);
        }else{
            $products = Products::with(['photos','categories'])
                        ->where('category_id','=',$headerSearchSelect)
                        ->where('products.name', 'like', '%' . $headerSearchInput . '%')
                        ->get();   
            $data = Categories::all()->where('id','=',$headerSearchSelect);
            return view("search",['products' => $products,'category'=>$data]);
        }
    }
    public function updateProduct(Request $request)
    {
        //  dd($request['id']);
        DB::table('products')
            ->where('id',$request['id'])
            ->update(['name'=>$request['name'],'count'=>$request['count'],'price'=>$request['price'],'description'=>$request['description']]);
            
            if($request->hasfile('image'))
            {
                // dd('ok');
                foreach($request->file('image') as $file)
                {
                    $photo = new Photo;
                    $name = time().'.'.$file->getClientOriginalName();
                    $file->move(public_path().'/themes/images/products', $name);  
                    $data[] = $name; 
                    $photo->photo = $name;
                    $photo->products_id = $request['id'];
                    $photo->save();
                }
            }
            return redirect('/all');
    }

    public function ajax(Request $request){
        $productsInCart=Cart::all()->where('products_id', '=' ,$request->id)
                        ->where('user_id', '=',$request->session()->get("data")->id);
        $productsInWishlist=Wishlist::all()->where('products_id', '=' ,$request->id)
                        ->where('user_id', '=',$request->session()->get("data")->id);
        
            if($request->name == 'addCard'){
                if($productsInCart->isEmpty()){
                    if($productsInWishlist->isEmpty()){
                        $count = 1;
                        $cart = new Cart; 
                        $cart->user_id =$request->session()->get("data")->id;
                        $cart->products_id =$request->id;
                        $cart->count =$count;
                        $cart->save();
                    }else{
                        DB::table('wishlists')
                        ->where('products_id', '=',$request->id)
                        ->delete(); 
                        $count = 1;
                        $cart = new Cart; 
                        $cart->user_id =$request->session()->get("data")->id;
                        $cart->products_id =$request->id;
                        $cart->count =$count;
                        $cart->save();
                    }
                    return ("notHave");
            }else{
                return ("have");
            }
            }
            if($request->name == 'addWishlist'){
                if($productsInWishlist->isEmpty()){
                    if($productsInCart->isEmpty()){
                        $wishlist = new Wishlist; 
                        $wishlist->user_id =$request->session()->get("data")->id;
                        $wishlist->products_id =$request->id;
                        $wishlist->save();
                    }else{
                        DB::table('carts')
                        ->where('products_id', '=',$request->id)
                        ->delete(); 
                        $wishlist = new Wishlist; 
                        $wishlist->user_id =$request->session()->get("data")->id;
                        $wishlist->products_id =$request->id;
                        $wishlist->save(); 
                    }
                return ("notHave");
            }else{
                return ("have");
            }
        }
        if($request->name == 'delete'){
            Products::where('id','=', $request->id)->delete();
            return ('delete');
        }
    }
    
}