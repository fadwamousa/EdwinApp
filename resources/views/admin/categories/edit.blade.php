@extends('layouts.admin')
@section('content')
<h2>Categories</h2>

<div class="col-sm-6">

  {!!Form::model($category,['method'=>'PATCH','action'=>['AdminCategoriesController@update',$category->id]])!!}
  <div class="form-group">

     {{ Form::label('name','Name::') }}
     {{ Form::text('name',$category->name,['class'=>'form-control']) }}

  </div>

  <div class="form-group">

     {{ Form::submit('update',['class'=>'btn btn-info col-sm-6']) }}


  </div>
  {!!Form::close()!!}

  {!!Form::model($category,['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id]])!!}
  <div class="form-group">

     {{ Form::submit('delete',['class'=>'btn btn-danger col-sm-6']) }}


  </div>
  {!!Form::close()!!}



</div>
<div class="col-sm-6">







</div>

@endsection
