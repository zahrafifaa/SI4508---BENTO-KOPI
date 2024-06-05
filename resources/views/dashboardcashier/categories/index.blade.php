@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Posts Categories</h1>
</div>

<div class="table-responsive col-lg-10">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Category</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
            
        
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $category->title }}</td>
          <td>
            <a href="/dashboard/categories/{{ $category->slug }}" class="badge bg-info"><i class="bi bi-eye"></i></span></a>
            <a href="" class="badge bg-warning"><i class="bi bi-dash-square"></i></span></a>
            <a href="" class="badge bg-danger"><i class="bi bi-x-circle"></i></span></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection