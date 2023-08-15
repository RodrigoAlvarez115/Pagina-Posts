<div>
    <div class="space-y-4">
        @forelse ($comments as $comment)
        <div class="bg-white rounded-lg p-4 shadow-md">
            <h2 class="text-lg font-semibold">{{ $comment->user->name }}</h2>
            @if ($editingCommentId === $comment->id)
            <div class="mb-4">
                <textarea class="w-full p-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:border-gray-500" wire:model="editedContent"></textarea>
            </div>
            <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 focus:outline-none focus:shadow-outline-blue" wire:click="updateComment">Guardar</button>
            <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 focus:outline-none focus:shadow-outline-blue" wire:click="cancelEdit">Cancelar</button>
            @else
            <p class="text-black-500 text-l">{{ $comment->content }}</p>
            <p class="text-gray-500 text-sm">Publicado el: {{ $comment->created_at }}</p>
            @if (Auth::user() && Auth::user()->id === $comment->user_id)
                <button class="text-blue-500 hover:text-blue-700 focus:outline-none" wire:click="edit({{ $comment->id }})">Editar</button>
                <button class="text-red-500 hover:text-red-700 focus:outline-none" wire:click="destroy({{ $comment->id }})">Eliminar</button>
            @endif
            @endif
        </div>
        @empty
        <div class="mb-4">
            <h1 class="mb-4 text-center">No hay comentarios aún</h1>
        </div>
        @endforelse
    </div>
    <form wire:submit.prevent="store" class="bg-white p-6 rounded-lg shadow-md">
        <div class="mb-4">
            <p class="mb-4 text-gray-600"> {{$status}} </p>
        </div>
        @csrf
        <div class="mb-4">
        <textarea class="w-full p-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:border-gray-500" wire:model="content" placeholder="Escribe tu comentario"></textarea>
    </div>
        <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 focus:outline-none focus:shadow-outline-blue" type="submit">Enviar Comentario</button>
    </form>
</div>
