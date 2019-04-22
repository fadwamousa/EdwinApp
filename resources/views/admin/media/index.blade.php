@extends('layouts.admin')
@section('content')
<h3>Media</h3>
<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
@if(count($photos) > 0)
@foreach($photos as $photo)
    <tbody>
      <tr>
        <td>{{ $photo->id }}</td>
        <td>
          <img height="70" src="{{ $photo->file ? $photo->file : 'No Photo' }}"
               alt="{{ $photo->file }}"/>
        </td>

        <td>{{ $photo->created_at->diffForHumans() }}</td>
        <td>{{ $photo->updated_at->diffForHumans() }}</td>
        <td>
          {!!Form::model($photo,['method'=>'DELETE','action'=>['AdminMediasController@destroy',$photo->id]])!!}
                  {{ Form::submit('Delete',['class'=>'btn btn-danger']) }}
          {!!Form::close()!!}
      </td>
      </tr>
    </tbody>
@endforeach
@endif
  </table>

@endsection
