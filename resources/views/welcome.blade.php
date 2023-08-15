<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Página de Posts</title>
     <!-- Fonts -->
     <link rel="preconnect" href="https://fonts.bunny.net">
     <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

     <!-- Scripts -->
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-red-100 font-sans">
    <div class="sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
    
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    <header class="bg-red-500 text-white py-4">
        <div class="container mx-auto">
            <h1 class="text-2xl text-center font-bold">INICIO</h1>
        </div>
    </header>
    <main class="container mx-auto mt-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Ejemplo de entrada de blog -->
            @forelse ($posts as $post)
            <div class="blog-entry p-6 bg-white rounded-lg shadow-md">
                <h2 class="blog-entry-title text-lg font-semibold mb-2"> {{$post->title}} </h2>
                <p class="blog-entry-excerpt text-gray-600 mb-4">Creado por: {{$post->user->name}}</p>
                <a href="{{route('post.show',$post->id)}}" class="blog-entry-link text-red-500 hover:text-blue-700">Leer más</a>
            </div>
            @empty
                <h1>No data</h1>
            @endforelse
        </div>
    </main>

    <footer class="bg-gray-200 py-4 mt-8">
        <div class="container mx-auto text-center">
            <p>&copy; 2023 Todos los derechos reservados</p>
        </div>
    </footer>

</body>
</html>
