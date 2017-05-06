@extends('vendor.crud.single-page-templates.common.app')

@section('content')

    <h2>Job Skill Experience: {{$jobSkillExperience->job_id}}</h2>

    <ul class="list-group">

        <li class="list-group-item">
            <h4>Id</h4>
            <h5>{{$jobSkillExperience->id}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Job Id</h4>
            <h5>{{$jobSkillExperience->job_id}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Skill Id</h4>
            <h5>{{$jobSkillExperience->skill_id}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Experience Years</h4>
            <h5>{{$jobSkillExperience->experience_years}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Created At</h4>
            <h5>{{$jobSkillExperience->created_at}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Updated At</h4>
            <h5>{{$jobSkillExperience->updated_at}}</h5>
        </li>
        
    </ul>

@endsection