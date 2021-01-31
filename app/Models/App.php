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

    public static function boot()
    {
        parent::boot();

        self::created(function ($model) {
            updateHistory($model);
        });

        self::updated(function ($model) {
            updateHistory($model);
        });
    }
}

function updateHistory($model)
{
    $last_history_prices = History_price::where('app_id', $model->app_id)
        ->limit(1)
        ->orderBy('created_at', 'desc')->get();

    if (count($last_history_prices) > 0 && $last_history_prices[0]->last_price == $model->price) {
        return;
    }

    $history_price = new History_price();
    $history_price->last_price = $model->price;
    $history_price->app_id = $model->app_id;
    $history_price->save();
}
