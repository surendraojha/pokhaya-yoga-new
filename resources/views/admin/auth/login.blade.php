@extends('front.layouts.main')
@section('content')
    <div class="page-banner">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="strokeme">
                            <div class="strokeme">
                                <h1>Log In</h1>
                            </div>
                            <ul class="breadcrumb">
                                <li><a href="index.html">Home</a></li>
                                <li>Log In</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="login-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">

                    <form method="POST" action="{{ route('admin.login') }}">
                        @csrf

                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <h2>Log In</h2>
                            </div>

                            <div class="col-md-12">
                                <div class="md-form">
                                    <label>Username or Email <span>*</span></label>
                                    <input type="text" name="login" class="form-control"
                                        placeholder="Username or Email" value="{{ old('login') }}" required>
                                    @error('login')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="md-form">
                                    <label>Password <span>*</span></label>
                                    <input type="password" name="password" class="form-control" placeholder="Password"
                                        required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="md-form">
                                    <input type="checkbox" id="remember" name="remember">
                                    <label for="remember" class="checked">Remember Me</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="md-form">
                                    <button type="submit" class="btn btn-primary">
                                        Login <i class="fa fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <p><a href="#">Lost your Password?</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
