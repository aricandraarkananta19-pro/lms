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
                Kuis: {{ $course->title }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if(session('success'))
                <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-md shadow-sm mb-6 flex items-start">
                    <div class="ml-3">
                        <p class="text-sm text-emerald-700 font-medium">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <div class="flex justify-end mb-4">
                <a href="{{ route('courses.quizzes.create', $course) }}"
                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700">
                    Tambah Kuis Baru
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Judul Kuis
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase">Batas
                                    Waktu</th>
                                <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse($quizzes as $quiz)
                                <tr class="hover:bg-gray-50/80 transition-colors duration-200">
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-semibold text-gray-900">{{ $quiz->title }}</div>
                                        <div class="text-xs text-gray-500 line-clamp-1 max-w-sm">
                                            {{ Str::limit($quiz->description, 50) }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-700">
                                            {{ $quiz->time_limit ? $quiz->time_limit . ' Menit' : 'Tidak terbatas' }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex items-center justify-end space-x-3">
                                            <a href="{{ route('courses.quizzes.show', [$course, $quiz]) }}"
                                                class="text-blue-600 hover:text-blue-900 bg-blue-50 px-3 py-1.5 rounded-md transition-colors font-medium border border-blue-100 shadow-sm">Mulai
                                                Kuis</a>
                                            <a href="{{ route('courses.quizzes.edit', [$course, $quiz]) }}"
                                                class="text-indigo-600 hover:text-indigo-900 bg-indigo-50 px-3 py-1.5 rounded-md transition-colors font-medium border border-indigo-100 shadow-sm">Edit</a>
                                            <form action="{{ route('courses.quizzes.destroy', [$course, $quiz]) }}"
                                                method="POST" class="inline-block"
                                                onsubmit="return confirm('Hapus kuis ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-900 bg-red-50 px-3 py-1.5 rounded-md transition-colors font-medium border border-red-100 shadow-sm">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-14 text-center">
                                        <h3 class="text-lg font-medium text-gray-900">Belum ada kuis</h3>
                                        <p class="mt-1 text-sm text-gray-500">Mulai tambahkan kuis untuk kursus ini.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>