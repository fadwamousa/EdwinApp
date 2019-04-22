@extends('layouts.blog-post')
@section('content')
<h2>Post</h2>

<h1>{{$post->title}}</h1>

<!-- Author -->
<p class="lead">
  <!--by <a href="#">{{ Auth::user()->name }}</a>-->
  @if(Auth::check())
  by <a href="#">{{ $post->user->name }}</a>
  @endif
</p>

<hr>

<!-- Date/Time -->
<p>Posted at ::<span class="glyphicon glyphicon-time"></span>{{ $post->created_at->diffForHumans() }} </p>

<hr>

<!-- Preview Image -->

<img  height="50" class="img-responsive" src="{{ $post->photo ? $post->photo->file : 'http://placehold.it/900x300' }}" alt="">
<hr>

<!-- Post Content -->
<p class="lead">{{ $post->body }}</p>

<hr>

@if(Session::has('Message'))
<div class="alert alert-danger">
  {{ Session('Message') }}
</div>
@endif
<!-- Blog Comments -->

<!-- Comments Form -->
@if(Auth::check())
<div class="well">
    <h4>Leave a Comment:</h4>
    {!!Form::open(['method'=>'POST','action'=>'AdminCommentsController@store'])!!}

        <div class="form-group">

          {{ Form::hidden('post_id',$post->id) }}

        </div>

        <div class="form-group">
         {{ Form::textarea('body',null,['class'=>'form-control','rows'=>3]) }}
        </div>
        <div class="form-group">
         {{ Form::submit('Submit',['class'=>'btn btn-primary']) }}
        </div>
    {!!Form::close()!!}

</div>
@endif
<hr>

<!-- Posted Comments -->

@if(count($comments)>0)
@foreach($comments as $comment)

<div class="media">
    <a class="pull-left" href="#">

        <img height="64" class="media-object" src="{{ $comment->photo ? $comment->photo : 'http://placehold.it/64x64' }}" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading">{{$comment->author}}
            <small>{{ $comment->created_at->diffForHumans() }}</small>
        </h4>
        {{ $comment->body }}
        <!-- Nested Comment -->

@foreach($comment->replies as $reply)
        <div id="nested-comment" class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">

            </a>
            <div class="media-body">
                <h4 class="media-heading">{{ $reply->author }}
                    <small>{{ $reply->created_at->diffForHumans() }}</small>
                </h4>

                  {{ $reply->body }}

            </div>
            {!!Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReply'])!!}
                  {{ Form::hidden('comment_id',$comment->id) }}
                <div class="form-group">
                 {{ Form::textarea('body',null,['class'=>'form-control','rows'=>3]) }}
                </div>
                <div class="form-group">
                 {{ Form::submit('Submit',['class'=>'btn btn-primary']) }}
                </div>
            {!!Form::close()!!}
        </div>
        <!-- End Nested Comment -->
        @endforeach


    </div>
</div>

@endforeach
@endif
@endsection
