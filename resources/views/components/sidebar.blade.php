@php use Illuminate\Support\Facades\Auth; @endphp

<div class="flex flex-col flex-grow bg-white pt-5 pb-4 overflow-y-auto border-r border-gray-200 w-64"> <!-- Increased width to 64 (16rem) -->
    <!-- Logo Section -->
    <div class="flex items-center flex-shrink-0 px-6 mb-8"> <!-- Increased padding and margin -->
        <div class="flex items-center">
            <div class="w-14 h-14 flex items-center justify-center"> <!-- Larger logo container -->
                <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-10 h-10"> <!-- Adjusted logo size -->
            </div>
            <div class="ml-4"> <!-- Increased margin -->
                <h1 class="text-lg font-bold text-gray-900">Sistem Presensi</h1> <!-- Bold font -->
                <p class="text-xs text-gray-500 mt-1">PT. Jaka Kuasa Nusantara</p> <!-- Added margin-top -->
            </div>
        </div>
    </div>



    <!-- Navigation -->
    <nav class="flex-1 px-4 space-y-2"> <!-- Increased padding and reduced space-y -->
        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}"
           class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} transition-colors duration-200">
            <i class="fas fa-tachometer-alt mr-4 text-lg {{ request()->routeIs('dashboard') ? 'text-blue-600' : 'text-gray-400 group-hover:text-gray-500' }}"></i>
            Dashboard
        </a>

        @if(Auth::user()->isEmployee())
            <!-- Employee Navigation -->
            <div class="mt-8"> <!-- Increased margin-top -->
                <div class="px-4 py-2">
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        Presensi
                    </h3>
                </div>

                <a href="{{ route('attendance.index') }}"
                   class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('attendance.index') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} transition-colors duration-200">
                    <i class="fas fa-camera mr-4 text-lg {{ request()->routeIs('attendance.index') ? 'text-blue-600' : 'text-gray-400 group-hover:text-gray-500' }}"></i>
                    Presensi Sekarang
                </a>

                <a href="{{ route('attendance.history') }}"
                   class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('attendance.history') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} transition-colors duration-200">
                    <i class="fas fa-history mr-4 text-lg {{ request()->routeIs('attendance.history') ? 'text-blue-600' : 'text-gray-400 group-hover:text-gray-500' }}"></i>
                    Riwayat Presensi
                </a>

                @if(Auth::user()->employee)
                    <a href="{{ route('reports.employee', Auth::user()->employee) }}"
                       class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('reports.employee') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} transition-colors duration-200">
                        <i class="fas fa-chart-bar mr-4 text-lg {{ request()->routeIs('reports.employee') ? 'text-blue-600' : 'text-gray-400 group-hover:text-gray-500' }}"></i>
                        Laporan Saya
                    </a>
                @endif
            </div>
        @endif
        
        @if(Auth::user()->isAdmin())
            <!-- Admin Navigation -->
            <div class="mt-8">
                <div class="px-4 py-2">
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        Manajemen Presensi
                    </h3>
                </div>

                <a href="{{ route('admin.attendance.history') }}"
                   class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('admin.attendance.*') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} transition-colors duration-200">
                    <i class="fas fa-clock mr-4 text-lg {{ request()->routeIs('admin.attendance.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-gray-500' }}"></i>
                    Data Presensi
                </a>

                <a href="{{ route('reports.index') }}"
                   class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('reports.*') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} transition-colors duration-200">
                    <i class="fas fa-chart-line mr-4 text-lg {{ request()->routeIs('reports.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-gray-500' }}"></i>
                    Laporan & Analitik
                </a>
            </div>

            <div class="mt-8">
                <div class="px-4 py-2">
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        Manajemen Karyawan
                    </h3>
                </div>

                <a href="{{ route('employees.index') }}"
                   class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('employees.*') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} transition-colors duration-200">
                    <i class="fas fa-users mr-4 text-lg {{ request()->routeIs('employees.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-gray-500' }}"></i>
                    Data Karyawan
                </a>

                <a href="{{ route('face-enrollment.index') }}"
                   class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('face-enrollment.*') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} transition-colors duration-200">
                    <i class="fas fa-user-check mr-4 text-lg {{ request()->routeIs('face-enrollment.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-gray-500' }}"></i>
                    Face Enrollment
                </a>
            </div>

            <div class="mt-8">
                <div class="px-4 py-2">
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        Pengaturan Sistem
                    </h3>
                </div>

                <a href="{{ route('locations.index') }}"
                   class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('locations.*') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} transition-colors duration-200">
                    <i class="fas fa-map-marker-alt mr-4 text-lg {{ request()->routeIs('locations.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-gray-500' }}"></i>
                    Lokasi Kantor
                </a>

                <a href="{{ route('face-api-test.index') }}"
                class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('face-api-test.*') ? 'bg-blue-50 text-blue-600 border-r-4 border-blue-600' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }} transition-colors duration-200">
                    <i class="fas fa-vials mr-4 text-lg {{ request()->routeIs('face-api-test*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-gray-500' }}"></i>
                    Face API Test
                </a>
            </div>
        @endif
    </nav>

    <!-- Quick Status (for employees) -->
    @if(Auth::user()->isEmployee() && Auth::user()->employee)
        <div class="px-6 py-6 border-t border-gray-200 mt-auto"> <!-- Increased padding and mt-auto -->
            <div class="bg-gray-50 rounded-xl p-4"> <!-- Larger rounded corners -->
                <h4 class="text-xs font-semibold text-gray-700 uppercase tracking-wider mb-3">Status Hari Ini</h4>

                @php
                    $todayClockIn = Auth::user()->getTodayClockIn();
                    $todayClockOut = Auth::user()->getTodayClockOut();
                @endphp

                <div class="space-y-3 text-sm"> <!-- Increased text size and spacing -->
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Masuk:</span>
                        <span class="font-medium {{ $todayClockIn ? ($todayClockIn->is_late ? 'text-red-600' : 'text-green-600') : 'text-gray-400' }}">
                            {{ $todayClockIn ? $todayClockIn->attendance_time->format('H:i') : '-' }}
                        </span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Keluar:</span>
                        <span class="font-medium {{ $todayClockOut ? 'text-green-600' : 'text-gray-400' }}">
                            {{ $todayClockOut ? $todayClockOut->attendance_time->format('H:i') : '-' }}
                        </span>
                    </div>

                    @if($todayClockIn && $todayClockIn->is_late)
                        <div class="text-xs text-red-600 bg-red-50 px-3 py-2 rounded-lg flex items-center"> <!-- Larger padding -->
                            <i class="fas fa-exclamation-triangle mr-2"></i>
                            Terlambat {{ $todayClockIn->late_minutes }} menit
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif

    <!-- Logout -->
    <div class="px-6 pb-6"> <!-- Increased padding -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="w-full group flex items-center px-4 py-3 text-sm font-medium rounded-lg text-red-600 hover:bg-red-50 hover:text-red-700 transition-colors duration-200">
                <i class="fas fa-sign-out-alt mr-4 text-red-500 group-hover:text-red-600"></i>
                Keluar
            </button>
        </form>
    </div>
</div>