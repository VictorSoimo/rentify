<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Rental Dashboard') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <a href="{{ url('/') }}" class="text-xl font-bold text-blue-600">
                        RentalApp
                    </a>
                    <div class="ml-10 space-x-4">
                        <a href="{{ route('users.index') }}" class="text-gray-700 hover:text-blue-500">Users</a>
                        <a href="{{ route('properties.index') }}" class="text-gray-700 hover:text-blue-500">Properties</a>
                        <a href="#" class="text-gray-700 hover:text-blue-500">Reports</a>
                    </div>
                </div>
                <div>
                    @auth
                        <span class="mr-4 text-sm text-gray-600">Hi, {{ Auth::user()->name }}</span>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button class="text-sm text-red-600 hover:underline">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <main class="flex-grow py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow mt-auto">
        <div class="max-w-7xl mx-auto py-4 px-4 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} RentalApp. All rights reserved.
        </div>
    </footer>

</body>
</html>
