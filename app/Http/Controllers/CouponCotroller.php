<?php

namespace App\Http\Controllers;
// use Session;
use App\Models\Coupons;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class CouponCotroller extends Controller
{
    public function index()
    {
        return view('BackEnd.coupon.add');
    }
    public function save(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|unique:coupons',
            'coupon_type' => 'required',
            'coupon_value'=> 'required',
            'coupon_min_value'=> 'required',
            'expired_on'=> 'required',
            'coupon_status'=> 'required',
            'added_on' => 'required'
        ]);
        $coupon = new Coupons();
        $coupon->coupon_code = $request->coupon_code;
        $coupon->coupon_type = $request->coupon_type;
        $coupon->coupon_value = $request->coupon_value;
        $coupon->coupon_min_value = $request->coupon_min_value;
        $coupon->expired_on = $request->expired_on;
        $coupon->coupon_status = $request->coupon_status;
        $coupon->added_on = $request->added_on;
        $coupon->save();

        return back()->with('sms', 'Coupon Saved');
    }
    public function coupon_manage()
    {
        $coupons = Coupons::all();
        return view('BackEnd.coupon.manage',compact('coupons'));
    }
    public function active($coupon_id)
    {
        $coupons = Coupons::find($coupon_id);
        $coupons->coupon_status = 1;
        $coupons->save();
        return back();
    }
    public function Inactive($coupon_id)
    {
        $coupons = Coupons::find($coupon_id);
        $coupons->coupon_status = 0;
        $coupons->save();
        return back();
    }
    public function delete($coupon_id)
    {
        $coupons = Coupons::find($coupon_id);
        $coupons->delete();
        return back();
    }
    public function update(Request $request)
    {
        $coupons = Coupons::find($request->coupon_id); 
        $coupons->coupon_code = $request->coupon_code;
        $coupons->coupon_value = $request->coupon_value;
        $coupons->coupon_min_value = $request->coupon_min_value;
        $coupons->coupon_type = $request->coupon_type;

        $coupons->save();
        return redirect('/coupon/manage')->with('sms','Coupon updated');
    }
    public function apply(Request $request)
    {
        // if(Session::has('sum')
        // {

        // }

        $check = Coupons::where('coupon_code',$request->coupon_code)->first();
        if($check){
            Session()->put('coupon',[
                'coupon_code' => $check->coupon_code,
                'coupon_value' => $check->coupon_value,
            ]);
            Session()->flash('success', 'Hurray you found a coupon');
            return back();
        }else{
            Session()->flash('success', 'Oops we do not found any coupon name you entered');
            return back();
        }


    }
    
}
