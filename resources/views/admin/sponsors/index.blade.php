@extends('admin.layout')

@section('title', 'Kelola Sponsor')

@section('content')
<div class="card-panel">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="page-title">Kelola Sponsor</h2>
            <p class="text-muted mb-0">Manajemen paket sponsorship, nilai investasi, serta logo brand yang mendukung festival.</p>
        </div>
        <a href="{{ route('admin.sponsors.create') }}" class="btn-custom-primary">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Tambah Sponsor
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
                    <th style="width: 100px;">Logo</th>
                    <th>Nama Paket / Brand</th>
                    <th>Tier</th>
                    <th>Nilai Investasi</th>
                    <th>Deskripsi Benefit</th>
                    <th style="width: 180px; text-align: center;">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($sponsors as $sponsor)
                    <tr>
                        <td>
                            @if ($sponsor->logo)
                                <img src="{{ asset($sponsor->logo) }}" alt="{{ $sponsor->name }}" style="max-height: 40px; max-width: 90px; object-fit: contain;">
                            @else
                                <span class="text-muted small">No logo</span>
                            @endif
                        </td>
                        <td><span class="fw-bold">{{ $sponsor->name }}</span></td>
                        <td>
                            @if($sponsor->tier === 'platinum')
                                <span class="badge bg-danger text-uppercase py-2 px-3" style="font-size: 10px;">Platinum</span>
                            @elseif($sponsor->tier === 'gold')
                                <span class="badge bg-warning text-dark text-uppercase py-2 px-3" style="font-size: 10px;">Gold</span>
                            @else
                                <span class="badge bg-secondary text-uppercase py-2 px-3" style="font-size: 10px;">Bronze</span>
                            @endif
                        </td>
                        <td><strong>Rp{{ number_format($sponsor->price, 0, ',', '.') }}</strong></td>
                        <td class="small text-muted">{{ $sponsor->description }}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('admin.sponsors.edit', $sponsor->id) }}" class="btn btn-outline-primary btn-sm py-2 px-3 rounded-3" style="font-size: 12px; font-weight: 700;">
                                    Ubah
                                </a>
                                <form action="{{ route('admin.sponsors.destroy', $sponsor->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus sponsor ini?');">
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
                        <td colspan="6" class="text-center text-muted py-5">
                            Belum ada sponsor yang didaftarkan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
