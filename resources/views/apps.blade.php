@extends('layouts.app')

@section('content')
@include('list-nav', ['categories' => $categories])
<div class="container">
    <div class="card-group">
        @foreach($apps as $app)
        <div class="col-md-3">
            <div class="card-columns-fluid shadow" style="width: 14rem;">
                <img src="{{ asset($app->image) }}" class="card-img-top" width="160px" height="160px" alt="{{$app->app_name}} image">
                <div class="card-body">
                    
                    <h5 class="card-title">{{$app->app_name}}</h5>
                    
                    <p className="card-text">Rating: {{$app->rating}}<img className="starImage" src="http://pluspng.com/img-png/star-hd-png-star-png-image-yildiz-png-3580.png" width="25" height="25" alt="Star HD PNG" /></p>
                    
                    @if(!str_contains(url()->current(), '/me/apps'))
                    <a href="#" class="btn btn-primary">Add to cart for ${{$app->price}}</a>
                    @endif
                    
                    <input type="hidden" name="app_id" value="{{$app->app_id}}">
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection