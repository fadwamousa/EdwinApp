<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\CommentReply;
use Auth;
class CommentRepliesController extends Controller
{


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



}
