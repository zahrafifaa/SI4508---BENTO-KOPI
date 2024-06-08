@extends('dashboard.layout.main')
@section('isiDashboard')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Edit Artikel</h4>
                    <form action="{{ route('admin.artikel.update', $item->id) }}" method="post" enctype="multipart/form-data">
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
                        <div class='form-group'>
                            <label for='kategori_artikel_id'>Kategori Artikel</label>
                            <select name='kategori_artikel_id' id='kategori_artikel_id'
                                class='form-control @error('kategori_artikel_id') is-invalid @enderror'>
                                <option value='' selected disabled>Pilih Kategori Artikel</option>
                                @foreach ($data_kategori as $kategori)
                                    <option @selected($kategori->id == $item->kategori_artikel_id) value='{{ $kategori->id }}'>{{ $kategori->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kategori_artikel_id')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='deskripsi_singkat' class='mb-2'>Deskripsi Singkat</label>
                            <textarea name='deskripsi_singkat' id='deskripsi_singkat' cols='30' rows='3'
                                class='form-control @error('deskripsi_singkat') is-invalid @enderror'>{{ $item->deskripsi_singkat ?? old('deskripsi_singkat') }}</textarea>
                            @error('deskripsi_singkat')
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
                            <a href="{{ route('admin.artikel.index') }}" class="btn btn-warning">Batal</a>
                            <button class="btn btn-primary">Update Artikel</button>
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