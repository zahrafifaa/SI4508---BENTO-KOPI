@extends('layout/main')


@section('isiPage')
<<<<<<< HEAD
    <h1 class="mt-4">Detail {{ $item->Judul }}</h1>
=======
    <h1 class="mt-4">Detail {{ $item->nama }}</h1>
>>>>>>> 630fbcd5d5a9fd211ed9803f393c87f3367593e2
    <div class="row mb-3 text-center">
        <div class="col-md-8 themed-grid-col"></div>
        <div class="col-md-4 themed-grid-col">

        </div>
    </div>
    <!-- Three columns of text below the carousel -->
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="text-center mb-5">
                <img src="{{ $item->gambar() }}" class="img-fluid" style="max-height:320px" alt="">
<<<<<<< HEAD
            </div>   
            
            <div class='d-flex flex-column pt-3'>
                <p class='text-center'>{{ $item->Tanggal }}</p>
                <p class="text-center poppins"> {{ $item->Detail }}</p>
            </div>
=======
            </div>
            <p>{!! $item->deskripsi !!}</p>
>>>>>>> 630fbcd5d5a9fd211ed9803f393c87f3367593e2
        </div>
    </div><!-- /.row -->
@endsection
