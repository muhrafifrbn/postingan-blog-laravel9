@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
  <div class="col-md-5">
    @if (session("sukses"))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
       {{ session("sukses") }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (session("loginError"))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
       {{ session("loginError") }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <main class="form-signin">
      <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
      <form action="/login" method="POST">
        @csrf
        <div class="form-floating">
          <input value="{{ old("email") }}" type="email" name="email" autofocus required class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
          @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" name="password" required class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
      </form>
      <small class="d-block text-center mt-3">Registrasi ? <a href="/register">Silahkan Registrasi</a></small>
    </main>
  </div>
</div>

  
@endsection