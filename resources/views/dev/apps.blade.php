@extends('layouts.app')

@section('content')
<div class="container">

    <h1>My Apps</h1>
    <div class="form-group">
    
    </div>
    <div class="row">
        <div class="col-6">
            <form>
                <div class="form-group">
                    <label for="app_name">App Name</label>
                    <input name="app_name" type="text" class="form-control" id="app_name" placeholder="Enter App Name" value="">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <a class="btn btn-primary" href="{{route('add')}}">Upload a New App<i></i></a>
                </div>
            </form>
        </div>
    </div>

    @if (count($apps) > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">App Name</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($apps as $app)
            <tr>
                <td>{{ $app->app_id }}</td>
                <td>{{ $app->app_name }}</td>
                <td> $app->categoryName() </td>
                <td>${{ $app->price }}</td>
                <td>
                    <a class="btn btn-success btn-xs" href="route('view',['app_id'=>$app->app_id])">Edit<i></i></a>
                    <a class="btn btn-danger btn-xs" href="{{route('delete',['app_id'=>$app->app_id])}}">Delete<i></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Come on!! Upload your first App!!</p>
    @endif
</div>
</div>
</div>
</div>
@stop