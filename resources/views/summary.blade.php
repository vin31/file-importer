@extends('master') 

@section('content')

<div class="container">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>File Name</th>
				<th>URL</th>
				<th>Date Added</th>
				<th>Date Modified</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($records as $key=>$record)
			<tr>
				<td>{{$record->file_name}}</td>
				<td>{{$record->import_url}}</td>
				<td>{{$record->date_added}}</td>
				<td>{{$record->date_updated}}</td>
				<td><a href="#">View</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection
