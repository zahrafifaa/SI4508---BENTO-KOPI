@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Edit Meja</h4>
                    <form action="{{ route('admin.meja.update', $item->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class='form-group mb-3'>
                            <label for='jenis' class='mb-2'>Jenis</label>
                            <input type='text' name='jenis' id='jenis'
                                class='form-control @error('jenis') is-invalid @enderror' value='{{ $item->jenis }}'
                                readonly>
                            @error('jenis')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='kode' class='mb-2'>Kode</label>
                            <input type='text' name='kode' id='kode'
                                class='form-control @error('kode') is-invalid @enderror' value='{{ $item->kode }}'
                                readonly>
                            @error('kode')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='jumlah_maksimal' class='mb-2'>Jumlah Maksimal</label>
                            <input type='text' name='jumlah_maksimal' id='jumlah_maksimal'
                                class='form-control @error('jumlah_maksimal') is-invalid @enderror'
                                value='{{ $item->jumlah_maksimal ?? old('jumlah_maksimal') }}'>
                            @error('jumlah_maksimal')
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
                                <option @selected($item->status == 0) value='0'>Tersedia</option>
                                <option @selected($item->status == 1) value='1'>Tidak Tersedia</option>
                            </select>
                            @error('status')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group text-right">
                            <a href="{{ route('admin.meja.index') }}" class="btn btn-warning">Batal</a>
                            <button class="btn btn-primary">Edit Meja</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
