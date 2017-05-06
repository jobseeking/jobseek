@extends('vendor.crud.single-page-templates.common.app')

@section('content')

    <h2>User Skill Experience: {{$userSkillExperience->user_id}}</h2>

    <ul class="list-group">

        <li class="list-group-item">
            <h4>Id</h4>
            <h5>{{$userSkillExperience->id}}</h5>
        </li>
        <li class="list-group-item">
            <h4>User Id</h4>
            <h5>{{$userSkillExperience->user_id}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Skill Id</h4>
            <h5>{{$userSkillExperience->skill_id}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Experience Years</h4>
            <h5>{{$userSkillExperience->experience_years}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Created At</h4>
            <h5>{{$userSkillExperience->created_at}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Updated At</h4>
            <h5>{{$userSkillExperience->updated_at}}</h5>
        </li>
        
    </ul>

@endsection