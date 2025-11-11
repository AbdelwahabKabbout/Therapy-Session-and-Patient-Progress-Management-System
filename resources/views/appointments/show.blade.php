<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between bg-[#F9F4EB] p-4 rounded-lg shadow-sm">
            <div>
                <h2 class="font-semibold text-xl text-[#4A5929] leading-tight">
                    Appointment Details
                </h2>
                <p class="text-sm text-[#939C80]">
                    Viewing appointment for {{ optional($appointment->patient)->name ?? 'N/A' }}.
                </p>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ route('appointments.index') }}"
                   class="inline-flex items-center px-3 py-2 border border-[#D9C9C9]
                          rounded-md text-xs font-medium text-[#4A5929] bg-[#F9F4EB]
                          hover:bg-[#D9C9C9] transition">
                    Back to List
                </a>

                <a href="{{ route('appointments.edit', $appointment->id) }}"
                   class="inline-flex items-center px-4 py-2 bg-[#4A5929] border border-transparent
                          rounded-md font-semibold text-xs text-white uppercase tracking-widest
                          hover:bg-[#939C80] focus:outline-none focus:ring-2
                          focus:ring-[#4A5929] focus:ring-offset-2 transition">
                    Edit
                </a>

                <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this appointment?');">
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

                    {{-- Header block with date & status --}}
                    <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-3
                                bg-[#F9F4EB] p-4 rounded-lg shadow-sm">
                        <div>
                            <h3 class="text-2xl font-semibold text-[#4A5929]">
                                {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('l, F j, Y') }}
                            </h3>
                            <p class="text-lg text-[#939C80]">
                                {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('h:i A') }}
                                ({{ $appointment->duration_minutes }} min)
                            </p>
                        </div>

                        <div class="flex flex-col items-start md:items-end gap-1">
                            @php $status = $appointment->status ?? 'scheduled'; @endphp
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold
                                         @if($status === 'completed') bg-[#939C80] text-white
                                         @elseif($status === 'cancelled') bg-red-200 text-red-800
                                         @else bg-[#D9C9C9] text-[#4A5929] @endif">
                                {{ ucfirst(str_replace('_', ' ', $status)) }}
                            </span>
                            <p class="text-xs text-[#939C80]">
                                Created: {{ optional($appointment->created_at)->format('d M Y') }}
                            </p>
                        </div>
                    </div>

                    {{-- Info grid --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-[#F9F4EB] p-4 rounded-lg border border-[#D9C9C9]">
                            <h4 class="text-sm font-semibold text-[#4A5929] mb-1">Patient</h4>
                            <p class="text-sm text-[#939C80]">
                                {{ optional($appointment->patient)->name ?? 'N/A' }}
                            </p>
                        </div>

                        <div class="bg-[#F9F4EB] p-4 rounded-lg border border-[#D9C9C9]">
                            <h4 class="text-sm font-semibold text-[#4A5929] mb-1">Therapist</h4>
                            <p class="text-sm text-[#939C80]">
                                {{ optional($appointment->therapist)->name ?? 'N/A' }}
                            </p>
                        </div>

                        <div class="bg-[#F9F4EB] p-4 rounded-lg border border-[#D9C9C9] col-span-1 md:col-span-2">
                            <h4 class="text-sm font-semibold text-[#4A5929] mb-1">Meeting Link</h4>
                            @if($appointment->meeting_link)
                                <a href="{{ $appointment->meeting_link }}" target="_blank" class="text-sm text-blue-600 hover:underline break-all">
                                    {{ $appointment->meeting_link }}
                                </a>
                            @else
                                <p class="text-sm text-[#939C80]">Not provided</p>
                            @endif
                        </div>
                    </div>

                    {{-- Notes --}}
                    <div class="bg-[#F9F4EB] p-4 rounded-lg border border-[#D9C9C9]">
                        <h4 class="text-sm font-semibold text-[#4A5929] mb-2">
                            Session Notes
                        </h4>
                        <div class="text-sm text-[#939C80] whitespace-pre-line prose max-w-none">
                            {!! $appointment->notes ? nl2br(e($appointment->notes)) : '<p>No notes for this session.</p>' !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>