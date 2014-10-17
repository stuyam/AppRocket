@extends('layouts/layout')

@section('css')
<link rel="stylesheet" href="/css/auth.css">
@stop

@section('content')

<header>
  <img id="logo" src="/img/logo-white.png" />
  <h1>AppRocket</h1>
</header>
<div id="box">
  {{ Form::open(['route' => 'post.login']) }}
    <h2>Login</h2>
    @include('auth._form')

    <div class="form-group">
      {{ Form::submit('Login', ['class'=>'btn btn-primary']) }}
    </div>

  {{ Form::close() }}
</div>
@stop