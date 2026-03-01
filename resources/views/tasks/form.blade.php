<x-app-layout>
    <x-slot name="header">
        <div style="display:flex;align-items:center;gap:12px">
            <a href="{{ route('courses.tasks.index', $course) }}"
                style="color:#94A3B8;text-decoration:none;display:flex;transition:color .15s"
                onmouseover="this.style.color='#4F46E5'" onmouseout="this.style.color='#94A3B8'">
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <h1 style="font-size:18px;font-weight:700;margin:0">{{ isset($task) ? 'Edit Tugas' : 'Buat Tugas Baru' }}
            </h1>
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

            .form-info-text {
                font-size: 12px;
                color: #64748B;
            }

            .form-info-text strong {
                color: #0F172A;
                font-weight: 600;
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
            <span style="font-size:18px">📚</span>
            <div class="form-info-text">Pelatihan: <strong>{{ $course->title }}</strong></div>
        </div>

        <form
            action="{{ isset($task) ? route('courses.tasks.update', [$course, $task]) : route('courses.tasks.store', $course) }}"
            method="POST">
            @csrf
            @if(isset($task)) @method('PUT') @endif

            <div class="form-section">
                <h3>📝 Detail Tugas</h3>
                <p>Buat tugas untuk peserta pelatihan ini</p>

                <div class="form-group">
                    <label class="form-label">Judul Tugas *</label>
                    <input type="text" name="title" class="form-input" value="{{ old('title', $task->title ?? '') }}"
                        required placeholder="Contoh: Studi Kasus Pelayanan Prima">
                    @error('title') <div class="form-error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Instruksi Tugas</label>
                    <textarea name="description" class="form-input" rows="5"
                        placeholder="Jelaskan instruksi tugas secara detail...">{{ old('description', $task->description ?? '') }}</textarea>
                    <div class="form-hint">Berikan instruksi yang jelas agar peserta memahami tugas</div>
                    @error('description') <div class="form-error">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Tenggat Waktu</label>
                    <input type="datetime-local" name="due_date" class="form-input"
                        value="{{ old('due_date', isset($task) && $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('Y-m-d\TH:i') : '') }}">
                    <div class="form-hint">Opsional — kosongkan jika tidak ada batas waktu</div>
                    @error('due_date') <div class="form-error">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="form-actions">
                <a href="{{ route('courses.tasks.index', $course) }}" class="btn-cancel">Batal</a>
                <button type="submit"
                    class="btn-submit">{{ isset($task) ? '💾 Simpan Perubahan' : '➕ Buat Tugas' }}</button>
            </div>
        </form>
    </div>
</x-app-layout>