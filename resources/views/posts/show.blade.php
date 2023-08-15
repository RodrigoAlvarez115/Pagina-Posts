<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('posts._partials.back')
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-6 bg-red-500 text-gray-900 dark:text-gray-100">
                        <h1 class="text-4xl text-center"> {{$post->title}} </h1>
                    </div>
                    
                    <div class="p-6 m-5 text-gray-900 text-center dark:text-gray-100">
                        <h3 class=" text-2xl">Creado por {{$post->user->name}} </h3>
                    </div>
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <p> {{$post->content}} </p>
                    </div>
                    <p class="text-center">-------------------------------------</p>
                <livewire:comments :post_id="$post->id" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>