@extends('admin.layout')

@section('title', 'Kelola Pemateri')

@section('content')
<div class="card-panel">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="page-title">Kelola Pemateri</h2>
            <p class="text-muted mb-0">Tambah, ubah, dan hapus pemateri festival beserta pilar topiknya.</p>
        </div>
        <a href="{{ route('admin.speakers.create') }}" class="btn-custom-primary">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Tambah Pemateri
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
                    <th style="width: 80px;">Foto</th>
                    <th>Nama Lengkap</th>
                    <th>Spesialisasi / Jabatan</th>
                    <th>Pilar Topik</th>
                    <th style="width: 200px; text-align: center;">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($speakers as $speaker)
                    <tr>
                        <td>
                            @if ($speaker->avatar)
                                <img src="{{ asset($speaker->avatar) }}" alt="{{ $speaker->name }}" class="avatar-circle">
                            @else
                                <div class="avatar-circle">
                                    {{ substr($speaker->name, 0, 1) }}
                                </div>
                            @endif
                        </td>
                        <td><span class="fw-bold">{{ $speaker->name }}</span></td>
                        <td>{{ $speaker->title }}</td>
                        <td>
                            <span class="badge bg-primary rounded-pill py-2 px-3" style="font-size: 11px;">
                                {{ $speaker->pillar }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('admin.speakers.edit', $speaker->id) }}" class="btn btn-outline-primary btn-sm py-2 px-3 rounded-3" style="font-size: 12px; font-weight: 700;">
                                    Ubah
                                </a>
                                <form action="{{ route('admin.speakers.destroy', $speaker->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pemateri ini?');">
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
                        <td colspan="5" class="text-center text-muted py-5">
                            Belum ada pemateri yang didaftarkan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
