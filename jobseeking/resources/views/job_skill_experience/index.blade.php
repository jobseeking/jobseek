@extends('vendor.crud.single-page-templates.common.app')

@section('content')

	<h2>Job Skill Experience</h2>

	@include('job_skill_experience.create')

	<table class="table table-striped grid-view-tbl">
	    
	    <thead>
		<tr class="header-row">
			{!!\Nvd\Crud\Html::sortableTh('id','job-skill-experience.index','Id')!!}
			{!!\Nvd\Crud\Html::sortableTh('job_id','job-skill-experience.index','Job Id')!!}
			{!!\Nvd\Crud\Html::sortableTh('skill_id','job-skill-experience.index','Skill Id')!!}
			{!!\Nvd\Crud\Html::sortableTh('experience_years','job-skill-experience.index','Experience Years')!!}
			{!!\Nvd\Crud\Html::sortableTh('created_at','job-skill-experience.index','Created At')!!}
			{!!\Nvd\Crud\Html::sortableTh('updated_at','job-skill-experience.index','Updated At')!!}
			<th></th>
		</tr>
		<tr class="search-row">
			<form class="search-form">
				<td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
				<td><input type="text" class="form-control" name="job_id" value="{{Request::input("job_id")}}"></td>
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
							  data-name="job_id"
							  data-value="{{ $record->job_id }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/job-skill-experience/{{ $record->{$record->getKeyName()} }}"
							  >{{ $record->job_id }}</span>
						</td>
					<td>
						<span class="editable"
							  data-type="number"
							  data-name="skill_id"
							  data-value="{{ $record->skill_id }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/job-skill-experience/{{ $record->{$record->getKeyName()} }}"
							  >{{ $record->skill_id }}</span>
						</td>
					<td>
						<span class="editable"
							  data-type="number"
							  data-name="experience_years"
							  data-value="{{ $record->experience_years }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="/job-skill-experience/{{ $record->{$record->getKeyName()} }}"
							  >{{ $record->experience_years }}</span>
						</td>
					<td>
						{{ $record->created_at }}
						</td>
					<td>
						{{ $record->updated_at }}
						</td>
					@include( 'vendor.crud.single-page-templates.common.actions', [ 'url' => 'job-skill-experience', 'record' => $record ] )
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