@extends('admin.layout')

@section('title', 'Tambah Media Partner')

@section('content')
<div class="card-panel" style="max-width: 700px; margin: 0 auto;">
    <div class="mb-4">
        <h2 class="page-title">Tambah Media Partner</h2>
        <p class="text-muted">Masukkan data media partner baru yang diajak kolaborasi.</p>
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

    <form action="{{ route('admin.media-partners.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Media / Instansi</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Contoh: ITB Event atau Bandung News" required>
        </div>

        <div class="mb-4">
            <label class="form-label">Logo Partner (Maks. 2MB)</label>
            <input type="file" name="logo" class="form-control" accept="image/*">
            <div class="form-text small text-muted">Diperlukan untuk logo scroller berjalan di landing page.</div>
        </div>

        <div class="d-flex gap-3 justify-content-end">
            <a href="{{ route('admin.media-partners.index') }}" class="btn-custom-secondary">
                Batal
            </a>
            <button type="submit" class="btn-custom-primary">
                Simpan Media Partner
            </button>
        </div>
    </form>
</div>
@endsection
