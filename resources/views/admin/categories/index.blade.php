@extends('layouts.admin')
@section('content')
<h2>Categories</h2>

<div class="col-sm-6">

  {!!Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store'])!!}
  <div class="form-group">

     {{ Form::label('name','Name::') }}
     {{ Form::text('name',null,['class'=>'form-control']) }}

  </div>

  <div class="form-group">

     {{ Form::submit('SendCategory',['class'=>'btn btn-primary']) }}


  </div>
  {!!Form::close()!!}



</div>
<div class="col-sm-6">


  <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Created</th>
          <th>Updated</th>
        </tr>
      </thead>
  @if(count($categories) > 0)
  @foreach($categories as $category)
      <tbody>
        <tr>
          <td>{{ $category->id }}</td>
          <td><a href="{{ url('/admin/categories/'.$category->id.'/edit') }}">{{ $category->name }}</a></td>
          <td>{{ $category->created_at->diffForHumans() }}</td>
          <td>{{ $category->updated_at->diffForHumans() }}</td>
        </tr>
      </tbody>
  @endforeach
  @endif
    </table>

</div>

@endsection
