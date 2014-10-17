@extends('layouts/layout')

@section('css')
<link rel="stylesheet" href="/css/auth.css">
@stop

@section('content')
<div id="box">
  {{ Form::open(['route' => 'post.login']) }}
    <h1>Login</h1>
    @include('auth._form')

    <div class="form-group">
      {{ Form::submit('Login', ['class'=>'btn btn-primary']) }}
    </div>

  {{ Form::close() }}
</div>
@stop