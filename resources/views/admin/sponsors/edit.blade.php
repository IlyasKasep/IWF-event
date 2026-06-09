@extends('admin.layout')

@section('title', 'Ubah Sponsor')

@section('content')
<div class="card-panel" style="max-width: 700px; margin: 0 auto;">
    <div class="mb-4">
        <h2 class="page-title">Ubah Sponsor</h2>
        <p class="text-muted">Perbarui data paket sponsorship atau brand partner yang dipilih.</p>
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

    <form action="{{ route('admin.sponsors.update', $sponsor->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Paket / Nama Brand</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $sponsor->name) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori Tier</label>
            <select name="tier" class="form-select" required>
                <option value="bronze" {{ old('tier', $sponsor->tier) === 'bronze' ? 'selected' : '' }}>Bronze</option>
                <option value="gold" {{ old('tier', $sponsor->tier) === 'gold' ? 'selected' : '' }}>Gold</option>
                <option value="platinum" {{ old('tier', $sponsor->tier) === 'platinum' ? 'selected' : '' }}>Platinum</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Nilai Investasi (Rp)</label>
            <input type="number" name="price" class="form-control" value="{{ old('price', $sponsor->price) }}" min="0" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi Benefit</label>
            <textarea name="description" class="form-control" rows="4" required>{{ old('description', $sponsor->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="form-label">Logo Brand (Maks. 2MB)</label>
            @if($sponsor->logo)
                <div class="mb-3 d-flex align-items-center gap-3">
                    <img src="{{ asset($sponsor->logo) }}" alt="{{ $sponsor->name }}" style="max-height: 45px; max-width: 100px; object-fit: contain;">
                    <span class="small text-muted">Logo saat ini</span>
                </div>
            @endif
            <input type="file" name="logo" class="form-control" accept="image/*">
            <div class="form-text small text-muted">Biarkan kosong jika tidak ingin mengganti logo saat ini.</div>
        </div>

        <div class="d-flex gap-3 justify-content-end">
            <a href="{{ route('admin.sponsors.index') }}" class="btn-custom-secondary">
                Batal
            </a>
            <button type="submit" class="btn-custom-primary">
                Perbarui Sponsor
            </button>
        </div>
    </form>
</div>
@endsection
