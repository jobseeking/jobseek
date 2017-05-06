@extends('vendor.crud.single-page-templates.common.app')

@section('content')

    <h2>Update Job Skill Experience: {{$jobSkillExperience->job_id}}</h2>

    <form action="/job-skill-experience/{{$jobSkillExperience->id}}" method="post">

        {{ csrf_field() }}

        {{ method_field("PUT") }}

        {!! \Nvd\Crud\Form::input('job_id','text')->model($jobSkillExperience)->show() !!}

        {!! \Nvd\Crud\Form::input('skill_id','text')->model($jobSkillExperience)->show() !!}

        {!! \Nvd\Crud\Form::input('experience_years','text')->model($jobSkillExperience)->show() !!}

        <button type="submit" class="btn btn-default">Submit</button>

    </form>

@endsection