<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Tugas') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-5 border-b border-gray-100 bg-indigo-50/50 flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-indigo-900">Daftar Semua Tugas</h3>
                    <p class="text-sm text-indigo-600">Semua tugas dari berbagai kursus yang tersedia</p>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50/80">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Judul Tugas</th>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Modul Kursus</th>
                                <th scope="col"
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Tenggat Waktu</th>
                                <th scope="col"
                                    class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse($tasks as $task)
                                <tr class="hover:bg-gray-50/50 transition-colors duration-200">
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-semibold text-gray-900">{{ $task->title }}</div>
                                        <div class="text-xs text-gray-500 line-clamp-1 mt-1">
                                            {{ Str::limit($task->description, 60) }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100">
                                            {{ $task->course->title }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('d M Y, H:i') : 'Tanpa Tenggat' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('courses.tasks.show', [$task->course_id, $task->id]) }}"
                                            class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none transition ease-in-out duration-150 shadow-sm">
                                            Lihat Tugas
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-14 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-300 mb-3" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                        </svg>
                                        <h3 class="text-lg font-medium text-gray-900">Belum ada data tugas</h3>
                                        <p class="mt-1 text-sm text-gray-500">Saat ini belum ada tugas yang tersedia di
                                            seluruh kursus.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($tasks->hasPages())
                    <div class="px-6 py-4 border-t border-gray-100 bg-gray-50 sm:px-6">
                        {{ $tasks->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>