@extends('layouts.html')

@section('title', 'Add Session Note')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Add Session Note for [Patient Name]</h1>

    <form action="#" method="POST" class="space-y-6">
        @csrf

        {{-- Session Date --}}
        <div>
            <label for="session_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Session Date</label>
            <input type="date" name="session_date" id="session_date" value="{{ date('Y-m-d') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-900 dark:border-gray-600 dark:text-white sm:text-sm">
        </div>

        {{-- Session Notes --}}
        <div>
            <label for="session_notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Session Notes & Progress</label>
            <textarea name="session_notes" id="session_notes" rows="8" placeholder="Record emotional status, thematic progress, and observations..." class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-900 dark:border-gray-600 dark:text-white sm:text-sm"></textarea>
        </div>

        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Save Note
        </button>
    </form>
@endsection