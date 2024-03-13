<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slug;
use App\Models\Type;
use App\Models\Division;
use App\Models\Product;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\visual;
use DB;
use Validator;
use App\Models\ProductOrder;
use App\Models\Mr;
use App\Models\Enquiry;
use Illuminate\Support\Facades\App;
class PublicPages extends Controller
{
    
    
    
    
    
       public function addenquiries(Request $request)
{
    $rules = [
        'name' => 'required',
        'email'    => 'unique:enquiries|required',
        'mobile' => 'required',
        'location' => 'required',
        'message' => 'required'
    ];

    $input     = $request->only('name', 'email','mobile','location','message');
    $validator = Validator::make($input, $rules);

    if ($validator->fails()) {
        return response()->json(['success' => false, 'message' =>'The email has already been taken.']);
    }
    $name = $request->name;
    $email    = $request->email;
    $password = $request->password;
    $location = $request->location;
    $message = $request->message; 
    
        $AddEnquiry = new Enquiry;
        $AddEnquiry->name = $request->name;
        $AddEnquiry->email = $request->email;
        $AddEnquiry->mobile = $request->mobile;
        $AddEnquiry->location = $request->location;
        $AddEnquiry->message = $request->message;

        if ($AddEnquiry->save()) {
            return response()->json(['success' => true, "message" => "Join request successfully inserted", "status" => 200]);
        } else {
            return response()->json(['success' => false, "message" => "Jooin request not insert", "status" => 404]);
        }

}
    
     //update password
    public function updateAdminPassword(Request $request){
    $user = Mr::findOrFail($request->id);
     if($user){
   /*
    * Validate all input fields
    */
    $rules = [
        'password' => 'required',
        'new_password' => 'required|different:password',
    ];
    $input     = $request->only('password','new_password');
    $validator = Validator::make($input, $rules);
    if ($validator->fails()) 
         {
        return response()->json(['error' => $validator->messages()], 402);
    }
    
    if ($request->password===$user->password) {  
    $UpdateUser = DB::table('mr')->where('id', $request->id)->update([
            "password" =>$request->new_password,
    ]);
    if ($UpdateUser) {
        return response()->json(["message" => "Password Updated!", "status" => 200]);
    } else {
        return response()->json(["message" => "Password does not update", "status" => 404]);
    }
    } else {
        return response()->json(["message" => "Password not match", "status" => 404]);
    }
 }
     else{
       return response()->json(["message" => "User doest not Exist", "status" => 422]);
     }
         
    }
    
      public function productcategoriesss(Request $request , $id){
          
       
         
         $product_list = DB::table('categories')
                          ->join('category_products','category_products.category_id','=','categories.id')
                          ->join('products','category_products.product_id','=','products.id')
                          ->select('products.*')
                          ->where('categories.id',$id)
                          ->get();
                         
         return response()->json($product_list);
          
          
      }
    
       /////////////Update MR details from mr_user table
         public function update_mr_deatil(Request $request){
        $rules = [
            'id' => 'required',
            'firstname'=> 'required',
            'lastname' => 'required'
        ];
        $input= $request->only('id','firstname','lastname');
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) 
             {
            return response()->json(['error' => $validator->messages()], 402);
        }

        $UpdateUser = DB::table('mr')->where('id', $request->id)->update([
            "name" => $request->firstname,
            "last_name" => $request->lastname,
    ]);

    if ($UpdateUser) {
        return response()->json(["message" => "Data update!", "status" => 200]);
    } else {
        return response()->json(["message" => "Data not update", "status" => 404]);
    }
    }
    
      public function mr(Request $request){
        $validator = Validator::make($request->all(), [
            'email'   => 'required',
            'password'   => 'required',
           
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
       $mr= DB::table('mr')->where(['email'=>$request->email,'password'=>$request->password])->first();
       if($mr){
            $response = ["message" => "Login successfully",'user' => $mr];
            return response($response, 200);
         
       }else{
            $response = ["message" => "Please Enter Valid Login Details"];
            return response($response, 422);
             
       }
        
    }
    
     public function get_place_order_details(Request $request){
        
    //   $product_list = DB::table('order_product')
    //   ->join('order','order.uid','=','order_product.oid')
    //   ->select('order_product.oid','order_product.pname','order_product.ppacking', 'order_product.pprice', 'order_product.pquantity', 'order.odate', 'order.address', 'order.d_charge', 'order.o_total', 'order.subtotal', 'order.user_id', 'order.name', 'order.mobile', 'order.status','order.comment_rejected')
    //   ->where('oid', $request->oid)->get();
    
     $order_list = DB::table('tbl_normal_order')->where('id', $request->oid)->first();
      
      if($order_list){
          $product_list = DB::table('order_product')->where('oid', $order_list->id)->get();
          $list = [
         "id" =>$order_list->id,
        "uid" => $order_list->uid,
        "odate" => $order_list->odate,
        "address" => $order_list->address,
         "landmark" => $order_list->landmark,
        "d_charge" => $order_list->d_charge,
        "o_total" => $order_list->o_total,
        "subtotal" => $order_list->subtotal,
        "name" => $order_list->name,
        "mobile" =>$order_list->mobile,
        "status" => $order_list->status,
        "product_list"  => $product_list
              ];
           return response()->json(["order" => $list, "status" => "200"]);
      }else{
        return response()->json(["message"=>"User does not exist", "status" => "404"]);   
      }
       
    }
    
     public function get_place_order(Request $request){
       $order = DB::table('tbl_normal_order')->orderBy('id', 'DESC')->where('uid', $request->uid)->get();
      
      if($order){
           return response()->json(["orders"=>$order, "status" => "200"]);
      }else{
        return response()->json(["message"=>"User does not exist", "status" => "404"]);   
      }
       
    }

    
     public function placeOrder(Request $request){
         
         
         
        $rules = [
            'uid' => 'required',
            'full_address'=>'required',
            'landmark'=>'required',
            'd_charge'=>'required',
            'o_total'=>'required',
            'subtotal'=>'required',
            'name'=>'required',
            'mobile'=>'required',
            'odate'=>'required',
        ];
        $input = $request->only(
            'uid','full_address', 'landmark','d_charge', 'o_total', 'subtotal', 'name', 'mobile', 'odate'
        );
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 402);
        }
         
        $data=[
            'uid'=>$request->uid,
            'address'=>$request->full_address,
            'landmark'=>$request->landmark,
            'd_charge'=>$request->d_charge,
            'o_total'=>$request->o_total,
            'subtotal'=>$request->subtotal,
            'name'=>$request->name,
            'mobile'=>$request->mobile,
            'status'=>'pending',
            'odate'=>$request->odate,
            
        ];

     
       $normalorder= DB::table('tbl_normal_order')->insert($data);
       
       if($normalorder){
           
        $get=DB::table('tbl_normal_order')->orderBy('id','DESC')->where('uid',$request->uid)->first();

        if ($request->isMethod('post')) {
            $productdata = $request->input();
            foreach ($productdata['product_data'] as $key => $value) {
                $pOrder = new ProductOrder;
                $pOrder->oid = $get->id;
                $pOrder->pname = $value['pname'];
                $pOrder->ppacking = $value['ppacking'];
                $pOrder->pprice = $value['pprice'];
                $pOrder->pquantity = $value['pquantity'];
                $pOrder->p_image =$value['p_image'];
                $pOrder->save();
            }
        }
        
        
        
            $whereArray = array('user_id' => $request->uid);

            $query = DB::table('carts');
            foreach($whereArray as $field => $value) {
                  $query->where($field, $value);
            }
            
            $query->delete();
              return response()->json(['success'=>true,'message'=>'Order Place successfuly']);
        
    }
    
        
    }
    
    
    
        public function getAddress(Request $request){

        $rules = [
            'uid' => 'required',
        ];
        $input = $request->only(
            'uid'
        );
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 402);
        }

        $addressData = DB::table('tbl_address')->where('uid', $request->uid)->get();
        if ($addressData) {
            $response = ["message" => "Item Found", "addresses" => $addressData];
            return response($addressData, 200);
        } else {
            $response = ["message" => 'Item does not exist'];
            return response($response, 422);
        }

    }
    public function addAddress(Request $request){
        
         $rules = [
            'uid' => 'required',
            'address' => 'required',
            'pincode' => 'required',
            'city' => 'required',
            'houseno' => 'required',
            'landmark' => 'required',
            'type'=>'required',
            'lat_map' => 'required',
            'long_map' => 'required',
            'aid' => 'required',
            'name'=>'required',
            'mobile'=>'required'

        ];
        $input = $request->only(
            'uid',
            'address',
            'pincode',
            'city',
            'houseno',
            'landmark',
            'type',
             'lat_map',
            'long_map',
            'aid',
            'name',
            'mobile'
        );
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 402);
        }
        
        $aid = $request->aid;
        
        if($aid == 0){
              $data = [
            'uid' => $request->uid,
            'address' => $request->address,
            'pincode' => $request->pincode,
            'houseno'=> $request->houseno,
            'landmark'=> $request->landmark,
            'type' => $request->type,
            'lat_map' => $request->lat_map,
            'long_map' => $request->long_map,
            'city' => $request->city,
            'name'=> $request->name,
            'mobile' => $request->mobile,
        ];

        $addressData = DB::table('tbl_address')->insert($data);
        if ($addressData) {
            return response()->json(["message" => "Address Saved Successfully!!!", "status" => 200], 200);
        } else {
            return response()->json(["message" => "Something went wrong!", "status" => 404], 404);
        }
        }
        else{
           
         $update = DB::table('tbl_address')->where('id', $aid)->update([
             'address' => $request->address,
            'pincode' => $request->pincode,
            'houseno'=> $request->houseno,
            'landmark'=> $request->landmark,
            'type' => $request->type,
            'lat_map' => $request->lat_map,
            'long_map' => $request->long_map,
            'city' => $request->city,
            'name'=> $request->name,
            'mobile' => $request->mobile,
        ]);
        
         if ($update) {
            return response()->json(["message" => "Address Update Successfully!!!", "status" => 200], 200);
        } else {
            return response()->json(["message" => "Something went wrong!", "status" => 404], 404);
        }
        
        }
    }
    
    public function deletecartdata(Request $request){
          $rules = [
            'id' => 'required'
        ];
        $input = $request->only(
            'id'
        );
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 402);
        }
        
         $data = DB::table('carts')->delete($request->id);

         if ($data) {
            return response()->json(["message" => "Deleted!", "status" => 200], 200);
        } else {
            return response()->json(["message" => "Something went wrong!", "status" => 404], 404);
        }
        
    }
     public function updatecartdata(Request $request){

        $rules = [
            'id' => 'required',
            'qty' =>'required'
        ];
        $input = $request->only(
            'id',
            'qty'
        );
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 402);
        }

        $update = DB::table('carts')->where('id', $request->id)->update([
            "qty" => $request->qty,
        ]);
        
         if ($update) {
            return response()->json(["message" => "Updated!", "status" => 200], 200);
        } else {
            return response()->json(["message" => "Something went wrong!", "status" => 404], 404);
        }

    }
    
       public function getcartdata(Request $request){

        $rules = [
            'user_id' => 'required',
        ];
        $input = $request->only(
            'user_id'
        );
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 402);
        }

        $cartData = DB::table('carts')->where('user_id', $request->user_id)->get();
        if ($cartData) {

            $total_price =0;
            foreach($cartData as $item){
                $total_price = floatval($total_price + ($item->p_price * $item->qty));
            }          
            $response = ["message" => "Item Found","total_amount" => $total_price, "carts" => $cartData];
            return response($response, 200);
        } else {
            $response = ["message" => 'Item does not exist'];
            return response($response, 422);
        }

    }
    
     public function addtocart(Request $request)
    {

        $rules = [

            'user_id' => 'required',
            'product_id' => 'required',
            'p_price' => 'required',
            'qty' => 'required',
            'p_name' => 'required',
            'p_image' => 'required',
            'p_packing'=>'required'

        ];
        $input = $request->only(
            'user_id',
            'product_id',
            'p_price',
            'qty',
            'p_name',
            'p_image',
            'p_packing'
        );
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 402);
        }

        $checkProduct =  DB::table('carts')
                         ->where('user_id', $request->user_id)
                         ->where('product_id', $request->product_id)
                         ->first();
        if(!$checkProduct) {
        $data = [
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'p_price' => $request->p_price,
            'qty' => $request->qty,
            'p_name'=> $request->p_name,
            'p_image'=> $request->p_image,
            'p_packing' => $request->p_packing,
        ];

        $cartData = DB::table('carts')->insert($data);
        if ($cartData) {
            return response()->json(["message" => "Product Added!", "status" => 200], 200);
        } else {
            return response()->json(["message" => "Something went wrong!", "status" => 404], 404);
        }
    } else {
        return response()->json(["message" => "Product already in cart!", "status" => 503], 202);
    }
    }
    
    public function searchCategory(Request $request){
       $rules = [
            'keyword' => 'required',
        ];
        $input = $request-> only('keyword');
        $validator = Validator::make($input,$rules);

        if($validator->fails()){
            return response(['errors'=>$validator->errors()->all()],400);
        }
       $order = DB::table('categories')->where('status',1)->where('name','like', "%" .$request->keyword. "%")->get();
      
      if($order){
           return response()->json($order);
      }
       
    }
    
     public function productcategories(Request $request){
  $validator = Validator::make($request->all(), [
            'category_id'   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }
         
         $product_list = DB::table('categories')
                          ->join('category_products','category_products.category_id','=','categories.id')
                          ->join('products','category_products.product_id','=','products.id')
                          ->select('products.*')
                          ->where('categories.id',$request->category_id)
                          ->get();
         
         
        //  $products=Product::whereHas('categories',function($q) use($category){
        //                         $q->where('category_id',$request->category_id);
        //                     })
        //                     ->where('status',1)
        //                     ->limit(10)
        //                     ->get();
                         
         return response()->json($product_list);
     }
   
     public function allCategories(){
        $gallery = DB::table('categories')->where('status',1)->where('type',1)->get();
        return response()->json($gallery);
    }
    
     public function allProducts(){
        $gallery = DB::table('products')->where('status',1)->get();
        return response()->json($gallery);
    }
       //get all blog
    public function blogs(){
        $blog=Blog::orderBy('id', 'DESC')->where('status',1)->get();
        return response()-> json($blog);
    }
    
    
     public function visual(){
        $simple_text= $_GET['query'];
        if($simple_text){
        $products['gallery']=DB::table('visuals')->where('visualname','LIKE','%'. $simple_text.'%')->get();
         
        return view('visual',$products);
        }else{
            return redirect('/');
        }
     }
     public function search(){
        $simple_text= $_GET['query'];
        if($simple_text){
        $products['products']=DB::table('products')->where('name','LIKE','%'. $simple_text.'%')->paginate(15);
         
        return view('search',$products)->with('vis',DB::table('visuals')->get());
        }else{
            return redirect('/');
        }
     }
    
    public function index($data='Home'){
        $slug=Slug::where('slug',$data)
            ->first();
        //dd($slug);
        if($slug != NULL){
            if($slug->type==1){
                //product
                $product=Product::where('slug',$data)
                    ->where('id',$slug->slugid)
                    ->where('status',1)
                    ->first();
                
                if($product != NULL){
                    $products=Product::where('id','!=',$slug->slugid)
                        ->where('status',1)
                     
                        ->get();
                       
                    return view('PublicPages.product')
                       
                        ->with('product',$product)
                        ->with('products',$products);
                }
                return abort(404);
            }
            elseif($slug->type==2){
                //blog
                $blog=Blog::where('slug',$data)
                    ->where('id',$slug->slugid)
                    ->where('status',1)
                    
                    ->first();
                //dd($blog);
                if($blog != NULL){
                    return view('PublicPages.blogdetails')
                        ->with('blog',$blog);
                }
                return abort(404);
            }
            elseif($slug->type==3){
                //page
                $page=Page::where('slug',$data)
                    ->where('id',$slug->slugid)
                    ->where('status',1)
                    ->first();

                if($page != NULL){
                    return view('PublicPages.page')
                        ->with('page',$page);
                }
                return abort(404);
            }
            elseif($slug->type==4){
                //category
                $category=Category::where('slug',$data)
                    ->where('id',$slug->slugid)
                    ->whereIn('status',[1,2,3])
                    ->first();
                    
                if($category != NULL){
                    
                    if($category->type == 1){

                        $products=Product::whereHas('categories',function($q) use($category){
                                $q->where('category_id',$category->id);
                            })
                            ->where('status',1)
                            ->get();
                          $lat = Product::where('status',1)
                          ->limit(5)
                          ->latest()
                          ->get();
                          $keywords=Category::where('status',2)->get();
                          $city=Category::where('status',3)->get();
                        return view('PublicPages.category')
                            ->with('category',$category)
                            ->with('products',$products)
                            ->with('keywords',$keywords)
                            ->with('city',$city)
                            ->with('lat',$lat);
                    }
                    elseif($category->type == 2){
                        $blogs=Blog::whereHas('categories',function($q) use($category){
                            $q->where('category_id',$category->id);
                        })
                        ->where('status',1)
                        ->paginate(15);

                        return view('PublicPages.blogs')
                            ->with('category',$category)
                            ->with('blogs',$blogs)
                            ->with('categories',Category::where('status',1)->where('type',2)->get());
                    }
                }
                return abort(404);
            }
           
        }
        if($data == "contact-us"){
            return view('PublicPages.contactus');
        }

        return abort(404);
    }
}
