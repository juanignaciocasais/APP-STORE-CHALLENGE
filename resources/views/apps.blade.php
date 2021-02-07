@extends('layouts.app')

@section('content')
@include('list-nav', ['categories' => $categories])
<div class="container">
    @if(str_contains(url()->current(), '/me/apps'))
    <div class="container ml-4">
        <h1>My Apps</h1>
    </div>
    @endif

    <div class="d-inline-block d-lg-flex card-group">
        @foreach($apps as $app)
        <div class="col-md-3 m-2">
            <div class="card-columns-fluid shadow" style="width: 14rem;">
                <a href="{{route('detail',['app_id'=>$app->app_id])}}">
                    <img src="{{ asset($app->image) }}" class="card-img-top" width="160px" height="160px" alt="{{$app->app_name}} image">
                </a>
                <div class="card-body">

                    <h5 class="card-title">{{$app->app_name}}</h5>

                    <p className="card-text">Rating: {{$app->rating}}<img className="starImage" src="http://pluspng.com/img-png/star-hd-png-star-png-image-yildiz-png-3580.png" width="25" height="25" alt="Star HD PNG" /></p>

                    @if(!str_contains(url()->current(), '/me/apps'))
                    <input type="button" class="btn btn-primary" onclick="buyApp({{$app->app_id}})" value="Buy for ${{$app->price}}"></input>
                    @endif

                    <input type="hidden" name="app_id" value="{{$app->app_id}}">
                </div>

            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('scripts')
<script>
    function buyApp($app_id) {
        axios.post('/api/buy', {
            app_id: $app_id
        }).then(response => {
            console.log(response)
        }).catch(error => {
            console.log(error.response)
        })
    }
</script>
@endsection