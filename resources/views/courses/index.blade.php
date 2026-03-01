<x-app-layout>
    <x-slot name="header">
        <h1 style="font-size:18px;font-weight:700;margin:0;">Manajemen Pelatihan</h1>
    </x-slot>

    @push('styles')
        <style>
            .pg {
                display: grid;
                gap: 16px;
            }

            .pg-top {
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-wrap: wrap;
                gap: 12px;
            }

            .pg-desc {
                font-size: 14px;
                color: #64748B;
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
                text-decoration: none;
                border: none;
                cursor: pointer;
                font-family: inherit;
                box-shadow: 0 2px 8px rgba(79, 70, 229, .25);
                transition: all .2s;
            }

            .btn-add:hover {
                background: #4338CA;
                transform: translateY(-1px);
                box-shadow: 0 4px 12px rgba(79, 70, 229, .3);
            }

            /* Category Tabs */
            .cat-tabs {
                display: flex;
                gap: 6px;
                overflow-x: auto;
                padding-bottom: 4px;
                -webkit-overflow-scrolling: touch;
            }

            .cat-tabs::-webkit-scrollbar {
                height: 0;
            }

            .cat-tab {
                padding: 8px 16px;
                border-radius: 10px;
                font-size: 12px;
                font-weight: 600;
                white-space: nowrap;
                cursor: pointer;
                text-decoration: none;
                transition: all .15s;
                border: 1px solid #E2E8F0;
                background: #fff;
                color: #475569;
            }

            .cat-tab:hover {
                border-color: #4F46E5;
                color: #4F46E5;
                background: #EEF2FF;
            }

            .cat-tab.active {
                background: #4F46E5;
                color: #fff;
                border-color: #4F46E5;
            }

            /* Stats */
            .pg-stats {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 12px;
            }

            .pgs {
                background: #fff;
                border: 1px solid #E2E8F0;
                border-radius: 14px;
                padding: 16px;
                display: flex;
                align-items: center;
                gap: 12px;
                box-shadow: 0 1px 2px rgba(0, 0, 0, .04);
            }

            .pgs-icon {
                width: 40px;
                height: 40px;
                border-radius: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 18px;
                flex-shrink: 0;
            }

            .pgs-val {
                font-size: 20px;
                font-weight: 800;
                color: #0F172A;
            }

            .pgs-lbl {
                font-size: 11px;
                color: #64748B;
                font-weight: 500;
            }

            /* Search & Filter */
            .search-bar {
                background: #fff;
                border: 1px solid #E2E8F0;
                border-radius: 14px;
                padding: 12px 16px;
                display: flex;
                align-items: center;
                gap: 12px;
                box-shadow: 0 1px 2px rgba(0, 0, 0, .04);
            }

            .search-bar input {
                border: none;
                outline: none;
                flex: 1;
                font-size: 13px;
                font-family: inherit;
                color: #0F172A;
                background: transparent;
            }

            .search-bar input::placeholder {
                color: #94A3B8;
            }

            /* Course Grid */
            .course-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 16px;
            }

            .course-card {
                background: #fff;
                border: 1px solid #E2E8F0;
                border-radius: 16px;
                overflow: hidden;
                box-shadow: 0 1px 3px rgba(0, 0, 0, .04);
                transition: all .2s;
                display: flex;
                flex-direction: column;
            }

            .course-card:hover {
                box-shadow: 0 8px 25px rgba(0, 0, 0, .08);
                transform: translateY(-3px);
                border-color: #C7D2FE;
            }

            .cc-thumb {
                height: 140px;
                position: relative;
                overflow: hidden;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .cc-thumb img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .cc-thumb-placeholder {
                width: 100%;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 32px;
            }

            .cc-cat-badge {
                position: absolute;
                top: 10px;
                left: 10px;
                font-size: 10px;
                padding: 3px 10px;
                border-radius: 20px;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: .04em;
                backdrop-filter: blur(4px);
            }

            .cc-status {
                position: absolute;
                top: 10px;
                right: 10px;
                font-size: 10px;
                padding: 3px 8px;
                border-radius: 20px;
                font-weight: 700;
            }

            .cc-body {
                padding: 16px;
                flex: 1;
                display: flex;
                flex-direction: column;
            }

            .cc-level {
                font-size: 10px;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: .04em;
                margin-bottom: 6px;
            }

            .cc-title {
                font-size: 14px;
                font-weight: 700;
                color: #0F172A;
                margin-bottom: 4px;
                line-height: 1.4;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .cc-desc {
                font-size: 12px;
                color: #64748B;
                line-height: 1.5;
                margin-bottom: 12px;
                flex: 1;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .cc-meta {
                display: flex;
                gap: 12px;
                margin-bottom: 14px;
            }

            .cc-meta-item {
                font-size: 11px;
                color: #94A3B8;
                display: flex;
                align-items: center;
                gap: 4px;
                font-weight: 500;
            }

            .cc-footer {
                padding: 12px 16px;
                border-top: 1px solid #F1F5F9;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .cc-price {
                font-size: 15px;
                font-weight: 800;
                color: #4F46E5;
            }

            .cc-actions {
                display: flex;
                gap: 4px;
            }

            .cc-btn {
                font-size: 11px;
                padding: 5px 10px;
                border-radius: 8px;
                font-weight: 600;
                border: none;
                cursor: pointer;
                font-family: inherit;
                transition: all .15s;
                text-decoration: none;
                display: inline-flex;
                align-items: center;
                gap: 3px;
            }

            .cc-btn-view {
                background: #EEF2FF;
                color: #4F46E5;
            }

            .cc-btn-view:hover {
                background: #C7D2FE;
            }

            .cc-btn-edit {
                background: #F1F5F9;
                color: #475569;
            }

            .cc-btn-edit:hover {
                background: #E2E8F0;
            }

            .cc-btn-del {
                background: #FEE2E2;
                color: #DC2626;
            }

            .cc-btn-del:hover {
                background: #FECACA;
            }

            /* Category colors */
            .cat-se {
                background: rgba(79, 70, 229, .12);
                color: #4F46E5;
            }

            .cat-ak {
                background: rgba(16, 185, 129, .12);
                color: #059669;
            }

            .cat-ap {
                background: rgba(14, 165, 233, .12);
                color: #0369A1;
            }

            .cat-app {
                background: rgba(236, 72, 153, .12);
                color: #BE185D;
            }

            .cat-hr {
                background: rgba(139, 92, 246, .12);
                color: #6D28D9;
            }

            .cat-pp {
                background: rgba(245, 158, 11, .12);
                color: #B45309;
            }

            .bg-se {
                background: linear-gradient(135deg, #EEF2FF, #E0E7FF);
            }

            .bg-ak {
                background: linear-gradient(135deg, #D1FAE5, #A7F3D0);
            }

            .bg-ap {
                background: linear-gradient(135deg, #E0F2FE, #BAE6FD);
            }

            .bg-app {
                background: linear-gradient(135deg, #FCE7F3, #FBCFE8);
            }

            .bg-hr {
                background: linear-gradient(135deg, #EDE9FE, #DDD6FE);
            }

            .bg-pp {
                background: linear-gradient(135deg, #FEF3C7, #FDE68A);
            }

            .level-beginner {
                color: #059669;
            }

            .level-intermediate {
                color: #0369A1;
            }

            .level-advanced {
                color: #B45309;
            }

            .status-published {
                background: #D1FAE5;
                color: #047857;
            }

            .status-draft {
                background: #FEF3C7;
                color: #B45309;
            }

            .status-archived {
                background: #F1F5F9;
                color: #64748B;
            }

            /* Alert */
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
            }

            /* Empty */
            .empty-state {
                text-align: center;
                padding: 60px 20px;
                background: #fff;
                border: 1px solid #E2E8F0;
                border-radius: 16px;
            }

            .empty-state svg {
                margin: 0 auto 16px;
            }

            .empty-state h3 {
                font-size: 16px;
                font-weight: 700;
                color: #0F172A;
                margin-bottom: 6px;
            }

            .empty-state p {
                font-size: 13px;
                color: #64748B;
                margin-bottom: 20px;
            }

            @media (max-width: 1024px) {

                .course-grid,
                .pg-stats {
                    grid-template-columns: repeat(2, 1fr);
                }
            }

            @media (max-width: 640px) {

                .course-grid,
                .pg-stats {
                    grid-template-columns: 1fr;
                }

                .pg-top {
                    flex-direction: column;
                    align-items: flex-start;
                }
            }
        </style>
    @endpush

    <div class="pg">
        @if(session('success'))
            <div class="alert-success">✅ {{ session('success') }}</div>
        @endif

        <div class="pg-top">
            <div class="pg-desc">Kelola seluruh pelatihan dan program pengembangan karyawan</div>
            <a href="{{ route('courses.create') }}" class="btn-add">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Buat Pelatihan
            </a>
        </div>

        <!-- Category Tabs -->
        <div class="cat-tabs">
            <a href="{{ route('courses.index') }}" class="cat-tab {{ !request('category') ? 'active' : '' }}">Semua
                Program</a>
            @foreach(\App\Models\Course::CATEGORIES as $key => $label)
                <a href="{{ route('courses.index', ['category' => $key]) }}"
                    class="cat-tab {{ request('category') == $key ? 'active' : '' }}">{{ $label }}</a>
            @endforeach
        </div>

        <!-- Stats -->
        <div class="pg-stats">
            <div class="pgs">
                <div class="pgs-icon" style="background:#EEF2FF">📚</div>
                <div>
                    <div class="pgs-val">{{ $courses->total() }}</div>
                    <div class="pgs-lbl">Total Pelatihan</div>
                </div>
            </div>
            <div class="pgs">
                <div class="pgs-icon" style="background:#D1FAE5">✅</div>
                <div>
                    <div class="pgs-val">{{ $courses->where('status', 'published')->count() }}</div>
                    <div class="pgs-lbl">Published</div>
                </div>
            </div>
            <div class="pgs">
                <div class="pgs-icon" style="background:#FEF3C7">📝</div>
                <div>
                    <div class="pgs-val">{{ $courses->where('status', 'draft')->count() }}</div>
                    <div class="pgs-lbl">Draft</div>
                </div>
            </div>
            <div class="pgs">
                <div class="pgs-icon" style="background:#EDE9FE">👥</div>
                <div>
                    <div class="pgs-val">{{ $courses->sum(fn($c) => $c->participants->count()) }}</div>
                    <div class="pgs-lbl">Total Peserta</div>
                </div>
            </div>
        </div>

        <!-- Search -->
        <form method="GET" action="{{ route('courses.index') }}">
            @if(request('category'))<input type="hidden" name="category" value="{{ request('category') }}">@endif
            <div class="search-bar">
                <svg width="18" height="18" fill="none" stroke="#94A3B8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Cari pelatihan berdasarkan judul, deskripsi, atau kategori...">
            </div>
        </form>

        <!-- Course Grid -->
        @if($courses->count() > 0)
            <div class="course-grid">
                @foreach($courses as $course)
                    @php
                        $catKey = $course->category ?? 'service-excellence';
                        $catMap = ['service-excellence' => ['cat-se', 'bg-se', '🎯'], 'administrasi-keuangan' => ['cat-ak', 'bg-ak', '💰'], 'administrasi-perkantoran' => ['cat-ap', 'bg-ap', '📋'], 'aplikasi-perkantoran' => ['cat-app', 'bg-app', '💻'], 'hr-sdm' => ['cat-hr', 'bg-hr', '👥'], 'pelayanan-pelanggan' => ['cat-pp', 'bg-pp', '🤝']];
                        $cat = $catMap[$catKey] ?? $catMap['service-excellence'];
                        $catLabel = \App\Models\Course::CATEGORIES[$catKey] ?? 'Service Excellence';
                        $level = $course->level ?? 'beginner';
                        $lvlLabel = \App\Models\Course::LEVELS[$level] ?? 'Beginner';
                        $status = $course->status ?? 'published';
                        $duration = $course->duration_hours ?? rand(4, 40);
                    @endphp
                    <div class="course-card">
                        <div class="cc-thumb">
                            @if($course->hasMedia('course_image'))
                                <img src="{{ $course->getFirstMediaUrl('course_image') }}" alt="{{ $course->title }}">
                            @else
                                <div class="cc-thumb-placeholder {{ $cat[1] }}">{{ $cat[2] }}</div>
                            @endif
                            <span class="cc-cat-badge {{ $cat[0] }}">{{ $catLabel }}</span>
                            <span class="cc-status status-{{ $status }}">{{ ucfirst($status) }}</span>
                        </div>
                        <div class="cc-body">
                            <div class="cc-level level-{{ $level }}">{{ $lvlLabel }}</div>
                            <div class="cc-title">{{ $course->title }}</div>
                            <div class="cc-desc">
                                {{ $course->description ?: 'Pelatihan profesional untuk pengembangan kompetensi karyawan.' }}
                            </div>
                            <div class="cc-meta">
                                <span class="cc-meta-item">⏱️ {{ $duration }} Jam</span>
                                <span class="cc-meta-item">👥 {{ $course->participants->count() }} Peserta</span>
                                <span class="cc-meta-item">📝 {{ $course->tasks->count() }} Tugas</span>
                            </div>
                        </div>
                        <div class="cc-footer">
                            <div class="cc-price">Rp {{ number_format($course->price, 0, ',', '.') }}</div>
                            <div class="cc-actions">
                                <a href="{{ route('courses.tasks.index', $course->id) }}" class="cc-btn cc-btn-view"
                                    title="Tugas">📝</a>
                                <a href="{{ route('courses.quizzes.index', $course->id) }}" class="cc-btn cc-btn-view"
                                    title="Kuis">❓</a>
                                <a href="{{ route('courses.participants.index', $course->id) }}" class="cc-btn cc-btn-view"
                                    title="Peserta">👥</a>
                                <a href="{{ route('courses.edit', $course->id) }}" class="cc-btn cc-btn-edit"
                                    title="Edit">✏️</a>
                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="button" onclick="confirmDelete(this)" class="cc-btn cc-btn-del"
                                        title="Hapus">🗑️</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($courses->hasPages())
                <div style="background:#fff;border:1px solid #E2E8F0;border-radius:12px;padding:12px 16px">
                    {{ $courses->appends(request()->query())->links() }}
                </div>
            @endif

        @else
            <div class="empty-state">
                <svg width="48" height="48" fill="none" stroke="#CBD5E1" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <h3>Belum ada pelatihan</h3>
                <p>Mulai buat program pelatihan pertama untuk karyawan Anda</p>
                <a href="{{ route('courses.create') }}" class="btn-add">➕ Buat Pelatihan Pertama</a>
            </div>
        @endif
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function confirmDelete(button) {
                Swal.fire({
                    title: 'Hapus Pelatihan?',
                    text: "Data pelatihan ini akan dihapus permanen beserta tugas dan kuis terkait.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#EF4444',
                    cancelButtonColor: '#6B7280',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) button.closest('form').submit();
                })
            }
            let timeout = null;
            document.querySelector('input[name="search"]')?.addEventListener('input', function () {
                clearTimeout(timeout);
                timeout = setTimeout(() => this.form.submit(), 500);
            });
        </script>
    @endpush
</x-app-layout>