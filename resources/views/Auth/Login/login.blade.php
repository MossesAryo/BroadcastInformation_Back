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

        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }

        .floating-animation:nth-child(2) {
            animation-delay: -2s;
        }

        .floating-animation:nth-child(3) {
            animation-delay: -4s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(5deg);
            }
        }

        .pulse-slow {
            animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        .input-focus {
            transition: all 0.3s ease;
        }

        .input-focus:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(87, 180, 186, 0.2);
        }

        .btn-hover {
            transition: all 0.3s ease;
        }

        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(87, 180, 186, 0.4);
        }

        .logo-img {
            object-fit: contain;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen">
    <div class="flex min-h-screen">
        <!-- Left Panel - Login Form -->
        <div class="flex-1 flex items-center justify-center px-8 py-8 bg-white relative">
            <!-- Subtle background decoration -->
            <div class="absolute top-0 left-0 w-full h-full opacity-5 overflow-hidden">
                <div class="absolute -top-20 -left-20 w-40 h-40 bg-custom rounded-full floating-animation"></div>
                <div class="absolute top-1/2 -right-10 w-24 h-24 bg-custom rounded-full floating-animation"></div>
                <div class="absolute bottom-10 left-1/4 w-32 h-32 bg-custom rounded-full floating-animation"></div>
            </div>

            <div class="w-full max-w-md relative z-10" x-data="loginForm()">
                <div class="mb-6 text-center">
                    <div class="flex flex-col items-center mb-4">
                        <img src="{{ asset('storage/logo.png') }}" alt="EduInform Logo"
                            class="logo-img mb-4 mr-5 w-50 h-50 object-contain">

                    </div>
                    <h1 class="text-2xl font-bold text-gray-900 mb-1">Welcome Back</h1>
                    <p class="text-gray-600 text-sm">Sign in to access your account</p>
                </div>

                @if ($errors->any())
                    <div class="mb-6">
                        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl relative shadow-sm"
                            role="alert">
                            <strong class="font-semibold">Terjadi kesalahan!</strong>
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
                        <label for="NIP" class="block text-sm font-semibold text-gray-700 mb-2">NIP / NIS</label>
                        <input type="text" id="NIP" placeholder="Masukan NIP/NIS" name="login"
                            class="w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-custom focus:border-custom input-focus transition-all duration-300"
                            required>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                        <div class="relative">
                            <input :type="showPassword ? 'text' : 'password'" id="password" x-model="password"
                                placeholder="Enter your password" name='password'
                                class="w-full px-4 py-3 pr-12 bg-white border-2 border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-custom focus:border-custom input-focus transition-all duration-300"
                                required>
                            <button type="button" @click="showPassword = !showPassword"
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-custom transition-colors duration-200 p-1">
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
                            <label for="remember" class="ml-2 text-sm text-gray-600">Remember me</label>
                        </div>
                    </div>

                    <button type="submit" :disabled="loading"
                        class="w-full bg-custom hover:bg-opacity-90 disabled:bg-opacity-60 disabled:cursor-not-allowed text-white py-3 px-4 rounded-xl font-semibold transition-all duration-300 flex items-center justify-center btn-hover shadow-lg">
                        <span x-show="!loading">Sign In</span>
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
        <div class="flex-1 bg-custom-gradient flex items-center justify-center px-8 py-8 relative overflow-hidden">
            <!-- Enhanced Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-0 left-0 w-full h-full"
                    style="background-image: radial-gradient(circle at 25% 25%, white 2px, transparent 2px); background-size: 60px 60px;">
                </div>
                <div class="absolute bottom-0 right-0 w-full h-full"
                    style="background-image: radial-gradient(circle at 75% 75%, white 1px, transparent 1px); background-size: 40px 40px;">
                </div>
            </div>

            <!-- Floating elements -->
            <div class="absolute top-20 left-20 w-4 h-4 bg-white bg-opacity-20 rounded-full floating-animation"></div>
            <div class="absolute top-1/3 right-16 w-6 h-6 bg-white bg-opacity-15 rounded-full floating-animation"></div>
            <div class="absolute bottom-32 left-1/3 w-3 h-3 bg-white bg-opacity-25 rounded-full floating-animation">
            </div>

            <div class="relative z-10 max-w-lg text-center text-white">
                <!-- Logo -->
                <div class="mb-6">
                    <div class="flex flex-col items-center mb-4">
                       
                        <span class="text-4xl font-bold">EduInform</span>
                    </div>
                </div>

                <h2 class="text-3xl font-bold mb-4 leading-tight">
                    Ruang Informasi Sekolah 
                </h2>

                <p class="text-lg text-white text-opacity-90 mb-6 leading-relaxed">
                    Platform terintegrasi untuk mengelola informasi sekolah dengan mudah, efisien, dan profesional dalam
                    satu sistem terpadu.
                </p>

                <div class="flex justify-center space-x-4 text-white text-opacity-80">
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 bg-white rounded-full"></div>
                        <span class="text-sm">Secure</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 bg-white rounded-full"></div>
                        <span class="text-sm">Fast</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-2 h-2 bg-white rounded-full"></div>
                        <span class="text-sm">Reliable</span>
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
