<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    //

    public function insert(Request $request)
    {
        $dish = Dish::where('dish_id', $request->dish_id)->first();

        if ($dish) {
            // dd(array($request->quantity));

            Cart::add([

                'id' => $request->dish_id,
                'quantity' => $request->quantity,
                'name' => $dish->dish_name,
                'price' => $dish->full_price,
                'weight' => 550,
                'attributes' => [
                    // 'half_price' => $dish->half_price,
                    'image' => $dish->dish_image,
                ]
            ]);
        }


        return redirect()->route('cart_show')->with('');
    }
    public function show()
    {
        $CartDish = Cart::getcontent();
    
        return view('FrontEnd.cart.show', compact('CartDish'));
       
    }

        
    public function destroy($id)
    {

        Cart::remove($id);

        return back();

    }
}
