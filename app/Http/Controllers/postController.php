<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class postController extends Controller
{

    public function index(){
        // $allPosts = [
        //     ['id' => '1', 'title' => 'MVC Pattern', 'Posted At' => 'Ahmed', 'created_at' => '2015-12-01'],
        //     ['id' => '2', 'title' => 'Laravel', 'Posted At' => 'Mohamed', 'created_at' => '2022-20-01'],
        //     ['id' => '3', 'title' => 'python', 'Posted At' => 'Elsayed', 'created_at' => '2020-12-01'],
        //     ['id' => '4', 'title' => 'PHP', 'Posted At' => 'Mahmoud', 'created_at' => '2019-11-20'],
        // ];
        // dd($allPosts);
        $postsFromDB = Post::all();
        return view('posts.index', ['posts' => $postsFromDB]);
    }

    public function show(Post $post){
        // $singlePost = Post::findorFail($post);
        // dd($post);
        return view('posts.show', ['post' => $post]);
    }
    public function create(){

        return view('posts.create');
    }
    public function store(){
        // $data = request() -> all();
        $title = request()-> title ;
        $posted_by = request()-> posted_by ;
        $description = request()-> description;
        $post = Post::create([
            'title' => $title,
            'posted_by' => $posted_by,
            'description' => $description
        ]);
        //second way
        // $post = new Post;
        // $post->title = request()->title;
        // $post->posted_by = request()->posted_by;
        // $post->description = request()->description;
        // $post->save();
        return redirect()->route('posts.index');
    }
    public function edit(Post $post){

        // $singlePost = Post::findOrFail($post);

        return view('posts.edit', ['post'=>$post]);
    }
    public function update(Post $post, Request $request){

        // $singlePost = Post::findOrFail($post);
        $post -> update([
            "title" => $request->title,
            "description" => $request->description,
            "posted_by" => $request->posted_by
        ]);
        return redirect()->route('posts.index');
    }
    public function destroy(Post $post){
        // $singlePost = Post::findOrFail($post);
        $post->delete();
        return redirect()->route('posts.index');
    }

}
