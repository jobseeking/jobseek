@extends('layout')

@section('content')

    <h2>Update Location: {{$location->name}}</h2>

    <form action="{{$base_url}}/location/{{$location->id}}" method="post">

        {{ csrf_field() }}

        {{ method_field("PUT") }}

        {!! \Nvd\Crud\Form::input('name','text')->model($location)->show() !!}

        <button type="submit" class="btn btn-default">Submit</button>

    </form>

@endsection