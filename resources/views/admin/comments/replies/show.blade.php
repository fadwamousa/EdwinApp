@extends('layouts.admin')
@section('content')

@if($replies)
<h3>All replies</h3>
<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>author</th>
        <th>email</th>
        <th>Body</th>
        <th>Created</th>

        <th>What-reply</th>

      </tr>
    </thead>

@foreach($replies as $reply)
    <tbody>
      <tr>
        <td>{{ $reply->id }}</td>
        <td>{{ $reply->author }}</td>
        <td>{{ $reply->email }}</td>
        <td>{{ $reply->body }}</td>
        <td>{{ $reply->created_at->diffForHumans() }}</td>

        <td><a href="{{ url('post/'.$reply->comment->post->id) }}">Reply Link</a></td>

        <td>
          @if($reply->is_active == 1)
            {!!Form::model($reply,['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]])!!}
            <input type="hidden" name="is_Active" value="0">
            <input type="submit" value="Un-Approve" class="btn btn-success">
            {!!Form::close()!!}

          @else
          {!!Form::model($reply,['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]])!!}
          <input type="hidden" name="is_Active" value="1">
          <input type="submit" value="Approve" class="btn btn-info">
          {!!Form::close()!!}
          @endif
        </td>
        <td>
          {!!Form::model($reply,['method'=>'DELETE','action'=>['CommentRepliesController@destroy',$reply->id]])!!}

          <input type="submit" value="delete" class="btn btn-danger">
          {!!Form::close()!!}
        </td>
      </tr>
    </tbody>
@endforeach
@else
<h3>No Replies Here </h3>
@endif
  </table>

@stop
