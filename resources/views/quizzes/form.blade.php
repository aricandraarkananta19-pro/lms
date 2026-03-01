<x-app-layout>
    <x-slot name="header">
        <div style="display:flex;align-items:center;gap:12px">
            <a href="{{ route('courses.quizzes.index', $course) }}"
                style="color:#94A3B8;text-decoration:none;display:flex;transition:color .15s"
                onmouseover="this.style.color='#4F46E5'" onmouseout="this.style.color='#94A3B8'">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <h1 style="font-size:18px;font-weight:700;margin:0">{{ isset($quiz) ? 'Edit Kuis' : 'Buat Kuis Baru' }}</h1>
        </div>
    </x-slot>

    @push('styles')
        <style>
            .form-card {
                background: #fff;
                border: 1px solid #E2E8F0;
                border-radius: 16px;
                padding: 28px 32px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, .04);
                max-width: 640px;
            }

            .form-section {
                margin-bottom: 20px;
            }

            .form-section h3 {
                font-size: 15px;
                font-weight: 700;
                color: #0F172A;
                margin-bottom: 4px;
            }

            .form-section p {
                font-size: 12px;
                color: #94A3B8;
                margin-bottom: 16px;
            }

            .form-label {
                display: block;
                font-size: 13px;
                font-weight: 600;
                color: #334155;
                margin-bottom: 6px;
            }

            .form-input {
                width: 100%;
                padding: 10px 14px;
                border: 1px solid #E2E8F0;
                border-radius: 10px;
                font-size: 13px;
                font-family: inherit;
                color: #0F172A;
                outline: none;
                transition: all .15s;
            }

            .form-input:focus {
                border-color: #4F46E5;
                box-shadow: 0 0 0 3px rgba(79, 70, 229, .1);
            }

            .form-input::placeholder {
                color: #94A3B8;
            }

            .form-error {
                font-size: 11px;
                color: #DC2626;
                margin-top: 4px;
            }

            .form-hint {
                font-size: 11px;
                color: #94A3B8;
                margin-top: 4px;
            }

            .form-group {
                margin-bottom: 16px;
            }

            .form-info {
                background: #F8FAFC;
                border: 1px solid #F1F5F9;
                border-radius: 10px;
                padding: 12px 14px;
                margin-bottom: 16px;
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .form-info-icon {
                width: 32px;
                height: 32px;
                border-radius: 8px;
                background: #EEF2FF;
                color: #4F46E5;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 16px;
                flex-shrink: 0;
            }

            .form-info-text {
                font-size: 12px;
                color: #64748B;
            }

            .form-info-text strong {
                color: #0F172A;
                font-weight: 600;
                display: block;
                font-size: 13px;
                margin-bottom: 2px;
            }

            .form-actions {
                display: flex;
                justify-content: flex-end;
                gap: 8px;
                padding-top: 20px;
                border-top: 1px solid #F1F5F9;
            }

            .btn-cancel {
                padding: 10px 20px;
                border-radius: 10px;
                font-size: 13px;
                font-weight: 600;
                background: #fff;
                color: #475569;
                border: 1px solid #E2E8F0;
                cursor: pointer;
                font-family: inherit;
                text-decoration: none;
                transition: all .15s;
            }

            .btn-cancel:hover {
                border-color: #CBD5E1;
                background: #F8FAFC;
            }

            .btn-submit {
                padding: 10px 24px;
                border-radius: 10px;
                font-size: 13px;
                font-weight: 600;
                background: #4F46E5;
                color: #fff;
                border: none;
                cursor: pointer;
                font-family: inherit;
                box-shadow: 0 2px 8px rgba(79, 70, 229, .25);
                transition: all .15s;
            }

            .btn-submit:hover {
                background: #4338CA;
                transform: translateY(-1px);
            }
        </style>
    @endpush

    <div class="form-card">
        <div class="form-info">
            <div class="form-info-icon">📚</div>
            <div class="form-info-text">
                <strong>{{ $course->title }}</strong>
                Assessment untuk program pelatihan ini
            </div>
        </div>

        <form
            action="{{ isset($quiz) ? route('courses.quizzes.update', [$course, $quiz]) : route('courses.quizzes.store', $course) }}"
            method="POST">
            @csrf
            @if(isset($quiz)) @method('PUT') @endif

            <div class="form-section">
                <h3>❓ Detail Kuis</h3>
                <p>Buat kuis untuk menguji pemahaman peserta</p>

                <div class="form-group">
                    <label class="form-label">Judul Kuis *</label>
                    <input type="text" name="title" class="form-input" value="{{ old('title', $quiz->title ?? '') }}"
                        required placeholder="Contoh: Pre-test Pengembangan SDM">
                    @error('title') <div class="form-error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Deskripsi & Instruksi</label>
                    <textarea name="description" class="form-input" rows="5"
                        placeholder="Jelaskan peraturan dan instruksi pengerjaan kuis...">{{ old('description', $quiz->description ?? '') }}</textarea>
                    <div class="form-hint">Berikan panduan singkat agar peserta siap</div>
                    @error('description') <div class="form-error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group" style="max-width:200px">
                    <label class="form-label">Batas Waktu (Menit)</label>
                    <div style="position:relative">
                        <input type="number" name="time_limit" class="form-input" style="padding-right:48px;" min="1"
                            value="{{ old('time_limit', $quiz->time_limit ?? '') }}" placeholder="Kosong = Bebas">
                        <span
                            style="position:absolute;right:14px;top:50%;transform:translateY(-50%);font-size:12px;color:#94A3B8;font-weight:500">Mnt</span>
                    </div>
                    <div class="form-hint">Dikosongkan jika tidak ada batas waktu</div>
                    @error('time_limit') <div class="form-error">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="form-actions">
                <a href="{{ route('courses.quizzes.index', $course) }}" class="btn-cancel">Batal</a>
                <button type="submit"
                    class="btn-submit">{{ isset($quiz) ? '💾 Simpan Perubahan' : '➕ Buat Kuis' }}</button>
            </div>
        </form>
    </div>
</x-app-layout>