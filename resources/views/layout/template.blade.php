<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>EduInform</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js for interactions -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
     <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
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
     @yield('css')
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
 @yield('scripts')
</body>
<!-- Footer -->
@include('layout.footer')
</html>
