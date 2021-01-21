@extends('layouts.app')

@section('content')
@foreach($apps as $app)
<div class="card" style="width: 18rem;">
  <img src="{{$app->image}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$app->app_name}}</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Add to cart for ${{$app->price}}</a>
  </div>
</div>
@endforeach
@endsection