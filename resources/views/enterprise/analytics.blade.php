<x-app-layout>
    <x-slot name="header">
        <h1 style="font-size:18px;font-weight:700;margin:0;">Laporan & Analitik</h1>
    </x-slot>
    @push('styles')
        <style>
            .an {
                display: grid;
                gap: 16px
            }

            .an-top {
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-wrap: wrap;
                gap: 12px
            }

            .an-filters {
                display: flex;
                gap: 6px
            }

            .an-filter {
                background: #fff;
                border: 1px solid #E2E8F0;
                border-radius: 10px;
                padding: 8px 16px;
                color: #475569;
                font-size: 13px;
                font-family: inherit;
                cursor: pointer;
                font-weight: 500;
                transition: all .15s
            }

            .an-filter:hover {
                border-color: #4F46E5;
                color: #4F46E5
            }

            .an-filter.act {
                background: #4F46E5;
                color: #fff;
                border-color: #4F46E5
            }

            .kpi-row {
                display: grid;
                grid-template-columns: repeat(5, 1fr);
                gap: 14px
            }

            .kpi {
                background: #fff;
                border: 1px solid #E2E8F0;
                border-radius: 16px;
                padding: 20px;
                text-align: center;
                box-shadow: 0 1px 3px rgba(0, 0, 0, .06);
                transition: all .2s
            }

            .kpi:hover {
                box-shadow: 0 4px 12px rgba(0, 0, 0, .08);
                transform: translateY(-2px)
            }

            .kpi-val {
                font-size: 24px;
                font-weight: 800;
                color: #0F172A;
                margin-bottom: 2px
            }

            .kpi-label {
                font-size: 10px;
                color: #64748B;
                text-transform: uppercase;
                letter-spacing: .06em;
                font-weight: 600
            }

            .kpi-trend {
                font-size: 11px;
                margin-top: 4px;
                font-weight: 600
            }

            .kpi-up {
                color: #059669
            }

            .kpi-down {
                color: #DC2626
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

            .tag {
                font-size: 12px;
                color: #64748B;
                background: #F1F5F9;
                padding: 4px 12px;
                border-radius: 8px;
                font-weight: 500
            }

            .line-data {
                display: grid;
                grid-template-columns: repeat(12, 1fr);
                gap: 4px;
                align-items: flex-end
            }

            .line-point {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 4px
            }

            .line-label {
                font-size: 10px;
                color: #94A3B8;
                font-weight: 500
            }

            .rank-list {
                display: flex;
                flex-direction: column;
                gap: 6px
            }

            .rank-item {
                display: flex;
                align-items: center;
                gap: 10px;
                padding: 10px 12px;
                border-radius: 10px;
                background: #F8FAFC;
                transition: background .15s
            }

            .rank-item:hover {
                background: #EEF2FF
            }

            .rank-num {
                width: 24px;
                height: 24px;
                border-radius: 8px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 11px;
                font-weight: 800;
                flex-shrink: 0
            }

            .rank-1 {
                background: linear-gradient(135deg, #F59E0B, #D97706);
                color: #fff
            }

            .rank-2 {
                background: #E2E8F0;
                color: #475569
            }

            .rank-3 {
                background: #FED7AA;
                color: #9A3412
            }

            .rank-n {
                background: #F1F5F9;
                color: #94A3B8
            }

            .rank-name {
                flex: 1;
                font-size: 13px;
                font-weight: 600;
                color: #0F172A
            }

            .rank-score {
                font-size: 13px;
                font-weight: 700
            }

            .heat-grid {
                display: grid;
                grid-template-columns: repeat(7, 1fr);
                gap: 3px
            }

            .heat-cell {
                aspect-ratio: 1;
                border-radius: 4px;
                cursor: pointer;
                transition: transform .2s
            }

            .heat-cell:hover {
                transform: scale(1.2)
            }

            .btn-export {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                padding: 9px 18px;
                border-radius: 10px;
                font-weight: 600;
                font-size: 13px;
                background: #4F46E5;
                color: #fff;
                border: none;
                cursor: pointer;
                font-family: inherit;
                box-shadow: 0 2px 8px rgba(79, 70, 229, .25);
                transition: all .2s
            }

            .btn-export:hover {
                background: #4338CA;
                transform: translateY(-1px)
            }

            @media(max-width:1024px) {
                .kpi-row {
                    grid-template-columns: repeat(3, 1fr)
                }
            }

            @media(max-width:640px) {
                .kpi-row {
                    grid-template-columns: repeat(2, 1fr)
                }
            }
        </style>
    @endpush
    <div class="an">
        <div class="an-top">
            <div class="an-filters"><button class="an-filter act">Bulan Ini</button><button
                    class="an-filter">Kuartal</button><button class="an-filter">Tahun</button></div>
            <button class="btn-export">📥 Export Laporan</button>
        </div>
        <div class="kpi-row">
            <div class="kpi">
                <div class="kpi-val">2,847</div>
                <div class="kpi-label">Total Learners</div>
                <div class="kpi-trend kpi-up">↑ 12.5%</div>
            </div>
            <div class="kpi">
                <div class="kpi-val">{{ $totalCourses > 0 ? $totalCourses : 156 }}</div>
                <div class="kpi-label">Active Courses</div>
                <div class="kpi-trend kpi-up">↑ 8.3%</div>
            </div>
            <div class="kpi">
                <div class="kpi-val" style="color:#10B981">94.2%</div>
                <div class="kpi-label">Completion Rate</div>
                <div class="kpi-trend kpi-up">↑ 3.1%</div>
            </div>
            <div class="kpi">
                <div class="kpi-val" style="color:#4F46E5">4.7</div>
                <div class="kpi-label">Avg Satisfaction</div>
                <div class="kpi-trend kpi-up">↑ 0.3</div>
            </div>
            <div class="kpi">
                <div class="kpi-val" style="color:#0EA5E9">23.5h</div>
                <div class="kpi-label">Avg Learning Time</div>
                <div class="kpi-trend kpi-up">↑ 4.2h</div>
            </div>
        </div>
        <div style="display:grid;grid-template-columns:2fr 1fr;gap:16px">
            <div class="card">
                <div class="card-h">
                    <h3>📈 Enrollment & Completion Trend</h3><span class="tag">12 bulan</span>
                </div>
                <div class="line-data">
                    @php $months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'];
                        $enrolled = [120, 145, 132, 178, 195, 210, 225, 198, 240, 268, 285, 312];
                    $completed = [95, 120, 110, 152, 168, 185, 200, 175, 215, 240, 260, 289]; @endphp
                    @foreach($months as $i => $m)
                        <div class="line-point">
                            <div style="display:flex;gap:2px;align-items:flex-end;height:150px;width:100%">
                                <div
                                    style="height:{{ ($enrolled[$i] / 312) * 100 }}%;background:linear-gradient(to top,rgba(79,70,229,.2),rgba(79,70,229,.6));flex:1;border-radius:4px 4px 0 0">
                                </div>
                                <div
                                    style="height:{{ ($completed[$i] / 312) * 100 }}%;background:linear-gradient(to top,rgba(14,165,233,.2),rgba(14,165,233,.6));flex:1;border-radius:4px 4px 0 0">
                                </div>
                            </div>
                            <span class="line-label">{{ $m }}</span>
                        </div>
                    @endforeach
                </div>
                <div style="display:flex;gap:16px;margin-top:12px;justify-content:center">
                    <span style="font-size:11px;display:flex;align-items:center;gap:4px;color:#64748B"><span
                            style="width:10px;height:10px;border-radius:3px;background:rgba(79,70,229,.6)"></span>
                        Enrollment</span>
                    <span style="font-size:11px;display:flex;align-items:center;gap:4px;color:#64748B"><span
                            style="width:10px;height:10px;border-radius:3px;background:rgba(14,165,233,.6)"></span>
                        Completion</span>
                </div>
            </div>
            <div class="card">
                <div class="card-h">
                    <h3>🏆 Top Performers</h3>
                </div>
                <div class="rank-list">
                    @php $performers = [['Andi Prasetyo', '98%', 'rank-1'], ['Siti Rahayu', '95%', 'rank-2'], ['Budi Santoso', '93%', 'rank-3'], ['Maya Putri', '91%', 'rank-n'], ['Hendra Wijaya', '89%', 'rank-n'], ['Ratna Sari', '87%', 'rank-n'], ['Dewi Lestari', '85%', 'rank-n'], ['Tommy Setiawan', '83%', 'rank-n']]; @endphp
                    @foreach($performers as $idx => $p)
                        <div class="rank-item">
                            <div class="rank-num {{ $p[2] }}">{{ $idx + 1 }}</div>
                            <div class="rank-name">{{ $p[0] }}</div>
                            <div class="rank-score" style="color:{{ $idx < 3 ? '#4F46E5' : '#94A3B8' }}">{{ $p[1] }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px">
            <div class="card">
                <div class="card-h">
                    <h3>📊 Progres per Departemen</h3>
                </div>
                @php $depts = [['IT', 92, '#4F46E5'], ['Finance', 95, '#10B981'], ['R&D', 90, '#0EA5E9'], ['HR', 88, '#8B5CF6'], ['Marketing', 81, '#EC4899'], ['Operations', 72, '#F59E0B'], ['Legal', 56, '#F59E0B'], ['Sales', 45, '#EF4444']]; @endphp
                @foreach($depts as $d)
                    <div style="display:flex;align-items:center;gap:10px;margin-bottom:8px">
                        <span style="font-size:13px;color:#475569;min-width:80px;font-weight:500">{{ $d[0] }}</span>
                        <div style="flex:1;height:8px;background:#F1F5F9;border-radius:10px;overflow:hidden">
                            <div
                                style="height:100%;width:{{ $d[1] }}%;background:{{ $d[2] }};border-radius:10px;transition:width 1s">
                            </div>
                        </div>
                        <span
                            style="font-size:13px;font-weight:700;color:{{ $d[2] }};min-width:35px;text-align:right">{{ $d[1] }}%</span>
                    </div>
                @endforeach
            </div>
            <div class="card">
                <div class="card-h">
                    <h3>🗓️ Aktivitas Belajar</h3>
                </div>
                <div style="display:grid;grid-template-columns:repeat(7,1fr);gap:2px;margin-bottom:6px">
                    @foreach(['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'] as $d)<div
                    style="font-size:10px;color:#94A3B8;text-align:center;font-weight:500">{{ $d }}</div>@endforeach
                </div>
                <div class="heat-grid">
                    @for($i = 0; $i < 35; $i++)
                        @php $int = rand(0, 4);
                        $cols = ['#F1F5F9', '#C7D2FE', '#A5B4FC', '#818CF8', '#6366F1']; @endphp
                        <div class="heat-cell" style="background:{{ $cols[$int] }}"></div>
                    @endfor
                </div>
                <div style="display:flex;justify-content:flex-end;gap:3px;margin-top:8px;align-items:center">
                    <span style="font-size:10px;color:#94A3B8">Sedikit</span>
                    @foreach(['#F1F5F9', '#C7D2FE', '#A5B4FC', '#818CF8', '#6366F1'] as $c)<div
                    style="width:12px;height:12px;border-radius:3px;background:{{ $c }}"></div>@endforeach
                    <span style="font-size:10px;color:#94A3B8">Banyak</span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>