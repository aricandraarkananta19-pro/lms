<x-app-layout>
<x-slot name="header"><h1 style="font-size:18px;font-weight:700;margin:0;">Learning Paths</h1></x-slot>
@push('styles')
<style>
.lp{display:grid;gap:16px}
.lp-top{display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:12px}
.path-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:16px}
.path-card{background:#fff;border:1px solid #E2E8F0;border-radius:16px;overflow:hidden;box-shadow:0 1px 3px rgba(0,0,0,.06);transition:all .2s}
.path-card:hover{box-shadow:0 8px 25px rgba(0,0,0,.1);transform:translateY(-4px)}
.path-banner{height:100px;display:flex;align-items:center;justify-content:center;font-size:36px}
.path-body{padding:18px}
.path-level{font-size:10px;padding:3px 10px;border-radius:20px;font-weight:700;text-transform:uppercase;display:inline-block;margin-bottom:8px;letter-spacing:.04em}
.path-beginner{background:#D1FAE5;color:#047857}.path-intermediate{background:#E0F2FE;color:#0369A1}
.path-advanced{background:#EDE9FE;color:#6D28D9}.path-expert{background:#FEF3C7;color:#B45309}
.path-name{font-size:15px;font-weight:700;color:#0F172A;margin-bottom:4px}
.path-desc{font-size:12px;color:#64748B;line-height:1.5;margin-bottom:14px;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.path-meta{display:flex;gap:14px;margin-bottom:14px}
.path-meta-item{font-size:11px;color:#94A3B8;display:flex;align-items:center;gap:4px;font-weight:500}
.path-progress-bar{height:6px;background:#F1F5F9;border-radius:10px;overflow:hidden;margin-bottom:4px}
.path-progress-fill{height:100%;border-radius:10px}
.path-progress-text{display:flex;justify-content:space-between;font-size:11px;color:#64748B;font-weight:500}
.path-steps{display:flex;align-items:center;gap:3px;margin:12px 0}
.path-step{flex:1;height:4px;border-radius:2px}
.path-footer{display:flex;justify-content:space-between;align-items:center;padding-top:14px;border-top:1px solid #F1F5F9}
.path-enrolled{font-size:11px;color:#64748B;font-weight:500}
.btn-path{font-size:12px;padding:7px 16px;border-radius:8px;border:none;cursor:pointer;font-weight:600;font-family:inherit;transition:all .15s;background:#4F46E5;color:#fff}
.btn-path:hover{background:#4338CA;transform:translateY(-1px)}
.btn-new{display:inline-flex;align-items:center;gap:6px;padding:9px 18px;border-radius:10px;font-weight:600;font-size:13px;background:#4F46E5;color:#fff;border:none;cursor:pointer;font-family:inherit;box-shadow:0 2px 8px rgba(79,70,229,.25)}
@media(max-width:1024px){.path-grid{grid-template-columns:repeat(2,1fr)}}
@media(max-width:640px){.path-grid{grid-template-columns:1fr}}
</style>
@endpush
<div class="lp">
<div class="lp-top">
    <p style="font-size:14px;color:#64748B">Jalur pembelajaran terstruktur untuk pengembangan karir karyawan</p>
    <button class="btn-new">➕ Buat Learning Path</button>
</div>
<div class="path-grid">
    @php $paths=[
        ['🎯','Leadership Development','Bangun kapabilitas kepemimpinan untuk manajer dan supervisor.','linear-gradient(135deg,#EEF2FF,#E0E7FF)','advanced','Advanced',8,'12 Minggu',342,68],
        ['💻','IT Security & Compliance','Pelatihan keamanan siber lengkap. Wajib karyawan IT.','linear-gradient(135deg,#E0F2FE,#BAE6FD)','intermediate','Intermediate',6,'8 Minggu',580,85],
        ['📊','Data Analytics Mastery','Kuasai analisis data dengan Excel, SQL, Python.','linear-gradient(135deg,#EDE9FE,#DDD6FE)','beginner','Beginner',10,'16 Minggu',215,32],
        ['📋','Compliance Certification','Persiapan sertifikasi K3, ISO, Anti Bribery, ESG.','linear-gradient(135deg,#FEF3C7,#FDE68A)','expert','Expert',12,'20 Minggu',89,91],
        ['🤝','HR Business Partner','Transformasi HR ke strategic partner.','linear-gradient(135deg,#FEE2E2,#FECACA)','advanced','Advanced',7,'10 Minggu',156,55],
        ['🌱','Employee Onboarding','Orientasi terstruktur untuk karyawan baru.','linear-gradient(135deg,#D1FAE5,#A7F3D0)','beginner','Beginner',5,'4 Minggu',847,78],
    ]; @endphp
    @foreach($paths as $p)
    <div class="path-card">
        <div class="path-banner" style="background:{{ $p[3] }}">{{ $p[0] }}</div>
        <div class="path-body">
            <span class="path-level path-{{ $p[4] }}">{{ $p[5] }}</span>
            <div class="path-name">{{ $p[1] }}</div>
            <div class="path-desc">{{ $p[2] }}</div>
            <div class="path-meta"><span class="path-meta-item">📚 {{ $p[6] }} Kursus</span><span class="path-meta-item">⏱️ {{ $p[7] }}</span></div>
            <div class="path-progress-bar"><div class="path-progress-fill" style="width:{{ $p[9] }}%;background:linear-gradient(90deg,#4F46E5,#0EA5E9)"></div></div>
            <div class="path-progress-text"><span>{{ $p[9] }}% selesai</span><span>{{ round($p[6]*$p[9]/100) }}/{{ $p[6] }}</span></div>
            <div class="path-steps">@for($i=0;$i<$p[6];$i++)<div class="path-step" style="background:{{ $i<round($p[6]*$p[9]/100)?'#4F46E5':'#F1F5F9' }}"></div>@endfor</div>
            <div class="path-footer">
                <span class="path-enrolled">👥 {{ $p[8] }} enrolled</span>
                <button class="btn-path">Lihat Detail →</button>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
</x-app-layout>
