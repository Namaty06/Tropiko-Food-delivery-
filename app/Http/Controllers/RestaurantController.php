<?php

namespace App\Http\Controllers;

use App\Http\Requests\RestaurantRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\Product;
use App\Models\Restaurant;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $restaurants = Restaurant::with('city','vendor')->get();
     //  dd($restaurants);
       return view('super.restaurants',compact('restaurants'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $count = Restaurant::where('vendor_id',Auth::guard('vendor')->user()->id)->count();
        $cities = City::all();

        if($count != 0){
            return  view('layouts.dash');//redirect()->route('vendor.Restaurant.index') ;
        }
        return view('vendor.Restaurant.create',compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestaurantRequest $request)
    {
    
        $name = $request->file('logo')->getClientOriginalName();    
        $request->logo->move(public_path('logo'),$name);    

        Restaurant::create([
            'name'=>$request->input('name'),
            'orderPhone'=>$request->input('orderphone'),
            'orderEmail'=>$request->input('orderemail'),
            'city_id'=>$request->city,
            'address'=>$request->input('address'),
            'logo'=>$name,
            'open_time'=>$request->open,
            'close_time'=>$request->close,
            'day_off'=>$request->dayoff,
            'vendor_id'=>Auth::guard('vendor')->user()->id
        ]);      
      
       return  redirect()->route('vendor.Category.create') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $t=Carbon::now()->format('l');//day name
        $cat = Category::where('restaurant_id',$id)->with('product')->get();
       // dd($cat);
        $restaurant = Restaurant::where('id',$id)
        ->with('category','category.product')
        ->first();
       //dd($restaurant);
      $items = \Cart::getContent();
      $count = 0;

      foreach ($items as $item) {
        if($item->associatedModel->restaurant_id == $id){
            $count++ ;
        }
     }
       

        $products=[];
        foreach ($items as $item) {
           if($item->associatedModel->restaurant_id == $id){
               array_push($products,$item) ;
           }
        }
        if($restaurant->day_off != $t){        
           
       
                return view('front.show',compact('restaurant','products','count'));
              
             }        
        else{
                abort(403);
             }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function editing()
    {
        $id = Auth::guard('vendor')->user()->id;
        $restaurant = Restaurant::where('vendor_id',$id)->with('city')->first();
        $cities = City::where('id','!=',$restaurant->city->id)->get();

        return view('vendor.Restaurant.edit',compact('restaurant','cities'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
        //makhdamch   
        $id = Auth::guard('vendor')->user()->id;
        $restaurant = Restaurant::where('vendor_id',$id)->with('city')->first();     
       $request->validate([
        'name' => ['required','string','max:50'],
        'open' => ['required','timezone'],
        'close' => ['required','timezone'],
        'city' => ['required'],
        'dayoff' => ['required','string'],
        'address' => ['required'],
        'logo' => ['image']   
       ]);
        $restaurant->name = $request->name;
        $restaurant->address = $request->address;
        $restaurant->city_id = $request->city;
        $restaurant->open_time = $request->open;
        $restaurant->close_time = $request->close;
        $restaurant->day_off = $request->dayoff;

        if($request->logo){
            $name = $request->file('logo')->getClientOriginalName();    
            $request->logo->move(public_path('logo'),$name);  
            $restaurant->logo = $name;
        }
        else{    
            $restaurant->logo = $restaurant->logo;
        }

        $restaurant->update();

        return redirect()->route('vendor.Order.index');        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
