<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Register New Patient') }}
            </h2>
            <a href="{{ route('patients.index') }}" 
               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Back to Patients
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <strong>Please fix the following errors:</strong>
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('patients.store') }}" class="space-y-6">
                        @csrf

                        <!-- Personal Information -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Personal Information</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">
                                        First Name *
                                    </label>
                                    <input type="text" 
                                           name="first_name" 
                                           id="first_name"
                                           value="{{ old('first_name') }}"
                                           required
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 @error('first_name') border-red-500 @enderror">
                                    @error('first_name')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">
                                        Last Name *
                                    </label>
                                    <input type="text" 
                                           name="last_name" 
                                           id="last_name"
                                           value="{{ old('last_name') }}"
                                           required
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 @error('last_name') border-red-500 @enderror">
                                    @error('last_name')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="date_of_birth" class="block text-sm font-medium text-gray-700 mb-2">
                                        Date of Birth *
                                    </label>
                                    <input type="date" 
                                           name="date_of_birth" 
                                           id="date_of_birth"
                                           value="{{ old('date_of_birth') }}"
                                           required
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 @error('date_of_birth') border-red-500 @enderror">
                                    @error('date_of_birth')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="gender" class="block text-sm font-medium text-gray-700 mb-2">
                                        Gender *
                                    </label>
                                    <select name="gender" 
                                            id="gender"
                                            required
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 @error('gender') border-red-500 @enderror">
                                        <option value="">Select Gender</option>
                                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('gender')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="blood_group" class="block text-sm font-medium text-gray-700 mb-2">
                                        Blood Group
                                    </label>
                                    <select name="blood_group" 
                                            id="blood_group"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">
                                        <option value="">Select Blood Group</option>
                                        <option value="A+" {{ old('blood_group') == 'A+' ? 'selected' : '' }}>A+</option>
                                        <option value="A-" {{ old('blood_group') == 'A-' ? 'selected' : '' }}>A-</option>
                                        <option value="B+" {{ old('blood_group') == 'B+' ? 'selected' : '' }}>B+</option>
                                        <option value="B-" {{ old('blood_group') == 'B-' ? 'selected' : '' }}>B-</option>
                                        <option value="AB+" {{ old('blood_group') == 'AB+' ? 'selected' : '' }}>AB+</option>
                                        <option value="AB-" {{ old('blood_group') == 'AB-' ? 'selected' : '' }}>AB-</option>
                                        <option value="O+" {{ old('blood_group') == 'O+' ? 'selected' : '' }}>O+</option>
                                        <option value="O-" {{ old('blood_group') == 'O-' ? 'selected' : '' }}>O-</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Information -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Contact Information</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                        Email Address *
                                    </label>
                                    <input type="email" 
                                           name="email" 
                                           id="email"
                                           value="{{ old('email') }}"
                                           required
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 @error('email') border-red-500 @enderror">
                                    @error('email')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                        Phone Number *
                                    </label>
                                    <input type="tel" 
                                           name="phone" 
                                           id="phone"
                                           value="{{ old('phone') }}"
                                           required
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 @error('phone') border-red-500 @enderror">
                                    @error('phone')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="md:col-span-2">
                                    <label for="address" class="block text-sm font-medium text-gray-700 mb-2">
                                        Address *
                                    </label>
                                    <textarea name="address" 
                                              id="address"
                                              rows="3"
                                              required
                                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 @error('address') border-red-500 @enderror">{{ old('address') }}</textarea>
                                    @error('address')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="emergency_contact" class="block text-sm font-medium text-gray-700 mb-2">
                                        Emergency Contact
                                    </label>
                                    <input type="text" 
                                           name="emergency_contact" 
                                           id="emergency_contact"
                                           value="{{ old('emergency_contact') }}"
                                           placeholder="Name and phone number"
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">
                                </div>

                                <div>
                                    <label for="insurance_number" class="block text-sm font-medium text-gray-700 mb-2">
                                        Insurance Number
                                    </label>
                                    <input type="text" 
                                           name="insurance_number" 
                                           id="insurance_number"
                                           value="{{ old('insurance_number') }}"
                                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">
                                </div>
                            </div>
                        </div>

                        <!-- Medical Information -->
                        <div class="bg-gray-50 p-6 rounded-lg">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Medical Information</h3>
                            
                            <div>
                                <label for="medical_history" class="block text-sm font-medium text-gray-700 mb-2">
                                    Medical History
                                </label>
                                <textarea name="medical_history" 
                                          id="medical_history"
                                          rows="4"
                                          placeholder="Any known allergies, chronic conditions, previous surgeries, medications, etc."
                                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">{{ old('medical_history') }}</textarea>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end space-x-4">
                            <a href="{{ route('patients.index') }}" 
                               class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-6 rounded">
                                Cancel
                            </a>
                            <button type="submit" 
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
                                Register Patient
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>