@extends('dashboard.layouts.main')
@section('container')
    @php
    $test = "<h1 style='color:red;'>Hello World</h1>";
    @endphp
    <div class="container">
    <div class="row  my-5">
        <div class="col-lg-8">
                <h1><a class="text-decoration-none text-dark" href="{{ $post['slug'] }}" >{{ $post['title'] }}</a></h1>
                <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Kembali</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
                <form action="/dashboard/posts/{{ $post->slug }}" class="d-inline" method="post">
                @method("delete")
                @csrf
                <button onclick="return confirm('Apakah Data Dihapus?')" class="btn btn-danger border-0"><span data-feather="x-circle"></span>Delete</button>
                </form>

                @if ($post->image)
                <img style="width: 450px" src="{{ asset("storage/$post->image") }}"  class=" mt-3 card-img-top img-fluid" alt="...">   
                @else
                <img src="https://picsum.photos/seed/computer/1200/400"  class=" mt-3 card-img-top img-fluid" alt="...">
                @endif
            <article class="my-3 fs-5"> {!! $post->body !!}</article>
        
        </div>
    </div>
    </div>
@endsection