<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accounting App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@livewireStyles
@livewireScripts

</head>
<body class="bg-gray-100 min-h-screen font-sans antialiased">

   <!-- Navbar -->
<nav class="bg-white shadow mb-4">
    <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
        <div>
            <a href="/" class="text-xl font-semibold text-gray-700 hover:text-blue-600">
                Oonewoo Accounting
            </a>
        </div>
        <div class="space-x-4">
            <a href="/journal-entry" class="text-gray-600 hover:text-blue-600 font-medium">Journal Entry</a>
            <a href="/trial-balance" class="text-gray-600 hover:text-blue-600 font-medium">Trial Balance</a>
        </div>
    </div>
</nav>


    <!-- Main Content -->
    <main class="max-w-6xl mx-auto px-4">
        {{ $slot }}
    </main>

    @livewireScripts
    @vite('resources/js/app.js')
</body>
</html>
