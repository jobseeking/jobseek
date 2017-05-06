@extends('vendor.crud.single-page-templates.common.app')

@section('content')

	<h2>User Skill Experience</h2>

	@include('user_skill_experience.create')

	<table class="table table-striped grid-view-tbl">
	    
	    <thead>
		<tr class="header-row">
			{!!\Nvd\Crud\Html::sortableTh('id','user-skill-experience.index','Id')!!}
			{!!\Nvd\Crud\Html::sortableTh('user_id','user-skill-experience.index','User Id')!!}
			{!!\Nvd\Crud\Html::sortableTh('skill_id','user-skill-experience.index','Skill Id')!!}
			{!!\Nvd\Crud\Html::sortableTh('experience_years','user-skill-experience.index','Experience Years')!!}
			{!!\Nvd\Crud\Html::sortableTh('created_at','user-skill-experience.index','Created At')!!}
			{!!\Nvd\Crud\Html::sortableTh('updated_at','user-skill-experience.index','Updated At')!!}
			<th></th>
		</tr>
		<tr class="search-row">
			<form class="search-form">
				<td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
				<td><input type="text" class="form-control" name="user_id" value="{{Request::input("user_id")}}"></td>
				<td><input type="text" class="form-control" name="skill_id" value="{{Request::input("skill_id")}}"></td>
				<td><input type="text" class="form-control" name="experience_years" value="{{Request::input("experience_years")}}"></td>
				<td><input type="text" class="form-control" name="created_at" value="{{Request::input("created_at")}}"></td>
				<td><input type="text" class="form-control" name="updated_at" value="{{Request::input("updated_at")}}"></td>
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
						<span class="editable"
							  data-type="number"
							  data-name="user_id"
							  data-value="{{ $record->user_id }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/user-skill-experience/{{ $record->{$record->getKeyName()} }}"
							  >{{ $record->user_id }}</span>
						</td>
					<td>
						<span class="editable"
							  data-type="number"
							  data-name="skill_id"
							  data-value="{{ $record->skill_id }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/user-skill-experience/{{ $record->{$record->getKeyName()} }}"
							  >{{ $record->skill_id }}</span>
						</td>
					<td>
						<span class="editable"
							  data-type="number"
							  data-name="experience_years"
							  data-value="{{ $record->experience_years }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/user-skill-experience/{{ $record->{$record->getKeyName()} }}"
							  >{{ $record->experience_years }}</span>
						</td>
					<td>
						{{ $record->created_at }}
						</td>
					<td>
						{{ $record->updated_at }}
						</td>
					@include( 'vendor.crud.single-page-templates.common.actions', [ 'url' => 'user-skill-experience', 'record' => $record ] )
		    	</tr>
			@empty
				@include ('vendor.crud.single-page-templates.common.not-found-tr',['colspan' => 7])
	    	@endforelse
	    </tbody>

	</table>

	@include('vendor.crud.single-page-templates.common.pagination', [ 'records' => $records ] )

<script>
	$(".editable").editable({ajaxOptions:{method:'PUT'}});
</script>
@endsection