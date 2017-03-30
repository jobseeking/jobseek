@extends('vendor.crud.single-page-templates.common.app')

@section('content')

    <h2>Update Location: {{$location->name}}</h2>

    <form action="/location/{{$location->id}}" method="post">

        {{ csrf_field() }}

        {{ method_field("PUT") }}

        {!! \Nvd\Crud\Form::input('name','text')->model($location)->show() !!}

        <button type="submit" class="btn btn-default">Submit</button>

    </form>

@endsection