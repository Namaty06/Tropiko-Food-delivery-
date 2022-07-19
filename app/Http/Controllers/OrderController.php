<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\City;
use App\Models\Order;
use App\Models\Product;
use App\Models\Restaurant;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   
     //vendor  
    public function index()
    {
        
        $rest = Restaurant::where('vendor_id',Auth::guard('vendor')->user()->id)->first();
        $statuses = Status::all();
        $orders = Order::with('user','city','status')->where('restaurant_id',$rest->id)
        ->whereHas('status', function($query)  {
            $query->where('role','=','Vendor')->orWhere('status','=','Confirmed');
        })->latest()->get();
        if(!$rest){
            return redirect()->route('vendor.Restaurant.create');
        }
        return view('vendor.order.index',compact('orders','statuses'));
        
    }
    //admin
    public function indexadmin()
    {
        $orders = Order::with('user','status','city')->latest()->get();
        $statuses = Status::all();
        return view('super.order.index',compact('orders','statuses'));    
    }

    //user
    public function indexuser()
    {
        $orders = Order::with('user','status','city')->latest()->get();
        $status = Status::where('status','Cancel')->get();
        return view('super.order.index',compact('orders','status'));    
    }
    //delivery
    public function indexdelivery()
    {
        $statuses = Status::where('role','DeliveryMen')->latest()->get();    
        $orders = Order::with('user','city','restaurant','status')
        ->whereNull('delivery_men_id')
        ->whereHas('status', function($query)  {
            $query->where('status','=','Preparing');
        })
        ->get();
                    
        return view('delivery.auth.index',compact('orders','statuses'));    
    }



    public function filter($id_status){
        
        if($id_status == 0){
            $orders = Order::with('status','user','city')->latest()->get();;
        }
        else{
            $orders = Order::where('status_id','=',$id_status)->with('status','user','city')->latest()->get();;
        }
         return $orders;
    }
    public function filter2($id_status){
        
        if($id_status == 0){
            $orders = Order::with('status','user','city')->latest()->get();;
        }
        else {
            $orders = Order::where('status_id','=',$id_status)->with('status','user','city')->latest()->get();;
        }
         return $orders;
}
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $items = \Cart::getContent();
        $cities = City::all();
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
         $info = Order::where('user_id',Auth::user()->id)->with('city')->latest()->first();
        
        
       return view('front.cart',compact('products','total','id','cities','info'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $id)
    {
        $total = 0;
        
        $res = Restaurant::whereId($id)
        ->with('city:id')
        ->first();
        $items = \Cart::getContent();
        foreach ($items as $item) {
            if($item->associatedModel->restaurant_id == $id){
                $total+=$item->price*$item->quantity;
            }
         }
         $request->validate([
             'phone' => ['required'],
             'address'=>['required']
             
         ]);
         $s = Status::where('status','Success')->first();

            $order = Order::create([
              'total' => $total + 20,
              'user_id'=> auth()->user()->id,
              'status_id'=>$s->id,
              'address'=>$request->address,
              'phone'=>$request->phone,
              'city_id'=>$res->city->id,
              'comment'=>$request->comment,
              'restaurant_id'=>$id
            ]);
          foreach ($items as  $item) {            
            $order->product()->attach($item->id ,['quantity'=>$item->quantity , 'price'=>$item->price]);
         }
         

        return redirect()->route('History.index');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    //vendor
    public function show($id)
    {
        $order = Order::whereId($id)
        ->with('product','product.category','user','status','city')
        ->first();
        $statuses = Status::where('role','Vendor')->where('id','!=',$order->status->id)->get();
        return view('vendor.order.show',compact('order','statuses'));
    }
    //admin
    public function adminorder($id)
    {
        $order = Order::whereId($id)
        ->with('product','product.category','user','status','city')
        ->first();
        $statuses = Status::where('role','Admin')->where('id','!=',$order->status->id)->get();
        return view('super.order.show',compact('order','statuses'));
    }
    //user
    public function userorder($id)
    {
        $order = Order::whereId($id)
        ->with('product','product.category','user','status','city')
        ->first();
        $statuses = Status::where('role','Admin')->where('id','!=',$order->status->id)->get();
        return view('super.order.show',compact('order','statuses'));
    }
    //deliverymen
    public function deliveryorder($id)
    {
        $order = Order::where($id)
        ->with('product','product.category','user','status','city')
        ->first();
        $statuses = Status::where('role','DeliveryMen')->where('id','!=',$order->status->id)->get();
        return view('delivery.order',compact('order','statuses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */

    //vendor
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
       if($order->status_id != $request->status){
           $order->status_id =  $request->status ;
           $order->update();
           return redirect()->route('vendor.Order.index');
       }
       else{
           return redirect()->route('vendor.Order.index');
       }

    }

    //admin

    public function updateorder(Request $request, $id)
    {
        $order = Order::findOrFail($id);
       if($order->status_id != $request->status){
           $order->status_id =  $request->status ;
           $order->update();
           return redirect()->route('admin.indexadmin');
       }
       else{
              return redirect()->route('admin.indexadmin');
       }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
