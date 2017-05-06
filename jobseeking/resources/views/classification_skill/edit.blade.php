@extends('vendor.crud.single-page-templates.common.app')

@section('content')

    <h2>Update Classification Skill: {{$classificationSkill->name}}</h2>

    <form action="/classification-skill/{{$classificationSkill->id}}" method="post">

        {{ csrf_field() }}

        {{ method_field("PUT") }}

        {!! \Nvd\Crud\Form::input('name','text')->model($classificationSkill)->show() !!}

        {!! \Nvd\Crud\Form::input('classification_id','text')->model($classificationSkill)->show() !!}

        <button type="submit" class="btn btn-default">Submit</button>

    </form>

@endsection