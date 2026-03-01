<x-app-layout>
    <x-slot name="header">
        <h1 style="font-size:18px;font-weight:700;margin:0;">Manajemen Tugas</h1>
    </x-slot>

    @push('styles')
        <style>
            .tg {
                display: grid;
                gap: 16px;
            }

            .tg-top {
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-wrap: wrap;
                gap: 12px;
            }

            .tg-stats {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 12px;
            }

            .ts {
                background: #fff;
                border: 1px solid #E2E8F0;
                border-radius: 14px;
                padding: 16px;
                display: flex;
                align-items: center;
                gap: 12px;
                box-shadow: 0 1px 2px rgba(0, 0, 0, .04);
            }

            .ts-icon {
                width: 40px;
                height: 40px;
                border-radius: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 17px;
                flex-shrink: 0;
            }

            .ts-val {
                font-size: 22px;
                font-weight: 800;
                color: #0F172A;
            }

            .ts-lbl {
                font-size: 11px;
                color: #64748B;
                font-weight: 500;
            }

            .task-card {
                background: #fff;
                border: 1px solid #E2E8F0;
                border-radius: 16px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, .04);
                overflow: hidden;
            }

            .task-card-header {
                padding: 16px 20px;
                border-bottom: 1px solid #F1F5F9;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .task-card-header h3 {
                font-size: 15px;
                font-weight: 700;
                color: #0F172A;
            }

            .task-table {
                width: 100%;
                border-collapse: separate;
                border-spacing: 0;
            }

            .task-table th {
                text-align: left;
                font-size: 11px;
                color: #64748B;
                text-transform: uppercase;
                letter-spacing: .06em;
                font-weight: 600;
                padding: 12px 20px;
                background: #F8FAFC;
                border-bottom: 1px solid #E2E8F0;
            }

            .task-table td {
                padding: 14px 20px;
                font-size: 13px;
                border-bottom: 1px solid #F1F5F9;
                color: #475569;
            }

            .task-table tr:hover td {
                background: #F8FAFC;
            }

            .task-table tr:last-child td {
                border-bottom: none;
            }

            .task-title {
                font-weight: 600;
                color: #0F172A;
                margin-bottom: 2px;
            }

            .task-desc {
                font-size: 11px;
                color: #94A3B8;
            }

            .task-course {
                font-size: 11px;
                padding: 4px 10px;
                border-radius: 20px;
                font-weight: 600;
                display: inline-flex;
                align-items: center;
                gap: 4px;
            }

            .task-due {
                font-size: 12px;
                font-weight: 500;
                display: flex;
                align-items: center;
                gap: 4px;
            }

            .due-ok {
                color: #059669;
            }

            .due-soon {
                color: #B45309;
            }

            .due-past {
                color: #DC2626;
            }

            .task-status {
                font-size: 10px;
                padding: 3px 8px;
                border-radius: 20px;
                font-weight: 700;
                text-transform: uppercase;
            }

            .status-open {
                background: #D1FAE5;
                color: #047857;
            }

            .status-review {
                background: #FEF3C7;
                color: #B45309;
            }

            .status-done {
                background: #EEF2FF;
                color: #4338CA;
            }

            .btn-view {
                font-size: 12px;
                padding: 6px 14px;
                border-radius: 8px;
                font-weight: 600;
                background: #EEF2FF;
                color: #4F46E5;
                text-decoration: none;
                display: inline-flex;
                align-items: center;
                gap: 4px;
                transition: all .15s;
                border: none;
                cursor: pointer;
                font-family: inherit;
            }

            .btn-view:hover {
                background: #C7D2FE;
            }

            .empty-box {
                text-align: center;
                padding: 48px 20px;
            }

            .empty-box h3 {
                font-size: 16px;
                font-weight: 700;
                color: #0F172A;
                margin: 12px 0 4px;
            }

            .empty-box p {
                font-size: 13px;
                color: #64748B;
            }

            /* Category colors */
            .cat-badge-se {
                background: rgba(79, 70, 229, .08);
                color: #4F46E5;
            }

            .cat-badge-ak {
                background: rgba(16, 185, 129, .08);
                color: #059669;
            }

            .cat-badge-ap {
                background: rgba(14, 165, 233, .08);
                color: #0369A1;
            }

            .cat-badge-app {
                background: rgba(236, 72, 153, .08);
                color: #BE185D;
            }

            .cat-badge-hr {
                background: rgba(139, 92, 246, .08);
                color: #6D28D9;
            }

            .cat-badge-pp {
                background: rgba(245, 158, 11, .08);
                color: #B45309;
            }

            @media(max-width:1024px) {
                .tg-stats {
                    grid-template-columns: repeat(2, 1fr);
                }
            }

            @media(max-width:640px) {
                .tg-stats {
                    grid-template-columns: 1fr;
                }
            }
        </style>
    @endpush

    <div class="tg">
        <div class="tg-top">
            <div style="font-size:14px;color:#64748B">Kelola semua tugas dari seluruh program pelatihan</div>
        </div>

        <div class="tg-stats">
            <div class="ts">
                <div class="ts-icon" style="background:#EEF2FF">📝</div>
                <div>
                    <div class="ts-val">{{ $tasks->total() }}</div>
                    <div class="ts-lbl">Total Tugas</div>
                </div>
            </div>
            <div class="ts">
                <div class="ts-icon" style="background:#D1FAE5">✅</div>
                <div>
                    <div class="ts-val">{{ $tasks->where('due_date', '>', now())->count() }}</div>
                    <div class="ts-lbl">Aktif</div>
                </div>
            </div>
            <div class="ts">
                <div class="ts-icon" style="background:#FEF3C7">⏰</div>
                <div>
                    <div class="ts-val">{{ $tasks->where('due_date', '<=', now())->count() }}</div>
                    <div class="ts-lbl">Melewati Tenggat</div>
                </div>
            </div>
            <div class="ts">
                <div class="ts-icon" style="background:#EDE9FE">📚</div>
                <div>
                    <div class="ts-val">{{ $tasks->pluck('course_id')->unique()->count() }}</div>
                    <div class="ts-lbl">Pelatihan</div>
                </div>
            </div>
        </div>

        <div class="task-card">
            <div class="task-card-header">
                <h3>📋 Daftar Tugas</h3>
                <span
                    style="font-size:12px;color:#64748B;background:#F1F5F9;padding:4px 12px;border-radius:8px;font-weight:500">{{ $tasks->total() }}
                    tugas</span>
            </div>

            @if($tasks->count() > 0)
                <div style="overflow-x:auto">
                    <table class="task-table">
                        <thead>
                            <tr>
                                <th>Tugas</th>
                                <th>Program Pelatihan</th>
                                <th>Tenggat Waktu</th>
                                <th>Status</th>
                                <th style="text-align:right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                @php
                                    $catKey = $task->course->category ?? 'service-excellence';
                                    $catMap = ['service-excellence' => 'cat-badge-se', 'administrasi-keuangan' => 'cat-badge-ak', 'administrasi-perkantoran' => 'cat-badge-ap', 'aplikasi-perkantoran' => 'cat-badge-app', 'hr-sdm' => 'cat-badge-hr', 'pelayanan-pelanggan' => 'cat-badge-pp'];
                                    $catClass = $catMap[$catKey] ?? 'cat-badge-se';
                                    $catLabel = \App\Models\Course::CATEGORIES[$catKey] ?? 'Service Excellence';
                                    $isPast = $task->due_date && \Carbon\Carbon::parse($task->due_date)->isPast();
                                    $isSoon = $task->due_date && !$isPast && \Carbon\Carbon::parse($task->due_date)->diffInDays(now()) <= 3;
                                @endphp
                                <tr>
                                    <td>
                                        <div class="task-title">{{ $task->title }}</div>
                                        <div class="task-desc">{{ Str::limit($task->description, 50) }}</div>
                                    </td>
                                    <td>
                                        <span class="task-course {{ $catClass }}">📚 {{ $task->course->title }}</span>
                                    </td>
                                    <td>
                                        @if($task->due_date)
                                            <div class="task-due {{ $isPast ? 'due-past' : ($isSoon ? 'due-soon' : 'due-ok') }}">
                                                {{ $isPast ? '⚠️' : ($isSoon ? '⏰' : '📅') }}
                                                {{ \Carbon\Carbon::parse($task->due_date)->format('d M Y, H:i') }}
                                            </div>
                                        @else
                                            <span style="font-size:12px;color:#94A3B8">Tanpa tenggat</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="task-status {{ $isPast ? 'status-review' : 'status-open' }}">
                                            {{ $isPast ? 'Overdue' : 'Aktif' }}
                                        </span>
                                    </td>
                                    <td style="text-align:right">
                                        <a href="{{ route('courses.tasks.show', [$task->course_id, $task->id]) }}"
                                            class="btn-view">
                                            Lihat →
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if($tasks->hasPages())
                    <div style="padding:12px 20px;border-top:1px solid #F1F5F9">{{ $tasks->links() }}</div>
                @endif
            @else
                <div class="empty-box">
                    <svg width="48" height="48" fill="none" stroke="#CBD5E1" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                    </svg>
                    <h3>Belum ada tugas</h3>
                    <p>Tambahkan tugas dari halaman masing-masing pelatihan</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>