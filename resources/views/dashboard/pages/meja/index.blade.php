@extends('dashboard.layout.main')
@section('isiDashboard')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-3">Meja</h4>
                        <a href="{{ route('admin.meja.create') }}" class="btn my-2 mb-3 py-2 btn-primary">Tambah
                            Meja</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table dtTable table-hover w-100 nowrap">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Jenis</th>
                                    <th>Kode</th>
                                    <th>Jumlah Maksimal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->jenis }}</td>
                                        <td>{{ $item->kode }}</td>
                                        <td>{{ $item->jumlah_maksimal }}</td>
                                        <td>
                                            @if ($item->status == 0)
                                                <span class="badge badge-success">Tersedia</span>
                                            @else
                                                <span class="badge badge-danger">Tidak Tersedia</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.meja.edit', $item->id) }}"
                                                class="btn btn-sm py-2 btn-info">Edit</a>
                                            <form action="javascript:void(0)" method="post" class="d-inline"
                                                id="formDelete">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btnDelete btn-sm py-2 btn-danger"
                                                    data-action="{{ route('admin.meja.destroy', $item->id) }}">Hapus</button>
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
