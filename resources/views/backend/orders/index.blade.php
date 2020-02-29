@extends('backendtemplate')

@section('content')

<div class="container-fluit">
	<h2>Show with table</h2>
	<a href="{{route('orders.create')}}" class="btn btn-info float-right">Add New</a>
	<div class="row">
		<div class="card-body">


			<div class="table-responsive my-3">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th> No </th>
							<th> Total </th>
							<th>Voucher No</th>
							<th>Order Date</th>
							
						</tr>
					</thead>

					<tbody>	
						@php $i=1; @endphp
						@foreach($orders as $row)
						<tr>
							<td>{{$i++}}</td>
							<td>{{$row->total}}</td>
							<td>{{$row->voucherno}}</td>
							<td>{{$row->orderdate}}</td>
							
							<td>
								<a href="" class="btn btn-info" style="float: left;">
									<i class="fas fa-info"></i>
								</a>
								<a href="" class="btn btn-warning float-left">
									<i class="fas fa-edit"></i>

								</a>

								<form method="post" action=""
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

