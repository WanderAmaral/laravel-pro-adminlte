@extends('layouts.auth')

@section('body-class', 'login-page')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('login') }}"><b>Admin</b>LTE</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                @session('status')
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endsession
                <form action="{{ route('password.email') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email" value="{{ old('email') }}" />
                        <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!--begin::Row-->
                    <div class="row">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Send me the link</button>
                        </div>

                        <!-- /.col -->
                    </div>
                    <!--end::Row-->
                </form>

                <!-- /.social-auth-links -->
                <p class="mb-1 text-center"><a href="{{ route('login') }}">Back to login</a></p>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@endsection
