<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendorRequest;
use App\Models\City;
use App\Models\Restaurant;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::all();
        return view('super.vendor.index',compact('vendors'));
    }
    public function login()
    {
        return view('vendor.auth.login');
    }

    public function check(Request $request){
        //Validate Inputs
        $request->validate([
           'email'=>'required|email|exists:vendors,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email does not exist'
        ]);

        $creds = $request->only('email','password');

        if( Auth::guard('vendor')->attempt($creds) ){
            if( Auth::guard('vendor')->attempt($creds) ){
                if(Restaurant::where('vendor_id',Auth::guard('vendor')->user()->id)->first()){
                    return redirect()->route('vendor.dashboard');
                }
                else{
                    return redirect()->route('vendor.Restaurant.create');

                }
           
            
        }
        else{
            return redirect()->route('vendor.login')->with('fail','Incorrect credentials');
        }
   }
}
     
    public function  logout(){

        Auth::guard('vendor')->logout();
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
        return view('super.vendor.create',compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VendorRequest $request)
    {
        Vendor::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cin' => $request->cin,
            'phone' => $request->phone,
            

        ]);

        return redirect()->route('admin.Vendor.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit()
    { 
        $vendor = Vendor::findOrFail(Auth::guard('vendor')->user()->id);
        if($vendor->id === Auth::guard('vendor')->user()->id){
        
          return view('vendor.edit',compact('vendor'));
        }
        else{

            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {      
        
        $vendor = Vendor::findOrFail(Auth::guard('vendor')->user()->id);
       
        $request->validate([
            'email' => ['email','required','unique:vendors,email,'.$vendor->id],
            'name' => ['required','max:50'],
            'phone' => ['required','max:10','min:9','unique:vendors,phone,'.$vendor->id],
            'cin' => ['required','string','min:6','max:9','unique:vendors,cin,'.$vendor->id]
        ]);

        if($vendor->id === Auth::guard('vendor')->user()->id){

        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->cin = $request->cin;
        $vendor->phone = $request->phone;     
        $vendor->update();

        return redirect()->route('vendor.show');
        
        }
        else
        {
            abort(403);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
       $vendor = Vendor::findOrFail($id);
       dd($vendor);
       $vendor->delete();
       return redirect()->route('admin.Vendor.index');
    }
}
