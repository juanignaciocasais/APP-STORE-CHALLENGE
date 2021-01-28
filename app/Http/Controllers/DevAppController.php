<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\App;
use App\Models\Category;
use App\Http\Controllers\Controller;

class DevAppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add(Request $request)
    {
        $app = new App();
        $categories = Category::get();
        return view('dev.app-form', ['app' => $app, 'categories' => $categories]);
    }

    public function view(Request $request, $app_id)
    {
        $app = App::find($app_id);
        return view('dev.app-form', ['app' => $app]);
    }
    public function update(Request $request)
    {

        //$this->validator($request->all())->validate();

        $id = $request->input('app_id');
        print_r($id);
        $app = App::find($id);
        if (empty($app)) {
            $app = new App();
        }
        $app->app_name = $request->input('app_name');
        $app->description = $request->input('description');
        $app->category_id = $request->input('category_id');
        $app->user_id = auth()->user()->id;
        $app->price = $request->input('price');
        $app->image = $request->file('image')->store('storage/app/images');
        $app->save();

        //$request->session()->flash('success', 'Upload successful');

        return redirect(route('my/apps'));
    }

    public function delete(Request $request, $app_id)
    {
        $app = App::find($app_id);
        $app->delete();

        return redirect(route('my/apps'));
    }
}
