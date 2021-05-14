@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Debug info / Welcome') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                @if(Auth::user())
                                    Welcome {{ Auth::user()->name }}!
                                    @if(Auth::user()->isAdmin())
                                        <p>You are logged in as an administrator account.</p>
                                    @else
                                        <p>You are logged in with a non-administrator account.</p>
                                    @endif
                                @else
                                    <p>
                                        Welcome Guest!
                                    </p>
                                    <p>
                                        Explore our pages using the navbar.
                                    </p>
                                    <p>
                                        Log in, or Sign up to use our member features.
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="https://www.nonprofit.hu/"><p>The page I have chosen to recreate.</p></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="https://github.com/djsall/LaravelAssignment"><p>Link to the GitHub repository of the project.</p></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
