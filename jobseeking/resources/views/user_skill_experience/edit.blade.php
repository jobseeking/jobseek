@extends('vendor.crud.single-page-templates.common.app')

@section('content')

    <h2>Update User Skill Experience: {{$userSkillExperience->user_id}}</h2>

    <form action="/user-skill-experience/{{$userSkillExperience->id}}" method="post">

        {{ csrf_field() }}

        {{ method_field("PUT") }}

        {!! \Nvd\Crud\Form::input('user_id','text')->model($userSkillExperience)->show() !!}

        {!! \Nvd\Crud\Form::input('skill_id','text')->model($userSkillExperience)->show() !!}

        {!! \Nvd\Crud\Form::input('experience_years','text')->model($userSkillExperience)->show() !!}

        <button type="submit" class="btn btn-default">Submit</button>

    </form>

@endsection