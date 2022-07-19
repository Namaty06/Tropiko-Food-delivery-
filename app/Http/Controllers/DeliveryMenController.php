<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeliveryRequest;
use App\Models\City;
use App\Models\DeliveryMen;
use App\Models\Order;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DeliveryMenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
      $mens = DeliveryMen::with('city')->get();
      // dd(Auth::guard('delivery')->user()->id) ;
      return view('super.delivery.index',compact('mens'));
    }



    public function login()
    {
        return view('delivery.auth.login');
    }

    public function check(Request $request){
        //Validate Inputs
        $request->validate([
           'email'=>'required|email|exists:delivery_mens,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email does not exist '
        ]);

        $creds = $request->only('email','password');

        if( Auth::guard('delivery')->attempt($creds) ){
            return redirect()->route('delivery.indexdelivery');
        }
        else{
            return redirect()->route('delivery.login')->with('fail','Incorrect credentials');
        }
   }
     
    public function logout(){

        Auth::guard('delivery')->logout();
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('super.delivery.create',compact('cities'));
    }

    public function show()
    {
        $id = Auth::guard('delivery')->user()->id;
        $delivery = DeliveryMen::whereId($id)->with('city')->first();
        return view('delivery.profile',compact('delivery'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeliveryRequest $request)
    {
        DeliveryMen::create([
            
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cin' => $request->cin,
            'city_id' => $request->city,
            'phone' => $request->phone,
            'carte_grise'=>$request->carte
        ]);
       return redirect()->route('admin.Delivery.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeliveryMen  $deliveryMen
     * @return \Illuminate\Http\Response
     */
    public function choose($id)
    {
       $order = Order::findOrFail($id);    
       $order->delivery_men_id =  Auth::guard('delivery')->id();
       $order->update();
       $order = Order::whereId($id)
       ->with('product','product.category','user','status','city')
       ->first();
       $statuses = Status::where('role','DeliveryMen')->where('id','!=',$order->status->id)->get();
       return view('delivery.order',compact('order','statuses'));
    }

    public function updateorder(Request $request , $id)
    {
       $order = Order::findOrFail($id); 
        
       $order->status_id = $request->status;
       $order->update();
       
       $idd = Auth::guard('delivery')->id();
        $order = Order::where('delivery_men_id',$idd)->with('product','user','status','city')->latest()->first();
        //dd($order);
        $statuses = Status::where('role','DeliveryMen')->where('id','!=',$order->status->id)->get();
        return view('delivery.order',compact('order','statuses'));
    }

    public function last(){

        $id = Auth::guard('delivery')->id();
        $order = Order::where('delivery_men_id',$id)->with('product','user','status','restaurant')->latest()->first();
        $statuses = Status::where('role','DeliveryMen')->where('id','!=',$order->status->id)->get();

        return view('delivery.order',compact('order','statuses'));
    }


    public function history(){

        $id = Auth::guard('delivery')->id();
        $orders = Order::where('delivery_men_id',$id)->with('user','status','restaurant')->latest()->get();
        
        return view('delivery.history',compact('orders'));

    }


  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeliveryMen  $deliveryMen
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        $order = Order::whereId($id)->with('product','user','status','restaurant')->latest()->first();
        
        return view('delivery.show',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DeliveryMen  $deliveryMen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeliveryMen  $deliveryMen
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryMen $deliveryMen)
    {
        dd($deliveryMen);
        return redirect()->back();
    }
}
