<x-app-layout>
   
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Lokasi Kantor') }}
            </h2>
            <a href="{{ route('locations.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                <i class="fas fa-plus-circle mr-2"></i> Tambah Lokasi Baru
            </a>
        </div>
  

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Flash Messages -->
            @if(session('success'))
                <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded shadow">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-check-circle text-green-500"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700 font-medium">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded shadow">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-circle text-red-500"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-red-700 font-medium">{{ session('error') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Locations Card -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-6">
                    <!-- Table Header -->
                    <div class="mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center">
                        <h3 class="text-lg font-semibold text-gray-900">
                            <i class="fas fa-building mr-2 text-gray-500"></i> Daftar Lokasi Kantor
                        </h3>
                        <div class="mt-2 sm:mt-0">
                            <p class="text-sm text-gray-500">
                                Total: <span class="font-medium">{{ $locations->total() }}</span> lokasi
                            </p>
                        </div>
                    </div>

                    <!-- Locations Table -->
                    <div class="overflow-x-auto rounded-lg border border-gray-200">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <i class="fas fa-signature mr-1"></i> Nama Lokasi
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <i class="fas fa-map-marked-alt mr-1"></i> Alamat
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <i class="fas fa-map-pin mr-1"></i> Koordinat
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <i class="fas fa-ruler mr-1"></i> Radius
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <i class="fas fa-users mr-1"></i> Karyawan
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <i class="fas fa-power-off mr-1"></i> Status
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <i class="fas fa-cog mr-1"></i> Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($locations as $location)
                                <tr class="hover:bg-gray-50 transition-colors duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center">
                                                <i class="fas fa-building text-blue-500"></i>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $location->name }}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    {{ $location->timezone }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900 max-w-xs">
                                            <div class="line-clamp-2">{{ $location->address ?: '-' }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            <span class="font-mono">{{ number_format($location->latitude, 6) }}</span><br>
                                            <span class="font-mono">{{ number_format($location->longitude, 6) }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">
                                                {{ $location->radius }} meter
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $location->employees_count > 0 ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                                {{ $location->employees_count }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span data-location-id="{{ $location->id }}" class="status-badge inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $location->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            <i class="fas fa-circle mr-1.5 text-xs {{ $location->is_active ? 'text-green-400' : 'text-red-400' }}"></i>
                                            {{ $location->is_active ? 'Aktif' : 'Nonaktif' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex justify-end space-x-2">
                                            <a href="{{ route('locations.show', $location) }}" class="text-blue-600 hover:text-blue-900 p-2 rounded-full hover:bg-blue-50" title="Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('locations.edit', $location) }}" class="text-indigo-600 hover:text-indigo-900 p-2 rounded-full hover:bg-indigo-50" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="toggle-status text-yellow-600 hover:text-yellow-900 p-2 rounded-full hover:bg-yellow-50"
                                                data-location-id="{{ $location->id }}"
                                                data-location-name="{{ $location->name }}"
                                                data-is-active="{{ $location->is_active ? 1 : 0 }}"
                                                title="{{ $location->is_active ? 'Nonaktifkan' : 'Aktifkan' }}">
                                                <i class="fas {{ $location->is_active ? 'fa-toggle-on' : 'fa-toggle-off' }}"></i>
                                            </button>
                                            @if($location->employees_count == 0)
                                                <button type="button" class="delete-location text-red-600 hover:text-red-900 p-2 rounded-full hover:bg-red-50"
                                                    data-location-id="{{ $location->id }}"
                                                    data-location-name="{{ $location->name }}"
                                                    title="Hapus">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            @else
                                                <span class="text-gray-400 p-2 cursor-not-allowed" title="Tidak dapat menghapus lokasi yang memiliki karyawan">
                                                    <i class="fas fa-trash-alt"></i>
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-8 text-center">
                                        <div class="flex flex-col items-center justify-center text-gray-400">
                                            <i class="fas fa-map-marked-alt text-4xl mb-3"></i>
                                            <p class="text-lg font-medium mb-1">Tidak ada data lokasi</p>
                                            <p class="text-sm">Silakan <a href="{{ route('locations.create') }}" class="text-blue-600 hover:text-blue-800">tambahkan lokasi baru</a> untuk memulai</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($locations->hasPages())
                    <div class="mt-6 px-4 py-3 bg-gray-50 border-t border-gray-200 sm:px-6 rounded-b-lg">
                        {{ $locations->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed z-50 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <i class="fas fa-exclamation-triangle text-red-600"></i>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Konfirmasi Penghapusan
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Anda akan menghapus lokasi <span id="locationNameToDelete" class="font-semibold text-gray-900"></span>. Semua data terkait lokasi ini akan dihapus secara permanen.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <form id="deleteForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                            <i class="fas fa-trash-alt mr-2"></i> Hapus
                        </button>
                    </form>
                    <button type="button" id="cancelDelete" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        <i class="fas fa-times mr-2"></i> Batal
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Toggle Status Modal -->
    <div id="toggleStatusModal" class="fixed z-50 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-yellow-100 sm:mx-0 sm:h-10 sm:w-10">
                            <i class="fas fa-exchange-alt text-yellow-600"></i>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Ubah Status Lokasi
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500" id="toggleStatusMessage">
                                    Anda akan mengubah status lokasi <span id="locationNameToToggle" class="font-semibold text-gray-900"></span> menjadi <span id="newStatus" class="font-semibold"></span>.
                                </p>
                                <p class="mt-2 text-xs text-gray-500">
                                    <i class="fas fa-info-circle mr-1"></i> Lokasi yang tidak aktif tidak akan muncul dalam pilihan absensi.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" id="confirmToggleStatus" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">
                        <i class="fas fa-check mr-2"></i> Konfirmasi
                    </button>
                    <button type="button" id="cancelToggleStatus" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        <i class="fas fa-times mr-2"></i> Batal
                    </button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Delete location
            const deleteModal = document.getElementById('deleteModal');
            const locationNameToDelete = document.getElementById('locationNameToDelete');
            const deleteForm = document.getElementById('deleteForm');
            const cancelDelete = document.getElementById('cancelDelete');

            document.querySelectorAll('.delete-location').forEach(button => {
                button.addEventListener('click', function() {
                    const locationId = this.dataset.locationId;
                    const locationName = this.dataset.locationName;

                    locationNameToDelete.textContent = locationName;
                    deleteForm.action = `/locations/${locationId}`;
                    deleteModal.classList.remove('hidden');
                });
            });

            cancelDelete.addEventListener('click', function() {
                deleteModal.classList.add('hidden');
            });

            // Toggle status
            const toggleStatusModal = document.getElementById('toggleStatusModal');
            const locationNameToToggle = document.getElementById('locationNameToToggle');
            const newStatus = document.getElementById('newStatus');
            const confirmToggleStatus = document.getElementById('confirmToggleStatus');
            const cancelToggleStatus = document.getElementById('cancelToggleStatus');
            let currentLocationId, currentIsActive;

            document.querySelectorAll('.toggle-status').forEach(button => {
                button.addEventListener('click', function() {
                    currentLocationId = this.dataset.locationId;
                    currentIsActive = this.dataset.isActive === '1';
                    const locationName = this.dataset.locationName;

                    locationNameToToggle.textContent = locationName;
                    newStatus.textContent = currentIsActive ? 'Nonaktif' : 'Aktif';
                    
                    // Update button color based on action
                    confirmToggleStatus.classList.remove('bg-yellow-600', 'hover:bg-yellow-700', 'bg-green-600', 'hover:bg-green-700');
                    if (currentIsActive) {
                        confirmToggleStatus.classList.add('bg-yellow-600', 'hover:bg-yellow-700');
                    } else {
                        confirmToggleStatus.classList.add('bg-green-600', 'hover:bg-green-700');
                    }

                    toggleStatusModal.classList.remove('hidden');
                });
            });

            cancelToggleStatus.addEventListener('click', function() {
                toggleStatusModal.classList.add('hidden');
            });

            confirmToggleStatus.addEventListener('click', function() {
                fetch(`/locations/${currentLocationId}/toggle-status`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update UI
                        const statusBadge = document.querySelector(`.status-badge[data-location-id="${currentLocationId}"]`);
                        const toggleButton = document.querySelector(`.toggle-status[data-location-id="${currentLocationId}"]`);
                        const statusIcon = statusBadge.querySelector('i');

                        if (data.is_active) {
                            // Switch to active
                            statusBadge.classList.remove('bg-red-100', 'text-red-800');
                            statusBadge.classList.add('bg-green-100', 'text-green-800');
                            statusBadge.innerHTML = `
                                <i class="fas fa-circle mr-1.5 text-xs text-green-400"></i>
                                Aktif
                            `;
                            toggleButton.title = 'Nonaktifkan';
                            toggleButton.querySelector('i').classList.remove('fa-toggle-off');
                            toggleButton.querySelector('i').classList.add('fa-toggle-on');
                            toggleButton.dataset.isActive = '1';
                        } else {
                            // Switch to inactive
                            statusBadge.classList.remove('bg-green-100', 'text-green-800');
                            statusBadge.classList.add('bg-red-100', 'text-red-800');
                            statusBadge.innerHTML = `
                                <i class="fas fa-circle mr-1.5 text-xs text-red-400"></i>
                                Nonaktif
                            `;
                            toggleButton.title = 'Aktifkan';
                            toggleButton.querySelector('i').classList.remove('fa-toggle-on');
                            toggleButton.querySelector('i').classList.add('fa-toggle-off');
                            toggleButton.dataset.isActive = '0';
                        }

                        // Show notification
                        Toast.fire({
                            icon: 'success',
                            title: data.message
                        });
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: data.message
                        });
                    }

                    toggleStatusModal.classList.add('hidden');
                })
                .catch(error => {
                    console.error('Error:', error);
                    Toast.fire({
                        icon: 'error',
                        title: 'Terjadi kesalahan saat mengubah status lokasi'
                    });
                    toggleStatusModal.classList.add('hidden');
                });
            });

            // Initialize Toast
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
        });
    </script>
    @endpush
</x-app-layout>