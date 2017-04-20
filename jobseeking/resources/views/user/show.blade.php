@extends('layout')

@section('content')

    <h2>User: {{$user->name}}</h2>

    <ul class="list-group">

        <li class="list-group-item">
            <h4>Id</h4>
            <h5>{{$user->id}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Name</h4>
            <h5>{{$user->name}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Email</h4>
            <h5>{{$user->email}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Password</h4>
            <h5>{{$user->password}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Remember Token</h4>
            <h5>{{$user->remember_token}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Created At</h4>
            <h5>{{$user->created_at}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Updated At</h4>
            <h5>{{$user->updated_at}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Last Name</h4>
            <h5>{{$user->last_name}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Interest Classification Id</h4>
            <h5>{{$user->interest_classification_id}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Interest Classification Id 2</h4>
            <h5>{{$user->interest_classification_id_2}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Interest Classification Id 3</h4>
            <h5>{{$user->interest_classification_id_3}}</h5>
        </li>
        
    </ul>

@endsection