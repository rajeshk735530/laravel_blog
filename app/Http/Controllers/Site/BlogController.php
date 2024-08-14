<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Comment;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Post::where('status', Post::PUBLISHED)->paginate(4);
        return view('site.index', compact('blogs'));
    }

    public function openSingleBlog($id)
    {
        $blog = Post::find($id);

        if(! $blog){
            abort(404);
        }

        $comments = Comment::where('post_id', $blog->id)->paginate(4);
        $latestPosts = Post::where('id', '!=', $blog->id)->latest()->limit(5)->get();
        $tags = $blog->tags;

        return view('site.single', compact('blog', 'comments', 'latestPosts', 'tags'));
    }
}