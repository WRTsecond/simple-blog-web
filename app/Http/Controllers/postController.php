<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class postController extends Controller
{
    public function createPost(Request $request) {
        $minta = $request->validate([
            'title' => ['required', ],
            'content' => ['required', ],
        ]);

        $minta['title'] = strip_tags($minta['title']);
        $minta['content'] = strip_tags($minta['content']);
        $minta['user_id'] = auth()->id();

        Post::create($minta);
        return redirect('/');
    }

    public function editPost(Post $post) {
        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }
        return view('edit-post', ['post' => $post]);
    }

    public function updatePost(Post $post, Request $request) {
        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }

        $minta = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $minta['title'] = strip_tags($minta['title']);
        $minta['content'] = strip_tags($minta['content']);

        $post->update($minta);
        return redirect('/');
    }

    public function deletePost(Post $post) {
        if (auth()->user()->id === $post['user_id']) {
            $post->delete();
        }
            return redirect('/');
    }
}
