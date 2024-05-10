@extends('layout/main')


@section('isiPage')
    <h1>Ajukan Kolaborasi</h1>
    <form class="needs-validation" novalidate action="{{ route('kolaborasi.proses') }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class='form-group mb-3'>
<<<<<<< HEAD
=======
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
>>>>>>> 630fbcd5d5a9fd211ed9803f393c87f3367593e2
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
<<<<<<< HEAD
            <label for='organisasi' class='mb-2'>Organisasi</label>
            <input type='text' name='organisasi' id='organisasi' class='form-control @error('organisasi') is-invalid @enderror'
                value='{{ old('organisasi') }}'>
            @error('organisasi')
                <div class='invalid-feedback'>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class='form-group mb-3'>
            <label for='jabatan' class='mb-2'>Jabatan</label>
            <input type='text' name='jabatan' id='jabatan' class='form-control @error('jabatan') is-invalid @enderror'
                value='{{ old('jabatan') }}'>
            @error('jabatan')
                <div class='invalid-feedback'>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class='form-group mb-3'>
=======
>>>>>>> 630fbcd5d5a9fd211ed9803f393c87f3367593e2
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
<<<<<<< HEAD
            <label for='tanggal' class='mb-2'>Tanggal Kolaborasi</label>
            <input type='date' name='tanggal' id='tanggal'
                class='form-control @error('tanggal') is-invalid @enderror'
                value='{{ old('tanggal') }}'>
            @error('tanggal')
                <div class='invalid-feedback'>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class='form-group mb-3'>
            <label for='surat' class='mb-2'>Surat</label>
            <input type='file' name='surat' id='surat' class='form-control @error('surat') is-invalid @enderror'
                value='{{ old('surat') }}'>
            @error('surat')
=======
            <label for='deskripsi' class='mb-2'>Deskripsi</label>
            <textarea name='deskripsi' id='deskripsi' cols='30' rows='3'
                class='form-control @error('deskripsi') is-invalid @enderror'>{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
>>>>>>> 630fbcd5d5a9fd211ed9803f393c87f3367593e2
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
<<<<<<< HEAD
            <label for='nomor' class='mb-2'>Nomor HP</label>
            <input type='integer' name='nomor' id='nomor' class='form-control @error('nomor') is-invalid @enderror'
                value='{{ old('nomor') }}'>
            @error('nomor')
=======
            <label for='password' class='mb-2'>Password</label>
            <input type='password' name='password' id='password'
                class='form-control @error('password') is-invalid @enderror' value='{{ old('password') }}'>
            @error('password')
                <div class='invalid-feedback'>
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class='form-group mb-3'>
            <label for='password_confirmation' class='mb-2'>Konfirmasi Password</label>
            <input type='password' name='password_confirmation' id='password_confirmation'
                class='form-control @error('password_confirmation') is-invalid @enderror'
                value='{{ old('password_confirmation') }}'>
            @error('password_confirmation')
>>>>>>> 630fbcd5d5a9fd211ed9803f393c87f3367593e2
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
