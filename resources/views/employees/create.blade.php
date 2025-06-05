<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Karyawan Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-2xl font-bold text-gray-900">Formulir Pendaftaran Karyawan</h3>
                        <a href="{{ route('employees.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar
                        </a>
                    </div>

                    <form method="POST" action="{{ route('employees.store') }}" class="space-y-8">
                        @csrf

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Validation Errors -->
                        @if ($errors->any())
                            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <h3 class="text-sm font-medium text-red-800">
                                            {{ __('Whoops! Terjadi kesalahan.') }}
                                        </h3>
                                        <div class="mt-2 text-sm text-red-700">
                                            <ul class="list-disc pl-5 space-y-1">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Account Information Card -->
                        <div class="bg-white shadow rounded-lg overflow-hidden">
                            <div class="px-6 py-4 border-b border-gray-200 bg-blue-50">
                                <h3 class="text-lg font-semibold text-blue-800 flex items-center">
                                    <svg class="h-5 w-5 text-blue-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Informasi Akun
                                </h3>
                            </div>
                            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Username -->
                                <div>
                                    <x-input-label for="username" :value="__('Username *')" />
                                    <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus placeholder="Masukkan username unik" />
                                    <p class="mt-1 text-xs text-gray-500">Username harus unik dan tidak mengandung spasi</p>
                                </div>

                                <!-- Name -->
                                <div>
                                    <x-input-label for="name" :value="__('Nama Lengkap *')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required placeholder="Nama lengkap sesuai KTP" />
                                </div>

                                <!-- Email -->
                                <div>
                                    <x-input-label for="email" :value="__('Email *')" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required placeholder="email@perusahaan.com" />
                                    <p class="mt-1 text-xs text-gray-500">Email aktif yang dapat digunakan untuk verifikasi</p>
                                </div>

                                <!-- Password -->
                                <div>
                                    <x-input-label for="password" :value="__('Password *')" />
                                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="Minimal 8 karakter" />
                                    <p class="mt-1 text-xs text-gray-500">Kombinasi huruf, angka, dan simbol lebih aman</p>
                                </div>

                                <!-- Confirm Password -->
                                <div>
                                    <x-input-label for="password_confirmation" :value="__('Konfirmasi Password *')" />
                                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required placeholder="Ketik ulang password" />
                                </div>
                            </div>
                        </div>

                        <!-- Employee Information Card -->
                        <div class="bg-white shadow rounded-lg overflow-hidden">
                            <div class="px-6 py-4 border-b border-gray-200 bg-green-50">
                                <h3 class="text-lg font-semibold text-green-800 flex items-center">
                                    <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    Informasi Karyawan
                                </h3>
                            </div>
                            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Employee ID -->
                                <div>
                                    <x-input-label for="employee_id" :value="__('ID Karyawan *')" />
                                    <x-text-input id="employee_id" class="block mt-1 w-full" type="text" name="employee_id" :value="old('employee_id')" required placeholder="EMP-XXXX" />
                                    <p class="mt-1 text-xs text-gray-500">Nomor identifikasi karyawan yang unik</p>
                                </div>

                                <!-- Phone -->
                                <div>
                                    <x-input-label for="phone" :value="__('Nomor Telepon')" />
                                    <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" placeholder="0812-3456-7890" />
                                </div>

                                <!-- Position -->
                                <div>
                                    <x-input-label for="position" :value="__('Jabatan *')" />
                                    <x-text-input id="position" class="block mt-1 w-full" type="text" name="position" :value="old('position')" required placeholder="Staff IT" />
                                </div>

                                <!-- Department -->
                                <div>
                                    <x-input-label for="department" :value="__('Departemen')" />
                                    <x-text-input id="department" class="block mt-1 w-full" type="text" name="department" :value="old('department')" placeholder="IT / HRD / Finance" />
                                </div>

                                <!-- Location -->
                                <div>
                                    <x-input-label for="location_id" :value="__('Lokasi Kantor *')" />
                                    <select id="location_id" name="location_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required>
                                        <option value="">Pilih Lokasi Kantor</option>
                                        @foreach($locations as $location)
                                            <option value="{{ $location->id }}" {{ old('location_id') == $location->id ? 'selected' : '' }}>
                                                {{ $location->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Join Date -->
                                <div>
                                    <x-input-label for="join_date" :value="__('Tanggal Bergabung *')" />
                                    <x-text-input id="join_date" class="block mt-1 w-full" type="date" name="join_date" :value="old('join_date')" required />
                                </div>
                            </div>
                        </div>

                        <!-- Work Schedule Card -->
                        <div class="bg-white shadow rounded-lg overflow-hidden">
                            <div class="px-6 py-4 border-b border-gray-200 bg-purple-50">
                                <h3 class="text-lg font-semibold text-purple-800 flex items-center">
                                    <svg class="h-5 w-5 text-purple-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Jadwal Kerja
                                </h3>
                            </div>
                            <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                                <!-- Work Start Time -->
                                <div>
                                    <x-input-label for="work_start_time" :value="__('Jam Masuk *')" />
                                    <x-text-input id="work_start_time" class="block mt-1 w-full" type="time" name="work_start_time" :value="old('work_start_time', '08:00')" required />
                                </div>

                                <!-- Work End Time -->
                                <div>
                                    <x-input-label for="work_end_time" :value="__('Jam Pulang *')" />
                                    <x-text-input id="work_end_time" class="block mt-1 w-full" type="time" name="work_end_time" :value="old('work_end_time', '17:00')" required />
                                </div>

                                <!-- Flexible Time -->
                                <div class="flex items-center">
                                    <div class="mt-6">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" name="is_flexible_time" value="1" {{ old('is_flexible_time') ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                            <span class="ml-2 text-gray-700">Jam Kerja Fleksibel</span>
                                        </label>
                                        <p class="mt-1 text-xs text-gray-500">Karyawan dapat mengatur jam kerja sendiri</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Status & Notes Card -->
                        <div class="bg-white shadow rounded-lg overflow-hidden">
                            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                                <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                                    <svg class="h-5 w-5 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Status & Catatan
                                </h3>
                            </div>
                            <div class="p-6 grid grid-cols-1 gap-6">
                                <!-- Status -->
                                <div class="md:w-1/2">
                                    <x-input-label for="status" :value="__('Status Karyawan *')" />
                                    <select id="status" name="status" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" required>
                                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                                        <option value="on_leave" {{ old('status') == 'on_leave' ? 'selected' : '' }}>Cuti</option>
                                        <option value="probation" {{ old('status') == 'probation' ? 'selected' : '' }}>Masa Percobaan</option>
                                    </select>
                                </div>

                                <!-- Notes -->
                                <div>
                                    <x-input-label for="notes" :value="__('Catatan Tambahan')" />
                                    <textarea id="notes" name="notes" rows="3" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" placeholder="Catatan khusus tentang karyawan...">{{ old('notes') }}</textarea>
                                    <p class="mt-1 text-xs text-gray-500">Informasi tambahan yang perlu dicatat</p>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end pt-6 border-t border-gray-200">
                            <a href="{{ route('employees.index') }}" class="inline-flex items-center px-6 py-3 bg-gray-100 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-200 active:bg-gray-300 focus:outline-none focus:border-gray-300 focus:ring ring-gray-200 disabled:opacity-25 transition ease-in-out duration-150 mr-4">
                                <i class="fas fa-times mr-2"></i> Batal
                            </a>
                            <x-primary-button class="inline-flex items-center px-6 py-3">
                                <i class="fas fa-save mr-2"></i> Simpan Data Karyawan
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>