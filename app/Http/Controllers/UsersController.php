<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\App;
use App\Models\User;
use App\Models\Buy;
use App\Models\Category;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $apps = App::where('user_id', $user_id)->get();
        return ($user->user_type == 'Developer') ? $this->devView($apps) : $this->clientView($user_id);
    }

    function devView($apps)
    {
        return view('dev.apps', ['apps' => $apps]);
    }

    function clientView($user_id)
    {
        $categories = Category::get();
        $buyed_apps = Buy::where('user_id', $user_id)->get();
        foreach ($buyed_apps as $apps) {
            $n = $apps->app_id;
        }
        $apps = App::where('app_id', $n)->get();
        return view('apps', ['apps' => $apps, 'categories' => $categories]);
    }
}
