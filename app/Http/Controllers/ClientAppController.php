<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\App;
use App\Models\Category;
use App\Models\Buy;

class ClientAppController extends Controller
{
    public function categoryFilter(Request $request, $category_id)
    {
        $apps = App::get()->where('category_id', $category_id);
                          
        $categories = Category::get();
        return view('apps', ['apps' => $apps, 'categories' => $categories]);
    }

    public function apiBuy(Request $request)
    {    
        if(auth())
        {
            $buyed_app = new BUY();
            $buyed_app->app_id = $request->input('app_id');
            $buyed_app->user_id = auth()->user()->id;
            $buyed_app->save();
        }else return route('login');    
    }
}
