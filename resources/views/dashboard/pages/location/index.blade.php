@extends('dashboard.layout.main')
@section('isiDashboard')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-3">Location</h4>
                        <a href="{{ route('admin.location.create') }}" class="btn my-2 mb-3 py-2 btn-primary">Tambah
                            Location</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table dtTable table-hover nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Gambar</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Jam Buka</th>
                                    <th>Jam Tutup</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ $item->gambar() }}" class="img-fluid" style="max-height: 80px"
                                                alt="">
                                        </td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->jam_buka }}</td>
                                        <td>{{ $item->jam_tutup }}</td>
                                        <td>
                                            <a href="{{ route('admin.location.edit', $item->id) }}"
                                                class="btn btn-sm py-2 btn-info">Edit</a>
                                                <form action="{{ route('admin.location.destroy', $item->id) }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-sm py-2 btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus lokasi ini?');">Hapus</button>
                                                </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
