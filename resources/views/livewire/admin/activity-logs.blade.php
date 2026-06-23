<main class="page">
    <div class="page-header">
        <div>
            <h1 class="page-title">Activity Logs</h1>
            <p class="page-subtitle">Riwayat aktivitas dan perubahan data oleh admin & karyawan.</p>
        </div>
    </div>

    <div class="card">
        <div class="table-wrapper">
            <table class="table">
                <thead>
                    <tr>
                        <th>Waktu</th>
                        <th>User</th>
                        <th>Aksi</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($logs as $log)
                        <tr>
                            <td style="white-space:nowrap;">{{ $log->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <strong>{{ $log->user?->name ?? 'Sistem' }}</strong><br />
                                <small style="color:var(--muted)">{{ $log->user?->email ?? '-' }}</small>
                            </td>
                            <td><span class="badge badge-progress">{{ $log->action }}</span></td>
                            <td style="max-width:300px;">{{ $log->description }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="4" style="text-align:center;color:var(--muted);padding:40px;">Belum ada aktivitas.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div style="padding:12px 0;">{{ $logs->links() }}</div>
    </div>
</main>
