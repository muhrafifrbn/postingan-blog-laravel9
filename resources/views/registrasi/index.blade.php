@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
  <div class="col-md-5">
    <main class="form-signin">
      <h1 class="h3 mb-3 fw-normal text-center">Please Registrasi</h1>
      <form action="/register" method="POST">
        @csrf
        <div class="form-floating">
          <input value="{{ old("name") }}" type="text" class="form-control @error("name") is-invalid @enderror" name="name" id="name" placeholder="name">
          <label for="name">Nama</label>
          @error("name")
            <div  class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating">
          <input value="{{ old("username") }}" type="text" class="form-control @error("username") is-invalid @enderror" name="username" id="username" placeholder="username">
          <label for="username">Username</label>
          @error("username")
          <div  class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating">
          <input value="{{ old("email") }}" type="email" name="email" class="form-control @error("email") is-invalid @enderror" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
          @error("email")
          <div  class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" class="form-control @error("password") is-invalid @enderror" name="password" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
          @error("password")
          <div  class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Registrasi</button>
      </form>
      <small class="d-block text-center mt-3">Login ? <a href="/login">Silahkan Login</a></small>
    </main>
  </div>
</div>

  
@endsection