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
                    @if ($t->progres == 0)
                        <a href="/myCourse/{{ $t->id }}" type="button" class="btn btn-primary my-2">
                            <i class="bi bi-caret-right-square me-1"></i>
                            Get Enroll
                        </a>
                    @elseif ($t->progres == $t->course->materi->count())
                        <h4><span class="badge bg-success"><i class="bi bi-check-circle me-2 d-inline"></i>Complete</span><h4>
                        <a href="/reset/{{ $t->id }}" type="button" class="btn btn-primary my-2 d-inline">
                            <i class="bi bi-arrow-repeat"></i>
                            Reset
                        </a>
                    @else
                        <a href="/myCourse/{{ $t->id }}" type="button" class="btn btn-primary my-2">
                            <i class="bi bi-caret-right-square me-1"></i>
                            Continue
                        </a>
                        <h4><span class="badge bg-warning text-black">Progres {{ ceil( $t->progres / $t->course->materi->count() * 100 ) }}%</span><h4>
                    @endif
                      
                </div>
            </div>
        @endif
    @endif
    @else
    <p class="text-light text-center fs-4">Produk masih belum tersedia.</p>
    @endif
    @endforeach

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            {{$transaksi->links()}}
        </ul>
    </nav>
</div>


@endsection