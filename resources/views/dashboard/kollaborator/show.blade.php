@extends('dashboard.layout.main')

@section('isiDashboard')
    <div class="d-flex pt-3 poppins">
        <p>
            <a href="{{ url('/dashboard/kolaborator') }}" class="text-black" style="text-decoration:none;">Kolaborator > </a>
            <a href="{{ route('kollab', $kolaborasi->id) }}" class="text-black" style="text-decoration:none;">{{ $kolaborasi->Judul }} ></a>
        </p>
    </div>
    <div   div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $kolaborasi->Judul }}</h1>
    </div>

    <div class='d-flex justify-content-center'>
        @if ($kolaborasi->Gambar)
            <img src="{{ asset('storage/' . $kolaborasi->Gambar) }}" alt="Kolaborasi" style="width:30rem; height:20rem;" >
        @else
            <img src="https://images.pexels.com/photos/3184639/pexels-photo-3184639.jpeg?cs=srgb&dl=pexels-fauxels-3184639.jpg&fm=jpg
        @endif
    </div>

    <div class='d-flex flex-column pt-3'>
        <p class='text-center'>{{ $kolaborasi->Tanggal }}</p>
        <h6 class="text-center"> {{ $kolaborasi->Detail }}</h6>
    </div>

@endsection

