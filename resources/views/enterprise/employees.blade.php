<x-app-layout>
    <x-slot name="header">
        <h1 style="font-size:18px;font-weight:700;margin:0;">Manajemen Karyawan</h1>
    </x-slot>
    @push('styles')
        <style>
            .ep {
                display: grid;
                gap: 16px
            }

            .ep-top {
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-wrap: wrap;
                gap: 12px
            }

            .ep-stats {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 14px
            }

            .es {
                background: #fff;
                border: 1px solid #E2E8F0;
                border-radius: 16px;
                padding: 20px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, .06);
                transition: all .2s
            }

            .es:hover {
                box-shadow: 0 4px 12px rgba(0, 0, 0, .08);
                transform: translateY(-2px)
            }

            .es-label {
                font-size: 11px;
                color: #64748B;
                text-transform: uppercase;
                letter-spacing: .05em;
                margin-bottom: 6px;
                font-weight: 600
            }

            .es-val {
                font-size: 26px;
                font-weight: 800;
                color: #0F172A;
                letter-spacing: -.02em
            }

            .es-sub {
                font-size: 11px;
                color: #10B981;
                margin-top: 4px;
                font-weight: 500
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

            .card-h .tag {
                font-size: 12px;
                color: #64748B;
                background: #F1F5F9;
                padding: 4px 12px;
                border-radius: 8px;
                font-weight: 500
            }

            .btn-p {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                padding: 9px 18px;
                border-radius: 10px;
                font-weight: 600;
                font-size: 13px;
                border: none;
                cursor: pointer;
                font-family: inherit;
                transition: all .2s
            }

            .btn-primary {
                background: #4F46E5;
                color: #fff;
                box-shadow: 0 2px 8px rgba(79, 70, 229, .25)
            }

            .btn-primary:hover {
                background: #4338CA;
                transform: translateY(-1px);
                box-shadow: 0 4px 12px rgba(79, 70, 229, .3)
            }

            .btn-outline {
                background: #fff;
                border: 1px solid #E2E8F0;
                color: #475569
            }

            .btn-outline:hover {
                border-color: #4F46E5;
                color: #4F46E5;
                background: #EEF2FF
            }

            .emp-table {
                width: 100%;
                border-collapse: separate;
                border-spacing: 0
            }

            .emp-table th {
                text-align: left;
                font-size: 11px;
                color: #64748B;
                text-transform: uppercase;
                letter-spacing: .06em;
                font-weight: 600;
                padding: 12px 16px;
                background: #F8FAFC;
                border-bottom: 1px solid #E2E8F0
            }

            .emp-table th:first-child {
                border-radius: 12px 0 0 0
            }

            .emp-table th:last-child {
                border-radius: 0 12px 0 0
            }

            .emp-table td {
                padding: 14px 16px;
                font-size: 13px;
                border-bottom: 1px solid #F1F5F9;
                color: #475569
            }

            .emp-table tr:hover td {
                background: #F8FAFC
            }

            .emp-cell {
                display: flex;
                align-items: center;
                gap: 12px
            }

            .emp-av {
                width: 38px;
                height: 38px;
                border-radius: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: 700;
                font-size: 13px;
                flex-shrink: 0;
                color: #fff
            }

            .emp-name {
                font-weight: 600;
                color: #0F172A
            }

            .emp-email {
                font-size: 11px;
                color: #94A3B8;
                margin-top: 1px
            }

            .dept-badge {
                font-size: 11px;
                padding: 4px 10px;
                border-radius: 20px;
                font-weight: 600
            }

            .dept-it {
                background: #E0F2FE;
                color: #0369A1
            }

            .dept-hr {
                background: #D1FAE5;
                color: #047857
            }

            .dept-fin {
                background: #FEF3C7;
                color: #B45309
            }

            .dept-sales {
                background: #EDE9FE;
                color: #6D28D9
            }

            .dept-ops {
                background: #FEE2E2;
                color: #B91C1C
            }

            .dept-legal {
                background: #EEF2FF;
                color: #4338CA
            }

            .status-dot {
                width: 8px;
                height: 8px;
                border-radius: 50%;
                display: inline-block;
                margin-right: 6px
            }

            .status-active .status-dot {
                background: #10B981
            }

            .status-inactive .status-dot {
                background: #EF4444
            }

            .prog-bar {
                width: 80px;
                height: 6px;
                background: #F1F5F9;
                border-radius: 10px;
                overflow: hidden
            }

            .prog-fill {
                height: 100%;
                border-radius: 10px
            }

            .dc-item {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-bottom: 10px
            }

            .dc-name {
                font-size: 13px;
                color: #475569;
                min-width: 80px;
                font-weight: 500
            }

            .dc-bar {
                flex: 1;
                height: 10px;
                background: #F1F5F9;
                border-radius: 10px;
                overflow: hidden
            }

            .dc-fill {
                height: 100%;
                border-radius: 10px;
                transition: width 1s ease
            }

            .dc-count {
                font-size: 13px;
                font-weight: 700;
                min-width: 30px;
                text-align: right
            }

            @media(max-width:1024px) {
                .ep-stats {
                    grid-template-columns: repeat(2, 1fr)
                }
            }

            @media(max-width:640px) {
                .ep-stats {
                    grid-template-columns: 1fr
                }

                .ep-top {
                    flex-direction: column;
                    align-items: flex-start
                }
            }
        </style>
    @endpush
    <div class="ep">
        <div class="ep-top">
            <div>
                <p style="font-size:14px;color:#64748B">Kelola seluruh data karyawan dan departemen perusahaan</p>
            </div>
            <div style="display:flex;gap:8px">
                <button class="btn-p btn-outline">📥 Import Excel</button>
                <button class="btn-p btn-primary">➕ Tambah Karyawan</button>
            </div>
        </div>
        <div class="ep-stats">
            <div class="es">
                <div class="es-label">Total Karyawan</div>
                <div class="es-val">2,847</div>
                <div class="es-sub">↑ 124 bulan ini</div>
            </div>
            <div class="es">
                <div class="es-label">Karyawan Aktif</div>
                <div class="es-val" style="color:#10B981">2,691</div>
                <div class="es-sub">94.5% dari total</div>
            </div>
            <div class="es">
                <div class="es-label">Departemen</div>
                <div class="es-val" style="color:#4F46E5">12</div>
                <div class="es-sub">6 lokasi kantor</div>
            </div>
            <div class="es">
                <div class="es-label">Rata-rata Pelatihan</div>
                <div class="es-val" style="color:#0EA5E9">8.3</div>
                <div class="es-sub">kursus / karyawan</div>
            </div>
        </div>
        <div style="display:grid;grid-template-columns:2fr 1fr;gap:16px">
            <div class="card">
                <div class="card-h">
                    <h3>Daftar Karyawan</h3><span class="tag">2,847 karyawan</span>
                </div>
                <div style="overflow-x:auto">
                    <table class="emp-table">
                        <thead>
                            <tr>
                                <th>Karyawan</th>
                                <th>Departemen</th>
                                <th>Status</th>
                                <th>Pelatihan</th>
                                <th>Bergabung</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $emps = [['Andi Prasetyo', 'andi@company.co.id', 'IT', 'it', '#0EA5E9', 95, true], ['Siti Rahayu', 'siti@company.co.id', 'HR', 'hr', '#10B981', 88, true], ['Budi Santoso', 'budi@company.co.id', 'Finance', 'fin', '#F59E0B', 72, true], ['Dewi Lestari', 'dewi@company.co.id', 'Sales', 'sales', '#8B5CF6', 45, true], ['Rizky Fadillah', 'rizky@company.co.id', 'Operations', 'ops', '#EF4444', 61, false], ['Maya Putri', 'maya@company.co.id', 'Legal', 'legal', '#4F46E5', 83, true], ['Hendra Wijaya', 'hendra@company.co.id', 'IT', 'it', '#0EA5E9', 91, true], ['Ratna Sari', 'ratna@company.co.id', 'HR', 'hr', '#10B981', 78, true]]; @endphp
                            @foreach($emps as $e)
                                <tr>
                                    <td>
                                        <div class="emp-cell">
                                            <div class="emp-av" style="background:{{ $e[4] }}">
                                                {{ strtoupper(substr($e[0], 0, 2)) }}</div>
                                            <div>
                                                <div class="emp-name">{{ $e[0] }}</div>
                                                <div class="emp-email">{{ $e[1] }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="dept-badge dept-{{ $e[3] }}">{{ $e[2] }}</span></td>
                                    <td><span class="{{ $e[6] ? 'status-active' : 'status-inactive' }}"><span
                                                class="status-dot"></span>{{ $e[6] ? 'Aktif' : 'Nonaktif' }}</span></td>
                                    <td>
                                        <div style="display:flex;align-items:center;gap:8px">
                                            <div class="prog-bar">
                                                <div class="prog-fill"
                                                    style="width:{{ $e[5] }}%;background:{{ $e[5] >= 70 ? '#10B981' : ($e[5] >= 50 ? '#F59E0B' : '#EF4444') }}">
                                                </div>
                                            </div><span
                                                style="font-size:12px;font-weight:600;color:{{ $e[5] >= 70 ? '#059669' : ($e[5] >= 50 ? '#B45309' : '#DC2626') }}">{{ $e[5] }}%</span>
                                        </div>
                                    </td>
                                    <td style="font-size:12px;color:#94A3B8">
                                        {{ ['15 Jan 2024', '20 Jun 2023', '10 Mar 2024', '01 Aug 2024', '05 Nov 2023', '28 Feb 2024', '14 Sep 2023', '22 May 2024'][$loop->index] }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-h">
                    <h3>Per Departemen</h3>
                </div>
                @php $depts = [['IT', 342, '#0EA5E9'], ['HR', 185, '#10B981'], ['Finance', 220, '#F59E0B'], ['Sales', 410, '#8B5CF6'], ['Operations', 580, '#EF4444'], ['Legal', 95, '#4F46E5'], ['Marketing', 315, '#EC4899'], ['R&D', 200, '#14B8A6']]; @endphp
                @foreach($depts as $d)
                    <div class="dc-item">
                        <span class="dc-name">{{ $d[0] }}</span>
                        <div class="dc-bar">
                            <div class="dc-fill" style="width:{{ ($d[1] / 580) * 100 }}%;background:{{ $d[2] }}"></div>
                        </div>
                        <span class="dc-count" style="color:{{ $d[2] }}">{{ $d[1] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>