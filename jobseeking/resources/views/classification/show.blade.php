@extends('vendor.crud.single-page-templates.common.app')

@section('content')

    <h2>Classification: {{$classification->name}}</h2>

    <ul class="list-group">

        <li class="list-group-item">
            <h4>Id</h4>
            <h5>{{$classification->id}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Name</h4>
            <h5>{{$classification->name}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Created At</h4>
            <h5>{{$classification->created_at}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Updated At</h4>
            <h5>{{$classification->updated_at}}</h5>
        </li>
        
    </ul>

@endsection