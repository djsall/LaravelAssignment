@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Image Gallery</h1>
        <form action="{{ url('gallery') }}" class="form-image-upload" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <label>{{ $message }}</label>
                </div>
            @endif

            <div class="row">
                <div class="col-12 col-sm-5">

                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" name="title" class="form-control" placeholder="Title">
                    </div>
                </div>
                <div class="col-12 col-sm-4">

                    <div class="form-group">
                        <label>Image:</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-sm-3">
                    <label>Upload:</label>
                    <button type="submit" class="btn btn-block btn-primary">Upload</button>
                </div>
            </div>
        </form>
        <div class="row mt-5">
            @if($images->count())
                @foreach($images as $image)
                    <div class='col-12 col-sm-4'>
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