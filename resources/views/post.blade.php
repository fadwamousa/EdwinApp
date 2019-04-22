@extends('layouts.blog-post')
@section('content')
<h2>Post</h2>

<h1>{{$post->title}}</h1>

<!-- Author -->
<p class="lead">
    <!--by <a href="#">{{ Auth::user()->name }}</a>-->
    by <a href="#">{{ $post->user->name }}</a>
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

<hr>

<!-- Posted Comments -->


<!-- Comment -->
<div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" src="http://placehold.it/64x64" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading">Start Bootstrap
            <small>August 25, 2014 at 9:30 PM</small>
        </h4>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
        <!-- Nested Comment -->
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">Nested Start Bootstrap
                    <small>August 25, 2014 at 9:30 PM</small>
                </h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>
        <!-- End Nested Comment -->
    </div>
</div>

@endsection
