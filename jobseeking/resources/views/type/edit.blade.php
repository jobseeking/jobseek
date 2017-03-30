@extends('vendor.crud.single-page-templates.common.app')

@section('content')

    <h2>Update Type: {{$type->name}}</h2>

    <form action="{{$base_url}}/type/{{$type->id}}" method="post">

        {{ csrf_field() }}

        {{ method_field("PUT") }}

        {!! \Nvd\Crud\Form::input('name','text')->model($type)->show() !!}

        <button type="submit" class="btn btn-default">Submit</button>

    </form>

@endsection