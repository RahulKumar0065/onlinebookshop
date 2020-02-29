@extends('backendtemplate')
@section('content')
	<form action="{{route('orders.create')}}" method="POST">
		@csrf
		<div class="form-group row">
			<label for="inputTotal" class="col-sm-2 col-form-label"> Total </label>

			<div class="col-sm-10">
				<input type="text" class="form-control" id="inputTotal" name="total">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputVoucher" class="col-sm-2 col-form-label"> Voucher No </label>

			<div class="col-sm-10">
				<input type="text" class="form-control" id="inputVoucher" name="voucherno">
			</div>
		</div>

		<div class="form-group row">
			<label for="inputName" class="col-sm-2 col-form-label"> Order Date </label>

			<div class="col-sm-10">
				<input type="date" class="form-control" id="inputDate" name="orderdate">
			</div>
		</div>

		<div class="form-group row">
						<div class="col-sm-2"></div>
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary">
								<i class="fa fa-save"></i> Save
							</button>
						</div>
					</div>

	</form>
@endsection