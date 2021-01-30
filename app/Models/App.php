<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;

class App extends Model
{
    protected $primaryKey = 'app_id';

    public $timestamps = true;

    function categoryName($category_id)
    {
        $category = Category::find($category_id);
        return $category->category_name;
    }

    function userName($user_id)
    {
        $user = User::find($user_id);
        return $user->name;
    }


}
