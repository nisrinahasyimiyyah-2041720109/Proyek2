@extends('layout.main')

@section('content')

  <!-- Modal -->
  <div class="modal fade " id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="orderModalLabel">Pembayaran</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="hide modal-body">
          Terima kasih telah memesan, silahkan melakukan melakukan pembayaran
        </div>
        <div class="purchase modal-body" style="display: none;">
            Silahkan Mengirimkan bukti Transfer
            <form action="">

            </form>
          </div>
        <div class="hide modal-footer">
            <form action="">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Pay Later</button>
            </form>
             <button type="button" class="btn btn-primary" value="purchase" id="hide">Pay Now</button>
        </div>

        <div class="purchase modal-footer" style="display: none;">
            <form action="">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
      </div>
    </div>
  </div>

<h1 class="mt-3 mb-3 text-center text-light">
    <b> Course Detail </b>
</h1>

<div class="container mt-3 mb-3">
    <div class="row justify-content-center align-items-center">
        <div class="card"  style="width: 30rem;">
            <img src="{{ asset('storage/' . $course->photo) }}" class="card-img-top" alt="{{ $course->nama }}">
            <div class="card-header">
                <b>{{ $course->title }}</b>
            </div>
            <div class="card body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Kategori : </b>{{ $course->category->name }}</li>
                    <li class="list-group-item"><b>Requirment :  </b>{{ $course->requirment }}</li>
                    <li class="list-group-item"><b>Outcome : </b>{{ $course->outcome }}</li>
                    <li class="list-group-item"><b>Deskripsi : </b>{{ $course->deskripsi }}</li>
                    <li class="list-group-item"><b>Harga : </b>Rp.{{ $course->harga }}</li>
                    <li class="list-group-item"><b>Pertemuan : </b>kosong</li>
            </div>

            <div class="card-footer text-muted">
                <a class="btn btn-danger my-2" href="/course"><i class="bi bi-arrow-bar-left me-2"></i>kembali</a>
                @auth
                <button type="button" class="btn btn-success my-2 float-end" data-bs-toggle="modal" data-bs-target="#orderModal">
                    <i class="bi bi-bag-plus me-1"></i>
                    Order Now
                  </button>
                  @endauth
              </div>
            
        </div>
    </div>
    <script>
    $(document).ready(function(){
    $("#hide").click(function(){
    $(".purchase").show();
    $(".hide").hide();
        });
    });
    </script>
</div>



@endsection