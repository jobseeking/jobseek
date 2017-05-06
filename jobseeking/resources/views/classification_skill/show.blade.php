@extends('vendor.crud.single-page-templates.common.app')

@section('content')

    <h2>Classification Skill: {{$classificationSkill->name}}</h2>

    <ul class="list-group">

        <li class="list-group-item">
            <h4>Id</h4>
            <h5>{{$classificationSkill->id}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Name</h4>
            <h5>{{$classificationSkill->name}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Classification Id</h4>
            <h5>{{$classificationSkill->classification_id}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Created At</h4>
            <h5>{{$classificationSkill->created_at}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Updated At</h4>
            <h5>{{$classificationSkill->updated_at}}</h5>
        </li>
        
    </ul>

@endsection