@extends('layout/main')


@section('isiPage')
    <h1>Ajukan Kolaborasi</h1>
    <form class="needs-validation" novalidate action="{{ route('kolaborasi.proses') }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class='form-group mb-3'>
            <label for='gambar' class='mb-2'>Gambar</label>
            <input type='file' name='gambar' id='gambar' class='form-control @error('gambar') is-invalid @enderror'
                value='{{ old('gambar') }}'>
            @error('gambar')
                <div class='invalid-feedback'>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class='form-group mb-3'>
            <label for='nama' class='mb-2'>Nama</label>
            <input type='text' name='nama' id='nama' class='form-control @error('nama') is-invalid @enderror'
                value='{{ old('nama') }}'>
            @error('nama')
                <div class='invalid-feedback'>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class='form-group mb-3'>
            <label for='deskripsi_singkat' class='mb-2'>Deskripsi Singkat</label>
            <textarea name='deskripsi_singkat' id='deskripsi_singkat' cols='30' rows='3'
                class='form-control @error('deskripsi_singkat') is-invalid @enderror'>{{ old('deskripsi_singkat') }}</textarea>
            @error('deskripsi_singkat')
                <div class='invalid-feedback'>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class='form-group mb-3'>
            <label for='deskripsi' class='mb-2'>Deskripsi</label>
            <textarea name='deskripsi' id='deskripsi' cols='30' rows='3'
                class='form-control @error('deskripsi') is-invalid @enderror'>{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <div class='invalid-feedback'>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class='form-group mb-3'>
            <label for='email' class='mb-2'>Email</label>
            <input type='text' name='email' id='email' class='form-control @error('email') is-invalid @enderror'
                value='{{ old('email') }}'>
            @error('email')
                <div class='invalid-feedback'>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class='form-group mb-3'>
            <label for='nomor' class='mb-2'>Nomor HP</label>
            <input type='tel' name='nomor' id='nomor' class='form-control @error('nomor') is-invalid @enderror'
                value='{{ old('nomor') }}'>
            @error('nomor')
                <div class='invalid-feedback'>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <hr class="my-4">

        <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to Buat Kolaborasi</button>
    </form>
@endsection
@push('scripts')
    @if (session('success'))
        <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2500
            });
        </script>
    @endif
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script>
        $(function() {
            ClassicEditor
                .create(document.querySelector('#deskripsi'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        })
    </script>
@endpush
