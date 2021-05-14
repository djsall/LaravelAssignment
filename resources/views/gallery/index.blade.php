@extends('layouts.app')

@section('style')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" integrity="sha512-nNlU0WK2QfKsuEmdcTwkeh+lhGs6uyOxuUs+n+0oXSYDok5qy0EI0lt01ZynHq6+p/tbgpZ7P+yUb+r71wqdXg=="
          crossorigin="anonymous"/>
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
        <div class="row mt-5">
            @if($images->count())
                @foreach($images as $image)
                    <div class='col-4'>
                        <div class="card p-3 mb-4">

                            <a class="card-img-top text-center" rel="ligthbox" href="/images/{{ $image->image }}">
                                <img class="img-fluid" alt="" src="/images/{{ $image->image }}" style="max-height: 175px;"/>
                            </a>
                            <div class='card-title text-center'>
                                <small class='text-muted'>{{ $image->title }} - User: {{ $image->owner->name }}</small>
                            </div>
                            @if(Auth::check())
                                @if(Auth::user()->id == $image->owner->id || Auth::user()->isAdmin())
                                    <form action="{{ url('gallery',$image->id) }}" method="POST">
                                        <input type="hidden" name="_method" value="delete">
                                        @csrf
                                        <button type="submit" class="btn-block btn btn-danger">Delete</button>
                                    </form>
                                @endif
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
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