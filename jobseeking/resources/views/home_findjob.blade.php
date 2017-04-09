

	
<div class="table-responsive">  
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
			<form class="search-form" action="{{$base_url}}/findjob_dev">
				<td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
				<td><input type="text" class="form-control" name="name" value="{{Request::input("name")}}"></td>
				<td><input type="text" class="form-control" name="company" value="{{Request::input("company")}}"></td>
				<td>
				    <!-- &nbsp;&nbsp;&nbsp;&nbsp; From -->
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
				
				<td style="min-width: 6em;">@include('vendor.crud.single-page-templates.common.search-btn')</td>
			</form>
		</tr>
	    </thead>

	    <tbody>
	    
	    </tbody>

	</table>

    <div class="center" style="width:40%; height:20%;">
		<button  class="btn btn-primary" onclick="onClickSubmit()">Seeking</button>
	</div>

</div>



<script>

</script>
