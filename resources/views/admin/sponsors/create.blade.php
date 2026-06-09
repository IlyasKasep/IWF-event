@extends('admin.layout')

@section('title', 'Tambah Sponsor')

@section('content')
<div class="card-panel" style="max-width: 700px; margin: 0 auto;">
    <div class="mb-4">
        <h2 class="page-title">Tambah Sponsor</h2>
        <p class="text-muted">Masukkan data paket sponsorship atau brand partner baru.</p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger border-0 rounded-4 p-3 mb-4">
            <strong class="d-block mb-2">Terjadi kesalahan input:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.sponsors.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Paket / Nama Brand</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Contoh: Platinum Sponsor atau Indofood" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori Tier</label>
            <select name="tier" class="form-select" required>
                <option value="bronze" {{ old('tier') === 'bronze' ? 'selected' : '' }}>Bronze</option>
                <option value="gold" {{ old('tier') === 'gold' ? 'selected' : '' }}>Gold</option>
                <option value="platinum" {{ old('tier') === 'platinum' ? 'selected' : '' }}>Platinum</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Nilai Investasi (Rp)</label>
            <input type="number" name="price" class="form-control" value="{{ old('price', 0) }}" min="0" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi Benefit</label>
            <textarea name="description" class="form-control" rows="4" placeholder="Detail benefit sponsorship yang didapat...">{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="form-label">Logo Brand (Maks. 2MB)</label>
            <input type="file" name="logo" class="form-control" accept="image/*">
            <div class="form-text small text-muted">Diperlukan untuk logo scroller berjalan di landing page.</div>
        </div>

        <div class="d-flex gap-3 justify-content-end">
            <a href="{{ route('admin.sponsors.index') }}" class="btn-custom-secondary">
                Batal
            </a>
            <button type="submit" class="btn-custom-primary">
                Simpan Sponsor
            </button>
        </div>
    </form>
</div>
@endsection
