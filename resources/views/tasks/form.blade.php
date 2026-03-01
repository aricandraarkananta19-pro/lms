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
                {{ isset($task) ? 'Edit Tugas' : 'Tambah Tugas Baru' }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden p-8 sm:p-10">
                <form
                    action="{{ isset($task) ? route('courses.tasks.update', [$course, $task]) : route('courses.tasks.store', $course) }}"
                    method="POST" class="space-y-6">
                    @csrf
                    @if(isset($task)) @method('PUT') @endif

                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Tugas</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $task->title ?? '') }}"
                            required
                            class="focus:ring-indigo-500 focus:border-indigo-500 block w-full py-3 sm:text-sm border-gray-300 rounded-lg">
                        @error('title') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Instruksi
                            Tugas</label>
                        <textarea name="description" id="description" rows="5"
                            class="focus:ring-indigo-500 focus:border-indigo-500 block w-full py-3 sm:text-sm border-gray-300 rounded-lg">{{ old('description', $task->description ?? '') }}</textarea>
                        @error('description') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="due_date" class="block text-sm font-medium text-gray-700 mb-1">Tenggat Waktu
                            (Opsional)</label>
                        <input type="datetime-local" name="due_date" id="due_date"
                            value="{{ old('due_date', isset($task) && $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('Y-m-d\TH:i') : '') }}"
                            class="focus:ring-indigo-500 focus:border-indigo-500 block w-full py-3 sm:text-sm border-gray-300 rounded-lg">
                        @error('due_date') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div class="pt-6 border-t border-gray-100 flex justify-end space-x-3">
                        <a href="{{ route('courses.tasks.index', $course) }}"
                            class="bg-white border py-2.5 px-5 rounded-lg text-sm text-gray-700">Batal</a>
                        <button type="submit"
                            class="bg-indigo-600 py-2.5 px-6 rounded-lg text-sm text-white hover:bg-indigo-700">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>