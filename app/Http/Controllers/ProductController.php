<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendor = Auth::guard('vendor')->user()->id;      
        $myrestau = Restaurant::where('vendor_id',$vendor)->first();
        $products = Product::where('restaurant_id',$myrestau->id)->with('category')->get();

        return view('vendor.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendor = Auth::guard('vendor')->user()->id;      
        $myrestau = Restaurant::where('vendor_id',$vendor)->first();
        $categories = Category::owner($myrestau->id)->get();
        return view('vendor.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $vendor = Auth::guard('vendor')->user()->id;      
        $myrestau = Restaurant::where('vendor_id',$vendor)->first();
        $name = $request->file('image')->getClientOriginalName();    
        $request->image->move(public_path('images'),$name);
                
        Product::create([
            'name'=>$request->input('name'),
            'description' =>$request->description,
            'price'=> $request->input('price'),
            'image'=>$name,
            'restaurant_id'=>$myrestau->id,
            'category_id'=>$request->category

        ]);

        return redirect()->route('vendor.Product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
       $vendor = Auth::guard('vendor')->user()->id;      
       $myrestau = Restaurant::where('vendor_id',$vendor)->first();   
       $product =Product::whereId($id)->with('category')->first();
       $categories = Category::where('restaurant_id','=',$myrestau->id)->where('id','!=',$product->category->id)->get();
       return view('vendor.product.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
        $request->validate([

            'name' => ['required','string','max:50'],
            'description' => ['required','string','max:50'],
            'price' => ['required','integer', 'min:10'],
            'image' => ['image']
        ]);
        $product = Product::findOrFail($id);

         $product->name = $request->input('name');
          $product->description = $request->description;
          $product->price = $request->input('price');
          
          $product->category_id = $request->category;
        if($request->hasFile('image')){
           $name = $request->file('image')->getClientOriginalName();    
           $request->image->move(public_path('images'),$name); 
           $product->image = $name;

         }
        else{
            $product->image = $product->image;
            

        }
       $product->update();

        return redirect()->route('vendor.Product.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }


    public function cart($id,$idp)
    {       
        $product = Product::findOrFail($idp);
        \Cart::add(
            array(
                'id'=>$product->id,
                'name'=>$product->name,
                'price'=>$product->price,
                'quantity'=>1,
                'attributes'=>array(),
                'associatedModel'=>$product,
                'image'=>$product->image

            )
            );
            
            return redirect()->back();

        
    }
    public function mycart($id)
    {
        $items = \Cart::getContent();
        $products=[];
        foreach ($items as $item) {
           if($item->associatedModel->restaurant_id == $id){
               array_push($products,$item) ;
           }
        }
        $total = 0;
        foreach ($items as $item) {
            if($item->associatedModel->restaurant_id == $id){
                $total+=$item->price*$item->quantity;
            }
         } 
       
        

         return view('front.cart',compact('products','total','id'));

    }
    public function updatecart($id , Request $request)
    {
        \Cart::update($id,
        array(
            'quantity'=>array(
                'relative'=>false,
                'value'=>$request->quantity
                  )
        ));
        
        // dd($products);

         return redirect()->back();

    }
    public function deletecart($id)
    {
        \Cart::remove($id);

        return redirect()->back();
    }
    public function destroycart($id)
    {
        $items = \Cart::getContent();

        foreach ($items as $item) {
           if($item->associatedModel->restaurant_id == $id){
            \Cart::remove($item->id);
           }
        }
        return redirect()->back();
    }
}
