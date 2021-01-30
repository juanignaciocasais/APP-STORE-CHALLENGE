@extends('layouts.app')

@section('content')
@include('list-nav', ['categories' => $categories])
<div class="card mb-3 mx-auto" style="max-width: 800px;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ asset($app->image) }}" class="card-img-top" alt="{{$app->app_name}} image">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Name: {{$app->app_name}}</h5>
                <p class="card-text">Description: {{$app->description }}</p>
                <p className="card-text">Rating: {{$app->rating}}<img className="starImage" src="http://pluspng.com/img-png/star-hd-png-star-png-image-yildiz-png-3580.png" width="25" height="25" alt="Star HD PNG" /></p>
                <p class="card-text"><small class="text-muted">Owner: {{$app->userName($app->user_id)}}</small></p>
               
                @if(!str_contains(url()->current(), '/me/apps'))
                <a href="#" class="btn btn-primary">Add to cart for ${{$app->price}}</a>
                @endif
                
            </div>
        </div>
    </div>
</div>
@endsection