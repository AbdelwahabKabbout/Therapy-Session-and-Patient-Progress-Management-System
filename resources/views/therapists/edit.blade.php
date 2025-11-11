<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between bg-[#F9F4EB] p-4 rounded-lg shadow-sm">
            <div>
                <h2 class="font-semibold text-xl text-[#4A5929] leading-tight">
                    Edit Therapist
                </h2>
                <p class="text-sm text-[#939C80]">
                    Update therapist information and status.
                </p>
            </div>

            <a href="{{ route('therapists.index') }}"
               class="inline-flex items-center px-4 py-2 bg-[#4A5929] border border-transparent rounded-md
                      font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#939C80]
                      focus:outline-none focus:ring-2 focus:ring-[#4A5929] focus:ring-offset-2 transition">
                Back to List
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-[#F9F4EB] min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#D8D1C3] shadow-lg rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-[#4A5929] mb-4">
                        Therapist Details
                    </h3>

                    <form action="{{ route('therapists.update', $therapist) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        {{-- Name --}}
                        <div>
                            <label for="name" class="block text-sm font-medium text-[#4A5929] mb-1">
                                Full Name
                            </label>
                            <input type="text" name="name" id="name"
                                   value="{{ old('name', $therapist->name ?? optional($therapist->user)->name) }}"
                                   class="block w-full rounded-md border border-[#D9C9C9] bg-[#F9F4EB]
                                          text-[#4A5929] placeholder-[#939C80] shadow-sm
                                          focus:border-[#4A5929] focus:ring-[#4A5929] text-sm" required>
                            @error('name')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div>
                            <label for="email" class="block text-sm font-medium text-[#4A5929] mb-1">
                                Email Address
                            </label>
                            <input type="email" name="email" id="email"
                                   value="{{ old('email', $therapist->email ?? optional($therapist->user)->email) }}"
                                   class="block w-full rounded-md border border-[#D9C9C9] bg-[#F9F4EB]
                                          text-[#4A5929] placeholder-[#939C80] shadow-sm
                                          focus:border-[#4A5929] focus:ring-[#4A5929] text-sm" required>
                            @error('email')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Phone --}}
                        <div>
                            <label for="phone" class="block text-sm font-medium text-[#4A5929] mb-1">
                                Phone Number
                            </label>
                            <input type="text" name="phone" id="phone"
                                   value="{{ old('phone', $therapist->phone) }}"
                                   class="block w-full rounded-md border border-[#D9C9C9] bg-[#F9F4EB]
                                          text-[#4A5929] placeholder-[#939C80] shadow-sm
                                          focus:border-[#4A5929] focus:ring-[#4A5929] text-sm">
                            @error('phone')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Specialization --}}
                        <div>
                            <label for="specialization" class="block text-sm font-medium text-[#4A5929] mb-1">
                                Specialization
                            </label>
                            <input type="text" name="specialization" id="specialization"
                                   value="{{ old('specialization', $therapist->specialization) }}
                                   "
                                   class="block w-full rounded-md border border-[#D9C9C9] bg-[#F9F4EB]
                                          text-[#4A5929] placeholder-[#939C80] shadow-sm
                                          focus:border-[#4A5929] focus:ring-[#4A5929] text-sm">
                            @error('specialization')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Status --}}
                        <div>
                            <label for="status" class="block text-sm font-medium text-[#4A5929] mb-1">
                                Status
                            </label>
                            <select name="status" id="status"
                                    class="block w-full rounded-md border border-[#D9C9C9] bg-[#F9F4EB]
                                           text-[#4A5929] shadow-sm focus:border-[#4A5929] focus:ring-[#4A5929] text-sm">
                                @php
                                    $currentStatus = old('status', $therapist->status ?? 'active');
                                @endphp
                                <option value="active" {{ $currentStatus === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $currentStatus === 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Notes / Bio --}}
                        <div>
                            <label for="notes" class="block text-sm font-medium text-[#4A5929] mb-1">
                                Notes / Bio
                            </label>
                            <textarea name="notes" id="notes" rows="4"
                                      class="block w-full rounded-md border border-[#D9C9C9] bg-[#F9F4EB]
                                             text-[#4A5929] placeholder-[#939C80] shadow-sm
                                             focus:border-[#4A5929] focus:ring-[#4A5929] text-sm">{{ old('notes', $therapist->notes) }}</textarea>
                            @error('notes')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Submit --}}
                        <div class="flex justify-end pt-4 gap-2">
                            <a href="{{ route('therapists.index') }}"
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
                                Update Therapist
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
