<?php

namespace App\Http\Controllers;
use App\Models\Delivery_boy;
use Illuminate\Http\Request;

class deliverBoyControlller extends Controller
{
    public function index()
    {
        return view('BackEnd.diliveryBoy.add');
    }
    public function save(Request $request)
    {
        $boy = new Delivery_boy();
        $boy->delevery_boy_name = $request->delevery_boy_name;
        $boy->delevery_boy_phone_number = $request->delevery_boy_phone_number;
        $boy->delevery_boy_password = $request->delevery_boy_password;
        $boy->delevery_boy_status = $request->delevery_boy_status;
        $boy->added_on = $request->added_on;
        $boy->save();

        return back()->with('sms', 'Delivery Saved');
    }

    
    public function delivery_manage()
    {
        $boys = Delivery_boy::all();
        return view('BackEnd.diliveryBoy.manage',compact('boys'));
    }
    public function active($delevery_boy_id)
    {
        $boys = Delivery_boy::find($delevery_boy_id);
        $boys->delevery_boy_status = 1;
        $boys->save();
        return back();
    }
    public function Inactive($delevery_boy_id)
    {
        $boys = Delivery_boy::find($delevery_boy_id);
        $boys->delevery_boy_status = 0;
        $boys->save();
        return back();
    }
    public function delete($delevery_boy_id)
    {
        $boys = Delivery_boy::find($delevery_boy_id);
        $boys->delete();
        return back();
    }
    public function update(Request $request)
    {
        $boys = Delivery_boy::find($request->delevery_boy_id);
        $boys->delevery_boy_name = $request->delevery_boy_name;
        $boys->delevery_boy_phone_number = $request->delevery_boy_phone_number;

        $boys->save();
        return redirect('/delivery/manage')->with('sms','Delivery updated');
    }

}
