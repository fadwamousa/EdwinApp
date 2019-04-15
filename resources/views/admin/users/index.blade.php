@extends('layouts.admin')
@section('content')
<h3>Users</h3>
<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>PHOTO</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
@if(count($users) > 0)
@foreach($users as $user)
    <tbody>
      <tr>
        <td>{{ $user->id }}</td>

        <td><img height="70" src="{{ $user->photo ? $user->photo->file : 'No User Photo' }}"></td>
        <td><a href="{{ url('/admin/users/'.$user->id.'/edit') }}">{{ $user->name }}</a></td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->role->name }}</td>
        <td>{{ $user->is_active == 1 ? 'Active' : 'Non Active' }}</td>
        <td>{{ $user->created_at->diffForHumans() }}</td>
        <td>{{ $user->updated_at->diffForHumans() }}</td>
      </tr>
    </tbody>
@endforeach
@endif
  </table>
@endsection
