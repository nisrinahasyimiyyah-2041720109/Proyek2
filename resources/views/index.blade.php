@extends('layout.main')

@section('content')

<!-- Carousel Start -->
<div class="container-fluid p-0 mb-12">
        <div class="owl-carousel header-carousel position-fixed">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="images/background.png" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Lembaga Bimbingan Belajar Terbaik</h5>
                                <h1 class="display-3 text-white animated slideInDown">Fantastic Smart Institute</h1>
                                <p class="fs-5 text-white mb-4 pb-2">Fantastic Smart Institute merupakan lembaga bimbingan belajar untuk siswa SD
                                hingga SMP yang berada di Kecamatan Kedungpring, Kabupaten Lamongan, Jawa Timur</p>
                                @auth
                                    @if(auth()->user()->role == "member" )
                                        @if(auth()->user()->transaksi->count() == 0)
                                            <p class="fs-5 text-white mb-4 pb-2">
                                                Anda belum terdaftar bimbel. Klik menu "Bimbel" untuk memilih kelas bimbel yang tersedia.
                                            </p>
                                        @else
                                            <p class="fs-5 text-white mb-4 pb-2">
                                                Anda telah terdaftar pada bimbel : {{ $transaksi->course->title }}<br>
                                                Klik menu "My Class" untuk melihat kelas bimbel Anda.
                                            </p>
                                        @endif
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Carousel End -->


<!-- <div class="row">
    <div class="col ">
        <div class="profile">
            <h1 class="fw-bold">FAST</h1>
            <h3>
                Fantastic Smart Institute merupakan lembaga bimbingan belajar<br>untuk siswa SD
                hingga SMP yang berada di Kecamatan Kedungpring,<br>Kabupaten Lamongan, Jawa Timur
            </h3>
            @auth
                @if(auth()->user()->role == "member" )
                    @if(auth()->user()->transaksi->count() == 0)
                        <h3>
                            Anda belum terdaftar bimbel. Klik menu "Bimbel" untuk memilih kelas bimbel yang tersedia.
                        </h3>
                    @else
                        <h3>
                           
                            Anda telah terdaftar pada bimbel : {{ $transaksi->course->title }}<br><br>
                            Klik menu "My Class" untuk melihat kelas bimbel Anda.
                        </h3>
                    @endif
                @endif
            @endauth
        </div>
    </div>
</div> -->
@endsection