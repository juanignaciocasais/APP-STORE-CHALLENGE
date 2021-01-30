<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class App extends Model
{
    protected $primaryKey = 'app_id';

    function categoryName($category_id)
    {
        $category = Category::find($category_id);
        return $category->category_name;
    }


}
