@extends('layout')

@section('content')


<style>
.post_form{

    position: relative;

    width: 60%;
    height: 70%;
    left: 20%; /* (100 - width)/2 */
    top: 15%;  /* (100% - height)/2 */

    word-wrap: break-word;
}


@media only screen and (max-width: 768px) {
    /* For mobile phones: */
    .post_form{
        width: 100%;
        height: 50%;
        left: 0%; /* (100 - width)/2 */
        top: 25%;  /* (100% - height)/2 */
    }
}


</style>


<div class="well post_form">
    <h2>Job: {{$job->name}}</h2>

    <ul class="list-group">

        <li class="list-group-item">
            <h4>Id</h4>
            <h5>{{$job->id}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Name</h4>
            <h5>{{$job->name}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Company</h4>
            <h5>{{$job->company}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Salary</h4>
            <h5>{{$job->salary}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Details</h4>
            <h5>{{$job->details}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Location</h4>
            <h5>{{$job->location_name}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Type</h4>
            <h5>{{$job->type_name}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Classification</h4>
            <h5>{{$job->classification_name}}</h5>
        </li>
        <li class="list-group-item">
            <h4>User</h4>
            <h5>{{$job->user_name}}</h5>
        </li>
        <li class="list-group-item">
            <h4>Created At</h4>
            <h5>{{$job->created_at}}</h5>
        </li>
     
        
    </ul>
</div> 


@endsection