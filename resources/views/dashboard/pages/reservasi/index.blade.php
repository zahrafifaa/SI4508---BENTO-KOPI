@extends('dashboard.layout.main')
@section('isiDashboard')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-3">Reservasi</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table dtTable table-hover nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Nomor Telepon</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Jumlah Pengunjung</th>
                                    <th>Meja</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kode }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->nomor_telepon }}</td>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>{{ $item->jam }}</td>
                                        <td>{{ $item->jumlah_pengunjung }}</td>
                                        <td>
                                            @foreach ($item->details as $detail)
                                                <span class="badge text-bg-info mb-2">
                                                    {{ $detail->meja->kode . ' | ' . $detail->meja->jenis . ' (' . $detail->meja->jumlah_maksimal . ' Orang)' }}</span><br>
                                            @endforeach
                                        </td>
                                        <td>{{ $item->status() }}</td>
                                        <td>
                                            @if ($item->status == 0)
                                                <a href="{{ route('admin.reservasi.acc', [
                                                    'id' => $item->id,
                                                    'status' => 1,
                                                ]) }}"
                                                    class="btn btn-sm py-2 btn-success">Set Setuju</a>
                                                <a href="{{ route('admin.reservasi.acc', [
                                                    'id' => $item->id,
                                                    'status' => 2,
                                                ]) }}"
                                                    class="btn btn-sm py-2 btn-danger">Set Tolak</a>
                                            @elseif($item->status == 1)
                                                <a href="{{ route('admin.reservasi.acc', [
                                                    'id' => $item->id,
                                                    'status' => 2,
                                                ]) }}"
                                                    class="btn btn-sm py-2 btn-danger">Set Tolak</a>
                                                <a href="{{ route('admin.reservasi.acc', [
                                                    'id' => $item->id,
                                                    'status' => 3,
                                                ]) }}"
                                                    class="btn btn-sm py-2 btn-success">Selesai</a>
                                            @elseif($item->status == 2)
                                                <a href="{{ route('admin.reservasi.acc', [
                                                    'id' => $item->id,
                                                    'status' => 1,
                                                ]) }}"
                                                    class="btn btn-sm py-2 btn-success">Set Setuju</a>
                                            @endif
                                            @if ($item->status == 0 || $item->status == 3)
                                                <form action="{{ route('admin.reservasi.destroy', $item->id) }}" method="POST" class="d-inline" id="formDelete">
                                                    @csrf 
                                                    @method('DELETE')
                                                    <button class="btn btnDelete btn-sm py-2 btn-danger">Hapus</button>
                                                </form>
                                            @else
                                                <form action="javascript:void(0)" method="post" class="d-inline" id="formDelete">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm py-2 btn-danger disabled" disabled>Hapus</button>
                                                </form>
                                            @endif
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