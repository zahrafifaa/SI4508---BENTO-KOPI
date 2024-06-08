@extends('dashboard.layout.main')
@section('isiDashboard')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Edit Kategori Artikel</h4>
                    <form action="{{ route('admin.kategori-artikel.update', $item->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <div class='form-group mb-3'>
                            <label for='nama' class='mb-2'>Nama <span class="text-danger">*</span></label>
                            <input type='text' name='nama' class='form-control @error('nama') is-invalid @enderror'
                                value='{{ $item->nama ?? old('nama') }}'>
                            @error('nama')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group text-right">
                            <a href="{{ route('admin.kategori-artikel.index') }}" class="btn btn-warning">Batal</a>
                            <button class="btn btn-primary">Update Kategori Artikel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection