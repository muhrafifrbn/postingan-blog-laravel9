{{-- @dd($blogs); --}}


@extends('layouts.main')
{{-- @dd(request("category")) --}}
@section('container')
    <h1 class="mb-3 text-center">{{ $title }}</h1>
    <div class="container">
      <div class="row mb-4 justify-content-center">
        <div class="col-md-6">
          <form action="/posts">
            @if (request("category"))
                <input type="hidden" name="category" value="{{ request("category") }}">
            @endif
            @if (request("author"))
                <input type="hidden" name="author" value="{{ request("author") }}">
            @endif
            <div class="input-group mb-3">
              <input type="text" name="search" class="form-control" placeholder="Search Post..." aria-label="Recipient's username" aria-describedby="button-addon2" value="{{ request("search") }}">
              <button class="btn btn-danger" type="submit" id="button-addon2">Search</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    @if ($posts->count())
    <div class="card mb-3 text-center text-decoration-none">
              @if ($posts[0]->image)
                <img style="height: 500px" src="{{ asset("storage/".$posts[0]->image) }}"  class=" mt-3 card-img-top img-fluid" alt="...">   
                @else
                <img src="https://picsum.photos/seed/computer/1200/400"  class="card-img-top" alt="...">
                @endif
        <div class="card-body">
          <h5 class="card-title" class=""><a href="/posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->title }}</a></h5>
         <p> <small class="text-muted">
            <h5>By <a href="/authors/{{ $posts[0]->user->username }}" class="text-decoration-none text-dark>"> {{ $posts[0]->user->name }}</a> in <a href="/posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}</h5>
          </small></p>
          <p class="card-text">{{ $posts[0]->excerpt }}</p>
          <a class="text-decoration-none text-dark btn btn-primary text-white" href="/post/{{ $posts[0]->slug }}" >Read More...</a>
        </div>
      </div>
    

    <div class="container">
        <div class="row align-items-center">
          @foreach ($posts->skip(1) as $post)
          <div class="col-md-4 mb-3">
            <div class="card">
                <div style=" background-color: rgba(0, 0, 0, 0.7)" class="position-absolute px-3 py-2 text-white"><a style="text-decoration: none; color:white"href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></div>
                @if ($post->image)
                <img src="{{ asset("storage/".$post->image) }}"  class="card-img-top" alt="...">
                @else
                <img src="https://picsum.photos/seed/computer/500/400"  class="card-img-top" alt="...">
                @endif
                
                <div class="card-body">
                  <h5 class="card-title" ><a href="/post/{{ $posts[0]->slug }}">{{ $post['title'] }}</a></h5>
                  <p> <small class="text-muted">
                    <h5>By <a href="/posts?author={{ $post->user->username }}" class="text-decoration-none text-dark>"> {{ $post->user->name }}</a> in <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a> {{ $post->created_at->diffForHumans() }}</h5>
                  </small></p>
                  <p class="card-text">{{ $post->excerpt }}</p>
                  <a href="/post/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                </div>
              </div>
        </div>
          @endforeach
        </div>
    </div>
    @else
    <p class="text-center fs-4">Post Not Found</p>
    @endif

    @if ($posts->count() >= 7 || request("page"))
    <div class="d-flex justify-content-center">
      {{ $posts->links() }}
    </div>
    @endif
@endsection
