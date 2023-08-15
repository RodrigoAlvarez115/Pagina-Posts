<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class Comments extends Component
{
    public $content = "";
    public $post_id;
    public $status = "";
    public $editingCommentId;
    public $editedContent;

    public function mount($post_id)
    {
        $this->post_id = $post_id;
    }
    public function render()
    {
        $posts = Post::find($this->post_id);
        $comments = $posts->comments;
        return view('livewire.comments', compact('comments'));
    }

    public function store()
    {
        Post::findOrFail($this->post_id);
        Comment::create([
            'user_id' => Auth::user()->id,
            'post_id' => $this->post_id,
            'content' => $this->content
        ]);
        $this->content = '';
        $this->status = 'Comentario creado!';
    }

    public function edit($commentId)
    {
        $this->editingCommentId = $commentId;
        $comment = Comment::findOrFail($commentId);
        $this->editedContent = $comment->content;
    }

    public function updateComment()
    {
        $comment = Comment::findOrFail($this->editingCommentId);
        $comment->content = $this->editedContent;
        $comment->save();

        $this->resetEditState();

        $this->status = 'Comentario actualizado!';
    }
    public function cancelEdit()
    {
        $this->resetEditState();
    }

    private function resetEditState()
    {
        $this->editingCommentId = null;
        $this->editedContent = null;
    }

    public function destroy($id)
    {
        Comment::destroy($id);
        $this->status = 'Comentario eliminado';
    }
}
