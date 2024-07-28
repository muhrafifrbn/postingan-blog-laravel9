
{{-- @dd($item) --}}

@extends('layouts.main')

@section('container')
@php
    $test = "<h1 style='color:red;'>Hello World</h1>";
@endphp
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="md-col-8">
                <h1><a class="text-decoration-none text-dark" href="{{ $item['slug'] }}" >{{ $item['title'] }}</a></h1>
                <h5>By <a href="#" class="text-decoration-none text-dark>"> {{ $item->user->name }}</a> in <a href="/posts?category={{ $item->category->slug }}">{{ $item->category->name }}</a></h5>
                @if ($item->image)
                <img style="width: 450px" src="{{ asset("storage/$item->image") }}"  class=" mt-3 card-img-top img-fluid" alt="...">   
                @else
                <img src="https://picsum.photos/seed/computer/1200/400"  class=" mt-3 card-img-top img-fluid" alt="...">
                @endif
               <article class="my-3 fs-5"> {!! $item->body !!}</article>
            <a href="/blog" class="d-block mt-3">Kembali</a>
        </div>
    </div>
</div>


@endsection