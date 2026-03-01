<x-app-layout>
    <x-slot name="header">
        <div style="display:flex;align-items:center;gap:12px">
            <a href="{{ route('courses.index') }}"
                style="color:#94A3B8;text-decoration:none;display:flex;transition:color .15s"
                onmouseover="this.style.color='#4F46E5'" onmouseout="this.style.color='#94A3B8'">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <h1 style="font-size:18px;font-weight:700;margin:0">Kuis Pelatihan: {{ $course->title }}</h1>
        </div>
    </x-slot>

    @push('styles')
        <style>
            .qg {
                display: grid;
                gap: 16px;
                min-height: 600px;
            }

            .qg-top {
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-wrap: wrap;
                gap: 12px;
            }

            .btn-add {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                padding: 10px 20px;
                border-radius: 10px;
                font-weight: 600;
                font-size: 13px;
                background: #4F46E5;
                color: #fff;
                border: none;
                cursor: pointer;
                text-decoration: none;
                box-shadow: 0 2px 8px rgba(79, 70, 229, .25);
                transition: all .15s;
            }

            .btn-add:hover {
                background: #4338CA;
                transform: translateY(-1px);
            }

            .quiz-card {
                background: #fff;
                border: 1px solid #E2E8F0;
                border-radius: 16px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, .04);
                overflow: hidden;
            }

            .quiz-table {
                width: 100%;
                border-collapse: separate;
                border-spacing: 0;
            }

            .quiz-table th {
                text-align: left;
                font-size: 11px;
                color: #64748B;
                text-transform: uppercase;
                letter-spacing: .06em;
                font-weight: 600;
                padding: 16px 20px;
                background: #F8FAFC;
                border-bottom: 1px solid #E2E8F0;
            }

            .quiz-table td {
                padding: 16px 20px;
                font-size: 13px;
                border-bottom: 1px solid #F1F5F9;
                color: #475569;
            }

            .quiz-table tr:hover td {
                background: #F8FAFC;
            }

            .quiz-table tr:last-child td {
                border-bottom: none;
            }

            .quiz-title {
                font-weight: 600;
                color: #0F172A;
                margin-bottom: 2px;
                font-size: 14px;
            }

            .quiz-desc {
                font-size: 12px;
                color: #94A3B8;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .quiz-limit {
                font-size: 12px;
                font-weight: 600;
                display: flex;
                align-items: center;
                gap: 6px;
            }

            .btn-action {
                font-size: 12px;
                padding: 6px 12px;
                border-radius: 8px;
                font-weight: 600;
                text-decoration: none;
                display: inline-flex;
                transition: all .15s;
                border: none;
                cursor: pointer;
                font-family: inherit;
            }

            .btn-view {
                background: #EEF2FF;
                color: #4F46E5;
            }

            .btn-view:hover {
                background: #C7D2FE;
            }

            .btn-edit {
                background: #F1F5F9;
                color: #475569;
            }

            .btn-edit:hover {
                background: #E2E8F0;
            }

            .btn-del {
                background: #FEE2E2;
                color: #DC2626;
            }

            .btn-del:hover {
                background: #FECACA;
            }

            .empty-box {
                text-align: center;
                padding: 60px 20px;
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
                margin-bottom: 20px;
            }

            .alert-success {
                background: #D1FAE5;
                border: 1px solid #A7F3D0;
                color: #047857;
                padding: 12px 16px;
                border-radius: 12px;
                font-size: 13px;
                font-weight: 500;
                display: flex;
                align-items: center;
                gap: 8px;
                margin-bottom: 16px;
            }
        </style>
    @endpush

    <div class="qg">
        @if(session('success'))
            <div class="alert-success">✅ {{ session('success') }}</div>
        @endif

        <div class="qg-top">
            <div style="font-size:14px;color:#64748B;display:flex;align-items:center;gap:8px">
                <span
                    style="background:#F1F5F9;color:#0F172A;font-weight:700;padding:4px 10px;border-radius:20px;font-size:12px">{{ $quizzes->count() }}
                    Kuis</span>
                untuk pelatihan ini
            </div>
            <a href="{{ route('courses.quizzes.create', $course) }}" class="btn-add">➕ Buat Kuis Baru</a>
        </div>

        <div class="quiz-card">
            @if($quizzes->count() > 0)
                <div style="overflow-x:auto">
                    <table class="quiz-table">
                        <thead>
                            <tr>
                                <th>Judul Kuis / Assessment</th>
                                <th>Batas Waktu</th>
                                <th style="text-align:right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($quizzes as $quiz)
                                <tr>
                                    <td style="width:50%">
                                        <div class="quiz-title">{{ $quiz->title }}</div>
                                        <div class="quiz-desc">
                                            {{ $quiz->description ?: 'Assessment evaluasi pengetahuan bagi peserta pelatihan' }}
                                        </div>
                                    </td>
                                    <td>
                                        @if($quiz->time_limit)
                                            <div class="quiz-limit" style="color:#059669">
                                                <span style="font-size:16px">⏱️</span>
                                                {{ $quiz->time_limit }} Menit
                                            </div>
                                            <div style="font-size:11px;color:#94A3B8;margin-top:2px;margin-left:24px">
                                                Berbatas waktu
                                            </div>
                                        @else
                                            <div class="quiz-limit" style="color:#64748B">
                                                <span style="font-size:16px">ℹ️</span>
                                                Bebas / Unlimited
                                            </div>
                                        @endif
                                    </td>
                                    <td style="text-align:right">
                                        <div style="display:flex;gap:6px;justify-content:flex-end">
                                            <a href="{{ route('courses.quizzes.show', [$course, $quiz]) }}"
                                                class="btn-action btn-view" title="Kerjakan">Mulai</a>
                                            <a href="{{ route('courses.quizzes.edit', [$course, $quiz]) }}"
                                                class="btn-action btn-edit" title="Edit">✏️</a>
                                            <form action="{{ route('courses.quizzes.destroy', [$course, $quiz]) }}"
                                                method="POST" class="inline"
                                                onsubmit="return confirm('Hapus kuis ini secara permanen?');">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn-action btn-del" title="Hapus">🗑️</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty-box">
                    <svg width="48" height="48" fill="none" stroke="#CBD5E1" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3>Belum ada kuis</h3>
                    <p>Buat kuis evaluasi pertama untuk peserta pelatihan ini</p>
                    <a href="{{ route('courses.quizzes.create', $course) }}" class="btn-add">➕ Buat Kuis Pertama</a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>