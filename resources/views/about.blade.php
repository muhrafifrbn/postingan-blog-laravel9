@extends('layouts.main')

@section('container')
    <h1>Halaman About</h1>
    <h3>{{ $nama }}</h3>
    <p>{{ $email }}</p>
    <img src="img/<?= $image ?>" alt="Gambar Mobil" width="250" class="img-thumbnail">
@endsection