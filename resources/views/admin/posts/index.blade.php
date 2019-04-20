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
        <td>{{ $post->category_id }}</td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->body }}</td>
        <td>{{ $post->created_at->diffForHumans() }}</td>
        <td>{{ $post->updated_at->diffForHumans() }}</td>
      </tr>
    </tbody>
@endforeach
@endif
  </table>

@endsection
