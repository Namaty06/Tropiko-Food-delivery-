<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\City;
use App\Models\DeliveryMen;
use App\Models\Order;
use App\Models\Product;
use App\Models\Restaurant;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function home()
    {
        //$status=false;
        $cities = City::all();
        $t=Carbon::now()->format('l');//day name
        $restaurants = Restaurant::with('city')->get();     
        
        return view('welcome',compact('restaurants','cities','t'));
    }

    public function Vendor()
    {
        $m = Carbon::now()->format('m');
        $id = Auth::guard('vendor')->user()->id;
        $rest = Restaurant::findOrFail($id);
        $sum = Order::where('restaurant_id','=',$rest->id)->whereMonth('created_at', $m)->sum('total');
        $clients = Restaurant::with('order.user')->count();
        $count = Order::where('restaurant_id','=',$rest->id)->count();
        $p = Product::where('restaurant_id','=',$rest->id)->count();
        $products = Product::with('category')->latest()->take(5)->get();
        
        return view('vendor.dashboard',compact('sum' , 'count' ,'clients' , 'p' ,'products'));
    }

    public function Admin()
    {
        $count = Restaurant::count();
        return view('super.dashboard',compact('count'));
    }

    public function Delivery()
    {
        $m = Carbon::now()->format('m');
        $id = Auth::guard('delivery')->user()->id;
        $sum = Order::where('delivery_men_id',$id)->whereMonth('created_at', $m)->count();
        $earn = $sum * 4;
        $d = Order::where('delivery_men_id',$id)->with('status')->whereHas('status', function($query)  {
            $query->where('status','=','Delivred');
        })->count();
        $r = Order::where('delivery_men_id',$id)->with('status')->whereHas('status', function($query)  {
            $query->where('status','=','Refunded');
        })->count();

        return view('delivery.dashboard',compact('earn' , 'd' , 'r'));
    }

    public function Super()
    {
        $count = Restaurant::count();
        $orders = Order::whereDate('created_at', Carbon::today())->count();
        $m = Carbon::now()->format('m');
        $y = Carbon::now()->format('Y');
        $sum = Order::with('status')->whereHas('status', function($query)  {
            $query->where('status','=','Delivred');
        })->whereMonth('created_at', $m)->sum('total');
        $sumy = Order::with('status')->whereHas('status', function($query)  {
            $query->where('status','=','Delivred');
        })->whereYear('created_at', $y)->sum('total');
        $admin = Admin::count();
        $vendor = Vendor::count();
        $super = Admin::where('is_super','1')->count();
        $mens = DeliveryMen::count();

        return view('super.dashboard',compact('count' ,'orders' , 'sum' ,'sumy','admin','vendor','super','mens'));
    }
    




}
