@extends('layouts.app')

@section('content')
<div class="container">

    <h1>History Prices</h1>
    <div class="form-group">

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Price</th>
                <th scope="col">Upload Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prices as $price)
            <tr>
                <td>${{ $price->last_price }}</td>
                <td>{{ $price->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
</div>
@stop