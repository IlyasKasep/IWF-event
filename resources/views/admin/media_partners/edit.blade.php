@extends('admin.layout')

@section('title', 'Ubah Media Partner')

@section('content')
<div class="card-panel" style="max-width: 700px; margin: 0 auto;">
    <div class="mb-4">
        <h2 class="page-title">Ubah Media Partner</h2>
        <p class="text-muted">Perbarui data media partner yang dipilih.</p>
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

    <form action="{{ route('admin.media-partners.update', $mediaPartner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Media / Instansi</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $mediaPartner->name) }}" required>
        </div>

        <div class="mb-4">
            <label class="form-label">Logo Partner (Maks. 2MB)</label>
            @if($mediaPartner->logo)
                <div class="mb-3 d-flex align-items-center gap-3">
                    <img src="{{ asset($mediaPartner->logo) }}" alt="{{ $mediaPartner->name }}" style="max-height: 45px; max-width: 100px; object-fit: contain;">
                    <span class="small text-muted">Logo saat ini</span>
                </div>
            @endif
            <input type="file" name="logo" class="form-control" accept="image/*">
            <div class="form-text small text-muted">Biarkan kosong jika tidak ingin mengganti logo saat ini.</div>
        </div>

        <div class="d-flex gap-3 justify-content-end">
            <a href="{{ route('admin.media-partners.index') }}" class="btn-custom-secondary">
                Batal
            </a>
            <button type="submit" class="btn-custom-primary">
                Perbarui Media Partner
            </button>
        </div>
    </form>
</div>
@endsection
