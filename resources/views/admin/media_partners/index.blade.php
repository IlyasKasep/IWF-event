@extends('admin.layout')

@section('title', 'Kelola Media Partner')

@section('content')
<div class="card-panel">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="page-title">Kelola Media Partner</h2>
            <p class="text-muted mb-0">Manajemen kolaborasi publikasi, logo partner penyiaran, dan jejaring komunitas.</p>
        </div>
        <a href="{{ route('admin.media-partners.create') }}" class="btn-custom-primary">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Tambah Media Partner
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success border-0 rounded-4 p-3 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th style="width: 120px;">Logo</th>
                    <th>Nama Media / Instansi Partner</th>
                    <th>Dibuat Pada</th>
                    <th style="width: 200px; text-align: center;">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($mediaPartners as $partner)
                    <tr>
                        <td>
                            @if ($partner->logo)
                                <img src="{{ asset($partner->logo) }}" alt="{{ $partner->name }}" style="max-height: 40px; max-width: 100px; object-fit: contain;">
                            @else
                                <span class="text-muted small">No logo</span>
                            @endif
                        </td>
                        <td><span class="fw-bold">{{ $partner->name }}</span></td>
                        <td>{{ $partner->created_at->format('d M Y H:i') }}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('admin.media-partners.edit', $partner->id) }}" class="btn btn-outline-primary btn-sm py-2 px-3 rounded-3" style="font-size: 12px; font-weight: 700;">
                                    Ubah
                                </a>
                                <form action="{{ route('admin.media-partners.destroy', $partner->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus media partner ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm py-2 px-3 rounded-3" style="font-size: 12px; font-weight: 700;">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-5">
                            Belum ada media partner yang didaftarkan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
