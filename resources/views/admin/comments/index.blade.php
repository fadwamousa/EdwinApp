@extends('layouts.admin')
@section('content')

@if(count($comments)>0)
<h3>All Comments</h3>
<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>author</th>
        <th>email</th>
        <th>Body</th>
        <th>Created</th>
        <th>What-Post</th>
        <th>What-Comment</th>

      </tr>
    </thead>

@foreach($comments as $comment)
    <tbody>
      <tr>
        <td>{{ $comment->id }}</td>
        <td>{{ $comment->author }}</td>
        <td>{{ $comment->email }}</td>
        <td>{{ $comment->body }}</td>
        <td>{{ $comment->created_at->diffForHumans() }}</td>
        <td><a href="{{ url('post/'.$comment->post->id) }}">View-Post</a></td>
        <td><a href="{{ url('admin/comment/replies/'.$comment->id) }}">View Comment Reply</a></td>
        <td>
          @if($comment->is_active == 1)
            {!!Form::model($comment,['method'=>'PATCH','action'=>['AdminCommentsController@update',$comment->id]])!!}
            <input type="hidden" name="is_Active" value="0">
            <input type="submit" value="Un-Approve" class="btn btn-success">
            {!!Form::close()!!}

          @else
          {!!Form::model($comment,['method'=>'PATCH','action'=>['AdminCommentsController@update',$comment->id]])!!}
          <input type="hidden" name="is_Active" value="1">
          <input type="submit" value="Approve" class="btn btn-info">
          {!!Form::close()!!}
          @endif
        </td>
        <td>
          {!!Form::model($comment,['method'=>'DELETE','action'=>['AdminCommentsController@destroy',$comment->id]])!!}

          <input type="submit" value="delete" class="btn btn-danger">
          {!!Form::close()!!}
        </td>
      </tr>
    </tbody>
@endforeach
@else
<h3>No Comments Here </h3>
@endif
  </table>

@stop
