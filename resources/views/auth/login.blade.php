<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-white text-lg font-bold">Books Management</a>
            <div>
                <a href="{{ route('login') }}" class="text-white mr-4">Login</a>
                <a href="{{ route('register') }}" class="text-white">Register</a>
            </div>
        </div>
    </nav>
    <div class="container mx-auto p-6">
        <div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden md:max-w-md">
            <div class="md:flex">
                <div class="w-full p-3">
                    <h1 class="text-3xl font-bold mb-4 text-center">Login</h1>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                            <input type="email" name="email" id="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <div class="text-red-500 text-sm mt-1">{{ $errors->first('email') }}</div>
                            @endif
                        </div>

                        <div class="mb-4 relative">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
                            <div class="relative">
                                <input type="password" name="password" id="password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm pr-10" required>
                                <button type="button" onclick="togglePasswordVisibility()" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <svg id="eyeIcon" class="h-5 w-5 text-gray-500" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                                        <path id="eyeOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path id="eyeClosed" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-.05.162-.11.318-.17.472M21.542 12C20.268 16.057 16.477 19 12 19c-4.477 0-8.268-2.943-9.542-7a8.42 8.42 0 01-.17-.472M9.88 15.1a3.001 3.001 0 003.003-2.9m0 0A3.001 3.001 0 0012 9m0 0a3.001 3.001 0 00-3.002 3.1" />
                                    </svg>
                                </button>
                            </div>
                            @if ($errors->has('password'))
                                <div class="text-red-500 text-sm mt-1">{{ $errors->first('password') }}</div>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label for="role" class="block text-sm font-medium text-gray-700">Role:</label>
                            <select name="role" id="role" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                <option value="">Select Role</option>
                                <option value="0" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="1" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                            </select>
                            @if ($errors->has('role'))
                                <div class="text-red-500 text-sm mt-1">{{ $errors->first('role') }}</div>
                            @endif
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Login</button>
                        </div>
                    </form>
                    <div class="text-center">
                        <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Don't have an account? Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            const eyeOpen = document.getElementById('eyeOpen');
            const eyeClosed = document.getElementById('eyeClosed');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeOpen.style.display = 'none';
                eyeClosed.style.display = 'block';
            } else {
                passwordField.type = 'password';
                eyeOpen.style.display = 'block';
                eyeClosed.style.display = 'none';
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('eyeClosed').style.display = 'none';

            @if ($errors->any())
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    html: '{!! implode('<br>', $errors->all()) !!}',
                });
            @endif

            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{{ session('success') }}',
                });
            @endif
        });
    </script>
</body>
</html>
