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
        $categories = Category::get();
        $buyed_apps = Buy::where('user_id', auth()->user()->id)->get();
        $buyed_app_ids = [];
        foreach ($buyed_apps as $buyed_app) {
            $buyed_app_ids[] = $buyed_app->app_id;
        }
        $apps = App::whereIn('app_id', $buyed_app_ids)
            ->where('category_id', $category_id)
            ->get();
        return view('apps', ['apps' => $apps, 'categories' => $categories]);
    }

    public function apiBuy(Request $request)
    {
        if (auth()) {
            $buyed_app = new BUY();
            $buyed_app->app_id = $request->input('app_id');
            $buyed_app->user_id = auth()->user()->id;
            $buyed_app->save();
            $request->session()->flash('success', 'The App was buyed');
        } else return route('login');
    }
}
