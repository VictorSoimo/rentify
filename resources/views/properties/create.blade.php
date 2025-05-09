<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Property</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-md py-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="font-semibold text-xl text-gray-800">Property Management</div>
            <div>
                @if(auth()->check())
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-700 font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Register
                    </a>
                @endif
            </div>
        </div>
    </nav>

    <main class="container mx-auto py-8">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Add Property</h1>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('properties.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('name')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Location:</label>
                    <input type="text" id="location" name="location" value="{{ old('location') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('location')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="caretaker_id" class="block text-gray-700 text-sm font-bold mb-2">Caretaker:</label>
                    <select id="caretaker_id" name="caretaker_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">Select Caretaker</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('caretaker_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('caretaker_id')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="manager_id" class="block text-gray-700 text-sm font-bold mb-2">Manager:</label>
                    <select id="manager_id" name="manager_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">Select Manager</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('manager_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('manager_id')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Add Property
                </button>
                <a href="{{ route('properties.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Cancel
                </a>
            </form>
        </div>
    </main>

    <footer class="bg-gray-200 text-gray-600 py-4 text-center mt-8">
        &copy; {{ date('Y') }} Property Management System. All rights reserved.
    </footer>

    <script>
        // Optional: You can add a script here for any client-side functionality.
        // For example, you might want to use JavaScript to enhance the form validation.
    </script>
</body>
</html>