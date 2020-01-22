<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->search) {
            $posts = Post::join('users', 'author_id', '=', 'users.id')
            ->where('title', 'like', '%'.$request->search.'%')
            ->orWhere('descr', 'like', '%'.$request->search.'%')
            ->orWhere('name', 'like', '%'.$request->search.'%')
            ->orderBy('posts.created_at', 'desc')
            ->get();

            return view('index', compact('posts'));
        }


        $posts = Post::join('users', 'author_id', '=', 'users.id')
        ->orderBy('posts.created_at', 'desc')
        ->paginate(5);
        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->short_title = Str::length($request->title)>30 ? Str::substr($request->title, 0, 30) . '...' : $request->title;
        $post->descr = $request->descr;
        $post->author_id = rand(1,4);

        if($request->file('img')){
            $path = Storage::putFile('public', $request->file('img'));
            $url = Storage::url($path);
            $post->image = $url;
        }

        $post->save();

        return redirect()->route('post.index')->with('success', 'Пост успешно создан !');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::join('users', 'author_id', '=', 'users.id')->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->short_title = Str::length($request->title)>30 ? Str::substr($request->title, 0, 30) . '...' : $request->title;
        $post->descr = $request->descr;

        if($request->file('img')){
            $path = Storage::putFile('public', $request->file('img'));
            $url = Storage::url($path);
            $post->image = $url;
        }

        $post->update();
        $id = $post->post_id;
        return redirect()->route('post.show', compact('id'))->with('success', 'Пост успешно обновлен !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Пост успешно удален !');
    }
}
