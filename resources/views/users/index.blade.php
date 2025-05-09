<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <script src="https://cdn.tailwindcss.com"></script>
     <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-10">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Users</h1>
        <div class="mb-4 flex justify-between">
            <a href="{{ route('users.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add User</a>
            <a href="{{ route('dashboard') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Dashboard
            </a>
        </div>
        <div class="bg-white shadow-md rounded-lg overflow-x-auto">
            <table class="min-w-full leading-normal shadow-md rounded-lg overflow-hidden">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">Name</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">Email</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">Role</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">Created By</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">Created At</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach($users as $user)
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 text-sm"><p class="text-gray-900 whitespace-no-wrap">{{ $user->name }}</p></td>
                        <td class="px-5 py-5 border-b border-gray-200 text-sm"><p class="text-gray-900 whitespace-no-wrap">{{ $user->email }}</p></td>
                        <td class="px-5 py-5 border-b border-gray-200 text-sm"><p class="text-gray-900 whitespace-no-wrap">{{ $user->role }}</p></td>
                         <td class="px-5 py-5 border-b border-gray-200 text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                {{ $user->creator->name ?? 'N/A' }}
                            </p>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 text-sm"><p class="text-gray-900 whitespace-no-wrap">{{ $user->created_at }}</p></td>
                        <td class="px-5 py-5 border-b border-gray-200 text-sm">
                            <a href="{{ route('users.edit', $user->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>