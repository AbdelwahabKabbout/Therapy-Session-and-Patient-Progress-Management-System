@extends('layouts.html')

@section('title', 'Log Your Mood')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Daily Mood Log for {{ date('F j, Y') }}</h1>

    <form action="#" method="POST">
        @csrf
        <div class="space-y-6">
            <!-- Mood Rating -->
            <div>
                <label for="mood_rating" class="block text-sm font-medium text-gray-700 dark:text-gray-300">On a scale of 1 to 10, how are you feeling today?</label>
                <input type="range" id="mood_rating" name="mood_rating" min="1" max="10" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700 mt-2" value="5">
                <div class="flex justify-between text-xs text-gray-600 dark:text-gray-400 px-1 mt-1">
                    <span>1 (Low)</span>
                    <span>5</span>
                    <span>10 (High)</span>
                </div>
            </div>

            <!-- Reflections -->
            <div>
                <label for="reflections" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Any reflections or thoughts? (Optional)</label>
                <textarea id="reflections" name="reflections" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white sm:text-sm"></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Save Mood Log
            </button>
        </div>
    </form>
@endsection