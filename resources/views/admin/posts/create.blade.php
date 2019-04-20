@extends('layouts.admin')
@section('content')
<h2>Create Post Now !!</h2>
{!!Form::open(['method'=>'POST','action'=>'AdminPostsController@store','files'=>true])!!}
<div class="form-group">

   {{ Form::label('title','Title::') }}
   {{ Form::text('title',null,['class'=>'form-control']) }}

</div>


<div class="form-group">

   {{ Form::label('category_id','Category::') }}
   {{ Form::select('category_id',[''=>'choose an Option']+$categories,null,['class'=>'form-control']) }}

</div>

<div class="form-group">

   {{ Form::label('body','Content::') }}
   {{ Form::textarea('body',null,['class'=>'form-control','rows'=>3]) }}

</div>


<div class="form-group">

   {{ Form::label('photo_id','Photo::') }}
   {{ Form::file('photo_id',['class'=>'form-control']) }}

</div>

<div class="form-group">

   {{ Form::submit('Publish',['class'=>'btn btn-primary']) }}


</div>
{!!Form::close()!!}
@endsection
