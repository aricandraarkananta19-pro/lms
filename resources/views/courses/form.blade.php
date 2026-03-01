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
            <h1 style="font-size:18px;font-weight:700;margin:0">
                {{ isset($course) ? 'Edit Pelatihan' : 'Buat Pelatihan Baru' }}</h1>
        </div>
    </x-slot>

    @push('styles')
        <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
        <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
            rel="stylesheet" />
        <style>
            .form-card {
                background: #fff;
                border: 1px solid #E2E8F0;
                border-radius: 16px;
                padding: 28px 32px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, .04);
                max-width: 720px;
            }

            .form-section {
                margin-bottom: 24px;
                padding-bottom: 20px;
                border-bottom: 1px solid #F1F5F9;
            }

            .form-section:last-child {
                border-bottom: none;
                margin-bottom: 0;
                padding-bottom: 0;
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
            }

            .form-group {
                margin-top: 16px;
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
                background: #fff;
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

            .form-row {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 14px;
            }

            .form-row-3 {
                display: grid;
                grid-template-columns: 1fr 1fr 1fr;
                gap: 14px;
            }

            .form-hint {
                font-size: 11px;
                color: #94A3B8;
                margin-top: 4px;
            }

            .form-error {
                font-size: 11px;
                color: #DC2626;
                margin-top: 4px;
            }

            .form-actions {
                display: flex;
                justify-content: flex-end;
                gap: 8px;
                padding-top: 20px;
                border-top: 1px solid #F1F5F9;
                margin-top: 24px;
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

            .filepond--drop-label {
                color: #4F46E5;
                font-weight: 500;
            }

            .filepond--panel-root {
                background-color: #F8FAFC;
                border: 2px dashed #E2E8F0;
                border-radius: 12px;
            }

            select.form-input {
                cursor: pointer;
            }

            @media(max-width:640px) {

                .form-row,
                .form-row-3 {
                    grid-template-columns: 1fr;
                }
            }
        </style>
    @endpush

    <div class="form-card">
        <form action="{{ isset($course) ? route('courses.update', $course->id) : route('courses.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($course)) @method('PUT') @endif

            <div class="form-section">
                <h3>📚 Informasi Pelatihan</h3>
                <p>Detail dasar tentang program pelatihan</p>

                <div class="form-group">
                    <label class="form-label">Judul Pelatihan *</label>
                    <input type="text" name="title" class="form-input" value="{{ old('title', $course->title ?? '') }}"
                        required placeholder="Contoh: Service Excellence untuk Front Office">
                    @error('title') <div class="form-error">{{ $message }}</div> @enderror
                </div>

                <div class="form-row" style="margin-top:16px">
                    <div>
                        <label class="form-label">Kategori / Program *</label>
                        <select name="category" class="form-input" required>
                            <option value="">— Pilih Program —</option>
                            @foreach(\App\Models\Course::CATEGORIES as $key => $label)
                                <option value="{{ $key }}" {{ old('category', $course->category ?? '') == $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('category') <div class="form-error">{{ $message }}</div> @enderror
                    </div>
                    <div>
                        <label class="form-label">Level</label>
                        <select name="level" class="form-input">
                            @foreach(\App\Models\Course::LEVELS as $key => $label)
                                <option value="{{ $key }}" {{ old('level', $course->level ?? 'beginner') == $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description" class="form-input" rows="4"
                        placeholder="Jelaskan apa yang akan dipelajari peserta...">{{ old('description', $course->description ?? '') }}</textarea>
                    <div class="form-hint">Tuliskan ringkasan menarik tentang pelatihan ini</div>
                    @error('description') <div class="form-error">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="form-section">
                <h3>💰 Detail & Harga</h3>
                <p>Konfigurasi harga dan durasi pelatihan</p>

                <div class="form-row-3" style="margin-top:16px"
                    x-data="rupiahFormatter('{{ old('price', $course->price ?? '') }}')">
                    <div>
                        <label class="form-label">Harga (IDR) *</label>
                        <input type="text" class="form-input" x-model="formatted" @input="formatInput" required
                            placeholder="Rp 0">
                        <input type="hidden" name="price" :value="rawValue">
                        @error('price') <div class="form-error">{{ $message }}</div> @enderror
                    </div>
                    <div>
                        <label class="form-label">Durasi (Jam)</label>
                        <input type="number" name="duration_hours" class="form-input"
                            value="{{ old('duration_hours', $course->duration_hours ?? '') }}" placeholder="8" min="1">
                    </div>
                    <div>
                        <label class="form-label">Status</label>
                        <select name="status" class="form-input">
                            <option value="published" {{ old('status', $course->status ?? 'published') == 'published' ? 'selected' : '' }}>Published</option>
                            <option value="draft" {{ old('status', $course->status ?? '') == 'draft' ? 'selected' : '' }}>
                                Draft</option>
                            <option value="archived" {{ old('status', $course->status ?? '') == 'archived' ? 'selected' : '' }}>Archived</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h3>🖼️ Thumbnail</h3>
                <p>Gambar sampul pelatihan (opsional)</p>

                <div class="form-group">
                    <input type="file" class="filepond" name="image" data-max-file-size="2MB" data-max-files="1" />
                    @if(isset($course) && $course->hasMedia('course_image'))
                        <div
                            style="display:flex;align-items:center;gap:12px;margin-top:12px;padding:10px;background:#F8FAFC;border-radius:10px;border:1px solid #F1F5F9">
                            <img src="{{ $course->getFirstMediaUrl('course_image') }}"
                                style="width:52px;height:52px;border-radius:8px;object-fit:cover" alt="">
                            <div style="flex:1">
                                <div style="font-size:13px;font-weight:600;color:#0F172A">Gambar saat ini</div>
                                <div style="font-size:11px;color:#94A3B8">Akan diganti jika mengunggah file baru</div>
                            </div>
                        </div>
                    @endif
                    @error('image') <div class="form-error">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="form-actions">
                <a href="{{ route('courses.index') }}" class="btn-cancel">Batal</a>
                <button type="submit"
                    class="btn-submit">{{ isset($course) ? '💾 Simpan Perubahan' : '➕ Buat Pelatihan' }}</button>
            </div>
        </form>
    </div>

    @push('scripts')
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
        <script
            src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
        <script
            src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
        <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
        <script>
            document.addEventListener('alpine:init', () => {
                window.Alpine.data('rupiahFormatter', (initialValue) => ({
                    rawValue: initialValue || '', formatted: '',
                    init() { if (this.rawValue) this.formatted = this.formatRupiah(this.rawValue.toString()); },
                    formatInput(e) { let val = e.target.value.replace(/[^,\d]/g, ''); this.rawValue = val; this.formatted = this.formatRupiah(val); },
                    formatRupiah(angka) {
                        var ns = angka.replace(/[^,\d]/g, '').toString(), split = ns.split(','), sisa = split[0].length % 3,
                            rupiah = split[0].substr(0, sisa), ribuan = split[0].substr(sisa).match(/\d{3}/gi);
                        if (ribuan) { rupiah += (sisa ? '.' : '') + ribuan.join('.'); }
                        return rupiah ? 'Rp ' + rupiah : '';
                    }
                }))
            })
            FilePond.registerPlugin(FilePondPluginImagePreview, FilePondPluginFileValidateSize, FilePondPluginFileValidateType);
            const pond = FilePond.create(document.querySelector('input[type="file"].filepond'), {
                storeAsFile: true, acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'],
                labelIdle: 'Drag & Drop gambar atau <span class="filepond--label-action">Browse</span>',
            });
        </script>
    @endpush
</x-app-layout>