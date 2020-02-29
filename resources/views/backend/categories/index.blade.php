@extends('backendtemplate')

@section('content')

<div class="container-fluit">
	<h2>Show with table</h2>
	<a href="{{route('categories.create')}}" class="btn btn-info float-right">Add New</a>
	<div class="row">
		<div class="card-body">


			<div class="table-responsive my-3">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th> No </th>
							<th> Name </th>
							<th>Action</th>
							
						</tr>
					</thead>

					<tbody>	
						@php $i=1; @endphp
						@foreach($categories as $row)
						<tr>
							<td>{{$i++}}</td>
							<td>{{$row->name}}</td>
							
							<td>
								<a href="{{route('categories.show',$row->id)}}" class="btn btn-info" style="float: left;">
									<i class="fas fa-info"></i>
								</a>
								<a href="{{route('categories.edit',$row->id)}}" class="btn btn-warning float-left">
									<i class="fas fa-edit"></i>

								</a>

								<form method="post" action="{{route('categories.destroy',$row->id)}}"
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
@endsection

