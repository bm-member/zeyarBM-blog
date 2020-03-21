<?php

namespace App\Http\Controllers\Client;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index()
    {
        if(request('q')) {
            $posts = Post::where('title', 'like', '%' . request('q') . '%')
            ->orderBy('id', 'desc')->paginate(10);
        } else {
            $posts = Post::orderBy('id', 'desc')->paginate(10);
        }

        return view('client.page.index', compact('posts'));
    }

    public function postDetail($id)
    {
        $post = Post::findOrFail($id);

        // if(!$post) {
        //     abort(404);
        // }

        return view('client.page.post_detail', compact('post'));
    }
}
