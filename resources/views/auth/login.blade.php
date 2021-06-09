@extends('layouts.auth')

@section('title')
    <title>Login</title>
@endsection

@section('content')
<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-5 col-lg-12 col-md-9">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Welcome Back Admin!</h1>
                </div>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user {{ $errors->has('email') ? ' is-invalid' : '' }}"
                     name="email" placeholder="Email Address" value="{{ old('email') }}" autofocus required>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user {{ $errors->has('email') ? ' is-invalid' : '' }}"
                    name="password" placeholder="Password" required>
                  </div>
                @if (session('error'))
                    <div class="col-md-12">
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    </div>
                @endif
                    <button class="btn btn-primary btn-user btn-block mt-5">Login</button>
                    <div class="text-center mt-3">
                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                    </div>
                </form>
              </div>
        </div>
      </div>

    </div>

  </div>
  @endsection