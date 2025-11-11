<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Therapy Progress Management')</title>

    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body { font-family: 'Nunito', sans-serif; }
        :root {
            --cream: #F9F4EB;
            --beige: #D8D1C3;
            --mauve: #D9C9C9;
            --sage: #939C80;
            --olive: #4A5929;
        }
    </style>
</head>

<body class="antialiased bg-[color:var(--cream)] text-[color:var(--olive)]">
    {{-- NAVBAR --}}
    <nav class="bg-[color:var(--beige)] shadow-md">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="/" class="flex-shrink-0 text-[color:var(--olive)] font-bold text-xl">
                        TherapyPlus
                    </a>
                </div>

                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        @auth
                            <a href="{{ url('/home') }}"
                               class="text-[color:var(--olive)] hover:text-[color:var(--sage)] px-3 py-2 rounded-md text-sm font-medium">
                               Home
                            </a>

                            @if (auth()->user()->role == 'therapist')
                                <a href="#"
                                   class="text-[color:var(--olive)] hover:text-[color:var(--sage)] px-3 py-2 rounded-md text-sm font-medium">
                                   Patients
                                </a>
                                <a href="#"
                                   class="text-[color:var(--olive)] hover:text-[color:var(--sage)] px-3 py-2 rounded-md text-sm font-medium">
                                   Session Plans
                                </a>
                                <a href="#"
                                   class="text-[color:var(--olive)] hover:text-[color:var(--sage)] px-3 py-2 rounded-md text-sm font-medium">
                                   Exercises
                                </a>
                            @elseif (auth()->user()->role == 'patient')
                                <a href="#"
                                   class="text-[color:var(--olive)] hover:text-[color:var(--sage)] px-3 py-2 rounded-md text-sm font-medium">
                                   My Plan
                                </a>
                                <a href="#"
                                   class="text-[color:var(--olive)] hover:text-[color:var(--sage)] px-3 py-2 rounded-md text-sm font-medium">
                                   Mood Log
                                </a>
                                <a href="#"
                                   class="text-[color:var(--olive)] hover:text-[color:var(--sage)] px-3 py-2 rounded-md text-sm font-medium">
                                   My Progress
                                </a>
                            @endif

                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); this.closest('form').submit();"
                                   class="text-[color:var(--olive)] hover:text-[color:var(--sage)] px-3 py-2 rounded-md text-sm font-medium">
                                   Log Out
                                </a>
                            </form>
                        @else
                            <a href="{{ route('login') }}"
                               class="text-[color:var(--olive)] hover:text-[color:var(--sage)] px-3 py-2 rounded-md text-sm font-medium">
                               Log in
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                   class="text-[color:var(--olive)] hover:text-[color:var(--sage)] px-3 py-2 rounded-md text-sm font-medium">
                                   Register
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>

    {{-- MAIN CONTENT --}}
    <main class="py-10">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[color:var(--beige)] overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-[color:var(--olive)]">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>

    {{-- FOOTER --}}
    <footer class="mt-8 bg-[color:var(--beige)] py-4 border-t border-[color:var(--mauve)]">
        <div class="max-w-6xl mx-auto flex flex-col sm:flex-row justify-between items-center px-4 text-sm text-[color:var(--sage)]">
            <div class="mb-2 sm:mb-0 text-center sm:text-left">
                &copy; {{ date('Y') }} Therapy Progress Management System. All rights reserved.
            </div>
            <div class="text-center sm:text-right">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>