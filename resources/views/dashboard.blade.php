<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Dashboard Overview') }}
        </h2>
    </x-slot>

    @php
        // Fetch some dynamic data for the dashboard
        $totalCourses = \App\Models\Course::count();
        $recentCourses = \App\Models\Course::latest()->take(5)->get();
        // Dummy values for other stats
        $totalStudents = 1240;
        $monthlyRevenue = 45000000; // Rp 45.000.000
    @endphp

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Welcome Banner -->
            <div class="bg-gradient-to-r from-indigo-600 to-blue-500 rounded-xl shadow-lg overflow-hidden">
                <div class="px-6 py-8 sm:p-10 text-white flex flex-col sm:flex-row justify-between items-center">
                    <div>
                        <h3 class="text-3xl font-extrabold tracking-tight mb-2">Welcome Back,
                            {{ auth()->user()->name }}! 👋</h3>
                        <p class="text-blue-100 text-lg">Here's what's happening with your online courses today.</p>
                    </div>
                    <div class="mt-6 sm:mt-0">
                        <a href="{{ route('courses.create') }}"
                            class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50 transition duration-150 ease-in-out shadow-sm">
                            <svg class="-ml-1 mr-2 h-5 w-5 text-indigo-500" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            Tambah Kursus Baru
                        </a>
                    </div>
                </div>
            </div>

            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Stat Card 1 -->
                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center transition-transform hover:-translate-y-1 hover:shadow-md duration-300">
                    <div class="p-3 rounded-full bg-indigo-100 text-indigo-600 mr-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Total Kursus</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $totalCourses }}</p>
                    </div>
                </div>

                <!-- Stat Card 2 -->
                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center transition-transform hover:-translate-y-1 hover:shadow-md duration-300">
                    <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Total Peserta</p>
                        <p class="text-3xl font-bold text-gray-900">{{ number_format($totalStudents) }}</p>
                    </div>
                </div>

                <!-- Stat Card 3 -->
                <div
                    class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center transition-transform hover:-translate-y-1 hover:shadow-md duration-300">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Pendapatan (Bulan Ini)</p>
                        <p class="text-3xl font-bold text-gray-900">Rp {{ number_format($monthlyRevenue, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Recent Courses Table -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                    <h3 class="text-lg font-semibold text-gray-800">Kursus Terbaru</h3>
                    <a href="{{ route('courses.index') }}"
                        class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">Lihat Semua &rarr;</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Mata Kursus</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Harga</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Tgl Ditambahkan</th>
                                <th scope="col"
                                    class="px-6 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100 h-full">
                            @forelse($recentCourses as $course)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                @if($course->hasMedia('course_image'))
                                                    <img class="h-10 w-10 rounded-lg object-cover shadow-sm"
                                                        src="{{ $course->getFirstMediaUrl('course_image') }}" alt="">
                                                @else
                                                    <img class="h-10 w-10 rounded-lg object-cover shadow-sm"
                                                        src="https://ui-avatars.com/api/?name={{ urlencode($course->title) }}&background=E0E7FF&color=4338CA"
                                                        alt="">
                                                @endif
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900 truncate max-w-[200px]">
                                                    {{ $course->title }}</div>
                                                <div class="text-xs text-gray-500 truncate max-w-[200px]">
                                                    {{ Str::limit($course->description, 30) }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div
                                            class="text-sm text-gray-900 font-medium bg-emerald-50 text-emerald-700 px-3 py-1 rounded-full inline-flex border border-emerald-100">
                                            Rp {{ number_format($course->price, 0, ',', '.') }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-600">{{ $course->created_at->format('d M Y') }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('courses.edit', $course->id) }}"
                                            class="text-indigo-600 hover:text-indigo-900 bg-indigo-50 px-3 py-1 rounded-md transition-colors">Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-10 text-center text-gray-500">
                                        <svg class="mx-auto h-12 w-12 text-gray-300 mb-3" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                        </svg>
                                        <p class="text-base font-medium">Belum ada data kursus</p>
                                        <p class="text-sm mt-1">Mulailah dengan menambahkan kursus pertama Anda.</p>
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