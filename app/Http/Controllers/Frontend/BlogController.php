<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::with('author')
            ->latest()
            ->orderBy('id', 'desc')
            ->filter(request(['search']))
            ->simplePaginate(10)
            ->withQueryString();

        return view('frontend.blog', ['posts' => $posts]);
    }
}
