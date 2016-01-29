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
			@foreach($files as $key=>$file)
			<tr>
				<td>{{$file->file_name}}</td>
				<td>{{$file->import_url}}</td>
				<td>{{$file->created_at}}</td>
				<td>{{$file->updated_at}}</td>
				<td><a href="#">View</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection
