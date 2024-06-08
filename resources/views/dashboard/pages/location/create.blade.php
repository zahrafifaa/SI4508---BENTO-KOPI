@extends('dashboard.layout.main')
@section('isiDashboard')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Tambah Location</h4>
                    <form action="{{ route('admin.location.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class='form-group mb-3'>
                            <label for='gambar' class='mb-2'>Gambar</label>
                            <input type='file' name='gambar' id='gambar'
                                class='form-control @error('gambar') is-invalid @enderror' value='{{ old('gambar') }}'>
                            @error('gambar')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='nama' class='mb-2'>Nama</label>
                            <input type='text' name='nama' class='form-control @error('nama') is-invalid @enderror'
                                value='{{ old('nama') }}'>
                            @error('nama')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='alamat' class='mb-2'>Alamat</label>
                            <textarea name='alamat' id='alamat' cols='30' rows='3'
                                class='form-control @error('alamat') is-invalid @enderror'>{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='fasilitas' class='mb-2'>Fasilitas</label>
                            <textarea name='fasilitas' id='fasilitas' cols='30' rows='3'
                                class='form-control @error('fasilitas') is-invalid @enderror'>{{ old('fasilitas') }}</textarea>
                            @error('fasilitas')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='jam_buka' class='mb-2'>Jam Buka</label>
                            <input type='time' name='jam_buka' id='jam_buka'
                                class='form-control @error('jam_buka') is-invalid @enderror' value='{{ old('jam_buka') }}'>
                            @error('jam_buka')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='jam_tutup' class='mb-2'>Jam Tutup</label>
                            <input type='time' name='jam_tutup' id='jam_tutup'
                                class='form-control @error('jam_tutup') is-invalid @enderror'
                                value='{{ old('jam_tutup') }}'>
                            @error('jam_tutup')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group text-right">
                            <a href="{{ route('admin.location.index') }}" class="btn btn-warning">Batal</a>
                            <button class="btn btn-primary">Tambah Location</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendors/summernote/dist/summernote.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('assets/vendors/summernote/dist/summernote.min.js') }}"></script>
    <script>
        $(function() {
            $('#deskripsi').summernote({
                height: 220
            });
        })
    </script>
@endpush
