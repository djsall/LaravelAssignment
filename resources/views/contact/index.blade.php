@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 offset-sm-3">


                <h1>Contact us</h1>
                <form action="{{action('ContactUsController@store')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" cols="30" rows="10" class="form-control" required></textarea>
                    </div>
                    <input type="submit" value="Submit" class="btn btn-block btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection