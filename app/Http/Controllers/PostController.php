<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('cadastroPost');
    }

    public function store(Request $request)
    {
        $validateAll = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'media' => 'nullable',
            'user_id' => 'required|exists:users,id',
        ]);

        Post::create($validateAll);
        
        return redirect()->route('home')->with('success', 'Post criado com sucesso!');
    }
}
