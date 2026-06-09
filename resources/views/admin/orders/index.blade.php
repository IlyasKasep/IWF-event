@extends('admin.layout')

@section('title', 'Daftar Pembayaran')

@section('content')
<div class="card-panel">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="page-title">Daftar Pembeli Tiket</h2>
            <p class="text-muted mb-0">Memantau pemesanan tiket, memeriksa token Midtrans, dan mengkonfirmasi status pembayaran.</p>
        </div>
        <div>
            <a href="{{ route('admin.orders.export') }}" class="btn-custom-primary">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                    <polyline points="7 10 12 15 17 10"></polyline>
                    <line x1="12" y1="15" x2="12" y2="3"></line>
                </svg>
                Ekspor ke Excel
            </a>
        </div>
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
                    <th>No</th>
                    <th>Order Code</th>
                    <th>Nama Peserta</th>
                    <th>Email / WhatsApp</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Kode Tiket</th>
                    <th>Aksi Manual</th>
                    <th>Hapus</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($orders as $order)
                    <tr>
                        <td><strong>{{ $loop->iteration }}</strong></td>
                        <td>
                            <code class="text-secondary">{{ $order->order_code }}</code>
                            @if($order->snap_token)
                                <br><small class="text-muted" style="font-size: 10px;">Snap Token: {{ substr($order->snap_token, 0, 8) }}...</small>
                            @endif
                        </td>
                        <td><span class="fw-bold">{{ $order->name }}</span></td>
                        <td>
                            <span class="small text-muted">{{ $order->email }}</span><br>
                            <span class="small text-muted">{{ $order->phone }}</span>
                        </td>
                        <td><strong>{{ $order->quantity }}</strong></td>
                        <td><strong>Rp{{ number_format($order->total_amount, 0, ',', '.') }}</strong></td>

                        <td>
                            @if ($order->payment_status == 'paid')
                                <span class="badge bg-success py-2 px-3 rounded-3">PAID</span>
                            @elseif ($order->payment_status == 'pending')
                                <span class="badge bg-warning text-dark py-2 px-3 rounded-3">PENDING</span>
                            @elseif ($order->payment_status == 'failed')
                                <span class="badge bg-danger py-2 px-3 rounded-3">FAILED</span>
                            @else
                                <span class="badge bg-secondary py-2 px-3 rounded-3">EXPIRED</span>
                            @endif
                        </td>

                        <td>
                            @if ($order->ticket_code)
                                <span class="fw-bold text-success font-monospace" style="font-size: 13px;">{{ $order->ticket_code }}</span>
                                <div class="mt-1">
                                    <a href="{{ route('ticket.show', $order->ticket_code) }}" class="btn btn-outline-success btn-sm py-1 px-2 rounded-3" style="font-size: 11px;" target="_blank">
                                        Lihat Tiket
                                    </a>
                                </div>
                            @else
                                <span class="text-muted small">Belum terbit</span>
                            @endif
                        </td>

                        <td>
                            <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                                @csrf
                                <div class="d-flex gap-2 align-items-center">
                                    <select name="payment_status" class="form-select form-select-sm w-auto">
                                        <option value="pending" {{ $order->payment_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="paid" {{ $order->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
                                        <option value="failed" {{ $order->payment_status == 'failed' ? 'selected' : '' }}>Failed</option>
                                        <option value="expired" {{ $order->payment_status == 'expired' ? 'selected' : '' }}>Expired</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary btn-sm py-2 px-3 rounded-3" style="font-size: 12px; font-weight: 700;">
                                        Ubah
                                    </button>
                                </div>
                            </form>
                        </td>

                        {{-- DELETE BUTTON --}}
                        <td>
                            <button type="button"
                                class="btn btn-danger btn-sm py-2 px-3 rounded-3"
                                style="font-size: 12px; font-weight: 700;"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteModal"
                                data-order-id="{{ $order->id }}"
                                data-order-name="{{ $order->name }}">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="margin-right:3px;">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"></path>
                                    <path d="M10 11v6"></path><path d="M14 11v6"></path>
                                    <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"></path>
                                </svg>
                                Hapus
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center text-muted py-5">
                            Belum ada data pesanan tiket yang terdaftar.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Delete Confirmation Modal --}}
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow" style="border-radius: 20px; overflow: hidden;">
            <div class="modal-header border-0 pb-0" style="background: #fff5f5; padding: 24px 28px 16px;">
                <div class="d-flex align-items-center gap-3">
                    <div style="width: 44px; height: 44px; background: #fee2e2; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                            <line x1="12" y1="9" x2="12" y2="13"></line>
                            <line x1="12" y1="17" x2="12.01" y2="17"></line>
                        </svg>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold text-dark mb-0" id="deleteModalLabel">Hapus Data Peserta</h5>
                        <small class="text-muted">Tindakan ini tidak dapat dibatalkan.</small>
                    </div>
                </div>
            </div>
            <div class="modal-body" style="padding: 20px 28px;">
                <p class="text-muted mb-0" style="font-size: 14px; line-height: 1.6;">
                    Anda akan menghapus data peserta
                    <strong class="text-dark" id="deleteOrderName">—</strong>.
                    Semua data terkait termasuk kode tiket akan ikut terhapus secara permanen.
                </p>
            </div>
            <div class="modal-footer border-0" style="padding: 8px 28px 24px; gap: 10px;">
                <button type="button" class="btn btn-light rounded-3 px-4 fw-600" data-bs-dismiss="modal" style="font-weight: 600;">Batal</button>
                <form id="deleteForm" method="POST" style="margin: 0;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger rounded-3 px-4" style="font-weight: 700;">
                        Ya, Hapus Sekarang
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        const btn = event.relatedTarget;
        const orderId   = btn.getAttribute('data-order-id');
        const orderName = btn.getAttribute('data-order-name');

        document.getElementById('deleteOrderName').textContent = orderName;
        document.getElementById('deleteForm').action = '/admin/orders/' + orderId;
    });
</script>
@endsection