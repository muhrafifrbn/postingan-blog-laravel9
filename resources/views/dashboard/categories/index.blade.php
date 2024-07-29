@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Post Categories</h1>
</div>
@if (session("sukses"))
<div class="alert alert-success col-lg-6" role="alert">
  {{ session("sukses") }}
</div>
@endif
<div class="table-responsive col-lg-6">
  <a href="/dashboard/category/create" class="btn btn-primary mb-3">Create New Category</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Category Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $item)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->name }}</td>
       
        <td>
          <a href="/dashboard/category/{{ $item->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
          <a href="/dashboard/category/{{ $item->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
          <form action="/dashboard/category/{{ $item->slug }}" class="d-inline" method="post">
            @method("delete")
            @csrf
            <button onclick="return confirm('Apakah Data Dihapus?')" class="badge bg-danger border-0"><span data-feather="x-circle"></span></button>
          </form>
        </td>
      </tr>
          
      @endforeach
    </tbody>
  </table>
</div>
@endsection