@extends('layout.dashboard.main')
@section('content')
   
  
  
  <div class="table-responsive col-lg-8 mx-5 mt-4">
    <table class="table table-striped table-sm">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Transaksi</h1>
      </div>
        @if (session()->has('success'))
      <div class="alert alert-success col-lg-12" role="alert">
        {{ session('success') }}
      </div>
      @endif
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Member</th>
          <th scope="col">course</th>
          <th scope="col">Bukti</th>
          <th scope="col">Verify</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($transaksi as $t)
        <!-- Modal -->
        <div class="modal fade " id="orderModal{{ $t->id }}" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                  <div class="modal-header">
                  <h5 class="modal-title" id="orderModalLabel">Bukti Pembayaran</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="card" >
                    <img src="{{ asset('storage/' . $t->bukti) }}" class="card-img-top" alt="{{ $t->course->title }}{{ $t->user->name  }}">
                  </div>                 
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin?')">Submit</button>
                  </div>
                  </form>
              </div>
          </div>
      </div>
        <tr>
          <td>{{ $t->id }}</td>
          <td>{{ $t->user->name }}</td>
          <td>{{ $t->course->title }}</td>
          <td>
            <img src="{{ asset('storage/' . $t->bukti) }}" alt="{{ $t->course->title }}{{ $t->user->name  }}">
          </td>
          <td>       
              @if( $t->verify  == 0)
              <form action="/verifyTransaksi" method="get" class="d-inline">
              @csrf
              <input type="hidden" name="id" value="{{ $t->id }}">
              <button type="submit" class="badge bg-warning border-0" >Verify</button>
              </form>

              @else
              <h4><span class="badge bg-success">verified</span></h4>

              @endif
            
          </td>
          <td>
            <a href="#orderModal{{ $t->id }}" data-bs-toggle="modal" class="badge bg-info"><span class="menu-icon mdi mdi-eye"></span></a>
            {{-- <a href="/admin/member/{{ $t->id }}/edit" class="badge bg-warning"><span class="menu-icon mdi mdi-circle-edit-outline"></span></a> --}}
            <form action="/admin/member/{{ $t->id }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Apakah anda yakin?')" ><span class="menu-icon mdi mdi-backspace"></button>
            </form>
          </td>
        </tr>
        @endforeach    
      </tbody>
    </table>
  </div>

@endsection