<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\App;


class AppController extends Controller
{
    public function index(Request $request)
    {
        $app = App::get();
        return view('apps', ['apps' => $app]);
    }
}
