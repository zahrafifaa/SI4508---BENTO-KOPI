@extends('layout/main')


@section('isiPage')
    <h1 class="mt-4">Detail {{ $item->nama }}</h1>
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
            </div>
            <p>{!! $item->deskripsi !!}</p>
        </div>
    </div><!-- /.row -->
@endsection
