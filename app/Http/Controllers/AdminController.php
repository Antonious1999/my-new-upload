<?php

namespace App\Http\Controllers;

use App\Models\Bag;
use App\Models\Shoes;
use App\Models\Product;
// use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\support\Facades\File;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products=Product::all();
        
        return view('admin.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //upload request
        $file_extension = $request->photo->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'upload_product';
        $request->photo->move($path, $file_name);
        Product::create([
            'picture' => $file_name,
            'name' => $request->name,
            'price'=>$request->price,
            'description'=>$request->description,
        ]);
        return redirect()->back()->with('add', 'product Uploaded!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $Product = Product::find($id);
        $img_destination = 'upload_Product/' . $Product->picture;
        
        if (File::exists($img_destination)) {
            File::delete($img_destination);
        }
        $Product->delete();
        return redirect()->back();
    }
    public function userspage(){
        $products=Product::all();
        return view('user.allproducts',compact('products'));
    }
    public function search(Request $request){
       // return "done";
       $search=$request->search;
       if($search=='dress'){
        $Products= Product::select('*')->where('name', $search)->get();
        // return $Products;
        return view('search',compact('Products'));
       }
       elseif($search=='shoes'){
        $Products= Shoes::select('*')->where('name', $search)->get();
        // return $Products;
        return view('searchshoes',compact('Products'));
       }
       elseif($search=='bags'){
        $Products= Bag::select('*')->where('name', $search)->get();
        // return $Products;
        return view('searchbags',compact('Products'));
    }

     

    }
    public function showDress(){
        $products=Product::all();
        return redirect()->back()->with('showdress',$products );
    }

//cart
    public function addtochart($id){
       // return 'done';
    
       if(Auth::user()){
        $product = Product::find($id);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "product_name" => $product->product_name,
                        "quantity" => 1,
                        "product_price" => $product->product_price,
                        "product_photo" => $product->product_photo
                    ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
           // return redirect()->back()->with('cart', session()->get('cart'));
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "product_name" => $product->product_name,
            "quantity" => 1,
            "product_price" => $product->product_price,
            "product_photo" => $product->product_photo
];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }else{
        return redirect()->route('login');
    }

       
       
    }
}
