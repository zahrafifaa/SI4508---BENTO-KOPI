@extends('dashboard.layout.main')
@section('isiDashboard')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-3">Kategori Artikel</h4>
                        <a href="{{ route('admin.kategori-artikel.create') }}" class="btn my-2 mb-3 py-2 btn-primary">Tambah
                            Kategori Artikel</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table dtTable table-hover w-100 nowrap">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>
                                            <a href="{{ route('admin.kategori-artikel.edit', $item->id) }}"
                                                class="btn btn-sm py-2 btn-info">Edit</a>
                                                <form action="{{ route('admin.kategori-artikel.destroy', $item->id) }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-sm py-2 btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">Hapus</button>
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