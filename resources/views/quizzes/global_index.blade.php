<x-app-layout>
    <x-slot name="header">
        <h1 style="font-size:18px;font-weight:700;margin:0;">Pusat Kuis & Assessment</h1>
    </x-slot>

    @push('styles')
        <style>
            .qg {
                display: grid;
                gap: 16px;
            }

            .qg-top {
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-wrap: wrap;
                gap: 12px;
            }

            .qg-stats {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 12px;
            }

            .qs {
                background: #fff;
                border: 1px solid #E2E8F0;
                border-radius: 14px;
                padding: 16px;
                display: flex;
                align-items: center;
                gap: 12px;
                box-shadow: 0 1px 2px rgba(0, 0, 0, .04);
            }

            .qs-icon {
                width: 40px;
                height: 40px;
                border-radius: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 17px;
                flex-shrink: 0;
            }

            .qs-val {
                font-size: 22px;
                font-weight: 800;
                color: #0F172A;
            }

            .qs-lbl {
                font-size: 11px;
                color: #64748B;
                font-weight: 500;
            }

            .quiz-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 14px;
            }

            .quiz-card {
                background: #fff;
                border: 1px solid #E2E8F0;
                border-radius: 16px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, .04);
                overflow: hidden;
                transition: all .2s;
                display: flex;
                flex-direction: column;
            }

            .quiz-card:hover {
                box-shadow: 0 6px 20px rgba(0, 0, 0, .08);
                transform: translateY(-3px);
                border-color: #C7D2FE;
            }

            .qc-header {
                padding: 18px 18px 14px;
                position: relative;
            }

            .qc-icon {
                width: 44px;
                height: 44px;
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 20px;
                margin-bottom: 12px;
            }

            .qc-course {
                font-size: 10px;
                padding: 3px 8px;
                border-radius: 20px;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: .03em;
                position: absolute;
                top: 14px;
                right: 14px;
            }

            .qc-title {
                font-size: 14px;
                font-weight: 700;
                color: #0F172A;
                margin-bottom: 4px;
                line-height: 1.3;
            }

            .qc-desc {
                font-size: 12px;
                color: #64748B;
                line-height: 1.5;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .qc-meta {
                padding: 12px 18px;
                border-top: 1px solid #F1F5F9;
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 8px;
            }

            .qc-meta-item {
                display: flex;
                align-items: center;
                gap: 4px;
            }

            .qc-meta-label {
                font-size: 10px;
                color: #94A3B8;
                text-transform: uppercase;
                font-weight: 600;
            }

            .qc-meta-value {
                font-size: 13px;
                font-weight: 700;
                color: #0F172A;
            }

            .qc-footer {
                padding: 12px 18px;
                border-top: 1px solid #F1F5F9;
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-top: auto;
            }

            .qc-difficulty {
                display: flex;
                gap: 3px;
            }

            .qc-dot {
                width: 8px;
                height: 8px;
                border-radius: 50%;
            }

            .qc-dot-on {
                background: #4F46E5;
            }

            .qc-dot-off {
                background: #E2E8F0;
            }

            .btn-quiz {
                font-size: 12px;
                padding: 7px 16px;
                border-radius: 8px;
                font-weight: 600;
                background: #4F46E5;
                color: #fff;
                text-decoration: none;
                display: inline-flex;
                align-items: center;
                gap: 4px;
                transition: all .15s;
                border: none;
                cursor: pointer;
                font-family: inherit;
                box-shadow: 0 1px 4px rgba(79, 70, 229, .2);
            }

            .btn-quiz:hover {
                background: #4338CA;
                transform: translateY(-1px);
            }

            /* Category colors */
            .cat-se {
                background: rgba(79, 70, 229, .08);
                color: #4F46E5;
            }

            .cat-ak {
                background: rgba(16, 185, 129, .08);
                color: #059669;
            }

            .cat-ap {
                background: rgba(14, 165, 233, .08);
                color: #0369A1;
            }

            .cat-app {
                background: rgba(236, 72, 153, .08);
                color: #BE185D;
            }

            .cat-hr {
                background: rgba(139, 92, 246, .08);
                color: #6D28D9;
            }

            .cat-pp {
                background: rgba(245, 158, 11, .08);
                color: #B45309;
            }

            .bg-se {
                background: #EEF2FF;
            }

            .bg-ak {
                background: #D1FAE5;
            }

            .bg-ap {
                background: #E0F2FE;
            }

            .bg-app {
                background: #FCE7F3;
            }

            .bg-hr {
                background: #EDE9FE;
            }

            .bg-pp {
                background: #FEF3C7;
            }

            .empty-box {
                text-align: center;
                padding: 48px 20px;
                background: #fff;
                border: 1px solid #E2E8F0;
                border-radius: 16px;
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

            @media(max-width:1024px) {

                .quiz-grid,
                .qg-stats {
                    grid-template-columns: repeat(2, 1fr);
                }
            }

            @media(max-width:640px) {

                .quiz-grid,
                .qg-stats {
                    grid-template-columns: 1fr;
                }
            }
        </style>
    @endpush

    <div class="qg">
        <div class="qg-top">
            <div style="font-size:14px;color:#64748B">Assessment & evaluasi pengetahuan dari seluruh program pelatihan
            </div>
        </div>

        <div class="qg-stats">
            <div class="qs">
                <div class="qs-icon" style="background:#FEF3C7">❓</div>
                <div>
                    <div class="qs-val">{{ $quizzes->total() }}</div>
                    <div class="qs-lbl">Total Kuis</div>
                </div>
            </div>
            <div class="qs">
                <div class="qs-icon" style="background:#D1FAE5">✅</div>
                <div>
                    <div class="qs-val">{{ $quizzes->where('time_limit', '>', 0)->count() }}</div>
                    <div class="qs-lbl">Dengan Batas Waktu</div>
                </div>
            </div>
            <div class="qs">
                <div class="qs-icon" style="background:#EEF2FF">📚</div>
                <div>
                    <div class="qs-val">{{ $quizzes->pluck('course_id')->unique()->count() }}</div>
                    <div class="qs-lbl">Pelatihan</div>
                </div>
            </div>
            <div class="qs">
                <div class="qs-icon" style="background:#EDE9FE">⏱️</div>
                <div>
                    @php $avgTime = $quizzes->where('time_limit', '>', 0)->avg('time_limit'); @endphp
                    <div class="qs-val">{{ $avgTime ? round($avgTime) : '-' }}</div>
                    <div class="qs-lbl">Rata-rata Menit</div>
                </div>
            </div>
        </div>

        @if($quizzes->count() > 0)
            <div class="quiz-grid">
                @foreach($quizzes as $quiz)
                    @php
                        $catKey = $quiz->course->category ?? 'service-excellence';
                        $catMap = ['service-excellence' => ['cat-se', 'bg-se', '🎯'], 'administrasi-keuangan' => ['cat-ak', 'bg-ak', '💰'], 'administrasi-perkantoran' => ['cat-ap', 'bg-ap', '📋'], 'aplikasi-perkantoran' => ['cat-app', 'bg-app', '💻'], 'hr-sdm' => ['cat-hr', 'bg-hr', '👥'], 'pelayanan-pelanggan' => ['cat-pp', 'bg-pp', '🤝']];
                        $cat = $catMap[$catKey] ?? $catMap['service-excellence'];
                        $catLabel = \App\Models\Course::CATEGORIES[$catKey] ?? 'Service Excellence';
                        $difficulty = $quiz->time_limit ? ($quiz->time_limit > 30 ? 3 : ($quiz->time_limit > 15 ? 2 : 1)) : 2;
                    @endphp
                    <div class="quiz-card">
                        <div class="qc-header">
                            <div class="qc-icon {{ $cat[1] }}">{{ $cat[2] }}</div>
                            <span class="qc-course {{ $cat[0] }}">{{ $catLabel }}</span>
                            <div class="qc-title">{{ $quiz->title }}</div>
                            <div class="qc-desc">
                                {{ $quiz->description ?: 'Kuis evaluasi untuk program ' . $quiz->course->title }}</div>
                        </div>
                        <div class="qc-meta">
                            <div class="qc-meta-item">
                                <div>
                                    <div class="qc-meta-label">Durasi</div>
                                    <div class="qc-meta-value">{{ $quiz->time_limit ? $quiz->time_limit . ' Menit' : 'Bebas' }}
                                    </div>
                                </div>
                            </div>
                            <div class="qc-meta-item">
                                <div>
                                    <div class="qc-meta-label">Pelatihan</div>
                                    <div class="qc-meta-value" style="font-size:12px;font-weight:600">
                                        {{ Str::limit($quiz->course->title, 20) }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="qc-footer">
                            <div>
                                <div style="font-size:10px;color:#94A3B8;margin-bottom:4px;font-weight:600">TINGKAT KESULITAN
                                </div>
                                <div class="qc-difficulty">
                                    @for($i = 1; $i <= 3; $i++)
                                        <div class="qc-dot {{ $i <= $difficulty ? 'qc-dot-on' : 'qc-dot-off' }}"></div>
                                    @endfor
                                </div>
                            </div>
                            <a href="{{ route('courses.quizzes.show', [$quiz->course_id, $quiz->id]) }}" class="btn-quiz">
                                Kerjakan →
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($quizzes->hasPages())
                <div style="background:#fff;border:1px solid #E2E8F0;border-radius:12px;padding:12px 16px">
                    {{ $quizzes->links() }}</div>
            @endif
        @else
            <div class="empty-box">
                <svg width="48" height="48" fill="none" stroke="#CBD5E1" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3>Belum ada kuis</h3>
                <p>Tambahkan kuis dari halaman masing-masing pelatihan</p>
            </div>
        @endif
    </div>
</x-app-layout>