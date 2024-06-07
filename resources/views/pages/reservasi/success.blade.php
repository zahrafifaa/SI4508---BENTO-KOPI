@extends('layout/main')
@section('isiPage')
    <div class="container">
        <div class="row">
            <div class="col-md">
                <h3 class="mb-3">Detail Reservasi</h3>
                <table class="table">
                    <tr>
                        <th>Kode</th>
                        <td>:</td>
                        <td>{{ $item->kode }}</td>
                        <th>Status</th>
                        <td>:</td>
                        <td>{{ $item->status() }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>:</td>
                        <td>{{ $item->nama }}</td>
                        <th>Nomor Telepon</th>
                        <td>:</td>
                        <td>{{ $item->nomor_telepon }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>:</td>
                        <td>{{ $item->tanggal }}</td>
                        <th>Jam</th>
                        <td>:</td>
                        <td>{{ $item->jam }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Pengunjung</th>
                        <td>:</td>
                        <td>{{ $item->jumlah_pengunjung }} Orang</td>
                        <th>Meja</th>
                        <td>:</td>
                        <td>
                            @foreach ($item->details as $detail)
                                <span class="badge text-bg-secondary">
                                    {{ $detail->meja->kode . ' | ' . $detail->meja->jenis . ' (' . $detail->meja->jumlah_maksimal . ' Orang)' }}</span>
                                <br>
                            @endforeach
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
    <script>
        $(function() {
            $('#meja_id').select2({
                theme: 'bootstrap',
                placeholder: 'Pilih Meja'
            });
        })
    </script>
@endpush
