<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\CommentReply;
use Auth;
use App\Comment;

class CommentRepliesController extends Controller
{


    public function show($id){

      $comment = Comment::find($id);
      $replies = $comment->replies;

      return view('admin.comments.replies.show',compact('replies'));
    }

    public function createReply(Request $request)
    {
      $user  = Auth::user();

      $datas = [
        'comment_id' => $request->comment_id,
        'author'     => $user->name,
        'email'      => $user->email,
        'body'       => $request->body
      ];
      CommentReply::create($datas);
      $request->session()->flash('Message','The Reply Comment has been submited');
      return redirect()->back();
    }


    public function update(Request $request, $id)
    {
        $reply = CommentReply::findOrFail($id);
        $reply->is_active = $request->is_Active;
        $reply->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
      $reply = CommentReply::findOrFail($id);
      $reply->delete();
      return redirect()->back();
    }


}
