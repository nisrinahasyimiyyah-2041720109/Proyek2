@extends('layout.dashboard.main')
@section('content')
   
  
  
  <div class="table-responsive col-lg-4 mx-5 mt-4">
    <a href="/admin/category/create" class="btn btn-primary mb-3">Tambah Kategori</a>
    <table class="table table-striped table-sm">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Member</h1>
      </div>
        @if (session()->has('success'))
      <div class="alert alert-success col-lg-12" role="alert">
        {{ session('success') }}
      </div>
      @endif
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Kategori</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($category as $c)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $c->name }}</td>
          <td>
            {{-- <a href="/admin/category/{{ $c->id }}" class="badge bg-info"><span class="menu-icon mdi mdi-eye"></span></a> --}}
            <a href="/admin/category/{{ $c->id }}/edit" class="badge bg-warning"><span class="menu-icon mdi mdi-circle-edit-outline"></span></a>
            <form action="/admin/category/{{ $c->id }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Apakah anda yakin?')" ><span class="menu-icon mdi mdi-backspace"></button>
            </form>
          </td>
        </tr>
        @endforeach    
      </tbody>
    </table>
    <div class="d-flex justify-content-center">
      {{ $category->links() }}
    </div>
  </div>

@endsection