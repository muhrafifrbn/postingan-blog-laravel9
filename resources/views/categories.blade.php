{{-- @dd($test); --}}


@extends('layouts.main')
   
@section('container')
    <h2>Post Categories</h2>
    <div class="container">
        <div class="row">
            @foreach ($body as $item)
            <div class="col-md-4">
                <a href="/categories/{{ $item->slug }}">
                    <div class="card bg-dark text-white">
                        <img src="https://picsum.photos/seed/computer/500/500" class="card-img" alt="...">
                        <div class="p-0 card-img-overlay d-flex align-items-center ">
                          <h5 class="card-title text-center flex-fill p-2" style="background-color: rgba(0, 0,0, 0.7)">{{ $item->name }}</h5>
                        </div>
                      </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    
@endsection
