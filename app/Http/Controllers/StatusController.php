<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\DeliveryMen;
use App\Models\Status;
use App\Models\Vendor;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = Status::all();

        return view('super.status.index',compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('super.status.create');
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
            'status'=>'required',
            'role'=> 'required','in:Vendor,Admin,SuperAdmin,DeliveryMen,User'
        ]);

        switch ($request->role) {

            case 'Vendor':
                Status::create([
                    'status'=>$request->status,             
                    'role'=>$request->role
                ]);
                 break;
            case 'Admin':
                Status::create([
                    'status'=>$request->status,             
                    'role'=>$request->role
                ]);
                 break;

             case 'User':
                Status::create([
                    'status'=>$request->status,             
                    'role'=>$request->role
                ]);
                 break;
           
            case 'SuperAdmin':
               Status::create([
                   'status'=>$request->status,             
                   'role'=>$request->role
               ]);
                break;

            case 'DeliveryMen':
                Status::create([
                    'status'=>$request->status,             
                    'role'=>$request->role
                ]);
                 break;
        }
    
        return redirect()->route('admin.Status.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $status = Status::findOrFail($id);
        return view('super.status.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
        'status'=>'required'
        ]);
        $status = Status::findOrFail($id);
        $status->status = $request->status;
        $status->update();

        return redirect()->route('admin.Status.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = Status::findOrFail($id);
        $status->delete();
        return redirect()->route('admin.Status.index');

    }
}
