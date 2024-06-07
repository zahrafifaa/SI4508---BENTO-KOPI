@extends('layout/main')
@section('isiPage')
    <div class="container">
        <h1>Reservasi</h1><br>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('reservasi.cek') }}" method="">
                    <div class="row">
                        <div class="col-md">
                            <div class='form-group mb-3'>
                                <label for='nama' class='mb-2'>Nama</label>
                                <input type='text' name='nama' id='nama'
                                    class='form-control @error('nama') is-invalid @enderror' value='{{ old('nama') }}'>
                                @error('nama')
                                    <div class='invalid-feedback'>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class='form-group mb-3'>
                                <label for='nomor_telepon' class='mb-2'>Nomor Telepon</label>
                                <input type='text' name='nomor_telepon' id='nomor_telepon'
                                    class='form-control @error('nomor_telepon') is-invalid @enderror'
                                    value='{{ old('nomor_telepon') }}'>
                                @error('nomor_telepon')
                                    <div class='invalid-feedback'>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class='form-group mb-3'>
                                <label for='tanggal' class='mb-2'>Tanggal Reservasi</label>
                                <input type='date' name='tanggal' id='tanggal'
                                    class='form-control @error('tanggal') is-invalid @enderror' value='{{ old('tanggal') }}'
                                    min="{{ \Carbon\Carbon::now()->addDay(1)->format('Y-m-d') }}">
                                @error('tanggal')
                                    <div class='invalid-feedback'>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md">

                            <div class='form-group mb-3'>
                                <label for='jam' class='mb-2'>Waktu Reservasi</label>
                                <input type='time' name='jam' id='jam'
                                    class='form-control @error('jam') is-invalid @enderror' value='{{ old('jam') }}'>
                                @error('jam')
                                    <div class='invalid-feedback'>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class='form-group mb-3'>
                                <label for='jumlah_pengunjung' class='mb-2'>Jumlah Pengunjung</label>
                                <input type='number' name='jumlah_pengunjung' id='jumlah_pengunjung'
                                    class='form-control @error('jumlah_pengunjung') is-invalid @enderror'
                                    value='{{ old('jumlah_pengunjung') }}'>
                                @error('jumlah_pengunjung')
                                    <div class='invalid-feedback'>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <button class="btn btn-primary w-100">Cek Ketersediaan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
