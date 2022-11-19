@extends('layout.main')

@section('content')


{{-- <h1 class="mt-3 mb-3 text-center text-light">
    <b> {{ $transaksi->course->title }} Bimbel </b>
</h1> --}}

<div class="container my-3"> 
    <div class="row justify-content-center align-items-center">
        <div class="card Mycourse"  style="width: 100%;">
            <h2 class="me-3 my-3"> Kelas {{ $transaksi->course->category->name }} : {{ $transaksi->course->title }}</h2>
        </div>
    </div>
    <div class="row justify-content-center align-items-center mt-1">
        <div class="card Mycourse"  style="width: 100%;">
            <div class="row justify-content-center align-items-center my-2">
                <div class="card "  style="width: 95%; border-radius:10px">
                    <div style="width:100%; display: block; margin-left: auto; margin-right: auto;  overflow:hidden" class="my-2">
                        <img src="{{ asset('images/thumbnail.png') }}" class="card-img-top" alt="{{ $transaksi->course->title }}">
                    </div>
                    <hr>
                    <div class="justify-content-center align-items-center">
                         <h3 class="my-1 text-center"><b> Kelas {{ $transaksi->course->category->name }} : {{ $transaksi->course->title }}</b></h3>
                    </div>
                    <hr>
                    <div>
                        <p>Halo rekan FAST, Selamat berjumpa pada pembelajaran bimbel FAST. Pada proses pembelajaran diharapkan dapat memberikan pengetahuan dan keterampilan dalam mata pelajaran yang akan di berikan. Pada setiap pertemun rekan-rekan akan diberikan materi dan juga tugas untuk melatih kemampuan kalian semua. </p>
                    </div>
                </div>
            </div>
            @foreach ($materi as $m)
                <hr>
                <div class="row justify-content-center align-items-center mb-4 ">
                    <h3 class="ms-2">{{ $m->subject }}</h3>
                    <div class="card" style="width: 95%; border-radius:10px">
                        <div class="pertemuan justify-content-center align-items-center display-flex">
                            @if ($m->pdf == null)
                                <h4 class="my-3 ms-4 text-secondary">Belum tersedia.</h4>
                            @else
                            
                                <a href="{{ asset('storage/' . $m->pdf) }}"><h4 class="my-3 ms-4"><i class="menu-icon mdi mdi-file-pdf mdi-36px icon-red me-2"></i>{{ $m->subject }}</h4></a>
                                <a href="/tugas/{{ $m->id }}"><h4 class="my-3 ms-4"><i class="menu-icon mdi mdi-file-send mdi-36px icon-blue me-2"></i>Tugas</h4></a>
                            @endif
                           
                        </div>
                    </div>
                </div>                
            @endforeach

            {{-- <hr>
            <div class="row justify-content-center align-items-center mb-4 ">
                <h3 class="ms-2">Pertemuan 2</h3>
                <div class="card" style="width: 95%; border-radius:10px">
                    <div class="pertemuan justify-content-center align-items-center display-flex">
                           
                    </div>
                </div>
            </div> --}}
            
        </div>
    </div>
</div>
@endsection