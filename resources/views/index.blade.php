@extends('layout.main')

@section('content')
    
<div class="row">
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
                        <h4>
                            Anda belum terdaftar bimbel. Klik menu "Bimbel" untuk memilih kelas bimbel yang tersedia.
                        </h4>
                    @else
                        <h4>
                           
                            Anda telah terdaftar pada bimbel : {{ $transaksi->course->title }}<br><br>
                            Klik menu "My Class" untuk melihat kelas bimbel Anda.
                        </h4>
                    @endif
                @endif
            @endauth
        </div>
    </div>
</div>
@endsection