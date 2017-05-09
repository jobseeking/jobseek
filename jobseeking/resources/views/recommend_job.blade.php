

	

@if ( count($records_suggested) != 0 )
<h2>Recommended Jobs</h2>
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
	    </thead>

	    <tbody>
	    	@forelse ( $records_suggested as $record )
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

</div>
@endif




