@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Post</h1>
    </div>

    <div class="col-lg-8">
        <form method="POST" action="/dashboard/posts" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input autofocus required name="title" value="{{ old("title") }}" type="text" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="emailHelp">
              @error('title')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="slug" class="form-label">Slug</label>
              <input name="slug" required type="text" value="{{ old("slug") }}" class="form-control @error('slug') is-invalid @enderror" id="slug" aria-describedby="emailHelp">
              @error('slug')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="category" class="form-label">Category</label>
              <select class="form-select" name="category_id" aria-label="Default select example">
                @foreach ($categories as $item)
                @if (old("category_id") == $item->id))
                  <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                @else
                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endif
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="formFile" class="form-label">Post Image</label>
              <img class="img-preview img-fluid col-sm-6 mb-3" alt="">
              <input onchange="previewImage()" class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
              @error('image')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="category" class="form-label">Body</label>
              @error('body')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
              <input id="body" type="hidden" name="body" value="{{ old("body") }}">
              <trix-editor input="body"></trix-editor>
            </div>
            
            
            <button type="submit" class="btn btn-primary">Create Post</button>
          </form>
    </div>

    <script>
        const title = document.querySelector("#title");
        const slug = document.querySelector("#slug");

        title.addEventListener("change", function(){
            let value = title.value;
            fetch(`/dashboard/posts/checkSlug?title=${value}`)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        })

        document.addEventListener("trix-file-accept", function(e){
          e.preventDevault();
        })

        function previewImage(){
          let image = document.querySelector("#image")
          let imgPreview = document.querySelector(".img-preview")

          imgPreview.style.display = "block";

          const oFReader = new FileReader()
          oFReader.readAsDataURL(image.files[0])
          
          oFReader.onload = function(orFREvent){
            imgPreview.src = orFREvent.target.result
          }
        }
    </script>
@endsection