@extends('layouts.master')

@section('title')
    WWWelcome!
@endsection

@section('content')
    @include('includes.message')

    <div class="row">
        <div class="col-md-6">
            <h3>Sign Up</h3>
            <form action="{{ route('signup') }}" method="post">
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Your Email:</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{ old('email') }}">
                </div>
                <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                    <label for="first_name">Your First Name:</label>
                    <input class="form-control" type="text" name="first_name" id="first_name" value="{{ old('first_name') }}">
                </div>
                <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                    <label for="last_name">Your Last Name:</label>
                    <input class="form-control" type="text" name="last_name" id="last_name" value="{{ old('last_name') }}">
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password">Your Password:</label>
                    <input class="form-control" type="text" name="password" id="password" value="{{ old('password') }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{ csrf_token()  }}">
            </form>
        </div>

        <div class="col-md-6">
            <h3>Sign In</h3>
            <form action="{{ route('signin') }}" method="post">
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Your Email:</label>
                    <input class="form-control" type="text" name="email" id="email" value="{{ old('email') }}">
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password">Your Password:</label>
                    <input class="form-control" type="text" name="password" id="password" value="{{ old('password') }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{ csrf_token()  }}">
            </form>
        </div>
    </div>

@endsection
