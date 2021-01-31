@extends('layouts.app')

@section('content')
<div class="container">
    @if($app->app_id)
    <h1>Edit App</h1>
    @else
    <h1>New App</h1>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <form role="form" method="post" action="{{route('update')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="card-body">

                        <div class="form-group">
                            <label for="app_name">App Name</label>
                            <input type="text" class="form-control" id="app_name" name="app_name" value="{{old('app_name',$app->app_name)}}" {{(old('app_name',$app->app_name) ? "readonly" : "")}}>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{old('description',$app->description)}}">
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category_id" id="category_id" {{(old('app_name',$app->app_name) ? "readonly disabled" : "")}}>
                                @foreach($categories as $category)
                                <option value="{{$category->category_id}}" {{($category->category_id == old('category_id',$app->category_id)) ? "selected" : ""}}>{{$category->category_name}}</option>
                                @endforeach
                            </select>
                            @if(old('category_id',$app->category_id))
                            <input type="hidden" name="category_id" value="{{old('category_id',$app->category_id)}}" />
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <label for="price">Price $</label>
                                <input type="text" class="form-control" id="price" name="price" value="{{old('price',$app->price)}}">
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="image">Select image/file</label>
                            <input type="file" class="form-control" name="image" value="{{old('image',$app->image)}}">
                        </div>
                       

                        <div class="form-check">
                            <input class="form-check-input" name="publish" type="checkbox" value="1" id="publish" {{old('publish',$app->publish)===1 ? "checked" : ""}}>
                            <label class="form-check" for="publish">
                                Publish App
                            </label>
                        </div>
                        <input type="hidden" name="app_id" value="{{$app->app_id}}">

                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop