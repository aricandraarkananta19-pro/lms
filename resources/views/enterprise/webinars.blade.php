<x-app-layout>
<x-slot name="header"><h1 style="font-size:18px;font-weight:700;margin:0;">Live Webinar & Training</h1></x-slot>
@push('styles')
<style>
.wb{display:grid;gap:16px}
.wb-stats{display:grid;grid-template-columns:repeat(4,1fr);gap:14px}
.ws{background:#fff;border:1px solid #E2E8F0;border-radius:16px;padding:20px;box-shadow:0 1px 3px rgba(0,0,0,.06)}
.ws-l{font-size:11px;color:#64748B;text-transform:uppercase;letter-spacing:.05em;margin-bottom:6px;font-weight:600}
.ws-v{font-size:26px;font-weight:800;color:#0F172A}
.card{background:#fff;border:1px solid #E2E8F0;border-radius:16px;padding:24px;box-shadow:0 1px 3px rgba(0,0,0,.06)}
.card-h{display:flex;justify-content:space-between;align-items:center;margin-bottom:16px}
.card-h h3{font-size:15px;font-weight:700;color:#0F172A}
.web-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:16px}
.web-card{background:#FAFBFC;border:1px solid #E2E8F0;border-radius:16px;overflow:hidden;transition:all .2s}
.web-card:hover{border-color:#4F46E5;box-shadow:0 6px 20px rgba(79,70,229,.08);transform:translateY(-2px)}
.web-header{padding:18px;position:relative}
.web-live{position:absolute;top:18px;right:18px;font-size:10px;padding:4px 10px;border-radius:20px;font-weight:700;text-transform:uppercase;display:flex;align-items:center;gap:4px}
.web-live-on{background:#FEE2E2;color:#B91C1C}.web-live-on::before{content:'';width:6px;height:6px;border-radius:50%;background:#EF4444;animation:pulse 1.5s infinite}
.web-upcoming{background:#D1FAE5;color:#047857}.web-done{background:#F1F5F9;color:#64748B}
@keyframes pulse{0%,100%{opacity:1}50%{opacity:.3}}
.web-title{font-size:15px;font-weight:700;color:#0F172A;margin-bottom:4px;padding-right:80px}
.web-speaker{font-size:12px;color:#64748B;display:flex;align-items:center;gap:8px;margin-bottom:8px}
.web-speaker-av{width:24px;height:24px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:700;color:#fff}
.web-detail{display:grid;grid-template-columns:1fr 1fr;gap:8px;padding:14px 18px;background:#F8FAFC;border-top:1px solid #F1F5F9}
.web-detail-label{font-size:10px;color:#94A3B8;margin-bottom:2px;text-transform:uppercase;letter-spacing:.04em;font-weight:500}.web-detail-value{font-size:13px;color:#0F172A;font-weight:600}
.web-footer{padding:14px 18px;display:flex;justify-content:space-between;align-items:center;border-top:1px solid #F1F5F9}
.web-av-stack{display:flex}
.web-av{width:26px;height:26px;border-radius:50%;border:2px solid #fff;margin-left:-6px;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:700;color:#fff}
.web-av:first-child{margin-left:0}
.web-count{font-size:11px;color:#64748B;margin-left:6px;font-weight:500}
.btn-join{font-size:12px;padding:7px 16px;border-radius:8px;border:none;cursor:pointer;font-weight:600;font-family:inherit;transition:all .15s}
.btn-join-live{background:#EF4444;color:#fff;animation:pulse-bg 2s infinite}
.btn-join-soon{background:#4F46E5;color:#fff}.btn-join-replay{background:#F1F5F9;border:1px solid #E2E8F0;color:#475569}
@keyframes pulse-bg{0%,100%{box-shadow:0 0 0 0 rgba(239,68,68,.3)}50%{box-shadow:0 0 0 8px rgba(239,68,68,0)}}
.btn-join:hover{transform:translateY(-1px)}
.sched-item{display:flex;align-items:center;gap:14px;padding:12px;border-radius:12px;background:#F8FAFC;border:1px solid #F1F5F9;margin-bottom:8px;transition:all .15s}
.sched-item:hover{border-color:#E2E8F0;box-shadow:0 2px 8px rgba(0,0,0,.04)}
.sched-date{width:48px;text-align:center;flex-shrink:0}
.sched-day{font-size:20px;font-weight:800;color:#4F46E5}.sched-mon{font-size:10px;color:#94A3B8;text-transform:uppercase;font-weight:600}
.sched-title{font-size:13px;font-weight:600;color:#0F172A;margin-bottom:2px}.sched-meta{font-size:11px;color:#64748B}
.sched-status{font-size:10px;padding:4px 10px;border-radius:20px;font-weight:700;background:#D1FAE5;color:#047857}
@media(max-width:1024px){.wb-stats{grid-template-columns:repeat(2,1fr)}.web-grid{grid-template-columns:1fr}}
</style>
@endpush
<div class="wb">
<div class="wb-stats">
    <div class="ws"><div class="ws-l">Webinar Bulan Ini</div><div class="ws-v">12</div></div>
    <div class="ws"><div class="ws-l">🔴 Sedang Live</div><div class="ws-v" style="color:#DC2626">1</div></div>
    <div class="ws"><div class="ws-l">Total Peserta</div><div class="ws-v" style="color:#4F46E5">3,456</div></div>
    <div class="ws"><div class="ws-l">Rata-rata Rating</div><div class="ws-v" style="color:#F59E0B">4.8 ⭐</div></div>
</div>
<div class="card">
    <div class="card-h"><h3>Webinar & Training</h3></div>
    <div class="web-grid">
        @php $webs=[
            ['Leadership in Digital Era','Dr. Ahmad Fauzi','web-live-on','🔴 LIVE','240/300','14:00 - 16:00','1 Mar 2026','btn-join-live','Join Now',['#4F46E5','#0EA5E9','#8B5CF6']],
            ['ISO 27001 Implementation','Ir. Budi Gunawan','web-upcoming','Besok','189/250','09:00 - 12:00','2 Mar 2026','btn-join-soon','Daftar',['#0EA5E9','#10B981']],
            ['Communication Skills','Maya Indira, M.Psi','web-upcoming','3 Hari','156/200','13:00 - 15:00','4 Mar 2026','btn-join-soon','Daftar',['#8B5CF6','#F59E0B']],
            ['Financial Risk Mgmt','Prof. Suharto, MBA','web-done','Selesai','198/200','10:00 - 12:00','28 Feb 2026','btn-join-replay','Replay',['#4F46E5','#0EA5E9','#EC4899']],
        ]; @endphp
        @foreach($webs as $w)
        <div class="web-card">
            <div class="web-header">
                <span class="web-live {{ $w[2] }}">{{ $w[3] }}</span>
                <div class="web-title">{{ $w[0] }}</div>
                <div class="web-speaker"><div class="web-speaker-av" style="background:#4F46E5">{{ strtoupper(substr($w[1],0,2)) }}</div>{{ $w[1] }}</div>
            </div>
            <div class="web-detail"><div><div class="web-detail-label">Tanggal</div><div class="web-detail-value">{{ $w[6] }}</div></div><div><div class="web-detail-label">Waktu</div><div class="web-detail-value">{{ $w[5] }} WIB</div></div></div>
            <div class="web-footer">
                <div style="display:flex;align-items:center">
                    <div class="web-av-stack">@foreach(array_slice($w[9],0,3) as $c)<div class="web-av" style="background:{{ $c }}">👤</div>@endforeach</div>
                    <span class="web-count">{{ $w[4] }}</span>
                </div>
                <button class="btn-join {{ $w[7] }}">{{ $w[8] }}</button>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="card">
    <div class="card-h"><h3>📅 Jadwal Mendatang</h3></div>
    @php $sched=[['05','Mar','Agile Project Management','10:00 - 12:00 WIB • Zoom'],['08','Mar','Emotional Intelligence','13:00 - 16:00 WIB • Meet'],['12','Mar','Supply Chain Excellence','09:00 - 11:00 WIB • Teams'],['15','Mar','Design Thinking','14:00 - 17:00 WIB • Zoom'],['20','Mar','Advanced Excel & BI','10:00 - 12:00 WIB • Meet']]; @endphp
    @foreach($sched as $s)
    <div class="sched-item">
        <div class="sched-date"><div class="sched-day">{{ $s[0] }}</div><div class="sched-mon">{{ $s[1] }}</div></div>
        <div style="flex:1"><div class="sched-title">{{ $s[2] }}</div><div class="sched-meta">{{ $s[3] }}</div></div>
        <span class="sched-status">Daftar</span>
    </div>
    @endforeach
</div>
</div>
</x-app-layout>
