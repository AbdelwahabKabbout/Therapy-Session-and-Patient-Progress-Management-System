@extends('layouts.html')

@section('title', 'My Therapy Plan')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">My Current Therapy Plan</h1>

    <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold">Mindfulness & Grounding</h2>
        <p class="text-gray-600 dark:text-gray-300 mt-1 mb-4">
            The goal of this plan is to help you stay present and manage moments of anxiety.
        </p>

        <div class="space-y-4">
            <h3 class="text-lg font-semibold border-t border-gray-200 dark:border-gray-600 pt-4">Assigned Exercises:</h3>
            {{-- Example Exercise --}}
            <div class="bg-white dark:bg-gray-800 p-4 rounded-md shadow-sm">
                <h4 class="font-bold">Journaling Task: Thought Record</h4>
                <p class="text-sm text-gray-700 dark:text-gray-300 mt-1">Use the provided template to log and challenge automatic negative thoughts each day.</p>
            </div>
            {{-- Example Exercise 2 --}}
            <div class="bg-white dark:bg-gray-800 p-4 rounded-md shadow-sm">
                <h4 class="font-bold">Breathing Routine: 4-7-8 Technique</h4>
                <p class="text-sm text-gray-700 dark:text-gray-300 mt-1">Practice this for 5 minutes every morning and evening to promote relaxation.</p>
            </div>
            {{-- Loop through assigned exercises here --}}
        </div>
    </div>
@endsection