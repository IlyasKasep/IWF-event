@extends('admin.layout')

@section('title', 'Ubah Pemateri')

@section('content')
<div class="card-panel" style="max-width: 700px; margin: 0 auto;">
    <div class="mb-4">
        <h2 class="page-title">Ubah Pemateri</h2>
        <p class="text-muted">Perbarui data pemateri dan pilar topik webinar yang dipilih.</p>
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

    <form action="{{ route('admin.speakers.update', $speaker->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Lengkap Pemateri</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $speaker->name) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jabatan / Spesialisasi</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $speaker->title) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Pilar Topik Webinar</label>
            <select name="pillar" class="form-select" required>
                <option value="Inner Impact" {{ old('pillar', $speaker->pillar) === 'Inner Impact' ? 'selected' : '' }}>Inner Impact</option>
                <option value="Creative Impact" {{ old('pillar', $speaker->pillar) === 'Creative Impact' ? 'selected' : '' }}>Creative Impact</option>
                <option value="Future Impact" {{ old('pillar', $speaker->pillar) === 'Future Impact' ? 'selected' : '' }}>Future Impact</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="form-label">Ganti Foto Pemateri (Maks. 2MB)</label>
            @if($speaker->avatar)
                <div class="mb-3 d-flex align-items-center gap-3">
                    <img src="{{ asset($speaker->avatar) }}" alt="{{ $speaker->name }}" class="avatar-circle" style="width: 60px; height: 60px;">
                    <span class="small text-muted">Foto saat ini</span>
                </div>
            @endif
            <input type="file" name="avatar" class="form-control" accept="image/*">
            <div class="form-text small text-muted">Biarkan kosong jika tidak ingin mengganti foto saat ini.</div>
        </div>

        <div class="d-flex gap-3 justify-content-end">
            <a href="{{ route('admin.speakers.index') }}" class="btn-custom-secondary">
                Batal
            </a>
            <button type="submit" class="btn-custom-primary">
                Perbarui Pemateri
            </button>
        </div>
    </form>
</div>
@endsection
