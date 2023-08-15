<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>