@extends('layout')

@section('content')

	<h2>Find Job</h2>

	

	<table class="table table-striped grid-view-tbl">
	    
	    <thead>
		<tr class="header-row">
			{!!\Nvd\Crud\Html::sortableTh('id','findjob_dev','Id')!!}
			{!!\Nvd\Crud\Html::sortableTh('name','findjob_dev','Name')!!}
			{!!\Nvd\Crud\Html::sortableTh('company','findjob_dev','Company')!!}
			{!!\Nvd\Crud\Html::sortableTh('salary','findjob_dev','Salary')!!}
			{!!\Nvd\Crud\Html::sortableTh('details','findjob_dev','Details')!!}
			{!!\Nvd\Crud\Html::sortableTh('location_id','findjob_dev','Location')!!}
			{!!\Nvd\Crud\Html::sortableTh('type_id','findjob_dev','Type')!!}
			{!!\Nvd\Crud\Html::sortableTh('classification_id','findjob_dev','Classification')!!}
			{!!\Nvd\Crud\Html::sortableTh('user_id','findjob_dev','User')!!}
			{!!\Nvd\Crud\Html::sortableTh('created_at','findjob_dev','Created At')!!}
			
			<th></th>
		</tr>
		<tr class="search-row">
			<form class="search-form">
				<td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
				<td><input type="text" class="form-control" name="name" value="{{Request::input("name")}}"></td>
				<td><input type="text" class="form-control" name="company" value="{{Request::input("company")}}"></td>
				<td>
				    <!--
				    <input type="text" class="form-control" name="salary" value="{{Request::input("salary")}}">
				    -->

				    &nbsp;&nbsp;&nbsp;&nbsp; From
				    <select class="form-control" name="salary_bottom">
				        @for ($i = 0; $i < 200001; $i+=10000)
				        	@if ( Request::input("salary_bottom") == $i)
				        		<option value ="{{$i}}" selected> ${{number_format($i)}} </option>
				        	@else
				        		<option value ="{{$i}}" > ${{number_format($i)}} </option>
				        	@endif
				        @endfor  		       
            		</select>
            		&nbsp;&nbsp;&nbsp;&nbsp; To
            		<select class="form-control" name="salary_top">
            		    @for ($i = 10000; $i < 200001; $i+=10000)
            		    	@if ( Request::input("salary_top") == $i)
            		    		<option value ="{{$i}}" selected> ${{number_format($i)}} </option>
            		    	@else
            		    		<option value ="{{$i}}" > ${{number_format($i)}} </option>
            		    	@endif
				        @endfor
				        @if ( Request::input("salary_top") > 200000 )
				        	<option value ="99999999999999" selected> $Max </option>      
				        @else
				        	<option value ="99999999999999" > $Max </option>      
				        @endif
            		</select>

				</td>
				<td><input type="text" class="form-control" name="details" value="{{Request::input("details")}}"></td>
				<td><input type="text" class="form-control" name="location_id" value="{{Request::input("location_id")}}"></td>
				<td><input type="text" class="form-control" name="type_id" value="{{Request::input("type_id")}}"></td>
				<td><input type="text" class="form-control" name="classification_id" value="{{Request::input("classification_id")}}"></td>
				<td><input type="text" class="form-control" name="user_id" value="{{Request::input("user_id")}}"></td>
				<td></td>
				
				<td style="min-width: 6em;">@include('vendor.crud.single-page-templates.common.search-btn')</td>
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
							  >{{ $record->details }}</span>
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
						    <a href="{{$base_url.'/showjob'}}/{{$record->id}}"><i class="fa fa-eye"></i></a>						
					</td>

		    	</tr>
			@empty
				@include ('vendor.crud.single-page-templates.common.not-found-tr',['colspan' => 12])
	    	@endforelse
	    </tbody>

	</table>

	@include('vendor.crud.single-page-templates.common.pagination', [ 'records' => $records ] )

<script>

</script>
@endsection