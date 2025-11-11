<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between bg-[#F9F4EB] p-4 rounded-lg shadow-sm">
            <div>
                <h2 class="font-semibold text-xl text-[#4A5929] leading-tight">
                    Appointments
                </h2>
                <p class="text-sm text-[#939C80]">
                    View all upcoming and past therapy sessions.
                </p>
            </div>

            <a href="{{ route('appointments.create') ?? '#' }}"
               class="inline-flex items-center px-4 py-2 bg-[#4A5929] border border-transparent rounded-md
                      font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#939C80]
                      focus:outline-none focus:ring-2 focus:ring-[#4A5929] focus:ring-offset-2 transition">
                + New Appointment
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-[#F9F4EB] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Toggle --}}
            <div class="bg-[#D8D1C3] shadow-lg rounded-lg p-4 flex items-center justify-between">
                <h3 class="text-lg font-semibold text-[#4A5929]">Appointments Overview</h3>
                <div class="flex gap-2">
                    <button id="calendarViewBtn"
                            class="px-3 py-1.5 text-xs font-semibold rounded-md
                                   bg-[#4A5929] text-white uppercase tracking-widest hover:bg-[#939C80] transition">
                        Calendar View
                    </button>
                    <button id="tableViewBtn"
                            class="px-3 py-1.5 text-xs font-semibold rounded-md
                                   bg-[#F9F4EB] text-[#4A5929] border border-[#D9C9C9]
                                   uppercase tracking-widest hover:bg-[#D9C9C9] transition">
                        Table View
                    </button>
                </div>
            </div>

            {{-- CALENDAR VIEW --}}
            <div id="calendarView" class="bg-[#D8D1C3] shadow-lg rounded-lg p-4 space-y-4">
                <h3 class="text-xl font-semibold text-[#4A5929] mb-2">Calendar</h3>
                <p class="text-sm text-[#939C80] mb-3">
                    This section can display a simple monthly grid or integrate a JavaScript calendar (e.g. FullCalendar).
                </p>

                {{-- Example Static Calendar (Replace with JS plugin if needed) --}}
                <div class="grid grid-cols-7 gap-2 text-xs text-center font-semibold text-[#4A5929]">
                    <div>Sun</div><div>Mon</div><div>Tue</div><div>Wed</div><div>Thu</div><div>Fri</div><div>Sat</div>
                </div>

                <div class="grid grid-cols-7 gap-2 text-xs">
                    @for ($day = 1; $day <= 30; $day++)
                        <div class="min-h-[88px] flex flex-col justify-start rounded-md border border-[#D9C9C9]
                                    bg-[#F9F4EB] p-1.5 hover:bg-[#D8D1C3]/40 transition">
                            <span class="text-[10px] font-semibold text-[#4A5929] mb-1">{{ $day }}</span>

                            {{-- Example placeholder: show appointments matching this day --}}
                            @foreach ($appointments as $appointment)
                                @php
                                    $dayOfAppointment = date('j', strtotime($appointment->date ?? $appointment->appointment_date ?? ''));
                                @endphp
                                @if ($dayOfAppointment == $day)
                                    <div class="px-1 py-0.5 rounded text-[9px] bg-[#D9C9C9] text-[#4A5929] truncate">
                                        {{ date('H:i', strtotime($appointment->time ?? $appointment->start_time ?? '')) }}
                                        —
                                        {{ $appointment->patient->name ?? $appointment->patient_name ?? 'Patient' }}
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endfor
                </div>
            </div>

            {{-- TABLE VIEW --}}
            <div id="tableView" class="bg-[#D8D1C3] shadow-lg rounded-lg p-4 hidden">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-lg font-semibold text-[#4A5929]">
                        Appointments List
                    </h3>
                </div>

                <div class="overflow-x-auto border border-[#D9C9C9] rounded-md bg-[#F9F4EB]">
                    <table class="min-w-full divide-y divide-[#D8D1C3] text-sm">
                        <thead class="bg-[#D9C9C9] text-[#4A5929] text-xs uppercase">
                            <tr>
                                <th class="px-4 py-3 text-left font-semibold">Date</th>
                                <th class="px-4 py-3 text-left font-semibold">Time</th>
                                <th class="px-4 py-3 text-left font-semibold">Patient</th>
                                <th class="px-4 py-3 text-left font-semibold">Therapist</th>
                                <th class="px-4 py-3 text-left font-semibold">Status</th>
                                <th class="px-4 py-3 text-right font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-[#F9F4EB] divide-y divide-[#D8D1C3]">
                            @forelse ($appointments as $appointment)
                                <tr class="hover:bg-[#D8D1C3]/40">
                                    <td class="px-4 py-3 text-[#4A5929]">
                                        {{ date('d M Y', strtotime($appointment->date ?? $appointment->appointment_date ?? '')) }}
                                    </td>
                                    <td class="px-4 py-3 text-[#939C80]">
                                        {{ date('H:i', strtotime($appointment->time ?? $appointment->start_time ?? '')) }}
                                    </td>
                                    <td class="px-4 py-3 text-[#4A5929]">
                                        {{ $appointment->patient->name ?? $appointment->patient_name ?? 'N/A' }}
                                    </td>
                                    <td class="px-4 py-3 text-[#4A5929]">
                                        {{ $appointment->therapist->name ?? $appointment->therapist_name ?? 'N/A' }}
                                    </td>
                                    <td class="px-4 py-3">
                                        @php $status = $appointment->status ?? 'scheduled'; @endphp
                                        <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold
                                            @if($status === 'completed')
                                                bg-[#939C80] text-white
                                            @elseif($status === 'cancelled')
                                                bg-red-100 text-red-700
                                            @else
                                                bg-[#D9C9C9] text-[#4A5929]
                                            @endif">
                                            {{ ucfirst($status) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-right space-x-2">
                                        <a href="{{ route('appointments.show', $appointment) ?? '#' }}"
                                           class="text-[#4A5929] hover:text-[#939C80] text-xs font-medium">
                                            View
                                        </a>
                                        <a href="{{ route('appointments.edit', $appointment) ?? '#' }}"
                                           class="text-[#939C80] hover:text-[#4A5929] text-xs font-medium">
                                            Edit
                                        </a>
                                        <form action="{{ route('appointments.destroy', $appointment) ?? '#' }}"
                                              method="POST"
                                              class="inline-block"
                                              onsubmit="return confirm('Cancel/delete this appointment?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="text-red-600 hover:text-red-800 text-xs font-medium">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-6 text-center text-[#939C80]">
                                        No appointments found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                @if (method_exists($appointments, 'links'))
                    <div class="pt-3 text-center">
                        {{ $appointments->withQueryString()->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Toggle --}}
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const calendarViewBtn = document.getElementById('calendarViewBtn');
                const tableViewBtn = document.getElementById('tableViewBtn');
                const calendarView = document.getElementById('calendarView');
                const tableView = document.getElementById('tableView');

                function switchView(view) {
                    if (view === 'calendar') {
                        calendarView.classList.remove('hidden');
                        tableView.classList.add('hidden');
                        calendarViewBtn.classList.add('bg-[#4A5929]', 'text-white');
                        tableViewBtn.classList.remove('bg-[#4A5929]', 'text-white');
                    } else {
                        tableView.classList.remove('hidden');
                        calendarView.classList.add('hidden');
                        tableViewBtn.classList.add('bg-[#4A5929]', 'text-white');
                        calendarViewBtn.classList.remove('bg-[#4A5929]', 'text-white');
                    }
                }

                calendarViewBtn.addEventListener('click', () => switchView('calendar'));
                tableViewBtn.addEventListener('click', () => switchView('table'));
            });
        </script>
    @endpush
</x-app-layout>
