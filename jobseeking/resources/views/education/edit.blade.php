@extends('vendor.crud.single-page-templates.common.app')

@section('content')

    <h2>Update Education: {{$education->name}}</h2>

    <form action="/education/{{$education->id}}" method="post">

        {{ csrf_field() }}

        {{ method_field("PUT") }}

        {!! \Nvd\Crud\Form::input('name','text')->model($education)->show() !!}

        <button type="submit" class="btn btn-default">Submit</button>

    </form>

@endsection