<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between bg-[#F9F4EB] p-4 rounded-lg shadow-sm">
            <div>
                <h2 class="font-semibold text-xl text-[#4A5929] leading-tight">
                    Schedule New Appointment
                </h2>
                <p class="text-sm text-[#939C80]">
                    Book a new therapy session.
                </p>
            </div>
            <a href="{{ route('appointments.index') }}"
               class="inline-flex items-center px-4 py-2 bg-[#4A5929] border border-transparent rounded-md
                      font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#939C80]
                      focus:outline-none focus:ring-2 focus:ring-[#4A5929] focus:ring-offset-2 transition">
                Back to Appointments
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-[#F9F4EB] min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#D8D1C3] shadow-lg rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-[#4A5929] mb-4">Appointment Details</h3>

                    {{-- @if ($errors->any())
                        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Oops!</strong>
                            <span class="block sm:inline">There were some problems with your input.</span>
                            <ul class="mt-2 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}

                    <form action="{{ route('appointments.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Patient --}}
                            <div>
                                <label for="patient_id" class="block text-sm font-medium text-[#4A5929] mb-1">Patient</label>
                                <select name="patient_id" id="patient_id" class="block w-full rounded-md border border-[#D9C9C9] bg-[#F9F4EB] text-[#4A5929] shadow-sm focus:border-[#4A5929] focus:ring-[#4A5929] text-sm" required>
                                    <option value="">Select a patient</option>
                                    {{-- Assuming $patients is passed from controller --}}
                                    @foreach($patients ?? [] as $patient)
                                        <option value="{{ $patient->id }}" {{ old('patient_id') == $patient->id ? 'selected' : '' }}>{{ $patient->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Therapist --}}
                            <div>
                                <label for="therapist_id" class="block text-sm font-medium text-[#4A5929] mb-1">Therapist</label>
                                <select name="therapist_id" id="therapist_id" class="block w-full rounded-md border border-[#D9C9C9] bg-[#F9F4EB] text-[#4A5929] shadow-sm focus:border-[#4A5929] focus:ring-[#4A5929] text-sm" required>
                                    <option value="">Select a therapist</option>
                                    {{-- Assuming $therapists is passed from controller --}}
                                    @foreach($therapists ?? [] as $therapist)
                                        <option value="{{ $therapist->id }}" {{ old('therapist_id') == $therapist->id ? 'selected' : '' }}>{{ $therapist->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Appointment Date --}}
                            <div>
                                <label for="appointment_date" class="block text-sm font-medium text-[#4A5929] mb-1">Date & Time</label>
                                <input type="datetime-local" name="appointment_date" id="appointment_date" value="{{ old('appointment_date') }}" class="block w-full rounded-md border border-[#D9C9C9] bg-[#F9F4EB] text-[#4A5929] shadow-sm focus:border-[#4A5929] focus:ring-[#4A5929] text-sm" required>
                            </div>

                            {{-- Duration --}}
                            <div>
                                <label for="duration_minutes" class="block text-sm font-medium text-[#4A5929] mb-1">Duration (minutes)</label>
                                <input type="number" name="duration_minutes" id="duration_minutes" value="{{ old('duration_minutes', 60) }}" class="block w-full rounded-md border border-[#D9C9C9] bg-[#F9F4EB] text-[#4A5929] shadow-sm focus:border-[#4A5929] focus:ring-[#4A5929] text-sm" required>
                            </div>
                        </div>

                        {{-- Meeting Link --}}
                        <div>
                            <label for="meeting_link" class="block text-sm font-medium text-[#4A5929] mb-1">Meeting Link (Optional)</label>
                            <input type="url" name="meeting_link" id="meeting_link" value="{{ old('meeting_link') }}" placeholder="https://zoom.us/j/1234567890" class="block w-full rounded-md border border-[#D9C9C9] bg-[#F9F4EB] text-[#4A5929] placeholder-[#939C80] shadow-sm focus:border-[#4A5929] focus:ring-[#4A5929] text-sm">
                        </div>

                        {{-- Notes --}}
                        <div>
                            <label for="notes" class="block text-sm font-medium text-[#4A5929] mb-1">Notes (Optional)</label>
                            <textarea name="notes" id="notes" rows="4" class="block w-full rounded-md border border-[#D9C9C9] bg-[#F9F4EB] text-[#4A5929] placeholder-[#939C80] shadow-sm focus:border-[#4A5929] focus:ring-[#4A5929] text-sm">{{ old('notes') }}</textarea>
                        </div>

                        {{-- Submit --}}
                        <div class="flex justify-end pt-4 gap-2">
                             <a href="{{ route('appointments.index') }}"
                               class="inline-flex items-center px-4 py-2 border border-[#D9C9C9]
                                      rounded-md text-xs font-medium text-[#4A5929] bg-[#F9F4EB]
                                      hover:bg-[#D9C9C9] transition">
                                Cancel
                            </a>
                            <button type="submit"
                                    class="inline-flex items-center px-5 py-2 bg-[#4A5929] border border-transparent
                                           rounded-md font-semibold text-xs text-white uppercase tracking-widest
                                           hover:bg-[#939C80] focus:outline-none focus:ring-2
                                           focus:ring-[#4A5929] focus:ring-offset-2 transition">
                                Schedule Appointment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>