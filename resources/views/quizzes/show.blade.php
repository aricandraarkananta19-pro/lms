<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3 py-1">
            <a href="{{ route('courses.quizzes.index', $course) }}"
                class="text-gray-400 hover:text-indigo-600 transition-colors">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ $quiz->title }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden p-8 sm:p-10 text-center">

                <div
                    class="mx-auto w-20 h-20 bg-indigo-100 text-indigo-600 rounded-full flex items-center justify-center mb-6">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                </div>

                <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $quiz->title }}</h3>

                @if($quiz->time_limit)
                    <p
                        class="text-sm font-medium text-emerald-600 mb-6 bg-emerald-50 inline-block px-3 py-1 rounded-full border border-emerald-100">
                        Waktu Pengerjaan: {{ $quiz->time_limit }} Menit
                    </p>
                @endif

                <div class="text-gray-600 mb-8 max-w-2xl mx-auto">
                    {!! nl2br(e($quiz->description)) !!}
                </div>

                <div class="bg-gray-50 border border-gray-200 rounded-xl p-6 text-center max-w-md mx-auto">
                    <p class="text-sm text-gray-600 mb-4">Pastikan koneksi internet Anda stabil sebelum memulai. Waktu
                        akan terus berjalan setelah Anda menekan tombol mulai.</p>
                    <button type="button"
                        class="w-full bg-indigo-600 text-white font-semibold py-3 px-6 rounded-lg hover:bg-indigo-700 transition-colors shadow-sm text-lg">
                        Mulai Kerjakan
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>