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
                {{ isset($quiz) ? 'Edit Kuis' : 'Tambah Kuis Baru' }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden p-8 sm:p-10">
                <form
                    action="{{ isset($quiz) ? route('courses.quizzes.update', [$course, $quiz]) : route('courses.quizzes.store', $course) }}"
                    method="POST" class="space-y-6">
                    @csrf
                    @if(isset($quiz)) @method('PUT') @endif

                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Kuis</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $quiz->title ?? '') }}"
                            required
                            class="focus:ring-indigo-500 focus:border-indigo-500 block w-full py-3 sm:text-sm border-gray-300 rounded-lg">
                        @error('title') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi
                            Kuis</label>
                        <textarea name="description" id="description" rows="5"
                            class="focus:ring-indigo-500 focus:border-indigo-500 block w-full py-3 sm:text-sm border-gray-300 rounded-lg">{{ old('description', $quiz->description ?? '') }}</textarea>
                        @error('description') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="time_limit" class="block text-sm font-medium text-gray-700 mb-1">Batas Waktu (Menit,
                            Opsional)</label>
                        <input type="number" min="1" name="time_limit" id="time_limit"
                            value="{{ old('time_limit', $quiz->time_limit ?? '') }}"
                            class="focus:ring-indigo-500 focus:border-indigo-500 block w-full py-3 sm:text-sm border-gray-300 rounded-lg">
                        @error('time_limit') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div class="pt-6 border-t border-gray-100 flex justify-end space-x-3">
                        <a href="{{ route('courses.quizzes.index', $course) }}"
                            class="bg-white border py-2.5 px-5 rounded-lg text-sm text-gray-700">Batal</a>
                        <button type="submit"
                            class="bg-indigo-600 py-2.5 px-6 rounded-lg text-sm text-white hover:bg-indigo-700">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>