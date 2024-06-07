@extends('layout/main')
@section('isiPage')
    <div class="container">
        <div class="row">
            <div class="col-md">
                <table class="table">
                    <tr>
                        <th>Nama</th>
                        <td>:</td>
                        <td>{{ $data['nama'] }}</td>
                        <th>Nomor Telepon</th>
                        <td>:</td>
                        <td>{{ $data['nomor_telepon'] }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>:</td>
                        <td>{{ $data['tanggal'] }}</td>
                        <th>Jam</th>
                        <td>:</td>
                        <td>{{ $data['jam'] }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Pengunjung</th>
                        <td>:</td>
                        <td>{{ $data['jumlah_pengunjung'] }} Orang</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <h4>Pilih Meja</h4>
                <form action="{{ route('reservasi.submit') }}" method="post">
                    @csrf
                    <input type="text" hidden name="data" value="{{ json_encode($data) }}">
                    <div class='form-group mb-3'>
                        <label for='meja_id mb-3'>Meja</label>
                        <select name='meja_id[]' id='meja_id'
                            class='form-control w-100 @error('meja_id') is-invalid @enderror' multiple required>
                            @foreach ($data_meja as $meja)
                                <option @selected($meja->id == old('meja_id')) value='{{ $meja->id }}'>
                                    {{ $meja->kode . ' | ' . $meja->jenis . ' (' . $meja->jumlah_maksimal . ' Orang)' }}
                                </option>
                            @endforeach
                        </select>
                        @error('meja_id')
                            <div class='invalid-feedback'>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary w-100">Reservasi Sekarang</button>
                    </div>
                </form>
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
