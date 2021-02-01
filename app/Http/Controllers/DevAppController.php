<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\App;
use App\Models\Category;
use App\Models\History_price;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
        $categories = Category::get();
        return view('dev.app-form', ['app' => $app, 'categories' => $categories]);
    }

    public function update(Request $request)
    {

        $this->validator($request->all())->validate();

        $id = $request->input('app_id');
        $app = App::find($id);
        if (empty($app)) {
            $app = new App();
        }
        $app->app_name = $request->input('app_name');
        $app->description = $request->input('description');
        $app->category_id = $request->input('category_id');
        $app->user_id = auth()->user()->id;
        $app->price = $request->input('price');
        $app->publish = $request->input('publish');
        if (!$app->image) $app->image = $request->file('image')->store('storage/app/images');
        $app->save();

        $request->session()->flash('success', 'The App was uploaded');

        return redirect(route('my/apps'));
    }

    public function delete(Request $request, $app_id)
    {
        try {
            $app = App::find($app_id);
            $app->delete();
            $request->session()->flash('success', 'The App was deleted');
        } catch (\Throwable $th) {
            $request->session()->flash('custom-error', "You can't delete the app, try unpublish");
        }

        return redirect(route('my/apps'));
    }

    protected function validator(array $data)
    {
        $attributeNames = [
            'app_name' => 'app name',
            'description' => 'description',
            'price' => 'price',
        ];
        return Validator::make($data, [
            'app_name' => ['required', 'string', 'max:80'],
            'description' => ['nullable', 'string', 'max:255'],
            'price' => ['numeric', 'gt:-1', 'max:255'],
            'category_id' => ['numeric', 'gt:0', 'max:6'],
        ])->setAttributeNames($attributeNames);
    }
    
    public function prices(Request $request, $app_id)
    {
        $prices = History_price::get()->where('app_id', $app_id);
        return view('dev.prices', ['prices' => $prices]);
    }
}
