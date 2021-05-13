@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">{{ __('Dashboard') }}</div>

					<div class="card-body">
						@if (session('status'))
							<div class="alert alert-success" role="alert">
								{{ session('status') }}
							</div>
						@endif
						@if(Auth::user())
							Welcome {{ Auth::user()->name }}!
							@if(Auth::user()->isAdmin())
								<p>I'm an admin yay</p>
							@endif
						@else
							Welcome! Please sign up, or log in!
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
