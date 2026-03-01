<x-app-layout>
    <x-slot name="header">
        <h1 style="font-size:18px;font-weight:700;margin:0;">Compliance Center</h1>
    </x-slot>
    @push('styles')
        <style>
            .cp {
                display: grid;
                gap: 16px
            }

            .cp-alert {
                background: linear-gradient(135deg, #FEF2F2, #FFF7ED);
                border: 1px solid #FECACA;
                border-radius: 16px;
                padding: 18px 20px;
                display: flex;
                align-items: center;
                gap: 14px
            }

            .cp-alert-icon {
                width: 44px;
                height: 44px;
                border-radius: 12px;
                background: #FEE2E2;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 20px;
                flex-shrink: 0
            }

            .cp-alert-text h4 {
                font-size: 14px;
                font-weight: 700;
                color: #991B1B;
                margin-bottom: 2px
            }

            .cp-alert-text p {
                font-size: 12px;
                color: #92400E
            }

            .cp-stats {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 14px
            }

            .cs {
                background: #fff;
                border: 1px solid #E2E8F0;
                border-radius: 16px;
                padding: 20px;
                text-align: center;
                box-shadow: 0 1px 3px rgba(0, 0, 0, .06)
            }

            .cs-ring {
                width: 72px;
                height: 72px;
                border-radius: 50%;
                margin: 0 auto 10px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 18px;
                font-weight: 800
            }

            .cs-label {
                font-size: 11px;
                color: #64748B;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: .04em
            }

            .card {
                background: #fff;
                border: 1px solid #E2E8F0;
                border-radius: 16px;
                padding: 24px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, .06)
            }

            .card-h {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 16px
            }

            .card-h h3 {
                font-size: 15px;
                font-weight: 700;
                color: #0F172A
            }

            .comp-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 12px
            }

            .comp-card {
                background: #FAFBFC;
                border: 1px solid #E2E8F0;
                border-radius: 14px;
                padding: 16px;
                transition: all .2s
            }

            .comp-card:hover {
                border-color: #4F46E5;
                box-shadow: 0 4px 12px rgba(79, 70, 229, .08);
                transform: translateY(-2px)
            }

            .cc-top {
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                margin-bottom: 10px
            }

            .cc-icon {
                width: 38px;
                height: 38px;
                border-radius: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 18px;
                background: #F1F5F9
            }

            .cc-status {
                font-size: 10px;
                padding: 3px 8px;
                border-radius: 20px;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: .04em
            }

            .cc-ok {
                background: #D1FAE5;
                color: #047857
            }

            .cc-warn {
                background: #FEF3C7;
                color: #B45309
            }

            .cc-crit {
                background: #FEE2E2;
                color: #B91C1C
            }

            .cc-name {
                font-size: 13px;
                font-weight: 700;
                color: #0F172A;
                margin-bottom: 6px
            }

            .cc-bar {
                width: 100%;
                height: 8px;
                background: #F1F5F9;
                border-radius: 10px;
                overflow: hidden;
                margin-bottom: 6px
            }

            .cc-fill {
                height: 100%;
                border-radius: 10px;
                transition: width 1.5s ease
            }

            .cc-meta {
                display: flex;
                justify-content: space-between;
                font-size: 11px;
                color: #64748B
            }

            .tl-item {
                display: flex;
                gap: 12px;
                padding: 10px;
                border-radius: 12px;
                background: #F8FAFC;
                border: 1px solid #F1F5F9;
                margin-bottom: 8px
            }

            .tl-dot {
                width: 10px;
                height: 10px;
                border-radius: 50%;
                margin-top: 5px;
                flex-shrink: 0
            }

            .tl-content h4 {
                font-size: 13px;
                font-weight: 600;
                color: #0F172A;
                margin-bottom: 2px
            }

            .tl-content p {
                font-size: 11px;
                color: #64748B
            }

            .tl-content .tl-time {
                font-size: 10px;
                color: #94A3B8;
                margin-top: 3px
            }

            @media(max-width:1024px) {
                .cp-stats {
                    grid-template-columns: repeat(2, 1fr)
                }

                .comp-grid {
                    grid-template-columns: 1fr
                }
            }
        </style>
    @endpush
    <div class="cp">
        <div class="cp-alert">
            <div class="cp-alert-icon">⚠️</div>
            <div class="cp-alert-text">
                <h4>5 Pelatihan Kepatuhan Membutuhkan Perhatian Segera</h4>
                <p>2 pelatihan melewati tenggat, 3 pelatihan mendekati batas waktu. Segera tindak lanjuti.</p>
            </div>
        </div>
        <div class="cp-stats">
            <div class="cs">
                <div class="cs-ring" style="border:4px solid #10B981;color:#059669">94.2%</div>
                <div class="cs-label">Kepatuhan Keseluruhan</div>
            </div>
            <div class="cs">
                <div class="cs-ring" style="border:4px solid #4F46E5;color:#4338CA">847</div>
                <div class="cs-label">Karyawan Patuh Penuh</div>
            </div>
            <div class="cs">
                <div class="cs-ring" style="border:4px solid #F59E0B;color:#B45309">156</div>
                <div class="cs-label">Perlu Pelatihan Ulang</div>
            </div>
            <div class="cs">
                <div class="cs-ring" style="border:4px solid #EF4444;color:#B91C1C">23</div>
                <div class="cs-label">Tidak Patuh / Expired</div>
            </div>
        </div>
        <div class="card">
            <div class="card-h">
                <h3>Status Kepatuhan per Kategori</h3>
            </div>
            <div class="comp-grid">
                @php $comps = [
                    ['K3 - Keselamatan Kerja', '🛡️', 96, '#10B981', 'cc-ok', 'Sesuai', '2,734', '2,847', 'Audit: Mei 2026'],
                    ['ISO 9001 Quality', '📋', 89, '#4F46E5', 'cc-ok', 'Sesuai', '2,534', '2,847', 'Review: Apr 2026'],
                    ['Anti Bribery / SMAP', '⚖️', 74, '#F59E0B', 'cc-warn', 'Perhatian', '2,107', '2,847', 'Deadline: Mar 2026'],
                    ['GDPR / Data Privacy', '🔒', 62, '#EF4444', 'cc-crit', 'Kritis', '1,765', '2,847', 'Audit: Mar 2026'],
                    ['SOX Compliance', '📊', 85, '#0EA5E9', 'cc-ok', 'Sesuai', '2,420', '2,847', 'Review: Jun 2026'],
                    ['ESG Sustainability', '🌱', 78, '#8B5CF6', 'cc-warn', 'Perhatian', '2,221', '2,847', 'Target: Jul 2026'],
                    ['Cyber Security', '🔐', 91, '#10B981', 'cc-ok', 'Sesuai', '2,591', '2,847', 'Refresh: Agt 2026'],
                    ['Fire Safety / APAR', '🧯', 88, '#4F46E5', 'cc-ok', 'Sesuai', '2,505', '2,847', 'Drill: Apr 2026'],
                    ['Ethics & Code of Conduct', '📖', 71, '#F59E0B', 'cc-warn', 'Perhatian', '2,021', '2,847', 'Reminder sent'],
                ]; @endphp
                @foreach($comps as $c)
                    <div class="comp-card">
                            <div class="cc-top"><div class="cc-icon">{{ $c[1] }}</div><span class="cc-status {{ $c[4] }}">{{ $c[5] }}</span></div>
                            <div class="
                        cc-name">{{ $c[0] }}</div>

                                            <div class="cc-bar"><div class="cc-fill" style="width:{{ $c[2] }}%;background:{{ $c[3] }}"></div></div>
                            <div class="cc-meta"><span>{{ $c[6] }} / {{ $c[7] }}</span><span style="font-weight:700;color:{{ $c[3] }}">{{ $c[2] }}%</span></div>
                            <div style="font-size:10px;color:#94A3B8;margin-top:6px">{{ $c[8] }}</div>
                        </div>
                @endforeach

                        
                           
                                
                            </div>
            
                       </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px">
            <div class="card">
                <div class="card-h"><h3>Departemen Berisiko</h3></div>
                @php $risky = [['Sales', 45, '#EF4444'], ['Marketing', 58, '#F59E0B'], ['Operations', 67, '#F59E0B'], ['R&D', 71, '#0EA5E9']]; @endphp
                @foreach($risky as $r)
                    <div style="display:flex;align-items:center;gap:10px;margin-bottom:10px">
                        <span style="font-size:13px;color:#475569;min-width:90px;font-weight:500">{{ $r[0] }}</span>
                        <div style="flex:1;height:8px;background:#F1F5F9;border-radius:10px;overflow:hidden"><div style="height:100%;width:{{ $r[1] }}%;background:{{ $r[2] }};border-radius:10px;transition:width 1s ease"></div></div>
                        <span style="font-size:1
                            3px;font-weight:700;
                            color:{{ $r[2] }};
                            min-width:35px;text-align:right">{{ $r[1] }}%</span>
                    </div>
                @endforeach
            </div>
        <div class="card">
        <div class="card-h"><h3>Aktivitas Terkini</h3></div>
    @php $acts = [['#10B981', 'IT menyelesaikan Cyber Security', '156 karyawan lulus', '2 jam lalu'], ['#F59E0B', 'Deadline Anti Bribery mendekati', 'Sisa 12 hari', '5 jam lalu'], ['#EF4444', 'GDPR rate turun ke 62%', 'Sales dept 38%', '1 hari lalu'], ['#4F46E5', 'Audit K3 dijadwalkan', 'Mei 2026', '2 hari lalu']]; @endphp
    @foreach($acts as $a)
        <div class="tl-item">
            <div class="tl-dot" style="background:{{ $a[0] }}"></div>
            <div class="tl-content"><h4>{{ $a[1] }}</h4><p>{{ $a[2] }}</p><div class="tl-time">{{ $a[3] }}</div></div>
        </div>
    @endforeach
</div>
</div>
</div>
</x-app-layout>
