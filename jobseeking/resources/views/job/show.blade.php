@extends('vendor.crud.single-page-templates.common.app')

@section('content')

    <h2>Job: {{$job->name}}</h2>

    <ul class="list-group">

        <li class="list-group-item">
            <h4>Id</h4>
            <h5>{{$job->id}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Name</h4>
            <h5>{{$job->name}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Company</h4>
            <h5>{{$job->company}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Salary</h4>
            <h5>{{$job->salary}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Details</h4>
            <h5>{{$job->details}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Location Id</h4>
            <h5>{{$job->location_id}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Type Id</h4>
            <h5>{{$job->type_id}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Classification Id</h4>
            <h5>{{$job->classification_id}}</h5>
        </li>
        <li class="list-group-item">
            <h4>User Id</h4>
            <h5>{{$job->user_id}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Created At</h4>
            <h5>{{$job->created_at}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Updated At</h4>
            <h5>{{$job->updated_at}}</h5>
        </li>
        
    </ul>

@endsection