@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Tambah Meja</h4>
                    <form action="{{ route('admin.meja.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class='form-group'>
                            <label for='jenis'>Jenis</label>
                            <select name='jenis' id='jenis' class='form-control @error('jenis') is-invalid @enderror'>
                                <option value='' selected disabled>Pilih Jenis</option>
                                <option @selected(old('jenis') === 'Smoking Area') value="Smoking Area">Smoking Area</option>
                                <option @selected(old('jenis') === 'No Smoking Area') value="No Smoking Area">No Smoking Area</option>
                            </select>
                            @error('jenis')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class='form-group mb-3'>
                            <label for='kode' class='mb-2'>Kode</label>
                            <input type='text' name='kode' id='kode'
                                class='form-control @error('kode') is-invalid @enderror' value='{{ $getNewCode }}'
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
                                value='{{ old('jumlah_maksimal') }}'>
                            @error('jumlah_maksimal')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group text-right">
                            <a href="{{ route('admin.meja.index') }}" class="btn btn-warning">Batal</a>
                            <button class="btn btn-primary">Tambah Meja</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
