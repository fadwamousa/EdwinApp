<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Comment;
use Auth;
use App\CommentRelpy;
class AdminCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        return view('admin.comments.index',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user  = Auth::user();
        //return $user->photo->file;
        $datas = [
          'post_id'    => $request->post_id,
          'author'     => $user->name,
          'email'      => $user->email,
          'photo'      => $user->photo->file,
          'body'       => $request->body,
        ];
        Comment::create($datas);
        $request->session()->flash('Message','The Comment has been submited');
        return redirect()->back();
    }


    public function show($id)
    {
        $post    = Post::findOrFail($id);
        $comments = $post->comments;
        return view('admin.comments.show',compact('comments'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->is_active = $request->is_Active;
        $comment->save();
        return redirect()->back();
    }


    public function destroy($id)
    {
      $comment = Comment::findOrFail($id);
      $comment->delete();
      return redirect()->back();
    }
}
