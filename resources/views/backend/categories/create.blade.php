@extends('backendtemplate')
@section('content')
	<form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="form-group row">
			<label for="inputName" class="col-sm-2 col-form-label"> Name </label>

			<div class="col-sm-10">
				<input type="text" class="form-control" id="inputName" name="name">
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