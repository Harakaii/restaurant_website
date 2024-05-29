<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\payment;
use Cart;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function payment(){
        return view('FrontEnd.checkOut.check_out_payment');
    }
    public function order(Request $request){
       $paymentType = $request->payment_type;
        if($paymentType =='Cash'){
            $order = new Order();
            $order->customer_id = Session::get('customer_id');
            $order->shipping_id = Session::get('shipping_id');
            if (Session::has('coupon_discount')) {
                $order->coupon_discount = Session::get('coupon_discount');
            } else {
                $order->coupon_discount = 0;
            }
            $order->order_total =Session::get('sum');

            $order->save();

            $payMent = new payment();
            $payMent->order_id = $order->order_id;
            $payMent->payment_type = $paymentType;
            $payMent->save();

            $CartDish =Cart::getcontent();
            foreach ($CartDish as $cart) {
                # code...
                $orderDeatail = new OrderDetail();
                $orderDeatail->order_id =$order->order_id;
                $orderDeatail->dish_id =$cart->id;
                $orderDeatail->dish_name =$cart->name;
                if ($cart->half_price ==null) {
                    # code...
                    $orderDeatail->dish_price =$cart->price;
                } elseif($cart->half_price !==null) {
                    # code...
                    $orderDeatail->dish_price =$cart->price;
                    $orderDeatail->dish_price =$cart->half_price;
                }

                $orderDeatail->dish_qty = $cart->quantity;
                $orderDeatail->save();
            }

            Cart::clear();
            return redirect('checkout/order/complete');

        }elseif($paymentType == 'Stripe') {
            # code...
            $order = new Order();
            $order->customer_id =Session::get('customer_id');
            $order->shipping_id =Session::get('shipping_id');
            $order->order_total =Session::get('sum');
            
            if (Session::has('coupon_discount')) {
                $order->coupon_discount = Session::get('coupon_discount');
            } else {
                $order->coupon_discount = 0;
            }
            $order->save();

           // dd($order->order_id);
            $order_id =$order->order_id;

            $payment =new Payment();
            $payment->order_id= $order_id;
            $payment->payment_type= $paymentType;
            $payment->save();

            $CartDish =Cart::getcontent();

            foreach ($CartDish as $cart) {
                # code...
                $orderDeatail = new OrderDetail();
                $orderDeatail->order_id =$order->order_id;
                $orderDeatail->dish_id =$cart->id;
                $orderDeatail->dish_name =$cart->name;
                if ($cart->half_price ==null) {
                    # code...
                    $orderDeatail->dish_price =$cart->price;
                } elseif($cart->half_price !==null) {
                    # code...
                    $orderDeatail->dish_price =$cart->price;
                    $orderDeatail->dish_price =$cart->half_price;
                }

                $orderDeatail->dish_qty =$cart->quantity;
                $orderDeatail->save();
            }



            Cart::clear();
            Session::flash('success', 'Ur Order has been succesfully processed');

            return redirect('/stipe-payment');


        }
    }
    public function stipe(){
        return view('FrontEnd.checkOut.stipe');

    }
    public function complete(){
        return view('FrontEnd.checkOut.order_completed');

    }
    
}
