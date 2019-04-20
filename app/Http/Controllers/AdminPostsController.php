<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreatePostRequest;
use App\Post;
use App\Photo;
use App\Category;
use Auth;

class AdminPostsController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::lists('name','id')->all();
        return view('admin.posts.create',compact('categories'));
    }


    public function store(CreatePostRequest $request)
    {
        $user = Auth::user();
        $input = $request->all();

        if($file = $request->file('photo_id')){

          $fileName = time().$file->getClientOriginalName();
          $file->move('images',$fileName);
          $photo = Photo::create(['file'=>$fileName]);

          $input['photo_id'] = $photo->id;


        }
        /*
        $post = new Post;
        $post->title         = $request->title;
        $post->body          = $request->body;
        $post->category_id   = $request->category_id;
        $user->posts()->save($post);
        */
        $user->posts()->create($input);
        return redirect('/admin/posts');

    }


    public function show($id)
    {
          $post = Post::findOrFail($id);
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::lists('name','id')->all();
        return view('admin.posts.edit',compact('post','categories'));
    }


    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
