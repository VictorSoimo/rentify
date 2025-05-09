<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Properties</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Properties</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <div class="mb-4 flex justify-between">
            <a href="{{ route('properties.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Add Property
            </a>
             <a href="{{ route('dashboard') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Dashboard
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-x-auto">
            <table class="min-w-full leading-normal shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">
                            Name
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">
                            Location
                        </th>
                         <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">
                            Caretaker
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">
                            Manager
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">
                            Created At
                        </th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @forelse ($properties as $property)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $property->name }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $property->location }}</p>
                            </td>
                             <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                @if ($property->caretaker)
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $property->caretaker->name }}</p>
                                @else
                                    <p class="text-gray-900 whitespace-no-wrap">N/A</p>
                                @endif
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                 @if ($property->manager)
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $property->manager->name }}</p>
                                @else
                                    <p class="text-gray-900 whitespace-no-wrap">N/A</p>
                                @endif
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $property->created_at->format('Y-m-d H:i:s') }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 text-sm space-x-2">
                                <a href="{{ route('properties.show', $property->id) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-semibold py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                    View
                                </a>
                                <a href="{{ route('properties.edit', $property->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-semibold py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                    Edit
                                </a>
                                <form action="{{ route('properties.destroy', $property->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this property?')" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-5 py-5 border-b border-gray-200 text-sm">
                                <p class="text-gray-900 whitespace-no-wrap text-center">No properties found.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>

    <footer class="bg-gray-200 text-gray-600 py-4 text-center mt-8">
        &copy; {{ date('Y') }} Property Management System. All rights reserved.
    </footer>

    <script>
        // Optional: You can add a script here for any client-side functionality.
        // For example, you might want to use JavaScript to enhance the table sorting or filtering.
    </script>
</body>
</html>
