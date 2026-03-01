<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center py-1">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Manajemen Kursus') }}
            </h2>
            <div class="mt-4 sm:mt-0">
                <a href="{{ route('courses.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Kursus
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if(session('success'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform -translate-y-2"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 transform translate-y-0"
                    x-transition:leave-end="opacity-0 transform -translate-y-2"
                    class="bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-md shadow-sm mb-6 flex items-start"
                    role="alert">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-emerald-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-emerald-700 font-medium">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <!-- Toolbar -->
                <div class="p-5 border-b border-gray-100 bg-gray-50/50">
                    <form method="GET" action="{{ route('courses.index') }}" class="flex flex-col sm:flex-row gap-4 justify-between items-center w-full">
                        
                        <!-- Search Box -->
                        <div class="relative rounded-md shadow-sm w-full sm:max-w-md">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" name="search" value="{{ request('search') }}"
                                class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-lg transition duration-150 ease-in-out"
                                placeholder="Cari judul atau deskripsi...">
                        </div>

                        <!-- Filters -->
                        <div class="flex items-center gap-3 w-full sm:w-auto">
                            <span class="text-sm text-gray-500">Tampilkan:</span>
                            <select name="per_page" onchange="this.form.submit()"
                                class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-lg">
                                <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
                                <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                                <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                            </select>
                        </div>
                    </form>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Kursus
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Harga
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Tanggal Dibuat
                                </th>
                                <th scope="col" class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse($courses as $course)
                                <tr class="hover:bg-gray-50/80 transition-colors duration-200">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-12 w-12 relative rounded-lg overflow-hidden shadow-sm border border-gray-200">
                                                @if($course->hasMedia('course_image'))
                                                    <img src="{{ $course->getFirstMediaUrl('course_image') }}" alt="{{ $course->title }}"
                                                        class="h-full w-full object-cover">
                                                @else
                                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($course->title) }}&background=E0E7FF&color=4338CA"
                                                        alt="Placeholder" class="h-full w-full object-cover">
                                                @endif
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-semibold text-gray-900 line-clamp-1">{{ $course->title }}</div>
                                                <div class="text-xs text-gray-500 mt-1 line-clamp-1 max-w-sm">{{ $course->description }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-emerald-50 text-emerald-700 border border-emerald-200 shadow-sm">
                                            Rp {{ number_format($course->price, 0, ',', '.') }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-700 flex items-center">
                                            <svg class="mr-1.5 h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            {{ $course->created_at->format('d M Y') }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium border-l border-gray-100">
                                        <div class="flex items-center justify-end space-x-2">
                                            <a href="{{ route('courses.tasks.index', $course->id) }}"
                                                class="text-blue-600 hover:text-blue-900 bg-blue-50 px-2.5 py-1.5 rounded-md transition-colors font-medium border border-blue-100 shadow-sm text-xs" title="Tugas">Tugas</a>
                                            
                                            <a href="{{ route('courses.quizzes.index', $course->id) }}"
                                                class="text-amber-600 hover:text-amber-900 bg-amber-50 px-2.5 py-1.5 rounded-md transition-colors font-medium border border-amber-100 shadow-sm text-xs" title="Kuis">Kuis</a>

                                            <div class="w-px h-5 bg-gray-200 mx-1"></div>

                                            <a href="{{ route('courses.edit', $course->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900 bg-indigo-50 px-2.5 py-1.5 rounded-md transition-colors font-medium border border-indigo-100 shadow-sm text-xs">Edit</a>

                                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST"
                                                class="delete-form inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="confirmDelete(this)"
                                                    class="text-red-600 hover:text-red-900 bg-red-50 px-2.5 py-1.5 rounded-md transition-colors font-medium border border-red-100 shadow-sm text-xs">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-14 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                        </svg>
                                        <h3 class="text-lg font-medium text-gray-900">Belum ada data kursus</h3>
                                        <p class="mt-1 text-sm text-gray-500">Mulai kelola kelas dengan menambahkan kursus baru.</p>
                                        <div class="mt-6">
                                            <a href="{{ route('courses.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                                </svg>
                                                Tambah Kursus
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($courses->hasPages())
                    <div class="px-6 py-4 border-t border-gray-100 bg-gray-50 sm:px-6">
                        {{ $courses->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function confirmDelete(button) {
                Swal.fire({
                    title: 'Hapus Kursus?',
                    text: "Data kursus ini akan dihapus secara permanen.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#EF4444',
                    cancelButtonColor: '#6B7280',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal',
                    customClass: {
                        confirmButton: 'shadow-sm',
                        cancelButton: 'shadow-sm'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        button.closest('form').submit();
                    }
                })
            }
            
            // Auto submit form on typing (debounced)
            let timeout = null;
            document.querySelector('input[name="search"]').addEventListener('input', function() {
                clearTimeout(timeout);
                timeout = setTimeout(() => {
                    this.form.submit();
                }, 500);
            });
        </script>
    @endpush
</x-app-layout>