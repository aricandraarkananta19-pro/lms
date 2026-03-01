<x-app-layout>
<x-slot name="header"><h1 style="font-size:18px;font-weight:700;margin:0;">Sertifikat & Kredensial</h1></x-slot>
@push('styles')
<style>
.ct{display:grid;gap:16px}
.ct-stats{display:grid;grid-template-columns:repeat(4,1fr);gap:14px}
.cts{background:#fff;border:1px solid #E2E8F0;border-radius:16px;padding:20px;box-shadow:0 1px 3px rgba(0,0,0,.06);transition:all .2s}
.cts:hover{box-shadow:0 4px 12px rgba(0,0,0,.08);transform:translateY(-2px)}
.cts-l{font-size:11px;color:#64748B;text-transform:uppercase;letter-spacing:.05em;margin-bottom:6px;font-weight:600}
.cts-v{font-size:26px;font-weight:800;color:#0F172A}
.card{background:#fff;border:1px solid #E2E8F0;border-radius:16px;padding:24px;box-shadow:0 1px 3px rgba(0,0,0,.06)}
.card-h{display:flex;justify-content:space-between;align-items:center;margin-bottom:16px}
.card-h h3{font-size:15px;font-weight:700;color:#0F172A}
.cert-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:14px}
.cert-card{background:#FAFBFC;border:1px solid #E2E8F0;border-radius:14px;padding:18px;transition:all .2s;position:relative;overflow:hidden}
.cert-card:hover{border-color:#4F46E5;box-shadow:0 6px 20px rgba(79,70,229,.08);transform:translateY(-3px)}
.cert-card::before{content:'';position:absolute;top:0;left:0;right:0;height:4px;border-radius:14px 14px 0 0}
.cert-card.valid::before{background:linear-gradient(90deg,#10B981,#34D399)}
.cert-card.expiring::before{background:linear-gradient(90deg,#F59E0B,#FBBF24)}
.cert-card.expired::before{background:linear-gradient(90deg,#EF4444,#FCA5A5)}
.cert-top{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:10px}
.cert-icon{font-size:24px}.cert-status{font-size:10px;padding:3px 8px;border-radius:20px;font-weight:700;text-transform:uppercase}
.cert-valid{background:#D1FAE5;color:#047857}.cert-expiring{background:#FEF3C7;color:#B45309}.cert-expired{background:#FEE2E2;color:#B91C1C}
.cert-name{font-size:14px;font-weight:700;color:#0F172A;margin-bottom:4px}
.cert-issuer{font-size:11px;color:#94A3B8;margin-bottom:12px}
.cert-dates{display:grid;grid-template-columns:1fr 1fr;gap:8px;padding-top:12px;border-top:1px solid #F1F5F9}
.cert-date-l{font-size:10px;color:#94A3B8;text-transform:uppercase;letter-spacing:.04em;margin-bottom:2px}.cert-date-v{font-size:12px;font-weight:600;color:#475569}
.cert-holders{display:flex;align-items:center;margin-top:12px;gap:4px}
.cert-holder-av{width:24px;height:24px;border-radius:50%;border:2px solid #fff;margin-left:-6px;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:700;color:#fff}
.cert-holder-av:first-child{margin-left:0}
.cert-holder-count{font-size:11px;color:#64748B;margin-left:4px;font-weight:500}
.exp-table{width:100%;border-collapse:separate;border-spacing:0}
.exp-table th{text-align:left;font-size:11px;color:#64748B;text-transform:uppercase;letter-spacing:.06em;font-weight:600;padding:12px 16px;background:#F8FAFC;border-bottom:1px solid #E2E8F0}
.exp-table th:first-child{border-radius:12px 0 0 0}.exp-table th:last-child{border-radius:0 12px 0 0}
.exp-table td{padding:12px 16px;font-size:13px;border-bottom:1px solid #F1F5F9;color:#475569}
.exp-table tr:hover td{background:#F8FAFC}
.exp-urgent{color:#DC2626;font-weight:700}.exp-warn{color:#B45309;font-weight:700}
.btn-sm{font-size:11px;padding:5px 12px;border-radius:8px;border:none;cursor:pointer;font-weight:600;font-family:inherit;transition:all .15s}
.btn-renew{background:#D1FAE5;color:#047857}.btn-renew:hover{background:#A7F3D0}
.btn-remind{background:#E0F2FE;color:#0369A1}.btn-remind:hover{background:#BAE6FD}
@media(max-width:1024px){.ct-stats{grid-template-columns:repeat(2,1fr)}.cert-grid{grid-template-columns:1fr}}
</style>
@endpush
<div class="ct">
<div class="ct-stats">
    <div class="cts"><div class="cts-l">Total Sertifikat</div><div class="cts-v">1,456</div></div>
    <div class="cts"><div class="cts-l">Segera Kedaluwarsa</div><div class="cts-v" style="color:#B45309">89</div></div>
    <div class="cts"><div class="cts-l">Sudah Kedaluwarsa</div><div class="cts-v" style="color:#DC2626">23</div></div>
    <div class="cts"><div class="cts-l">Diterbitkan Bulan Ini</div><div class="cts-v" style="color:#0369A1">156</div></div>
</div>
<div class="card">
    <div class="card-h"><h3>Jenis Sertifikat</h3></div>
    <div class="cert-grid">
        @php $certs=[
            ['🛡️','Sertifikat K3','BNSP Indonesia','valid','Berlaku','15 Jan 2025','15 Jan 2027',580,['#4F46E5','#0EA5E9','#8B5CF6','#10B981']],
            ['📋','ISO 9001 Internal Auditor','TÜV Rheinland','valid','Berlaku','10 Mar 2025','10 Mar 2028',342,['#0EA5E9','#10B981','#EC4899']],
            ['⚖️','Anti Bribery / SMAP','LSP MSDM','expiring','30 Hari','01 Apr 2025','01 Apr 2026',215,['#F59E0B','#EF4444','#4F46E5']],
            ['🔒','Data Privacy Officer','IAPP','expired','Expired','01 Jan 2024','01 Jan 2026',89,['#EF4444','#F59E0B']],
            ['📊','SOX Compliance','Deloitte','valid','Berlaku','20 Jun 2025','20 Jun 2027',420,['#4F46E5','#0EA5E9','#8B5CF6']],
            ['🔐','Cyber Security (CompTIA)','CompTIA','valid','Berlaku','15 Aug 2025','15 Aug 2028',156,['#0EA5E9','#10B981']],
        ]; @endphp
        @foreach($certs as $c)
        <div class="cert-card {{ $c[3] }}">
            <div class="cert-top"><span class="cert-icon">{{ $c[0] }}</span><span class="cert-status cert-{{ $c[3] }}">{{ $c[4] }}</span></div>
            <div class="cert-name">{{ $c[1] }}</div>
            <div class="cert-issuer">Diterbitkan oleh {{ $c[2] }}</div>
            <div class="cert-dates">
                <div><div class="cert-date-l">Tanggal Terbit</div><div class="cert-date-v">{{ $c[5] }}</div></div>
                <div><div class="cert-date-l">Kedaluwarsa</div><div class="cert-date-v" style="color:{{ $c[3]=='expired'?'#DC2626':($c[3]=='expiring'?'#B45309':'#475569') }}">{{ $c[6] }}</div></div>
            </div>
            <div class="cert-holders">
                @foreach(array_slice($c[8],0,4) as $clr)<div class="cert-holder-av" style="background:{{ $clr }}">👤</div>@endforeach
                <span class="cert-holder-count">{{ $c[7] }} karyawan</span>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="card">
    <div class="card-h"><h3>⚠️ Sertifikat Akan Kedaluwarsa</h3></div>
    <div style="overflow-x:auto">
    <table class="exp-table">
        <thead><tr><th>Karyawan</th><th>Sertifikat</th><th>Kedaluwarsa</th><th>Sisa Waktu</th><th>Aksi</th></tr></thead>
        <tbody>
            @php $exps=[['Andi Prasetyo','K3 Safety','05 Mar 2026','4 hari','urgent'],['Siti Rahayu','Anti Bribery','12 Mar 2026','11 hari','urgent'],['Budi Santoso','GDPR / DPO','20 Mar 2026','19 hari','warn'],['Dewi Lestari','ISO 9001','01 Apr 2026','31 hari','warn'],['Rizky Fadillah','Fire Safety','15 Apr 2026','45 hari','warn']]; @endphp
            @foreach($exps as $x)
            <tr>
                <td style="font-weight:600;color:#0F172A">{{ $x[0] }}</td><td>{{ $x[1] }}</td><td>{{ $x[2] }}</td>
                <td class="exp-{{ $x[4] }}">{{ $x[3] }}</td>
                <td><button class="btn-sm btn-renew">Perpanjang</button> <button class="btn-sm btn-remind">Reminder</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</div>
</div>
</x-app-layout>
