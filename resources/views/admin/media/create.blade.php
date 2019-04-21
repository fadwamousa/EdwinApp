@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
@stop



@section('content')
<h3>Create Media Now !!</h3>

{!!Form::open(['method'=>'POST','action'=>'AdminMediasController@store','class'=>'dropzone'])!!}

{!!Form::close()!!}


@endsection



@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js">

</script>
@stop
