@extends('layouts.admin')
@section('content')
<h2>Edit User Now !!</h2>

<div class="col-sm-3">

  <!--<img height="70"
       src="/images/{‌{$user->photo()->exists() ? $user->photo->file : 'http://placehold.it/400x400'}}"
       alt="" class="img-responsive img-rounded">-->

       <img height="70"
            src="{{ $user->photo ? $user->photo->file : 'http://placehold.it/400x400' }}"
            alt="" class="img-responsive img-rounded">
</div>

<div class="col-sm-9">

    {!!Form::model($user,['method'=>'POST','action'=>['AdminUsersController@update',$user->id],'files'=>true])!!}
    {{ method_field('PUT') }}
    <div class="form-group">

       {{ Form::label('name','Name::') }}
       {{ Form::text('name',$user->name,['class'=>'form-control']) }}

    </div>
    <div class="form-group">

       {{ Form::label('email','Email::') }}
       {{ Form::email('email',$user->email,['class'=>'form-control']) }}

    </div>
    <div class="form-group">

       {{ Form::label('password','Password::') }}
       {{ Form::password('password',['class'=>'form-control']) }}

    </div>
    <div class="form-group">

       {{ Form::label('photo_id','Photo::') }}
       {{ Form::file('photo_id',['class'=>'form-control']) }}

    </div>
    <div class="form-group">

       {{ Form::label('role_id','Role::') }}
       {{ Form::select('role_id',$roles,null,['class'=>'form-control']) }}

    </div>
    <div class="form-group">

       {{ Form::label('is_active','Status::') }}
       {{ Form::select('is_active',[ 1 =>'Active', 0 => 'Not Active'],null,['class'=>'form-control']) }}

    </div>

    <div class="form-group">

       {{ Form::submit('Update',['class'=>'btn btn-primary']) }}




    </div>
    {!!Form::close()!!}
    

    {!!Form::model($user,['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id],'files'=>true])!!}
         {{ Form::submit('DELETE',['class'=>'btn btn-danger']) }}
    {!!Form::close()!!}

</div>

@endsection
