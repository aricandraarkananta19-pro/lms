<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Kuis') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-5 border-b border-gray-100 bg-amber-50/50 flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-amber-900">Daftar Semua Kuis</h3>
                    <p class="text-sm text-amber-700">Pilih kuis untuk menguji pengetahuan Anda</p>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50/80">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Materi Kuis</th>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Modul Kursus</th>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Waktu</th>
                                <th scope="col"
                                    class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse($quizzes as $quiz)
                                <tr class="hover:bg-gray-50/50 transition-colors duration-200">
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-semibold text-gray-900">{{ $quiz->title }}</div>
                                        <div class="text-xs text-gray-500 line-clamp-1 mt-1">
                                            {{ Str::limit($quiz->description, 60) }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100">
                                            {{ $quiz->course->title }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $quiz->time_limit ? $quiz->time_limit . ' Menit' : 'Tidak Terbatas' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('courses.quizzes.show', [$quiz->course_id, $quiz->id]) }}"
                                            class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs leading-4 font-medium rounded-md text-amber-700 bg-amber-100 hover:bg-amber-200 focus:outline-none transition ease-in-out duration-150 shadow-sm border-amber-200">
                                            Kerjakan Kuis
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-14 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-300 mb-3" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <h3 class="text-lg font-medium text-gray-900">Belum ada menu kuis</h3>
                                        <p class="mt-1 text-sm text-gray-500">Saat ini belum ada kuis yang tersedia di
                                            seluruh kursus.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($quizzes->hasPages())
                    <div class="px-6 py-4 border-t border-gray-100 bg-gray-50 sm:px-6">
                        {{ $quizzes->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>