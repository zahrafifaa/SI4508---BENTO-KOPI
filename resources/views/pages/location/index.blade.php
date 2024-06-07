@extends('layout/main')


@section('isiPage')
    <div class="row mb-3">
        <div class="col-md">
            <h1 class="text-left">Lokasi</h1>
        </div>
        <div class="col-md align-self-center">
            <form action="">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukan keyword pencarian"
                        aria-label="Masukan keyword pencarian" aria-describedby="button-addon2" name="q"
                        value="{{ request('q') }}">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" style="border-radius: 0" type="submit"
                            id="button-addon2">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Three columns of text below the carousel -->
    @if (request('q'))
        <div class="row mb-3">
            <div class="col-md">
                <h5 class=""><i>Hasil Pencarian "{{ request('q') }}"</i></h5>
            </div>
        </div>
    @endif
    <div class="row">
        @forelse ($items as $item)
            <div class="col-lg-4">
                <div class="branch-box">
                    <h2>{{ $item->nama }}</h2>
                    <p>Jam Operasional: {{ $item->jam_buka }} – {{ $item->jam_tutup }}</p>
                    <div class="text-center">
                        <img src="{{ $item->gambar() }}" alt="{{ $item->nama }}"
                            class="
                        img-fluid">
                    </div>
                    <br><br>
                    <a href="{{ route('location.show', $item->id) }}" class="btn">Explore More</a>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="text-center">Data Tidak Ditemukan!</div>
            </div>
        @endforelse
    </div><!-- /.row -->
@endsection