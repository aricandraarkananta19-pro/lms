@php
    $totalCourses = \App\Models\Course::count();
    $recentCourses = \App\Models\Course::latest()->take(5)->get();
@endphp

<x-app-layout>
    <x-slot name="header">
        <h1 style="font-size:18px;font-weight:700;margin:0;">Dashboard</h1>
    </x-slot>

    @push('styles')
        <style>
            .dash {
                display: grid;
                gap: 20px;
            }

            /* Welcome */
            .welcome {
                background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 50%, #0EA5E9 100%);
                border-radius: 16px;
                padding: 28px 32px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                color: #fff;
                position: relative;
                overflow: hidden;
            }

            .welcome::before {
                content: '';
                position: absolute;
                top: -40px;
                right: -40px;
                width: 200px;
                height: 200px;
                border-radius: 50%;
                background: rgba(255, 255, 255, .08);
            }

            .welcome::after {
                content: '';
                position: absolute;
                bottom: -60px;
                right: 80px;
                width: 150px;
                height: 150px;
                border-radius: 50%;
                background: rgba(255, 255, 255, .05);
            }

            .welcome h2 {
                font-size: 22px;
                font-weight: 800;
                margin-bottom: 6px;
                position: relative;
                z-index: 1;
            }

            .welcome p {
                font-size: 14px;
                opacity: .85;
                position: relative;
                z-index: 1;
            }

            .welcome-actions {
                display: flex;
                gap: 8px;
                position: relative;
                z-index: 1;
            }

            .btn {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                padding: 10px 20px;
                border-radius: 10px;
                font-weight: 600;
                font-size: 13px;
                text-decoration: none;
                border: none;
                cursor: pointer;
                font-family: inherit;
                transition: all .2s ease;
            }

            .btn-white {
                background: #fff;
                color: #4F46E5;
                box-shadow: 0 4px 12px rgba(0, 0, 0, .15);
            }

            .btn-white:hover {
                transform: translateY(-1px);
                box-shadow: 0 6px 20px rgba(0, 0, 0, .2);
            }

            .btn-ghost {
                background: rgba(255, 255, 255, .15);
                color: #fff;
                backdrop-filter: blur(4px);
            }

            .btn-ghost:hover {
                background: rgba(255, 255, 255, .25);
            }

            /* Stats */
            .stats {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 16px;
            }

            .stat-card {
                background: #fff;
                border: 1px solid #E2E8F0;
                border-radius: 16px;
                padding: 20px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, .06);
                transition: all .2s;
                position: relative;
                overflow: hidden;
            }

            .stat-card:hover {
                box-shadow: 0 4px 12px rgba(0, 0, 0, .08);
                transform: translateY(-2px);
            }

            .stat-header {
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                margin-bottom: 12px;
            }

            .stat-icon {
                width: 44px;
                height: 44px;
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .stat-icon-indigo {
                background: #EEF2FF;
                color: #4F46E5;
            }

            .stat-icon-sky {
                background: #E0F2FE;
                color: #0EA5E9;
            }

            .stat-icon-emerald {
                background: #D1FAE5;
                color: #10B981;
            }

            .stat-icon-rose {
                background: #FEE2E2;
                color: #EF4444;
            }

            .stat-badge {
                font-size: 11px;
                padding: 3px 8px;
                border-radius: 20px;
                font-weight: 600;
                display: inline-flex;
                align-items: center;
                gap: 3px;
            }

            .stat-badge-up {
                background: #D1FAE5;
                color: #059669;
            }

            .stat-badge-down {
                background: #FEE2E2;
                color: #DC2626;
            }

            .stat-label {
                font-size: 12px;
                color: #64748B;
                font-weight: 500;
                margin-bottom: 4px;
                text-transform: uppercase;
                letter-spacing: .04em;
            }

            .stat-value {
                font-size: 28px;
                font-weight: 800;
                color: #0F172A;
                letter-spacing: -.02em;
            }

            /* Charts row */
            .charts-row {
                display: grid;
                grid-template-columns: 1.5fr 1fr;
                gap: 16px;
            }

            .card {
                background: #fff;
                border: 1px solid #E2E8F0;
                border-radius: 16px;
                padding: 24px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, .06);
            }

            .card-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 20px;
            }

            .card-title {
                font-size: 15px;
                font-weight: 700;
                color: #0F172A;
            }

            .card-tag {
                font-size: 12px;
                color: #64748B;
                font-weight: 500;
                background: #F1F5F9;
                padding: 4px 12px;
                border-radius: 8px;
            }

            /* Bar chart */
            .bar-chart {
                display: flex;
                align-items: flex-end;
                gap: 8px;
                height: 180px;
            }

            .bar-col {
                flex: 1;
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 6px;
            }

            .bar {
                width: 100%;
                border-radius: 8px 8px 2px 2px;
                min-height: 4px;
                cursor: pointer;
                transition: all .2s;
                position: relative;
            }

            .bar:hover {
                filter: brightness(1.1);
                transform: scaleY(1.03);
                transform-origin: bottom;
            }

            .bar-label {
                font-size: 11px;
                color: #94A3B8;
                font-weight: 500;
            }

            /* Compliance */
            .comp-list {
                display: flex;
                flex-direction: column;
                gap: 14px;
            }

            .comp-item {
                display: flex;
                align-items: center;
                gap: 12px;
            }

            .comp-name {
                font-size: 13px;
                color: #475569;
                min-width: 80px;
                font-weight: 500;
            }

            .comp-track {
                flex: 1;
                height: 10px;
                background: #F1F5F9;
                border-radius: 10px;
                overflow: hidden;
            }

            .comp-fill {
                height: 100%;
                border-radius: 10px;
                transition: width 1.5s ease;
            }

            .comp-pct {
                font-size: 13px;
                font-weight: 700;
                min-width: 40px;
                text-align: right;
            }

            /* Bottom row */
            .bottom-row {
                display: grid;
                grid-template-columns: 1.2fr 1fr;
                gap: 16px;
            }

            .table-wrap {
                overflow-x: auto;
            }

            table {
                width: 100%;
                border-collapse: separate;
                border-spacing: 0;
            }

            thead th {
                text-align: left;
                font-size: 11px;
                color: #64748B;
                text-transform: uppercase;
                letter-spacing: .06em;
                font-weight: 600;
                padding: 12px 16px;
                background: #F8FAFC;
                border-bottom: 1px solid #E2E8F0;
            }

            thead th:first-child {
                border-radius: 12px 0 0 0;
            }

            thead th:last-child {
                border-radius: 0 12px 0 0;
            }

            td {
                padding: 14px 16px;
                font-size: 13px;
                border-bottom: 1px solid #F1F5F9;
                color: #475569;
            }

            tr:hover td {
                background: #F8FAFC;
            }

            .course-cell {
                display: flex;
                align-items: center;
                gap: 12px;
            }

            .course-thumb {
                width: 40px;
                height: 40px;
                border-radius: 10px;
                background: linear-gradient(135deg, #EEF2FF, #E0E7FF);
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 16px;
                flex-shrink: 0;
            }

            .course-name {
                font-weight: 600;
                color: #0F172A;
            }

            .course-date {
                font-size: 11px;
                color: #94A3B8;
                margin-top: 1px;
            }

            .status-pill {
                font-size: 11px;
                padding: 4px 10px;
                border-radius: 20px;
                font-weight: 600;
            }

            .status-active {
                background: #D1FAE5;
                color: #059669;
            }

            .status-pending {
                background: #FEF3C7;
                color: #B45309;
            }

            .progress-bar {
                width: 80px;
                height: 6px;
                background: #F1F5F9;
                border-radius: 10px;
                overflow: hidden;
            }

            .progress-fill {
                height: 100%;
                border-radius: 10px;
            }

            /* Alerts */
            .alert-list {
                display: flex;
                flex-direction: column;
                gap: 8px;
            }

            .alert-item {
                display: flex;
                align-items: flex-start;
                gap: 12px;
                padding: 14px;
                border-radius: 12px;
                background: #F8FAFC;
                border: 1px solid #F1F5F9;
                transition: all .15s;
            }

            .alert-item:hover {
                border-color: #E2E8F0;
                box-shadow: 0 2px 8px rgba(0, 0, 0, .04);
            }

            .alert-icon {
                width: 36px;
                height: 36px;
                border-radius: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-shrink: 0;
                font-size: 16px;
            }

            .alert-icon-red {
                background: #FEE2E2;
            }

            .alert-icon-amber {
                background: #FEF3C7;
            }

            .alert-icon-sky {
                background: #E0F2FE;
            }

            .alert-title {
                font-size: 13px;
                font-weight: 600;
                color: #0F172A;
                margin-bottom: 2px;
            }

            .alert-desc {
                font-size: 12px;
                color: #64748B;
                line-height: 1.4;
            }

            .alert-time {
                font-size: 11px;
                color: #94A3B8;
                margin-top: 4px;
            }

            @media (max-width: 1024px) {
                .stats {
                    grid-template-columns: repeat(2, 1fr);
                }

                .charts-row,
                .bottom-row {
                    grid-template-columns: 1fr;
                }
            }

            @media (max-width: 640px) {
                .stats {
                    grid-template-columns: 1fr;
                }

                .welcome {
                    flex-direction: column;
                    gap: 16px;
                    align-items: flex-start;
                    text-align: left;
                }
            }
        </style>
    @endpush

    <div class="dash">
        <!-- Welcome -->
        <div class="welcome">
            <div>
                <h2>Selamat Datang, {{ auth()->user()->name }}! 👋</h2>
                <p>Pantau progres pelatihan dan kepatuhan karyawan perusahaan Anda.</p>
            </div>
            <div class="welcome-actions">
                <a href="{{ route('courses.create') }}" class="btn btn-white">
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Buat Pelatihan
                </a>
                <a href="{{ route('courses.index') }}" class="btn btn-ghost">Lihat Semua</a>
            </div>
        </div>

        <!-- Stats -->
        <div class="stats">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon stat-icon-indigo">
                        <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <span class="stat-badge stat-badge-up">↑ 12%</span>
                </div>
                <div class="stat-label">Total Karyawan</div>
                <div class="stat-value">2,847</div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon stat-icon-sky">
                        <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <span class="stat-badge stat-badge-up">↑ 8%</span>
                </div>
                <div class="stat-label">Pelatihan Aktif</div>
                <div class="stat-value">{{ $totalCourses > 0 ? $totalCourses : 156 }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon stat-icon-emerald">
                        <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <span class="stat-badge stat-badge-up">↑ 3.1%</span>
                </div>
                <div class="stat-label">Tingkat Kepatuhan</div>
                <div class="stat-value" style="color:#10B981">94.2%</div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon stat-icon-rose">
                        <svg width="22" height="22" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <span class="stat-badge stat-badge-down">⚠ Segera</span>
                </div>
                <div class="stat-label">Sertifikat Kedaluwarsa</div>
                <div class="stat-value" style="color:#EF4444">23</div>
            </div>
        </div>

        <!-- Charts -->
        <div class="charts-row">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Progres Pelatihan per Departemen</div>
                    <span class="card-tag">Jan — Mar 2026</span>
                </div>
                <div class="bar-chart">
                    @php $depts = [['IT', 92], ['HR', 88], ['Sales', 45], ['Finance', 95], ['Ops', 72], ['Legal', 56], ['Mktg', 81], ['R&D', 90]]; @endphp
                    @foreach($depts as $d)
                        <div class="bar-col">
                            <div class="bar"
                                style="height:{{ $d[1] }}%;background:{{ $d[1] >= 80 ? 'linear-gradient(to top,#4F46E5,#818CF8)' : ($d[1] >= 60 ? 'linear-gradient(to top,#0EA5E9,#38BDF8)' : 'linear-gradient(to top,#F59E0B,#FCD34D)') }}"
                                title="{{ $d[0] }}: {{ $d[1] }}%"></div>
                            <span class="bar-label">{{ $d[0] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tingkat Kepatuhan</div>
                </div>
                <div class="comp-list">
                    @php $comps = [['K3 Safety', 96, '#10B981'], ['ISO 9001', 89, '#4F46E5'], ['Anti Bribery', 74, '#F59E0B'], ['GDPR', 62, '#EF4444'], ['SOX', 85, '#0EA5E9'], ['ESG', 78, '#8B5CF6']]; @endphp
                    @foreach($comps as $c)
                        <div class="comp-item">
                            <span class="comp-name">{{ $c[0] }}</span>
                            <div class="comp-track">
                                <div class="comp-fill" style="width:{{ $c[1] }}%;background:{{ $c[2] }}"></div>
                            </div>
                            <span class="comp-pct" style="color:{{ $c[2] }}">{{ $c[1] }}%</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Bottom Row -->
        <div class="bottom-row">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Pelatihan Terbaru</div>
                    <a href="{{ route('courses.index') }}"
                        style="font-size:13px;color:#4F46E5;text-decoration:none;font-weight:600;">Lihat Semua →</a>
                </div>
                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Pelatihan</th>
                                <th>Status</th>
                                <th>Progres</th>
                                <th>Peserta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentCourses as $idx => $course)
                                <tr>
                                    <td>
                                        <div class="course-cell">
                                            <div class="course-thumb">📚</div>
                                            <div>
                                                <div class="course-name">{{ $course->title }}</div>
                                                <div class="course-date">{{ $course->created_at->format('d M Y') }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span
                                            class="status-pill {{ $idx % 3 == 0 ? 'status-pending' : 'status-active' }}">{{ $idx % 3 == 0 ? 'Pending' : 'Aktif' }}</span>
                                    </td>
                                    <td>
                                        @php $prog = [72, 88, 45, 91, 63][$idx % 5]; @endphp
                                        <div style="display:flex;align-items:center;gap:8px">
                                            <div class="progress-bar">
                                                <div class="progress-fill"
                                                    style="width:{{ $prog }}%;background:{{ $prog >= 70 ? '#10B981' : '#F59E0B' }}">
                                                </div>
                                            </div>
                                            <span
                                                style="font-size:12px;font-weight:600;color:{{ $prog >= 70 ? '#059669' : '#B45309' }}">{{ $prog }}%</span>
                                        </div>
                                    </td>
                                    <td style="font-size:12px;color:#64748B">{{ [24, 156, 87, 42, 210][$idx % 5] }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" style="text-align:center;padding:40px;color:#94A3B8;">
                                        <svg style="margin:0 auto 12px;display:block" width="40" height="40" fill="none"
                                            stroke="#CBD5E1" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                        </svg>
                                        Belum ada pelatihan. <a href="{{ route('courses.create') }}"
                                            style="color:#4F46E5;font-weight:600;">Buat sekarang →</a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Notifikasi Terbaru</div>
                    <span class="card-tag">5 baru</span>
                </div>
                <div class="alert-list">
                    <div class="alert-item">
                        <div class="alert-icon alert-icon-red">⚠️</div>
                        <div>
                            <div class="alert-title">23 Sertifikat Segera Kedaluwarsa</div>
                            <div class="alert-desc">K3 Safety departemen Operasional, kedaluwarsa dalam 7 hari.</div>
                            <div class="alert-time">2 jam lalu</div>
                        </div>
                    </div>
                    <div class="alert-item">
                        <div class="alert-icon alert-icon-amber">📋</div>
                        <div>
                            <div class="alert-title">Compliance Rate Dept. Sales Menurun</div>
                            <div class="alert-desc">Turun ke 45%, perlu tindakan segera.</div>
                            <div class="alert-time">5 jam lalu</div>
                        </div>
                    </div>
                    <div class="alert-item">
                        <div class="alert-icon alert-icon-sky">🎯</div>
                        <div>
                            <div class="alert-title">Pelatihan Baru Dipublikasikan</div>
                            <div class="alert-desc">ISO 27001 Security Awareness telah aktif.</div>
                            <div class="alert-time">1 hari lalu</div>
                        </div>
                    </div>
                    <div class="alert-item">
                        <div class="alert-icon alert-icon-amber">📝</div>
                        <div>
                            <div class="alert-title">12 Tugas Menunggu Review</div>
                            <div class="alert-desc">Assessment leadership batch Februari.</div>
                            <div class="alert-time">1 hari lalu</div>
                        </div>
                    </div>
                    <div class="alert-item">
                        <div class="alert-icon alert-icon-sky">🏆</div>
                        <div>
                            <div class="alert-title">156 Karyawan Lulus Bulan Ini</div>
                            <div class="alert-desc">Sertifikat siap diterbitkan.</div>
                            <div class="alert-time">2 hari lalu</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>