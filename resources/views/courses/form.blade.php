<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3 py-1">
            <a href="{{ route('courses.index') }}" class="text-gray-400 hover:text-indigo-600 transition-colors">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ isset($course) ? 'Edit Kursus: ' . $course->title : 'Tambah Kursus Baru' }}
            </h2>
        </div>
    </x-slot>

    @push('styles')
        <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
        <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
            rel="stylesheet" />
        <style>
            .filepond--drop-label {
                color: #4f46e5;
                font-weight: 500;
            }

            .filepond--panel-root {
                background-color: #f8fafc;
                border: 2px dashed #cbd5e1;
                border-radius: 0.75rem;
            }
        </style>
    @endpush

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-8 sm:p-10">
                    <div class="mb-8 border-b border-gray-100 pb-5">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Informasi Kursus</h3>
                        <p class="mt-1 text-sm text-gray-500">Isi detail di bawah ini untuk
                            {{ isset($course) ? 'memperbarui data' : 'membuat' }} kursus.</p>
                    </div>

                    <form action="{{ isset($course) ? route('courses.update', $course->id) : route('courses.store') }}"
                        method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @if(isset($course))
                            @method('PUT')
                        @endif

                        <!-- Judul -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Kursus</label>
                            <div class="relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                        <path fill-rule="evenodd"
                                            d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" name="title" id="title"
                                    value="{{ old('title', $course->title ?? '') }}" required
                                    placeholder="Contoh: Belajar Laravel untuk Pemula"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 py-3 sm:text-sm border-gray-300 rounded-lg transition duration-150">
                            </div>
                            @error('title') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <!-- Harga -->
                        <div x-data="rupiahFormatter('{{ old('price', $course->price ?? '') }}')">
                            <label for="price_display" class="block text-sm font-medium text-gray-700 mb-1">Harga
                                Kursus</label>
                            <div class="relative rounded-md shadow-sm xl:max-w-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm font-medium">Rp</span>
                                </div>
                                <input type="text" id="price_display" x-model="formatted" @input="formatInput" required
                                    placeholder="0"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 pr-12 py-3 sm:text-sm border-gray-300 rounded-lg transition duration-150">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">IDR</span>
                                </div>
                                <input type="hidden" name="price" :value="rawValue">
                            </div>
                            @error('price') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi
                                Lengkap</label>
                            <div class="mt-1">
                                <textarea name="description" id="description" rows="5"
                                    placeholder="Jelaskan apa yang akan dipelajari di kursus ini..."
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full py-3 sm:text-sm border border-gray-300 rounded-lg transition duration-150">{{ old('description', $course->description ?? '') }}</textarea>
                            </div>
                            <p class="mt-2 text-sm text-gray-500">Tuliskan ringkasan singkat yang menarik tentang kursus
                                ini.</p>
                            @error('description') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <!-- Gambar (FilePond) -->
                        <div class="pt-2">
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Thumbnail Kursus
                                (Opsional)</label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input type="file" class="filepond" name="image" data-max-file-size="2MB"
                                    data-max-files="1" />

                                @if(isset($course) && $course->hasMedia('course_image'))
                                    <div class="mt-3 flex items-center bg-gray-50 p-3 rounded-lg border border-gray-100">
                                        <div class="flex-shrink-0 h-16 w-16">
                                            <img class="h-16 w-16 rounded-md object-cover shadow-sm"
                                                src="{{ $course->getFirstMediaUrl('course_image') }}" alt="">
                                        </div>
                                        <div class="ml-4 flex-1 flex justify-between">
                                            <div>
                                                <p class="text-sm font-medium text-gray-900">Gambar saat ini</p>
                                                <p class="text-xs text-gray-500">Akan diganti jika Anda mengunggah file
                                                    baru.</p>
                                            </div>
                                            <a href="{{ $course->getFirstMediaUrl('course_image') }}" target="_blank"
                                                class="text-sm font-medium text-indigo-600 hover:text-indigo-500 bg-white border border-gray-200 px-3 py-1 rounded-md">Lihat</a>
                                        </div>
                                    </div>
                                @endif

                                @error('image') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="pt-6 border-t border-gray-100 flex items-center justify-end space-x-3">
                            <a href="{{ route('courses.index') }}"
                                class="bg-white border border-gray-300 rounded-lg shadow-sm py-2.5 px-5 mx-0 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                                Membatalkan
                            </a>
                            <button type="submit"
                                class="inline-flex justify-center py-2.5 px-6 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                                {{ isset($course) ? 'Simpan Perubahan' : 'Buat Kursus' }}
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
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
                    rawValue: initialValue || '',
                    formatted: '',

                    init() {
                        if (this.rawValue) {
                            this.formatted = this.formatRupiah(this.rawValue.toString());
                        }
                    },

                    formatInput(e) {
                        let val = e.target.value.replace(/[^,\d]/g, '');
                        this.rawValue = val;
                        this.formatted = this.formatRupiah(val);
                    },

                    formatRupiah(angka) {
                        var number_string = angka.replace(/[^,\d]/g, '').toString(),
                            split = number_string.split(','),
                            sisa = split[0].length % 3,
                            rupiah = split[0].substr(0, sisa),
                            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                        if (ribuan) {
                            let separator = sisa ? '.' : '';
                            rupiah += separator + ribuan.join('.');
                        }

                        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                        return rupiah ? 'Rp ' + rupiah : '';
                    }
                }))
            })

            // Initialize FilePond
            FilePond.registerPlugin(
                FilePondPluginImagePreview,
                FilePondPluginFileValidateSize,
                FilePondPluginFileValidateType
            );

            const inputElement = document.querySelector('input[type="file"].filepond');
            const pond = FilePond.create(inputElement, {
                storeAsFile: true,
                acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'],
                labelIdle: 'Drag & Drop gambar Anda atau <span class="filepond--label-action">Browse</span>',
            });
        </script>
    @endpush
</x-app-layout>