@extends('dashboard.layout.main')
@section('isiDashboard')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-3">Lowongan</h4>
                        <a href="{{ route('admin.lowongan.create') }}" class="btn my-2 mb-3 py-2 btn-primary">Tambah
                            Lowongan</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table dtTable table-hover nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Tanggal Buka</th>
                                    <th>Tanggal Tutup</th>
                                    <th>Status</th>
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
                                        <td>{{ $item->judul }}</td>
                                        <td>{{ $item->tanggal_buka->translatedFormat('d F Y') }}</td>
                                        <td>{{ $item->tanggal_tutup->translatedFormat('d F Y') }}</td>
                                        <td>{!! $item->status !!}</td>
                                        <td>
                                            <a href="{{ route('admin.lowongan.edit', $item->id) }}"
                                                class="btn btn-sm py-2 btn-info">Edit</a>
                                                <form action="{{ route('admin.lowongan.destroy', $item->id) }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-sm py-2 btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus lowongan ini?');">Hapus</button>
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