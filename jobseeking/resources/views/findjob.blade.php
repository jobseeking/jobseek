@extends('layout')

@section('content')

<style>



.page_div{

    position: relative;
   
    width: 20%;
    left: 40%; 
 
}

@media only screen and (max-width: 1224px) {
    
    .page_div{
	    width: 30%;
	 
	    left: 35%; 
	   
	}
}

@media only screen and (max-width: 768px) {
   
    .page_div{
	    width: 80%;
	   
	    left: 10%; 
	  
	}
}



</style>







@include('recommend_job')








<h2>Find Jobs</h2>

<div class="table-responsive">  
	<table class="table table-striped grid-view-tbl">
	    
	    <thead>
		<tr class="header-row">
			{!!\Nvd\Crud\Html::sortableTh('id','findjob','Id')!!}
			{!!\Nvd\Crud\Html::sortableTh('name','findjob','Name')!!}
			{!!\Nvd\Crud\Html::sortableTh('company','findjob','Company')!!}
			{!!\Nvd\Crud\Html::sortableTh('salary','findjob','Salary')!!}
			{!!\Nvd\Crud\Html::sortableTh('details','findjob','Details')!!}
			{!!\Nvd\Crud\Html::sortableTh('location_id','findjob','Location')!!}
			{!!\Nvd\Crud\Html::sortableTh('type_id','findjob','Type')!!}
			{!!\Nvd\Crud\Html::sortableTh('classification_id','findjob','Classification')!!}
			{!!\Nvd\Crud\Html::sortableTh('user_id','findjob','User')!!}
			{!!\Nvd\Crud\Html::sortableTh('created_at','findjob','Created At')!!}
			
			<th></th>
		</tr>
		<tr class="search-row">
			<form class="search-form">
				<td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
				<td><input type="text" class="form-control" name="name" value="{{Request::input("name")}}"></td>
				<td><input type="text" class="form-control" name="company" value="{{Request::input("company")}}"></td>
				<td>
				    <!-- &nbsp;&nbsp;&nbsp;&nbsp; From -->
				    <select id="template_select" style="display:none;">
  						<option id="templateOption_select"></option>
					</select>
				    <select class="form-control" id="salary_bottom" name="salary_bottom">
				        @for ($i = 0; $i < 200001; $i+=10000)
				        	@if ( Request::input("salary_bottom") == $i)
				        		<option value ="{{$i}}" selected> ${{number_format($i)}} </option>
				        	@else
				        		<option value ="{{$i}}" > ${{number_format($i)}} </option>
				        	@endif
				        @endfor  		       
            		</select>
            		&nbsp;&nbsp;&nbsp;&nbsp; To
            		<select class="form-control" id="salary_top" name="salary_top">
            			@if ( Request::input("salary_top") > 200000 )
				        	<option value ="99999999999999" selected> $Max </option>      
				        @else
				        	<option value ="99999999999999" > $Max </option>      
				        @endif

            		    @for ($i = 10000; $i < 200001; $i+=10000)
            		    	@if ( Request::input("salary_top") == $i)
            		    		<option value ="{{$i}}" selected> ${{number_format($i)}} </option>
            		    	@else
            		    		<option value ="{{$i}}" > ${{number_format($i)}} </option>
            		    	@endif
				        @endfor
            		</select>
				</td>
				<td><input type="text" class="form-control" name="details" value="{{Request::input("details")}}"></td>
				<td>
					<select class="form-control" name="location_id">
					    <option value="" > All </option>   
			        	@foreach ( $locations as $location )
					    	@if ( Request::input("location_id") == $location->id)
					        	<option value ="{{$location->id}}" selected> {{$location->name}} </option>   
					        @else
					        	<option value ="{{$location->id}}" > {{$location->name}} </option>   
					        @endif
					    @endforeach  
		            </select>
				</td>
				<td>
					<select class="form-control" name="type_id">
					    <option value="" > All </option>   
			        	@foreach ( $types as $type )
					    	@if ( Request::input("type_id") == $type->id)
					        	<option value ="{{$type->id}}" selected> {{$type->name}} </option>   
					        @else
					        	<option value ="{{$type->id}}" > {{$type->name}} </option>   
					        @endif
					    @endforeach  
		            </select>
				</td>
				<td>
					<select class="form-control" name="classification_id">
					    <option value="" > All </option>   
			        	@foreach ( $classifications as $classification )
					    	@if ( Request::input("classification_id") == $classification->id)
					        	<option value ="{{$classification->id}}" selected> {{$classification->name}} </option>   
					        @else
					        	<option value ="{{$classification->id}}" > {{$classification->name}} </option>   
					        @endif
					    @endforeach  
		            </select>
				</td>
				<td><input type="text" class="form-control" name="user_name" value="{{Request::input("user_name")}}"></td>
				<td></td>
				
				<td style="min-width: 6em;">
				    <!--
				    <input type="hidden" id="rand" name="rand" value="">
					-->

				    <!--  Use "<input>" instead for phpunit test
				    <button type="submit" class="fa fa-search form-control btn btn-primary"></button>
				    -->
				    <input type="submit" value="search" class="fa fa-search form-control btn btn-primary">
				</td>
			</form>
		</tr>
	    </thead>

	    <tbody>
	    	@forelse ( $records as $record )
		    	<tr>
					<td>
						{{ $record->id }}
						</td>
					<td>
						<span 
							  data-type="text"
							  data-name="name"
							  data-value="{{ $record->name }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="{{$base_url}}/job/{{ $record->{$record->getKeyName()} }}"
							  >{{ $record->name }}</span>
						</td>
					<td>
						<span 
							  data-type="text"
							  data-name="company"
							  data-value="{{ $record->company }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="{{$base_url}}/job/{{ $record->{$record->getKeyName()} }}"
							  >{{ $record->company }}</span>
						</td>
					<td>
						<span 
							  data-type="number"
							  data-name="salary"
							  data-value="{{ $record->salary }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="{{$base_url}}/job/{{ $record->{$record->getKeyName()} }}"
							  >{{ $record->salary }}</span>
						</td>
					<td>
						<span 
							  data-type="text"
							  data-name="details"
							  data-value="{{ $record->details }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="{{$base_url}}/job/{{ $record->{$record->getKeyName()} }}"
							  ><div class="des_div" >{{ $record->details }}</div></span>
						</td>
					<td>
						<span 
							  data-type="number"
							  data-name="location_id"
							  data-value="{{ $record->location_id }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="{{$base_url}}/job/{{ $record->{$record->getKeyName()} }}"
							  >{{ $record->location_name }}</span>
						</td>
					<td>
						<span 
							  data-type="number"
							  data-name="type_id"
							  data-value="{{ $record->type_id }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="{{$base_url}}/job/{{ $record->{$record->getKeyName()} }}"
							  >{{ $record->type_name }}</span>
						</td>
					<td>
						<span 
							  data-type="number"
							  data-name="classification_id"
							  data-value="{{ $record->classification_id }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="{{$base_url}}/job/{{ $record->{$record->getKeyName()} }}"
							  >{{ $record->classification_name }}</span>
						</td>
					<td>
						<span 
							  data-type="number"
							  data-name="user_id"
							  data-value="{{ $record->user_id }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="{{$base_url}}/job/{{ $record->{$record->getKeyName()} }}"
							  >{{ $record->user_name }}</span>
						</td>
					<td>
						{{ $record->created_at }}
						</td>
					
					<td class="actions-cell">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						    <a href="{{$base_url.'/editjob'}}/{{$record->id}}"><i class="fa fa-eye fa-3x"></i></a>						
					</td>

		    	</tr>
			@empty
				@include ('vendor.crud.single-page-templates.common.not-found-tr',['colspan' => 12])
	    	@endforelse
	    </tbody>

	</table>

	<!--pagination-->
    <div class="page_div" >
		@if(count($records))
	    {!! $records->appends(Request::query())->render() !!}
		@endif
	</div>

</div>



<script>
    function check_login_callback(is_login){
        if(is_login){
            //document.getElementById("rand").value = g_user.id; 
        }else{
            
         
        }
    } 


    // For select options : long text makes width logner 
	function setSelectWidth() {
	  var s1 = $('#salary_bottom');
	  var s2 = $('#salary_top');
	 
	  if(s1.val() == "99999999999999" || s2.val() == "99999999999999" ){
	    var s1_val = "12345"; // for "$Max"	  	
	  	var s2_val = "12345"; // for "$Max"	  	
	  }else{
	  	var s1_val = s1.val();
	  	var s2_val = s2.val();
	  }

	  $('#templateOption_select').text( s1_val );
	  var s1_width = $('#template_select').width();
	  $('#templateOption_select').text( s2_val );
	  var s2_width = $('#template_select').width();

	  var longer_width = (s1_width > s2_width) ? s1_width : s2_width;

	  // for some reason, a small fudge factor is needed
	  // so that the text doesn't become clipped
	  s1.width( longer_width * 1.5 );
	  s2.width( longer_width * 1.5 );
	}

	$(document).ready( function() {
	  //setSelectWidth(); // This makes initial length too long

	  $('#salary_top').change( function() {
	    setSelectWidth();
	  } );

	  $('#salary_bottom').change( function() {
	    setSelectWidth();
	  } );


	});
	// End : // For select options : long text makes width logner 

</script>
@endsection