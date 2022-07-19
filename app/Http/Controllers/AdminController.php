<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function dashboard()
    {       
        return view('super.dashboard');
    }


    public function index()
    {        
        $admins = Admin::with('city')->get();
        return view('super.admin.index',compact('admins'));
    }


    public function login()
    {
        return view('admin.auth.login');
    }

    public function check(Request $request){
        //Validate Inputs
        $request->validate([
           'email'=>'required|email|exists:admins,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email does not exist'
        ]);

        $creds = $request->only('email','password');

        if( Auth::guard('admin')->attempt($creds) ){
            return redirect()->route('admin.dashboard');
        }
        else{
            return redirect()->route('vendor.login')->with('fail','Incorrect credentials');
        }
   }
     
    public function  logout(){

        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('super.admin.create',compact('cities'));
    }


    public function new($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->is_super = 1;
        $admin->update();
        return redirect()->back();
    }

    public function alls()
    {
        $admins = Admin::where('is_super',0)->get();
        return view('super.superadmin.create',compact('admins'));
    }

    public function all()
    {

        $admins = Admin::where('is_super',1)->where('id','!=',Auth::guard('admin')->user()->id)->get();
        return view('super.superadmin.remove',compact('admins'));
    }

    public function profile()
    {

        $admin = Admin::where('id','=',Auth::guard('admin')->user()->id)->first();
        return view('super.profile',compact('admin'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'name' => ['required', 'string', 'max:255'],
           'cin' => ['required','string','unique:admins,cin','min:6','max:9'],
           'email' => ['required', 'email', 'max:255', 'unique:admins,email'],
           'password' => ['required', 'string', 'min:8'],
           'phone' => ['required','max:10','min:9'],
           'city_id' => ['required'],

        ]);
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cin' => $request->cin,
            'city_id' => $request->city,
            'phone' => $request->phone,
        ]);
        return redirect()->route('admin.Admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return redirect()->back();
    }

    public function remove($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->is_super = 0;
        $admin->update();
        return redirect()->route('admin.Admin.index');
    }
}
