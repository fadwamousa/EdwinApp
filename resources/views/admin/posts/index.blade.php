@extends('layouts.admin')
@section('content')
<h3>Posts</h3>
<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>userName</th>
        <th>Photo</th>
        <th>Category</th>
        <th>Title</th>
        <th>Body</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
@if(count($posts) > 0)
@foreach($posts as $post)
    <tbody>
      <tr>
        <td>{{ $post->id }}</td>
        <td>{{ $post->user->name }}</td>
        <td><img height="50" src="{{ $post->photo ? $post->photo->file : 'No Photo' }}" /></td>
        <td>{{ $post->category ? $post->category->name : 'Uncategorize' }}</td>
        
        <td><a href="{{ url('admin/posts/'.$post->id.'/edit') }}">{{ $post->title }}</a></td>
        <td>{{ str_limit($post->body,7) }}</td>
        <td>{{ $post->created_at->diffForHumans() }}</td>
        <td>{{ $post->updated_at->diffForHumans() }}</td>
      </tr>
    </tbody>
@endforeach
@endif
  </table>

@endsection
