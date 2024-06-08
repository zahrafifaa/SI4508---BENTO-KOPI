@extends('dashboard.layout.main')
@section('isiDashboard')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Edit Lowongan</h4>
                    <form action="{{ route('admin.lowongan.update', $item->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
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
                            <label for='judul' class='mb-2'>Judul</label>
                            <input type='text' name='judul' class='form-control @error('judul') is-invalid @enderror'
                                value='{{ $item->judul ?? old('judul') }}'>
                            @error('judul')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='tanggal_buka' class='mb-2'>Tanggal Buka</label>
                            <input type='date' name='tanggal_buka' id='tanggal_buka'
                                class='form-control @error('tanggal_buka') is-invalid @enderror'
                                value='{{ $item->tanggal_buka->translatedFormat('Y-m-d') ?? old('tanggal_buka') }}'>
                            @error('tanggal_buka')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='tanggal_tutup' class='mb-2'>Tanggal Tutup</label>
                            <input type='date' name='tanggal_tutup' id='tanggal_tutup'
                                class='form-control @error('tanggal_tutup') is-invalid @enderror'
                                value='{{ $item->tanggal_tutup->translatedFormat('Y-m-d') ?? old('tanggal_tutup') }}'>
                            @error('tanggal_tutup')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group'>
                            <label for='status'>Status</label>
                            <select name='status' id='status'
                                class='form-control @error('status') is-invalid @enderror'>
                                <option value='' selected disabled>Pilih Status</option>
                                <option @selected($item->status == 0) value="0">Tidak Aktif</option>
                                <option @selected($item->status == 1) value="1">Aktif</option>
                            </select>
                            @error('status')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='deskripsi' class='mb-2'>Deskripsi</label>
                            <textarea name='deskripsi' id='deskripsi' cols='30' rows='3'
                                class='form-control @error('deskripsi') is-invalid @enderror'>{{ $item->deskripsi ?? old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group text-right">
                            <a href="{{ route('admin.lowongan.index') }}" class="btn btn-warning">Batal</a>
                            <button class="btn btn-primary">Update Lowongan</button>
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