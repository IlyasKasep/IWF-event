@extends('admin.layout')

@section('title', 'Tambah Pemateri')

@section('content')
<div class="card-panel" style="max-width: 700px; margin: 0 auto;">
    <div class="mb-4">
        <h2 class="page-title">Tambah Pemateri</h2>
        <p class="text-muted">Masukkan data pemateri baru beserta pilarnya untuk tampil di homepage.</p>
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

    <form action="{{ route('admin.speakers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Lengkap Pemateri</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Masukkan nama pemateri (contoh: Drs. Budi)" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jabatan / Spesialisasi</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Contoh: Praktisi Hypnosis & NLP atau Dosen Senior ITB" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Pilar Topik Webinar</label>
            <select name="pillar" class="form-select" required>
                <option value="" disabled selected>Pilih pilar topik...</option>
                <option value="Inner Impact" {{ old('pillar') === 'Inner Impact' ? 'selected' : '' }}>Inner Impact</option>
                <option value="Creative Impact" {{ old('pillar') === 'Creative Impact' ? 'selected' : '' }}>Creative Impact</option>
                <option value="Future Impact" {{ old('pillar') === 'Future Impact' ? 'selected' : '' }}>Future Impact</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="form-label">Foto Pemateri (Maks. 2MB)</label>
            <input type="file" name="avatar" class="form-control" accept="image/*">
            <div class="form-text small text-muted">Akan memunculkan inisial nama jika tidak mengunggah foto.</div>
        </div>

        <div class="d-flex gap-3 justify-content-end">
            <a href="{{ route('admin.speakers.index') }}" class="btn-custom-secondary">
                Batal
            </a>
            <button type="submit" class="btn-custom-primary">
                Simpan Pemateri
            </button>
        </div>
    </form>
</div>
@endsection
