@extends('layout')

@section('content')

    <h2>Update Classification: {{$classification->name}}</h2>

    <form action="{{$base_url}}/classification/{{$classification->id}}" method="post">

        {{ csrf_field() }}

        {{ method_field("PUT") }}

        {!! \Nvd\Crud\Form::input('name','text')->model($classification)->show() !!}

        <button type="submit" class="btn btn-default">Submit</button>

    </form>

@endsection