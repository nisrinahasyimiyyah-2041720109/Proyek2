@extends('layout.main')

@section('content')

<h1 class="my-5 text-center text-light">
    <b> My Course </b>
</h1>

<div class="container my-3">
    
    @foreach ($transaksi as $t)
    @if ($t->course->count())
    @if ($t->user_id == auth()->user()->id)
        @if ($t->verify == 1)
            <div class="row course align-items-center mb-3">
                <div class="col-auto">
                    {{-- <input type="checkbox" name="" id=""> --}}
                </div>
                <div class="col">
                    <div style="max-height: 500px; overflow:hidden" class="my-2">
                        <img src="{{ asset('storage/' . $t->course->photo) }}" class="card-img-top" alt="{{ $t->course->title }}">
                     </div>
                </div>
                <div class="col-6">
                    <p><b>Title : </b>{{ $t->course->title }}</p>
                    <p><b>Kategori : </b>{{ $t->course->category->name }}</p>
                    <p><b>Harga : </b>Rp.{{ $t->course->harga }}</p>
                    <p><b>Pertemuan : </b>{{ $t->course->materi->count()}} Pertemuan</p>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-primary my-2">
                        <i class="bi bi-caret-right-square me-1"></i>
                        Get Enroll
                      </button>
                </div>
            </div>
        @endif
    @endif
    @else
    <p class="text-light text-center fs-4">Produk masih belum tersedia.</p>
    @endif
    @endforeach
    
    
</div>


@endsection