@extends('layout/main')


@section('isiPage')
    <h1 class="mt-4">Kolaborasi</h1>
    <div class="row mb-3 text-center">
        <div class="col-md-8 themed-grid-col"></div>
        <div class="col-md-4 themed-grid-col">
            <p>
                <a class="btn btn-secondary<?php echo $title == 'buatkolaborasi' ? 'active' : ''; ?>" href="{{ route('kolaborasi.create') }}"> + Ajukan
                    Kolaborasi</a>
            </p>
        </div>
    </div>
    <!-- Three columns of text below the carousel -->
    <div class="row">
        @foreach ($items as $item)
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mb-5">
                            <img class="bd-placeholder-img rounded-circle img-fluid" style="max-height:150px"
                                src="{{ $item->gambar() }}" alt="Placeholder">
                        </div>
<<<<<<< HEAD
                        <h2 class="fw-normal"> 
                            <strong>
                                {{ $item->Judul }}
                            </strong> 
                        </h2>
                        <p>{{ Str::limit($item->Detail, 100, '...') }}</p>
=======
                        <h2 class="fw-normal">{{ $item->nama }}</h2>
                        <p>{{ $item->deskripsi_singkat }}</p>
>>>>>>> 630fbcd5d5a9fd211ed9803f393c87f3367593e2
                        <p><a class="btn btn-secondary" href="{{ route('kolaborasi.show', $item->id) }}">View details
                                &raquo;</a></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div><!-- /.row -->
@endsection
