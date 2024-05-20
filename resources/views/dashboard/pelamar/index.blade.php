@extends('dashboard.layout.main')

@section('isiDashboard')
    <div class="d-flex pt-3 poppins text-black">
      <p>
        <a href="{{ url('dashboard/kolaborator') }}" class="text-black" style="text-decoration:none;">Pelamar ></a>
      </p>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 poppins fw-bold">
        <h1 class="h2">Daftar Pelamar Kerja</h1>
    </div>

    @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif  

    
    <div class="table-responsive small border-top">
        <table class=" table table-striped table-md">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Lowongan</th>
              <th scope="col">Nama</th>
              <th scope="col">Umur</th>
              <th scope="col">Alamat</th>
              <th scope="col">Pengalaman</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pelamar as $pelamars)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $pelamars->lowongan->judul }}</td>
              <td>{{ $pelamars->nama }}</td>
              <td>{{ $pelamars->umur }} Tahun</td>
              <td>{{ $pelamars->alamat }}</td>
              <td>{{ $pelamars->pengalaman_kerja }}</td>
              <td>
                <select class="form-select @error('Status') is-invalid @enderror" name='Status' id="Status" aria-label="Default select example" value='{{ old('Status') ?? $kolaborasi->Status }}'>
                  <option selected="selected" value='notPost'>Pilih Opsi Draft</option>
                  <option @if(old('Status') == 'Posted' || $pelamars->umur == 'Posted') selected @endif value='Posted'>Posting</option>
                  <option @if(old('Status') == 'notPost'|| $pelamars->umur == 'notPost') selected @endif value="notPost">Simpan Draft</option>
                </select>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection