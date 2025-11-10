@extends('layouts.html')

@section('title', 'Exercise Library')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Exercise Library</h1>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        {{-- List of Exercises --}}
        <div class="md:col-span-2">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-4">Available Exercises</h2>
                <ul class="space-y-3">
                    {{-- Example Exercise --}}
                    <li class="p-3 bg-gray-50 dark:bg-gray-700 rounded-md">
                        <p class="font-bold">Journaling Task: Thought Record</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">A cognitive-behavioral therapy technique to identify and challenge negative automatic thoughts.</p>
                    </li>
                    {{-- Example Exercise 2 --}}
                    <li class="p-3 bg-gray-50 dark:bg-gray-700 rounded-md">
                        <p class="font-bold">Breathing Routine: 4-7-8 Technique</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">A calming breathing pattern to reduce anxiety and promote relaxation.</p>
                    </li>
                    {{-- Loop through exercises here --}}
                </ul>
            </div>
        </div>

        {{-- Add New Exercise Form --}}
        <div>
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-4">Add New Exercise</h2>
                <form action="#" method="POST" class="space-y-4">
                    @csrf
                    <input type="text" name="title" placeholder="Exercise Title" required class="block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-900 dark:border-gray-600 dark:text-white sm:text-sm">
                    <textarea name="description" rows="4" placeholder="Description of the exercise..." required class="block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-900 dark:border-gray-600 dark:text-white sm:text-sm"></textarea>
                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add to Library
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection