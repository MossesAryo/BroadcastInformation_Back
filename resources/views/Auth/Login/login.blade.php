<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Eduinform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.3/cdn.min.js" defer></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
        }

        .bg-custom {
            background-color: #57B4BA;
        }

        .text-custom {
            color: #57B4BA;
        }

        .border-custom {
            border-color: #57B4BA;
        }

        .bg-custom-gradient {
            background: linear-gradient(135deg, #57B4BA 0%, #4A9FA5 100%);
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen">
    <div class="flex min-h-screen">
        <!-- Left Panel - Login Form -->
        <div class="flex-1 flex items-center justify-center px-8 py-12 bg-white">
            <div class="w-full max-w-md" x-data="loginForm()">
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Welcome</h1>
                </div>

                @if ($errors->any())
                    <div class="mb-4">
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">Terjadi kesalahan!</strong>
                            <ul class="mt-2 text-sm list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif


                <!-- Email/Password Form -->
                <form class="space-y-6" method="post" action="{{ route('login.submit') }}">
                    @csrf
                    @method('POST')
                    <div>
                        <label for="NIP" class="block text-sm font-medium text-gray-700 mb-2">NIP/NIS</label>
                        <input type="text" id="NIP" placeholder="Masukan NIP/NIS" name="login"
                            class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-custom focus:border-custom transition-colors duration-200"
                            required>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <div class="relative">
                            <input :type="showPassword ? 'text' : 'password'" id="password" x-model="password"
                                placeholder="johndoe123" name='password'
                                class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-custom focus:border-custom transition-colors duration-200"
                                required>
                            <button type="button" @click="showPassword = !showPassword"
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700">
                                <svg x-show="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path>
                                </svg>
                                <svg x-show="showPassword" class="w-5 h-5" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" id="remember" x-model="rememberMe"
                                class="w-4 h-4 text-custom bg-white border-gray-300 rounded focus:ring-custom focus:ring-2">
                            <label for="remember" class="ml-2 text-sm text-gray-700">Remember me</label>
                        </div>
                    </div>

                    <button type="submit" :disabled="loading"
                        class="w-full bg-custom hover:bg-opacity-90 disabled:bg-opacity-60 disabled:cursor-not-allowed text-white py-3 px-4 rounded-lg font-medium transition-colors duration-200 flex items-center justify-center">
                        <span x-show="!loading">Sign in</span>
                        <span x-show="loading" class="flex items-center space-x-2">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            <span>Signing in...</span>
                        </span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Right Panel - Marketing Content -->
        <div class="flex-1 bg-custom-gradient flex items-center justify-center px-8 py-12 relative overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-0 left-0 w-full h-full"
                    style="background-image: radial-gradient(circle at 25% 25%, white 2px, transparent 2px); background-size: 50px 50px;">
                </div>
            </div>

            <div class="relative z-10 max-w-lg text-center text-white">
                <!-- Logo -->
                <div class="mb-8">
                    <div class="inline-flex items-center space-x-2 mb-6">
                        <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                            <div class="w-4 h-4 bg-custom rounded"></div>
                        </div>
                        <span class="text-2xl font-bold">EduInform</span>
                    </div>
                </div>

                <h2 class="text-4xl font-bold mb-6 leading-tight">
                    Ruang Informasi Sekolah
                </h2>

                <p class="text-xl text-white opacity-90 mb-8 leading-relaxed">
                    Millions of designers and agencies around the world showcase their portfolio work on Flowbite - the
                    home to the world's best design and creative professionals.
                </p>

                <!-- Customer Avatars -->
                <div class="flex items-center justify-center space-x-4">
                    <div class="flex -space-x-2">
                        <img class="w-10 h-10 rounded-full border-2 border-white"
                            src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=100&h=100&fit=crop&crop=face"
                            alt="Customer 1">
                        <img class="w-10 h-10 rounded-full border-2 border-white"
                            src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop&crop=face"
                            alt="Customer 2">
                        <img class="w-10 h-10 rounded-full border-2 border-white"
                            src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100&h=100&fit=crop&crop=face"
                            alt="Customer 3">
                        <img class="w-10 h-10 rounded-full border-2 border-white"
                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100&h=100&fit=crop&crop=face"
                            alt="Customer 4">
                    </div>
                    <div class="text-left">
                        <div class="text-lg font-semibold">Over 15.7k Happy Customers</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function loginForm() {
            return {
                email: '',
                password: '',
                rememberMe: false,
                showPassword: false,
                loading: false,
            }
        }
    </script>
</body>

</html>
