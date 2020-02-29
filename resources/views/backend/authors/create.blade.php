@extends('backendtemplate')
@section('content')
<div class="container-fluid">
	<div class="row">
		<h2>Author Create Form</h2>
		<div class="col-12">
			<div class="card-body">


				<form action="{{route('authors.store')}}" method="POST" enctype="multipart/form-data">
					@csrf

					
					<div class="form-group row{{ $errors->has('name') ? 'has-error' :''}}">
						<label for="inputName" class="col-sm-2 col-form-label"> Name </label>

						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputName" name="name"><span class="text-danger">{{$errors->first('name')}}</span>
						</div>
					</div>

					<div class="form-group row{{ $errors->has('logo') ? 'has-error' :''}}">
						<label for="inputLogo" class="col-sm-2 col-form-label"> Photo  </label>

						<div class="col-sm-10">
							<input type="file" class="form-control-file" name="logo">
							<span class="text-danger">{{$errors->first('logo')}}</span>
						</div>
					</div>



					<div class="form-group row{{ $errors->has('email') ? 'has-error' :''}}">
						<label for="inputEmail" class="col-sm-2 col-form-label"> Email </label>


						<div class="col-sm-10">
							<input type="email" class="form-control" id="inputEmail" name="email">
							<span class="text-danger">{{$errors->first('email')}}</span>
						</div>
						
					</div>

					<div class="form-group row{{ $errors->has('gender') ? 'has-error' :''}}">
						<label for="inputGender" class="col-sm-2 col-form-label"> Gender </label>

						<div class="col-sm-10">
							<div class="col-sm-5">
							<input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="male" checked>
							<label class="form-check-label" for="gridRadios1">
								Male
							</label>
						</div>
						<div class="col-sm-5">
							<input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="female">
							<label class="form-check-label" for="gridRadios1">
								Female
							</label>
						</div>
						</div>
					</div>

					<div class="form-group row{{ $errors->has('address') ? 'has-error' :''}}">
						<label for="inputAddress" class="col-sm-2 col-form-label"> Address </label>

						<div class="col-sm-10">
							<textarea class="form-control summernote" id="inputAddress" name="address"></textarea>
							<span class="text-danger">{{$errors->first('address')}}</span>
						</div>
					</div>

					<div class="form-group row{{ $errors->has('description') ? 'has-error' :''}}">
						<label for="inputDescription" class="col-sm-2 col-form-label"> Description </label>

						<div class="col-sm-10">
							<textarea class="form-control summernote" id="inputDescription" name="description"></textarea>
							<span class="text-danger">{{$errors->first('description')}}</span>
						</div>
					</div>

					
					<div class="form-group row">
						<div class="col-sm-2">
							<div class="col-sm-10">
								<button type="submit" class="btn btn-primary">
									<i class="fa fa-save"></i> Save
								</button>
							</div>
						</div>
					</div>

				</form>

			</div>
		</div>
	</div>
</div>
@endsection