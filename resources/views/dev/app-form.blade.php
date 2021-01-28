@extends('layouts.app')

@section('content')
<div class="container">

    <h1>New App</h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <form role="form" method="post" action="{{route('update')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="card-body">

                        <div class="form-group">
                            <label for="app_name">App Name</label>
                            <input type="text" class="form-control" id="app_name" name="app_name" value="{{old('app_name',$app->app_name)}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{old('description',$app->description)}}">
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category_id" id="category_id">

                                <option value="1" selected>Games</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="price">Price $</label>
                                <input type="number" class="form-control" id="price" name="price" min="0" value="{{old('price',$app->price)}}">
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="image">Select image/file</label>
                            <input type="file" class="form-control" name="image">
                        </div>

                        <input type="hidden" name="app_id" value="{{$app->app_id}}">

                        <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop