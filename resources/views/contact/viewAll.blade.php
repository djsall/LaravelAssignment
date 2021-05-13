@extends('layouts.app')
@section('content')
	<div class="container">
		<h1 class="mb-5">View Contact Us Messages (Admin only)</h1>
		@foreach($entries as $entry)
			<div class="card card-body mb-3">
				<h5 class="card-title font-weight-bold">Message number {{$entry->id}}:</h5>
				<p class="card-text"></p>
				<blockquote class="blockquote mb-0">
					<p>{{$entry->message}}</p>
					<footer class="blockquote-footer">{{$entry->name}}, {{$entry->email}}</cite></footer>
				</blockquote>
			</div>
		@endforeach
	</div>
@endsection