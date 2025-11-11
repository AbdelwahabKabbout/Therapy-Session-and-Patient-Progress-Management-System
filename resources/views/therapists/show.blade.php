<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between bg-[#F9F4EB] p-4 rounded-lg shadow-sm">
            <div>
                <h2 class="font-semibold text-xl text-[#4A5929] leading-tight">
                    Therapist Profile
                </h2>
                <p class="text-sm text-[#939C80]">
                    Detailed information for this therapist.
                </p>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ route('therapists.index') }}"
                   class="inline-flex items-center px-3 py-2 border border-[#D9C9C9]
                          rounded-md text-xs font-medium text-[#4A5929] bg-[#F9F4EB]
                          hover:bg-[#D9C9C9] transition">
                    Back to List
                </a>

                <a href="{{ route('therapists.edit', $therapist) }}"
                   class="inline-flex items-center px-4 py-2 bg-[#4A5929] border border-transparent
                          rounded-md font-semibold text-xs text-white uppercase tracking-widest
                          hover:bg-[#939C80] focus:outline-none focus:ring-2
                          focus:ring-[#4A5929] focus:ring-offset-2 transition">
                    Edit
                </a>

                <form action="{{ route('therapists.destroy', $therapist) }}" method="POST"
                      onsubmit="return confirm('Delete this therapist? This action cannot be undone.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="inline-flex items-center px-3 py-2 text-xs font-semibold
                                   text-red-600 hover:text-red-800 bg-[#F9F4EB]
                                   border border-[#D9C9C9] rounded-md transition">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-[#F9F4EB] min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#D8D1C3] shadow-lg rounded-lg">
                <div class="p-6 space-y-6">

                    {{-- Header block with name & status --}}
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3
                                bg-[#F9F4EB] p-4 rounded-lg shadow-sm">
                        <div>
                            <h3 class="text-2xl font-semibold text-[#4A5929]">
                                {{ $therapist->name ?? optional($therapist->user)->name ?? 'N/A' }}
                            </h3>
                            <p class="text-sm text-[#939C80]">
                                {{ $therapist->specialization ?? 'Specialization not set' }}
                            </p>
                        </div>

                        <div class="flex flex-col items-start md:items-end gap-1">
                            @php
                                $status = $therapist->status ?? 'active';
                            @endphp
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                                         {{ $status === 'active'
                                            ? 'bg-[#939C80] text-white'
                                            : 'bg-[#D9C9C9] text-[#4A5929]' }}">
                                Status: {{ ucfirst($status) }}
                            </span>
                            <p class="text-xs text-[#939C80]">
                                Created: {{ optional($therapist->created_at)->format('d M Y') ?? '—' }}
                                @if($therapist->updated_at)
                                    · Updated: {{ $therapist->updated_at->format('d M Y') }}
                                @endif
                            </p>
                        </div>
                    </div>

                    {{-- Info grid --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-[#F9F4EB] p-4 rounded-lg border border-[#D9C9C9]">
                            <h4 class="text-sm font-semibold text-[#4A5929] mb-1">
                                Email
                            </h4>
                            <p class="text-sm text-[#939C80]">
                                {{ $therapist->email ?? optional($therapist->user)->email ?? 'Not provided' }}
                            </p>
                        </div>

                        <div class="bg-[#F9F4EB] p-4 rounded-lg border border-[#D9C9C9]">
                            <h4 class="text-sm font-semibold text-[#4A5929] mb-1">
                                Phone
                            </h4>
                            <p class="text-sm text-[#939C80]">
                                {{ $therapist->phone ?? 'Not provided' }}
                            </p>
                        </div>

                        <div class="bg-[#F9F4EB] p-4 rounded-lg border border-[#D9C9C9]">
                            <h4 class="text-sm font-semibold text-[#4A5929] mb-1">
                                Specialization
                            </h4>
                            <p class="text-sm text-[#939C80]">
                                {{ $therapist->specialization ?? 'Not specified' }}
                            </p>
                        </div>

                        <div class="bg-[#F9F4EB] p-4 rounded-lg border border-[#D9C9C9]">
                            <h4 class="text-sm font-semibold text-[#4A5929] mb-1">
                                ID
                            </h4>
                            <p class="text-sm text-[#939C80]">
                                {{ $therapist->id }}
                            </p>
                        </div>
                    </div>

                    {{-- Notes / Bio --}}
                    <div class="bg-[#F9F4EB] p-4 rounded-lg border border-[#D9C9C9]">
                        <h4 class="text-sm font-semibold text-[#4A5929] mb-2">
                            Notes / Bio
                        </h4>
                        <p class="text-sm text-[#939C80] whitespace-pre-line">
                            {{ $therapist->notes ?: 'No additional information provided.' }}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
