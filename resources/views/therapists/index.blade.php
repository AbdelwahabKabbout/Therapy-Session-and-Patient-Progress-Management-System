<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between bg-[#F9F4EB] p-4 rounded-lg shadow-sm">
            <div>
                <h2 class="font-semibold text-xl text-[#4A5929] leading-tight">
                    Therapists Management
                </h2>
                <p class="text-sm text-[#939C80]">
                    View, search and manage all registered therapists.
                </p>
            </div>
            <a href="{{ route('therapists.create') }}"
               class="inline-flex items-center px-4 py-2 bg-[#4A5929] border border-transparent rounded-md
                      font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#939C80]
                      focus:outline-none focus:ring-2 focus:ring-[#4A5929] focus:ring-offset-2 transition">
                + Add Therapist
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-[#F9F4EB] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#D8D1C3] shadow-lg rounded-lg">
                <div class="p-6 space-y-5">

                    {{-- Filters --}}
                    <form method="GET" action="{{ route('therapists.index') }}"
                          class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between bg-[#F9F4EB] p-3 rounded-lg shadow-sm">

                        {{-- Search --}}
                        <div class="flex-1 flex items-center gap-2">
                            <label for="search" class="text-sm font-medium text-[#4A5929]">Search</label>
                            <input type="text" name="search" id="search" value="{{ request('search') }}"
                                   placeholder="Name, email, specialization..."
                                   aria-label="Search therapists"
                                   class="block w-full rounded-md border border-[#D9C9C9] bg-[#F9F4EB]
                                          text-[#4A5929] placeholder-[#939C80] shadow-sm focus:border-[#4A5929]
                                          focus:ring-[#4A5929] text-sm" />
                        </div>

                        {{-- Specialization --}}
                        <div class="flex items-center gap-2">
                            <label for="specialization" class="text-sm font-medium text-[#4A5929]">Specialization</label>
                            <select name="specialization" id="specialization"
                                    class="rounded-md border border-[#D9C9C9] bg-[#F9F4EB] text-[#4A5929]
                                           shadow-sm focus:border-[#4A5929] focus:ring-[#4A5929] text-sm">
                                <option value="">All</option>
                                @if(!empty($specializations))
                                    @foreach($specializations as $spec)
                                        <option value="{{ $spec }}" {{ request('specialization') === $spec ? 'selected' : '' }}>
                                            {{ $spec }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        {{-- Status --}}
                        <div class="flex items-center gap-2">
                            <label for="status" class="text-sm font-medium text-[#4A5929]">Status</label>
                            <select name="status" id="status"
                                    class="rounded-md border border-[#D9C9C9] bg-[#F9F4EB] text-[#4A5929]
                                           shadow-sm focus:border-[#4A5929] focus:ring-[#4A5929] text-sm">
                                <option value="">All</option>
                                <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        {{-- Buttons --}}
                        <div class="flex items-center gap-2">
                            <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-[#4A5929] text-white text-xs
                                           font-semibold uppercase rounded-md hover:bg-[#939C80]
                                           focus:ring-2 focus:ring-[#4A5929] focus:ring-offset-2 transition">
                                Apply
                            </button>

                            @if(request()->anyFilled(['search','specialization','status']))
                                <a href="{{ route('therapists.index') }}"
                                   class="inline-flex items-center px-3 py-2 border border-[#D9C9C9]
                                          rounded-md text-xs font-medium text-[#4A5929] bg-[#F9F4EB]
                                          hover:bg-[#D9C9C9] transition">
                                    Reset
                                </a>
                            @endif
                        </div>
                    </form>

                    {{-- Table --}}
                    <div class="overflow-x-auto border border-[#D9C9C9] rounded-md bg-[#F9F4EB]">
                        <table class="min-w-full divide-y divide-[#D8D1C3] text-sm">
                            <thead class="bg-[#D9C9C9] text-[#4A5929]">
                                <tr>
                                    <th class="px-4 py-3 text-left font-semibold uppercase text-xs">#</th>
                                    <th class="px-4 py-3 text-left font-semibold uppercase text-xs">Name</th>
                                    <th class="px-4 py-3 text-left font-semibold uppercase text-xs">Email</th>
                                    <th class="px-4 py-3 text-left font-semibold uppercase text-xs">Specialization</th>
                                    <th class="px-4 py-3 text-left font-semibold uppercase text-xs">Phone</th>
                                    <th class="px-4 py-3 text-left font-semibold uppercase text-xs">Status</th>
                                    <th class="px-4 py-3 text-left font-semibold uppercase text-xs">Created At</th>
                                    <th class="px-4 py-3 text-right font-semibold uppercase text-xs">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-[#F9F4EB] divide-y divide-[#D8D1C3]">
                                @forelse($therapists as $therapist)
                                    <tr class="hover:bg-[#D8D1C3]/40">
                                        <td class="px-4 py-3 text-[#4A5929]">
                                            {{ $loop->iteration + ($therapists->firstItem() - 1) }}
                                        </td>
                                        <td class="px-4 py-3 font-medium text-[#4A5929]">
                                            {{ $therapist->name ?? ($therapist->user->name ?? 'N/A') }}
                                        </td>
                                        <td class="px-4 py-3 text-[#939C80]">
                                            {{ $therapist->email ?? ($therapist->user->email ?? 'N/A') }}
                                        </td>
                                        <td class="px-4 py-3 text-[#4A5929]">{{ $therapist->specialization ?? '—' }}</td>
                                        <td class="px-4 py-3 text-[#4A5929]">{{ $therapist->phone ?? '—' }}</td>
                                        <td class="px-4 py-3">
                                            @php $status = $therapist->status ?? 'active'; @endphp
                                            <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold
                                                {{ $status === 'active'
                                                    ? 'bg-[#939C80] text-white'
                                                    : 'bg-[#D9C9C9] text-[#4A5929]' }}">
                                                {{ ucfirst($status) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-[#939C80]">
                                            {{ optional($therapist->created_at)->format('d M Y') ?? '—' }}
                                        </td>
                                        <td class="px-4 py-3 text-right space-x-2">
                                            <a href="{{ route('therapists.show', $therapist) }}"
                                               class="text-[#4A5929] hover:text-[#939C80] text-xs font-medium">View</a>
                                            <a href="{{ route('therapists.edit', $therapist) }}"
                                               class="text-[#939C80] hover:text-[#4A5929] text-xs font-medium">Edit</a>
                                            <form action="{{ route('therapists.destroy', $therapist) }}" method="POST"
                                                  class="inline-block"
                                                  onsubmit="return confirm('Delete this therapist?');">
                                                @csrf @method('DELETE')
                                                <button type="submit"
                                                        class="text-red-600 hover:text-red-800 text-xs font-medium">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="px-4 py-6 text-center text-[#939C80]">
                                            No therapists found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    @if(method_exists($therapists, 'links'))
                        <div class="pt-3 text-center">
                            {{ $therapists->withQueryString()->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
