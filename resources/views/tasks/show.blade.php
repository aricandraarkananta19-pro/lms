<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3 py-1">
            <a href="{{ route('courses.tasks.index', $course) }}"
                class="text-gray-400 hover:text-indigo-600 transition-colors">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ $task->title }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden p-8 sm:p-10">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">{{ $task->title }}</h3>
                        <p class="text-sm text-gray-500 mt-1">Mata Kursus: {{ $course->title }}</p>
                    </div>
                    @if($task->due_date)
                        <span
                            class="inline-flex items-center px-3 py-1 bg-red-50 text-red-700 rounded-full text-sm font-medium border border-red-100">
                            Tenggat: {{ \Carbon\Carbon::parse($task->due_date)->format('d M Y, H:i') }}
                        </span>
                    @endif
                </div>

                <div class="prose max-w-none text-gray-700 mb-8 border-t border-b border-gray-100 py-6">
                    {!! nl2br(e($task->description)) !!}
                </div>

                <div class="bg-blue-50 border border-blue-100 rounded-xl p-6 text-center">
                    <h4 class="text-lg font-medium text-blue-900 mb-2">Area Pengumpulan Tugas</h4>
                    <p class="text-sm text-blue-700 mb-4">Fitur upload file jawaban/tugas akan ditampilkan di sini untuk
                        peserta kursus.</p>
                    <button type="button"
                        class="bg-blue-600 text-white font-medium py-2 px-6 rounded-lg opacity-50 cursor-not-allowed">
                        Kumpulkan Jawaban
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>