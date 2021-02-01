<div class="float-left list-group">
  <div class="form-group">
    <a href="{{route('my/apps')}}" class="list-group-item list-group-item-action active">My Apps</a>
  </div>
  <ul class='nav'>
    <li>
      <div class="dropdown">
        <a class="dropdown-toggle list-group-item list-group-item-action active" data-toggle="dropdown" href="#">Categories</a>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
          @foreach($categories as $category)
          @if(str_contains(url()->current(), '/me/apps'))
          <li><a class="dropdown-item" href="{{route('client/filter', $category->category_id)}}">{{$category->category_name}}</a></li>
          @else
          <li><a class="dropdown-item" href="{{route('filter', $category->category_id)}}">{{$category->category_name}}</a></li>
          @endif
          @endforeach
          <li class="divider"></li>
        </ul>
      </div>
    </li>
  </ul>
</div>

@section('js')
<script>
  var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
  var dropdownList = dropdownElementList.map(function(dropdownToggleEl) {
    return new bootstrap.Dropdown(dropdownToggleEl)
  })
</script>
@stop
