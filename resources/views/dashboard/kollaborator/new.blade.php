@extends('dashboard.layout.main')

@section('isiDashboard')
    <div class="d-flex pt-3 poppins text-black">
      <p>
        <a href="{{ url('dashboard/kolaborator') }}" class="text-black" style="text-decoration:none;">< Back</a>
      </p>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 poppins fw-bold">
        <h1 class="h2">New Collaborator</h1>
    </div>

    
    <form method="post" action="/dashboard/kolaborator" enctype="multipart/form-data">
        @csrf
        <div class='card p-3 mb-2'>
            <div class="mb-3">
              <label class="form-label" for="Judul">Judul</label>
              <input class="form-control @error('Judul') is-invalid @enderror" name='Judul' id="Judul" type="text" required autofocus placeholder="Judul Kolaborasi">
              @error('Judul')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="Tanggal">Tanggal</label>
              <input class="form-control @error('Tanggal') is-invalid @enderror" name='Tanggal' id="Tanggal" type="date" required>
              @error('Tanggal')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
                <label for='Gambar' class="form-label">Upload Gambar</label>
                <input name='Gambar' id='Gambar' class="form-control  @error('Gambar') is-invalid @enderror" type="file">
                @error('Gambar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- <div class="mb-3">
              <label class="form-label" for="Status">Status</label>
              <input class="form-control" name='Status' id="Status" type="text">
            </div> --}}
            <div class="mb-3">
              <label class="form-label" for="Status">Opsi positngan</label>
              <select class="form-select" name='Status' id="Status" aria-label="Default select example">
                <option selected="selected" value='notPost'>Pilih Opsi Draft</option>
                <option value="Posted">Posting</option>
                <option value="notPost">Simpan Draft</option>
              </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="Detail">Description</label>
                <textarea class="form-control @error('Detail') is-invalid @enderror" name="Detail" id="Detail" rows="3" placeholder="Description" required></textarea>
                @error('Detail')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
      </form>
    

    
@endsection