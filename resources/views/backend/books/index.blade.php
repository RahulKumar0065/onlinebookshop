@extends('backendtemplate')

@section('content')

<div class="container-fluid">
	<h2>Show with table</h2>
	<a href="{{route('books.create')}}" class="btn btn-info float-right">Add New</a>

	<div class="row">
		<div class="card-body">


			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th> No </th>
							
							<th> Title</th>
							<th> Price</th>
							<th>Category</th>
							<th>Author</th>
							<th width="20%">Action</th>
						</tr>
					</thead>

					<tbody>	
						@php $i=1; @endphp
						@foreach($books as $row)
						<tr>
							<td>{{$i++}}</td>
							
							<td>{{$row->title}}</td>
							<td>{{$row->price}}</td>
							<td>{{$row->category->name}}</td>
							<td>{{$row->author->name}}</td>
							
							<td>
								<a href="" class="btn btn-info" style="float: left;">
									<i class="fas fa-info"></i>
								</a>

								<a href="{{route('books.edit',$row->id)}}" class="btn btn-warning float-left">
									<i class="fas fa-edit"></i>

								</a>

								<form method="post" action="{{route('books.destroy',$row->id)}}"
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

