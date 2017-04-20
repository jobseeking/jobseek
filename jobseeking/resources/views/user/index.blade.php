@extends('layout')

@section('content')

	<h2>Users</h2>

	@include('user.create')

	<table class="table table-striped grid-view-tbl">
	    
	    <thead>
		<tr class="header-row">
			{!!\Nvd\Crud\Html::sortableTh('id','user.index','Id')!!}
			{!!\Nvd\Crud\Html::sortableTh('name','user.index','Name')!!}
			{!!\Nvd\Crud\Html::sortableTh('email','user.index','Email')!!}
			{!!\Nvd\Crud\Html::sortableTh('password','user.index','Password')!!}
			{!!\Nvd\Crud\Html::sortableTh('remember_token','user.index','Remember Token')!!}
			{!!\Nvd\Crud\Html::sortableTh('created_at','user.index','Created At')!!}
			{!!\Nvd\Crud\Html::sortableTh('updated_at','user.index','Updated At')!!}
			{!!\Nvd\Crud\Html::sortableTh('last_name','user.index','Last Name')!!}
			{!!\Nvd\Crud\Html::sortableTh('interest_classification_id','user.index','Interest Classification Id')!!}
			{!!\Nvd\Crud\Html::sortableTh('interest_classification_id_2','user.index','Interest Classification Id 2')!!}
			{!!\Nvd\Crud\Html::sortableTh('interest_classification_id_3','user.index','Interest Classification Id 3')!!}
			<th></th>
		</tr>
		<tr class="search-row">
			<form class="search-form">
				<td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
				<td><input type="text" class="form-control" name="name" value="{{Request::input("name")}}"></td>
				<td><input type="text" class="form-control" name="email" value="{{Request::input("email")}}"></td>
				<td><input type="text" class="form-control" name="password" value="{{Request::input("password")}}"></td>
				<td><input type="text" class="form-control" name="remember_token" value="{{Request::input("remember_token")}}"></td>
				<td><input type="text" class="form-control" name="created_at" value="{{Request::input("created_at")}}"></td>
				<td><input type="text" class="form-control" name="updated_at" value="{{Request::input("updated_at")}}"></td>
				<td><input type="text" class="form-control" name="last_name" value="{{Request::input("last_name")}}"></td>
				<td><input type="text" class="form-control" name="interest_classification_id" value="{{Request::input("interest_classification_id")}}"></td>
				<td><input type="text" class="form-control" name="interest_classification_id_2" value="{{Request::input("interest_classification_id_2")}}"></td>
				<td><input type="text" class="form-control" name="interest_classification_id_3" value="{{Request::input("interest_classification_id_3")}}"></td>
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
							  data-type="text"
							  data-name="name"
							  data-value="{{ $record->name }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="{{$base_url}}/user/{{ $record->{$record->getKeyName()} }}"
							  >{{ $record->name }}</span>
						</td>
					<td>
						<span class="editable"
							  data-type="email"
							  data-name="email"
							  data-value="{{ $record->email }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="{{$base_url}}/user/{{ $record->{$record->getKeyName()} }}"
							  >{{ $record->email }}</span>
						</td>
					<td>
						<span class="editable"
							  data-type="text"
							  data-name="password"
							  data-value="{{ $record->password }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="{{$base_url}}/user/{{ $record->{$record->getKeyName()} }}"
							  >{{ $record->password }}</span>
						</td>
					<td>
						<span class="editable"
							  data-type="text"
							  data-name="remember_token"
							  data-value="{{ $record->remember_token }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="{{$base_url}}/user/{{ $record->{$record->getKeyName()} }}"
							  >{{ $record->remember_token }}</span>
						</td>
					<td>
						{{ $record->created_at }}
						</td>
					<td>
						{{ $record->updated_at }}
						</td>
					<td>
						<span class="editable"
							  data-type="text"
							  data-name="last_name"
							  data-value="{{ $record->last_name }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="{{$base_url}}/user/{{ $record->{$record->getKeyName()} }}"
							  >{{ $record->last_name }}</span>
						</td>
					<td>
						<span class="editable"
							  data-type="number"
							  data-name="interest_classification_id"
							  data-value="{{ $record->interest_classification_id }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="{{$base_url}}/user/{{ $record->{$record->getKeyName()} }}"
							  >{{ $record->interest_classification_id }}</span>
						</td>
					<td>
						<span class="editable"
							  data-type="number"
							  data-name="interest_classification_id_2"
							  data-value="{{ $record->interest_classification_id_2 }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="{{$base_url}}/user/{{ $record->{$record->getKeyName()} }}"
							  >{{ $record->interest_classification_id_2 }}</span>
						</td>
					<td>
						<span class="editable"
							  data-type="number"
							  data-name="interest_classification_id_3"
							  data-value="{{ $record->interest_classification_id_3 }}"
							  data-pk="{{ $record->{$record->getKeyName()} }}"
							  data-url="{{$base_url}}/user/{{ $record->{$record->getKeyName()} }}"
							  >{{ $record->interest_classification_id_3 }}</span>
						</td>
					@include( 'vendor.crud.single-page-templates.common.actions', [ 'url' => $base_url.'/user', 'record' => $record ] )
		    	</tr>
			@empty
				@include ('vendor.crud.single-page-templates.common.not-found-tr',['colspan' => 12])
	    	@endforelse
	    </tbody>

	</table>

	@include('vendor.crud.single-page-templates.common.pagination', [ 'records' => $records ] )

<script>
	$(".editable").editable({ajaxOptions:{method:'PUT'}});
</script>
@endsection