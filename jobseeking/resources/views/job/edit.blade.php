@extends('vendor.crud.single-page-templates.common.app')

@section('content')

    <h2>Update Job: {{$job->name}}</h2>

    <form action="{{$base_url}}/job/{{$job->id}}" method="post">

        {{ csrf_field() }}

        {{ method_field("PUT") }}

        {!! \Nvd\Crud\Form::input('name','text')->model($job)->show() !!}

        {!! \Nvd\Crud\Form::input('company','text')->model($job)->show() !!}

        {!! \Nvd\Crud\Form::input('salary','text')->model($job)->show() !!}

        {!! \Nvd\Crud\Form::input('details','text')->model($job)->show() !!}

        {!! \Nvd\Crud\Form::input('location_id','text')->model($job)->show() !!}

        {!! \Nvd\Crud\Form::input('type_id','text')->model($job)->show() !!}

        {!! \Nvd\Crud\Form::input('classification_id','text')->model($job)->show() !!}

        {!! \Nvd\Crud\Form::input('user_id','text')->model($job)->show() !!}

        <button type="submit" class="btn btn-default">Submit</button>

    </form>

@endsection