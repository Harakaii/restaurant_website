<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DishController extends Controller
{
    public function index()
    {
        $categories = Category::where('category_status',1)->get();
        return view('BackEnd.dish.add',compact('categories'));
    }
    public function save(Request $request)
    {
        $imgName = $request->file('dish_image');
        $image = $imgName->getClientOriginalName();
        $directory= 'BackEndSourcefile/dish_img/';
        $imgUrl = $directory.$image;
        $imgName->move($directory,$image);
        $dish = new Dish();
        $dish->dish_name = $request->dish_name;
        $dish->category_id = $request->category_id;
        $dish->dish_detail = $request->dish_detail;
        $dish->dish_image = $imgUrl;
        $dish->dish_status = $request->dish_status;
        $dish->full_price = $request->full_price;
        $dish->half_price = $request->half_price;
        $dish->save();

        return back()->with('sms', 'Dish Saved');
    }
    public function dish_manage()
    {
        $categories = Category::where('category_status',1)->get();

        $dishes = DB::table('dishes')
            ->join('categories','dishes.category_id','=','categories.category_id')
            ->select('dishes.*','categories.category_name')
            ->get();
        return view('BackEnd.dish.manage',compact('dishes','categories'));
    }
    public function active($dish_id)
    {
        $dish = Dish::find($dish_id);
        $dish->dish_status = 1;
        $dish->save();
        return back();
    }
    public function Inactive($dish_id)
    {
        $dish = Dish::find($dish_id);
        $dish->dish_status = 0;
        $dish->save();
        return back();
    }
    public function delete($dish_status)
    {
        $dish = Dish::find($dish_status);
        $dish->delete();
        return back();
    }
    public function update(Request $request)
    {

        $dish = Dish::find($request->dish_id);
         
        $img_main = $request->file('dish_image');
        
        if ($img_main){

            $img_name = $img_main->getClientOriginalName();
            $directory= 'BackEndSourceFile/dish_img/';
            $imgUrl = $directory.$img_name;
            $img_main->move($directory,$img_name);
            $old_img = $dish->dish_image;
            if(file_exists($old_img))
             {
                unlink($old_img);
            }
            
            $dish->dish_name = $request->dish_name;
            $dish->category_id = $request->category_id;
            $dish->dish_detail = $request->dish_detail;
            $dish->dish_image = $imgUrl;
            $dish->full_price = $request->full_price;
            $dish->half_price = $request->half_price;

        }else{
            $dish->dish_name = $request->dish_name;
            $dish->category_id = $request->category_id;
            $dish->dish_detail = $request->dish_detail;
            $dish->full_price = $request->full_price;
            $dish->half_price = $request->half_price;

        }

        $dish->save();
        return redirect('/dish/manage')->with('sms',' updated data Successfully');
    }
    // public function update(Request $request)
    // {

    //     $dish = Dish::find($request->dish_id);
    //     $imgName = $request->file('dish_image');
    //     $imgUrl = null;
    //     if ($imgName){

    //         $img_name = $imgName->getClientOriginalName();
    //         $directory= 'BackEndSourcefile/dish_img/';
    //         $imgUrl = $directory.$img_name;
    //         $imgName->move($directory,$img_name);

    //         $old_img = $dish->dish_image;
    //         if(file_exists($old_img))
    //          {
    //             unlink($old_img);
    //         }
            
    //         $dish->dish_name = $request->dish_name;
    //         $dish->category_id = $request->category_id;
    //         $dish->dish_detail = $request->dish_detail;
    //         $dish->dish_image = $imgUrl;
    //         $dish->full_price = $request->full_price;
    //         $dish->half_price = $request->half_price;

    //     }else{
    //         $dish->dish_name = $request->dish_name;
    //         $dish->category_id = $request->category_id;
    //         $dish->dish_detail = $request->dish_detail;
    //         $dish->dish_image = $dish->dish_image;
    //         $dish->full_price = $request->full_price;
    //         $dish->half_price = $request->half_price;

    //     }

    //     $dish->save();
    //     return redirect('/dish/manage')->with('sms',' updated data Successfully');
    // }

}
