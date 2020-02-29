@extends('backendtemplate')
@section('content')

<div class="container-fluid">
	<h2>Create Form</h2>
	
	<div class="col-md-12">

		<form method="post" action="{{route('books.update',$book->id)}}"  enctype="multipart/form-data">

			@csrf
			@method('PUT')

			<div class="form-group row{{ $errors->has('title') ? 'has-error' :''}}">
				<label for="inputTitle" class="col-sm-2 col-form-label"> Title </label>

				<div class="col-sm-10">
					<input type="text" class="form-control" id="inputTitle" name="title" value="{{$book->title}}">
					<span class="text-danger">{{$errors->first('title')}}
					</span>
				</div>
			</div>


			<div class="form-group row{{ $errors->has('logo') ? 'has-error' :''}}">
						

			<label for="inputLogo" class="col-sm-2 col-form-label">Photo</label>

		<div class="col-sm-10">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a href="#old" class="nav-link active" data-toggle="tab">Old</a>
					</li>
					<li class="nav-item">
						<a href="#new" class="nav-link" data-toggle="tab">New</a>
					</li>
				</ul>
			
			
			<div class="tab-content">
				<div class="tab-pane fade show active py-3" id="old">
					<img src="{{asset($book->logo)}}" class="img-fluid w-25">

					<input type="hidden" name="oldlogo" value="{{$book->logo}}">
				</div>

				<div class="tab-pane fade" id="new">
					<input type="file" class="form-control-file" id="inputLogo" name="logo">
				</div>
			</div>
		</div>
			
	</div>




			<input type="hidden" name="_token" value="{{csrf_token()}}">

			<div class="form-group row{{ $errors->has('price') ? 'has-error' :''}}">
				<label for="inputPrice" class="col-sm-2 col-form-label">Price</label>

				<div class="col-sm-10">
					<input type="number" class="form-control" id="inputPrice" name="price" value="{{$book->price}}">
					<span class="text-danger">{{$errors->first('price')}}
					</span>
				</div>
			</div>

			<input type="hidden" name="_token" value="{{csrf_token()}}">


			<div class="form-group row{{ $errors->has('pdf') ? 'has-error' :''}}">
				<label for="inputPdf"class="col-sm-2 col-form-label"> Pdf </label>

				<div class="col-sm-10">
					<input type="file" id="inputPdf" name="pdf"><span class="text-danger">{{$errors->first('pdf')}}
					</span>
				</div>
			</div>

			<div class="form-group row{{ $errors->has('description') ? 'has-error' :''}}">
				<label for="inputDescription" class="col-sm-2 col-form-label"> Description </label>

				<div class="col-sm-10">
					<textarea class="form-control summernote" id="inputDescription" name="description">{{$book->description}}</textarea>
					<span class="text-danger">{{$errors->first('description')}}</span>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Choose Category</label>
				<div class="col-sm-10">
					<select name="category" class="form-control">
						@foreach($categories as $row)
						<option value="{{$row->id}}">{{$row->name}}</option>
						@endforeach 
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Choose Author</label>

				<div class="col-sm-10">
					<select name="author" class="form-control">
						@foreach($authors as $row) 
						<option value="{{$row->id}}">{{$row->name}}</option>
						@endforeach 
					</select>
				</div>
			</div>

			
			<div class="form-group row">
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<button type="submit" class="btn btn-primary">
						<i class="fa fa-save"></i> Update
					</button>
				</div>
			</div>
		</div>
	</form>
</div>



@endsection