@extends('backendtemplate')

@section('content')

<div class="container-fluid">
	<h2 class="d-inline-block">Show with table</h2>
	<a href="{{route('authors.create')}}" class="btn btn-info float-right">Add New</a>

	<div class="row">
		<div class="card-body">


			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th> No </th>
							<th> Name </th>
							<th> Email</th>	
							<th>Address</th>
							<th>Description</th>						
							<th width="20%">Action</th>
						</tr>
					</thead>

					<tbody>	
						@php $i=1; @endphp
						@foreach($authors as $row)
						<tr>
							<td>{{$i++}}</td>
							<td>{{$row->name}}</td>
							<td>{{$row->email}}</td>
							<td>{{$row->address}}</td>
							<td>{{$row->description}}</td>
							
							<td>
								<a href="#" class="btn btn-info detail" data-id="{{$row->id}}" style="float: left;">
									<i class="fas fa-info"></i>
								</a>
							
								
								<a href="{{route('authors.edit',$row->id)}}" class="btn btn-warning float-left">
									<i class="fas fa-edit"></i>

								</a>

								<form method="post" action="{{route('authors.destroy',$row->id)}}"
									onsubmit="return confirm('Are you sure to delete?')">

									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
								</form>
								
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->



@endsection




