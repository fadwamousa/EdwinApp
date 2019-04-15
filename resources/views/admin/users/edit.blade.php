@extends('layouts.admin')
@section('content')
<h2>Edit User Now !!</h2>
{!!Form::open(['method'=>'POST','action'=>['AdminUsersController@update',$user->id],'files'=>true])!!}
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
   {{ Form::select('role_id',[''=>'Choose an Option']+$roles,null,['class'=>'form-control']) }}

</div>
<div class="form-group">

   {{ Form::label('is_active','Status::') }}
   {{ Form::select('is_active',[ 1 =>'Active', 0 => 'Not Active'],0,['class'=>'form-control']) }}

</div>

<div class="form-group">

   {{ Form::submit('Update',['class'=>'btn btn-primary']) }}


</div>
{!!Form::close()!!}
@endsection
