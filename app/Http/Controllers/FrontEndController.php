<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dish;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        $dishes = Dish::where('dish_status',1)->get();


        return view('FrontEnd.include.home',compact('dishes'));
    }
    public function dish_show($id)
    {
        $categoryDish = Dish::where('category_id',$id)
                              ->where('dish_status',1)
                              ->get();

        return view('FrontEnd.include.dish',compact('categoryDish'));
    }
    public function contact()
    {
        return view('FrontEnd.include.contact');
    }
    public function about()
    {

        return view('FrontEnd.include.about');
    }
    public function offers()
    {
        return view('FrontEnd.include.offers');
    }
    public function help()
    {
        return view('FrontEnd.include.help');
    }
}
