<div class="float-left list-group">
  <div class="form-group">
    <a href="{{route('my/apps')}}" class="list-group-item list-group-item-action active">My Apps</a>
  </div>
  <li class="list-group-item list-group-item-action active">Categories</li>
  @foreach($categories as $category)
  <a href="#" class="list-group-item list-group-item-action">{{$category->category_name}}</a>
  @endforeach
</div>