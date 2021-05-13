@extends('layouts.app')

@section('style')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" integrity="sha512-nNlU0WK2QfKsuEmdcTwkeh+lhGs6uyOxuUs+n+0oXSYDok5qy0EI0lt01ZynHq6+p/tbgpZ7P+yUb+r71wqdXg=="
				crossorigin="anonymous"/>
	<style type="text/css">
		.gallery {
			display: inline-block;
			margin-top: 20px;
		}

		.close-icon {
			border-radius: 50%;
			position: absolute;
			right: 5px;
			top: -10px;
			padding: 5px 8px;
		}

		.form-image-upload {
			background: #e8e8e8 none repeat scroll 0 0;
			padding: 15px;
		}
	</style>
@endsection

@section('content')
	<div class="container">
		<h1>Image Gallery</h1>
		<form action="{{ url('gallery') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
			@csrf
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			@if ($message = Session::get('success'))
				<div class="alert alert-success alert-block">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>{{ $message }}</strong>
				</div>
			@endif

			<div class="row">
				<div class="col-md-5">
					<strong>Title:</strong>
					<input type="text" name="title" class="form-control" placeholder="Title">
				</div>
				<div class="col-md-5">
					<strong>Image:</strong>
					<input type="file" name="image" class="form-control">
				</div>
				<div class="col-md-2">
					<br/>
					<button type="submit" class="btn btn-success">Upload</button>
				</div>
			</div>
		</form>
		<div class="row">
			<div class='list-group gallery'>
				@if($images->count())
					@foreach($images as $image)
						<div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
							<a class="thumbnail fancybox" rel="ligthbox" href="/images/{{ $image->image }}">
								<img class="img-fluid" alt="" src="/images/{{ $image->image }}"/>
								<div class='text-center'>
									<small class='text-muted'>{{ $image->title }}</small>
								</div>
							</a>
							<form action="{{ url('gallery',$image->id) }}" method="POST">
								<input type="hidden" name="_method" value="delete">
								@csrf
								<button type="submit" class="close-icon btn btn-danger"><i class="fas fa-times"></i></button>
							</form>
						</div>
					@endforeach
				@endif
			</div>
		</div>
	</div>
@endsection
@section('script')
	<script type="text/javascript">
		$(document).ready(function () {
			$(".fancybox").fancybox({
				openEffect: "none",
				closeEffect: "none"
			});
		});
	</script>
@endsection