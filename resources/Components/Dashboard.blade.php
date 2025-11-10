@extends('layouts.html')

@section('title', 'Patient Dashboard')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Welcome, {{ auth()->user()->name ?? 'Patient' }}!</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Current Therapy Plan -->
        <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold mb-4">Your Therapy Plan</h2>
            <p class="text-gray-600 dark:text-gray-300 mb-4">Here are the exercises and goals assigned by your therapist.</p>
            <ul class="list-disc list-inside text-gray-700 dark:text-gray-200">
                <li>Journaling Task: Write about your week.</li>
                <li>Breathing Routine: 5 minutes, twice a day.</li>
                <li>Mindfulness Activity: Observe your thoughts without judgment.</li>
            </ul>
            <a href="#" class="mt-4 inline-block text-indigo-600 dark:text-indigo-400 hover:underline">View All Exercises</a>
        </div>

        <!-- Daily Mood Log -->
        <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg shadow">
            <h2 class="text-xl font-semibold mb-4">How are you feeling today?</h2>
            <p class="text-gray-600 dark:text-gray-300 mb-4">Logging your mood helps you and your therapist track your progress.</p>
            <a href="{{-- route('patient.mood-log.create') --}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Log Your Mood
            </a>
        </div>
    </div>
@endsection