<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="bg-white p-6 md:p-8 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl md:text-3xl font-bold text-center text-gray-800 mb-6 md:mb-8">Admin Login</h2>
            
            @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-sm">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="email" class="block text-gray-700 font-semibold mb-2 text-sm md:text-base">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                           class="w-full px-4 py-2 md:py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 text-sm md:text-base">
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-gray-700 font-semibold mb-2 text-sm md:text-base">Password</label>
                    <input type="password" id="password" name="password" required
                           class="w-full px-4 py-2 md:py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 text-sm md:text-base">
                </div>

                <div class="mb-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600">
                        <span class="ml-2 text-gray-700 text-sm md:text-base">Remember me</span>
                    </label>
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white px-6 py-2 md:py-3 rounded-lg font-semibold hover:bg-blue-700 transition text-sm md:text-base">
                    Login
                </button>
            </form>

            <div class="mt-6 text-center">
                <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-800 text-sm md:text-base">← Back to Website</a>
            </div>

            <div class="mt-6 md:mt-8 p-4 bg-gray-50 rounded">
                <p class="text-xs md:text-sm text-gray-600 text-center">
                    <strong>Default Login:</strong><br>
                    Email: admin@webtech.test<br>
                    Password: password
                </p>
            </div>
        </div>
    </div>
</body>
</html>