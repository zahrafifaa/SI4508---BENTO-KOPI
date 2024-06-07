@extends('layout/main')
@section('isiPage')
    <h1 class="mt-4">Artikel</h1>

    <!-- Filter Options -->
    <div class="row mb-3">
        <div class="col-12">
            <form action="" method="get">
                <div class="row">
                    <div class="col-md-5">
                        <label for="kategori" class="mb-2">Filter berdasarkan Kategori:</label>
                        <select class="form-select" id="kategori" name="kategori">
                            <option value="">Semua Kategori</option>
                            @foreach ($categories as $category)
                                <option @selected(request('kategori') === $category->slug) value="{{ $category->slug }}">{{ $category->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label for="urutan" class="mb-2">Urutkan berdasarkan:</label>
                        <select class="form-select" id="urutan" name="urutan">
                            <option @selected(request('urutan') === 'terbaru') value="terbaru">Terbaru</option>
                            <option @selected(request('urutan') === 'terlama') value="terlama">Terlama</option>
                        </select>
                    </div>
                    <div class="col-md align-self-end">
                        <div class="form-group">
                            <button class="btn btn-secondary">Filter</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Display Articles -->
    <div class="row mt-4">
        @forelse ($items as $item)
            <div class="col-lg-4 artikel-item mb-2">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mb-5">
                            <img class="bd-placeholder-img rounded-circle img-fluid" style="max-height:150px"
                                src="{{ $item->gambar() }}" alt="Placeholder">
                        </div>
                        <h2 class="fw-normal">{{ $item->judul }}</h2>
                        <p>
                            <span class="badge text-bg-secondary">{{ $item->kategori_artikel->nama }}</span>
                            <span class="badge text-bg-success">{{ $item->created_at->diffforhumans() }}</span>
                        </p>
                        <p style="text-align: justify">{{ $item->deskripsi_singkat }}</p>
                        <p><a class="btn btn-secondary" href="{{ route('artikel.show', $item->slug) }}">View details
                                &raquo;</a></p>
                    </div>
                </div>
            </div>

        @empty
            <div class="col-12 mt-3">
                <p class="text-center">
                    Artikel tidak ditemukan!
                </p>
            </div>
        @endforelse
    </div><!-- /.row -->
    <div class="row mt-3">
        <div class="col-12">
            {{ $items->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
