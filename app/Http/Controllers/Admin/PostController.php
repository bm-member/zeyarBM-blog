<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use App\Category;
use App\categoryPostModel;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:isAdminOrAuthor');
    }

    public function index()
    {
        // $this->authorize('isAdminOrAuthor');

        if(request('search')) {
            $posts = Post::where('title', 'like', '%' . request('search') . '%')
            ->orderBy('id', 'desc')->paginate(10);
        } else {
            $posts = Post::orderBy('id', 'desc')->paginate(10);
        }
        return view('admin.post.index', compact('posts'));


        // $posts = Post::all();
        // $posts = Post::paginate(6);
        // $posts = Post::orderBy('id', 'desc')->get();
        // $posts = Post::orderBy('id', 'desc')->paginate(3);
        // $posts = Post::orderBy('id', 'desc')->first();
        // $posts = Post::where('id','=', '20')->get();
        // $posts = Post::where('id','>', '10')->get();
        // $posts = Post::where('id','>', '10')->first();
        // $posts = Post::where('id','>', '10')->orderBy('id', 'desc')->paginate(3);
        // $posts = Post::where('id','10')->orderBy('id', 'desc')->first();
        // $posts = Post::where('title','like','Sit%')->orderBy('id', 'desc')->first();
        // $posts = Post::where('title','like','%aut.')->orderBy('id', 'desc')->first();
        // $posts = Post::where('title','like','%a%')->orderBy('id', 'desc')->get();

        
    }

    public function create()
    {
        $Categories = Category::all();
        return view('admin.post.create')->with(compact('Categories'));
    }

    public function store(PostRequest $request)
    {
        // $request->validate([
        //     'title' => 'required|min: 2',
        //     'content' => 'required|min: 3',
        // ], [
        //     'title.required' => 'ခေါင်းစဉ်ထည့်ရန်လိုအပ်သည်။',
        //     'content.min' => 'အကြောင်းအရာအနည်းဆုံး ၃ လုံးထည့်ပါ။'
        // ]);

        $post = new Post();


        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = auth()->id();
        // Image upload
        $imagePath = public_path('image');
        $imageName = 'image/' . time() . $request->file('image')->getClientOriginalName();
        $request->file('image')->move($imagePath, $imageName);
        $post->image = $imageName;

        $categories = $request->category;
        // $categoryPost->post_id = auth()->id();
        // $categoryPost->category_id = input('');
        $post->save();

        $post_ID = $post->id;

        if(count($categories)>0){
            for ($i = 0; $i < count($categories) ; $i++) {
                $categoryPost = new categoryPostModel();

                $categoryPost->category_id = $categories[$i];                
                $categoryPost->post_id = $post_ID;
                $categoryPost->save();
            }
        }
        
        return redirect('admin/post/')->with('success' , 'A post created successfully.');
    }

    public function show($id)
    {
        $post = Post::find($id);
        // $user = Post::user();
        return view('admin.post.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.post.edit', compact('post'));
    }

    public function update(PostRequest $request, $id)
    {
        // $request->validate([
        //     'title' => 'required|min: 2',
        //     'content' => 'required|min: 3',
        // ], [
        //     'title.required' => 'ခေါင်းစဉ်ထည့်ရန်လိုအပ်သည်။',
        //     'content.min' => 'အကြောင်းအရာအနည်းဆုံး ၃ လုံးထည့်ပါ။',
        // ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        return redirect('admin/post')->with('success', 'A post updated successfully.');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('admin/post')->with('success', 'A post deleted successfully.');
    }
}
