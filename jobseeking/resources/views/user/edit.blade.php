@extends('layout')

@section('content')

    <h2>Update User: {{$user->name}}</h2>

    <form action="{{$base_url}}/user/{{$user->id}}" method="post">

        {{ csrf_field() }}

        {{ method_field("PUT") }}

        {!! \Nvd\Crud\Form::input('name','text')->model($user)->show() !!}

        {!! \Nvd\Crud\Form::input('email','text')->model($user)->show() !!}

        {!! \Nvd\Crud\Form::input('password','text')->model($user)->show() !!}

        {!! \Nvd\Crud\Form::input('remember_token','text')->model($user)->show() !!}

        {!! \Nvd\Crud\Form::input('last_name','text')->model($user)->show() !!}

        {!! \Nvd\Crud\Form::input('interest_classification_id','text')->model($user)->show() !!}

        {!! \Nvd\Crud\Form::input('interest_classification_id_2','text')->model($user)->show() !!}

        {!! \Nvd\Crud\Form::input('interest_classification_id_3','text')->model($user)->show() !!}

        <button type="submit" class="btn btn-default">Submit</button>

    </form>

@endsection