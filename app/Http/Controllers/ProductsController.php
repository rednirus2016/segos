<?php

namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\visual;
use App\Models\Slug;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use DB;

class ProductsController extends Controller
{

    public function new(){
        return view('Product.add')
            ->with('categories',Category::whereIn('status',[1,2,3,4,5])->where('type',1)->get());
    }

    public function store(Request $request){
        // dd($request->all());
        $this->validate($request,[
            'name'=>'required|max:255', 
            'slug'=>'required|max:255|unique:slugs',
            'category'=>'required',
            //'price'=>'required',
            'description'=>'required',
            'packing'=>'required',
            'composition'=>'required',
            'meta_title'=>'required',
            'meta_keyword'=>'required',
            'meta_description'=>'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:5000',
           
            
        ]);
         
        
        $image=$request->image->move('Products');
           
        $product=Product::create([
            'name'=>$request->name,
            'division_id' => $request->did, 
            'type_id' => $request->tid, 
            'slug'=>$request->slug,
            'description'=>$request->description,
          'price'=>$request->price,
         
            'composition'=>$request->composition,
            'packing'=>$request->packing,
            'meta_title'=>$request->meta_title,
            'meta_keyword'=>$request->meta_keyword,
            'meta_description'=>$request->meta_description,
            'image'=>$image
        ]);
        
        //dd($product->id);
        foreach($request->category as $item){
            CategoryProduct::create([
                'product_id' => $product->id,
                'category_id' => $item
            ]);
        }

        Slug::create([
            'slug' => $request->slug,
            'type' => 1,
            'slugid' => $product->id
        ]);  
        
        Session::flash('flash_type','success');
        Session::flash('flash_message','Product Created Successfully.');
        
        return redirect('/admin/products/view');
    }

    public function view(){
        //dd(Product::with('categories')->first());
        $product['product']=Product::get();
       // $visuals['visuals']= DB::table('visuals')->where(['name'=>$product->name]);
        $city = Category::whereIn('status',[3,5])->get();
        $keywords = Category::whereIn('status',[2,4])->get();
        
        return view('Product.view')
            ->with('products',Product::with('categories')->get())
            ->with('categories',Category::where('status',1)->where('type',1)->get())
            ->with('city',$city)
            ->with('keywords',$keywords);
            
    }

    public function edit($pid){
       
      
            $product=Product::where('id',$pid)
            ->with('categories')
            ->first();

     
        return view('Product.edit')
            ->with('categories',Category::whereIn('status',[1,2,3,4,5])->where('type',1)->get())
            ->with('product',$product);
    }

    public function update(Request $request){
        $slug=Slug::where('slugid',$request->pid)
            ->where('type',1)
            ->first();

        $this->validate($request,[
            'name'=>'required|max:255', 
            'slug'=>'required|max:255|unique:slugs,slug,'.$slug->id,
            'category'=>'required'       
        ]);
        $product = Product::where('id',$request->pid)->first();
        

        if($request->image!=NULL){
            $this->validate($request,[
                'image' => 'mimes:jpg,jpeg,png|max:5000'
            ]);
            if(\File::exists(public_path($product->image))){
                \File::delete(public_path($product->image));
            }
          
            $image=$request->image->move('Products');
            $product=Product::where('id',$request->pid)
            ->update([
                'image'=>$image
            ]);
        }

        Product::where('id',$request->pid)
            ->update([
                "name" => $request->name,
                "slug" => $request->slug,
                'description'=>$request->description,
                'composition'=>$request->composition,
                'packing'=>$request->packing,
                'price'=>$request->price,
                "meta_title" => $request->meta_title,
                "meta_keyword" => $request->meta_keyword,
                "meta_description" => $request->meta_description,
            ]);

        CategoryProduct::where('product_id',$request->pid)
            ->delete();
            
        foreach($request->category as $item){
            CategoryProduct::create([
                'product_id' => $request->pid,
                'category_id' => $item
            ]);
        }

        Slug::where('id',$slug->id)
            ->update([
                'slug' => $request->slug
            ]);

        Session::flash('flash_type','success');
        Session::flash('flash_message','Product Updated Successfully.');
        return redirect('/admin/products/view');
    }



    public function productcategorykeywords(Request $request){
        
        foreach($request->products as $item){
             foreach($request->city as $city){
                  CategoryProduct::where('product_id',$item)->update([
                'product_id' => $item,
                'category_id' => $city
            ]);
           
             }
           
            
        }
        Session::flash('flash_type','success');
        Session::flash('flash_message','Product Updated Successfully.');
        
        return redirect('/admin/products/view');
    }





    public function changestatus($pid){
        $product=Product::where('id',$pid)
            ->first();
        if($product->status==1){
            Product::where('id',$pid)
                ->update([
                    "status" => 0
                ]);
            Session::flash('flash_type','danger');
            Session::flash('flash_message','Product Status changed to inactive.');
        }
        else{
            Product::where('id',$pid)
                ->update([
                    "status" => 1
                ]);
                Session::flash('flash_type','success');
                Session::flash('flash_message','Product Status changed to active.');
        }

        return redirect()->back();
    }

    public function import(Request $request){
       
        $this->validate($request,[
            'document' => 'required|mimes:xlsx'
        ]);
        $path1 = $request->file('document')->store('temp'); 
         Excel::import(new ProductsImport, $path1);  
   
     return redirect()->back();
        
    }

    public function search(Request $request){
        //dd($request->all());
        $this->validate($request,[
            'pname'=>'required', 
        ]);
        $products=Product::where('name','LIKE',$request->pname.'%')
            ->with('categories')
            ->paginate(15);
        return view('Product.view')
            ->with('products',$products)
            ->with('categories',Category::where('status',1)->where('type',1)->get());
    }
}
