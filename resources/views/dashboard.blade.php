<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hospital Management Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Patients -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gradient-to-r from-blue-500 to-blue-600 text-white">
                        <div class="flex items-center">
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold">Total Patients</h3>
                                <p class="text-3xl font-bold">{{ App\Models\Patient::count() ?? 0 }}</p>
                            </div>
                            <div class="ml-4">
                                <svg class="w-12 h-12 opacity-80" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Doctors -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gradient-to-r from-green-500 to-green-600 text-white">
                        <div class="flex items-center">
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold">Total Doctors</h3>
                                <p class="text-3xl font-bold">{{ App\Models\Doctor::count() ?? 0 }}</p>
                            </div>
                            <div class="ml-4">
                                <svg class="w-12 h-12 opacity-80" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Today's Appointments -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gradient-to-r from-purple-500 to-purple-600 text-white">
                        <div class="flex items-center">
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold">Today's Appointments</h3>
                                <p class="text-3xl font-bold">{{ App\Models\Appointment::whereDate('appointment_date', today())->count() ?? 0 }}</p>
                            </div>
                            <div class="ml-4">
                                <svg class="w-12 h-12 opacity-80" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Available Rooms -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gradient-to-r from-orange-500 to-orange-600 text-white">
                        <div class="flex items-center">
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold">Available Rooms</h3>
                                <p class="text-3xl font-bold">{{ App\Models\Room::where('status', 'available')->count() ?? 0 }}</p>
                            </div>
                            <div class="ml-4">
                                <svg class="w-12 h-12 opacity-80" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Quick Actions</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                        <a href="{{ route('patients.create') }}" class="flex flex-col items-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors">
                            <svg class="w-8 h-8 text-blue-600 mb-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-sm font-medium text-blue-700">Add Patient</span>
                        </a>

                        <a href="{{ route('appointments.create') }}" class="flex flex-col items-center p-4 bg-green-50 rounded-lg hover:bg-green-100 transition-colors">
                            <svg class="w-8 h-8 text-green-600 mb-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-sm font-medium text-green-700">Book Appointment</span>
                        </a>

                        <a href="{{ route('doctors.index') }}" class="flex flex-col items-center p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition-colors">
                            <svg class="w-8 h-8 text-purple-600 mb-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-sm font-medium text-purple-700">View Doctors</span>
                        </a>

                        <a href="{{ route('medicines.index') }}" class="flex flex-col items-center p-4 bg-orange-50 rounded-lg hover:bg-orange-100 transition-colors">
                            <svg class="w-8 h-8 text-orange-600 mb-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-sm font-medium text-orange-700">Medicines</span>
                        </a>

                        <a href="{{ route('rooms.index') }}" class="flex flex-col items-center p-4 bg-red-50 rounded-lg hover:bg-red-100 transition-colors">
                            <svg class="w-8 h-8 text-red-600 mb-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                            <span class="text-sm font-medium text-red-700">Rooms</span>
                        </a>

                        <a href="{{ route('reports.dashboard') }}" class="flex flex-col items-center p-4 bg-indigo-50 rounded-lg hover:bg-indigo-100 transition-colors">
                            <svg class="w-8 h-8 text-indigo-600 mb-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                            </svg>
                            <span class="text-sm font-medium text-indigo-700">Reports</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Recent Activities -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Recent Appointments -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Recent Appointments</h3>
                        <div class="space-y-3">
                            @forelse(App\Models\Appointment::with(['patient', 'doctor'])->latest()->take(5)->get() as $appointment)
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <div>
                                        <p class="font-medium text-gray-900">{{ $appointment->patient->full_name ?? 'N/A' }}</p>
                                        <p class="text-sm text-gray-600">Dr. {{ $appointment->doctor->full_name ?? 'N/A' }}</p>
                                        <p class="text-xs text-gray-500">{{ $appointment->appointment_date ?? 'N/A' }} at {{ $appointment->appointment_time ?? 'N/A' }}</p>
                                    </div>
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                        @if($appointment->status == 'confirmed') bg-green-100 text-green-800
                                        @elseif($appointment->status == 'scheduled') bg-blue-100 text-blue-800
                                        @elseif($appointment->status == 'completed') bg-gray-100 text-gray-800
                                        @else bg-red-100 text-red-800
                                        @endif">
                                        {{ ucfirst($appointment->status ?? 'scheduled') }}
                                    </span>
                                </div>
                            @empty
                                <p class="text-gray-500 text-center py-4">No appointments found</p>
                            @endforelse
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('appointments.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">View all appointments →</a>
                        </div>
                    </div>
                </div>

                <!-- Recent Patients -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Recently Registered Patients</h3>
                        <div class="space-y-3">
                            @forelse(App\Models\Patient::latest('registration_date')->take(5)->get() as $patient)
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <div>
                                        <p class="font-medium text-gray-900">{{ $patient->full_name ?? 'N/A' }}</p>
                                        <p class="text-sm text-gray-600">{{ $patient->email ?? 'N/A' }}</p>
                                        <p class="text-xs text-gray-500">Registered: {{ $patient->registration_date ? $patient->registration_date->format('M d, Y') : 'N/A' }}</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm font-medium text-gray-900">{{ $patient->blood_group ?? 'N/A' }}</p>
                                        <p class="text-xs text-gray-500">{{ ucfirst($patient->gender ?? 'N/A') }}</p>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500 text-center py-4">No patients found</p>
                            @endforelse
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('patients.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">View all patients →</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
