@extends('layouts.admin')
@section('content')
<h2>Edit Post Now !!</h2>

<div class="col-sm-3">

  <img height="70"
       src="{{ $post->photo ? $post->photo->file : 'http://placehold.it/400x400' }}"
       alt="" class="img-responsive img-rounded">


</div>

<div class="col-sm-9">

    {!!Form::model($post,['method'=>'POST','action'=>['AdminPostsController@update',$post->id],'files'=>true])!!}
    {{ method_field('PUT') }}
    <div class="form-group">

       {{ Form::label('title','Title::') }}
       {{ Form::text('title',$post->title,['class'=>'form-control']) }}

    </div>


    <div class="form-group">

       {{ Form::label('category_id','Category::') }}
       {{ Form::select('category_id',$categories,null,['class'=>'form-control']) }}

    </div>

    <div class="form-group">

       {{ Form::label('body','Content::') }}
       {{ Form::textarea('body',$post->body,['class'=>'form-control','rows'=>3]) }}

    </div>


    <div class="form-group">

       {{ Form::label('photo_id','Photo::') }}
       {{ Form::file('photo_id',['class'=>'form-control']) }}

    </div>

    <div class="form-group">

       {{ Form::submit('Update',['class'=>'btn btn-info']) }}


    </div>
    {!!Form::close()!!}

    {!!Form::model($post,['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id],'files'=>true])!!}
          {{ Form::submit('delete',['class'=>'btn btn-danger']) }}
    {!!Form::close()!!}

@endsection
