<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Management</title>
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
                @endif
            </div>
        </div>
    </nav>

    <main class="container mx-auto py-8">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Welcome to the Property Management System</h1>
        <div class="flex justify-center space-x-4">
            <a href="{{ route('properties.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Properties
            </a>
            <a href="{{ route('users.index') }}" class="bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Users
            </a>
        </div>
    </main>

    <footer class="bg-gray-200 text-gray-600 py-4 text-center mt-8">
        &copy; {{ date('Y') }} Property Management System. All rights reserved.
    </footer>

    <script>
        // Optional: You can add a small script here to handle button clicks, if needed.
        // For example, to prevent default form submission and do something else.
        const logoutButton = document.querySelector('form[action="{{ route('logout') }}"] button[type="submit"]');
        if (logoutButton) {
            logoutButton.addEventListener('click', (event) => {
                //  event.preventDefault();
                //  console.log('Logout button clicked');
                //  Add any custom logout logic here (e.g., confirmation dialog)
                //  Then, submit the form:
                //  event.target.closest('form').submit();
            });
        }
    </script>
</body>
</html>
