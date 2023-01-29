@extends('layouts.frontend')

@section('title')
    Login
@endsection

@section('content')
<div class="container" style="margin-bottom: 80px">
    <div class="row">
        <div class="col-md-4 m-auto">
            <div class="login-form"><!--login form-->
                <h2>Login Administrator</h2>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <label for="email">Email</label>
                    <input type="email" placeholder="contoh:ucok@gmail.com" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror"/>
                    @error('password')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                    <button type="submit" class="btn btn-default btn-block">Login</button>
                </form>
            </div><!--/login form-->
        </div>
    </div>
</div>
@endsection

@section('footer-scripts')
@endsection
