<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js for interactions -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        theme: {
                            DEFAULT: '#57B4BA',
                            light: '#D7EEF0',
                            dark: '#3E979D',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        [x-cloak] { display: none !important; }
        .bg-theme { background-color: #57B4BA; }
        .text-theme { color: #57B4BA; }
        .border-theme { border-color: #57B4BA; }
        .hover\:bg-theme-dark:hover { background-color: #3E979D; }
    </style>
</head>
<body class="bg-gray-100">
    <div x-data="{ sidebarOpen: false }" class="min-h-screen flex flex-col">
        <!-- Top Navigation -->
        @include('layout.navbar')

        <div class="flex flex-1">
            <!-- Sidebar -->
            @include('layout.sidebar')

                    <!-- Main content -->
                        <!-- Main content -->
    <div class="flex-1 overflow-auto">
        <main class="py-6 px-4">


            @yield('main')

        </main>
    </div>

</div>


</div>
</body>
<!-- Footer -->
@include('layout.footer')
</html>
