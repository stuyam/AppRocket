@extends('template')

@section('css')
<link rel="stylesheet" href="/css/sign-up.css">
@stop

@section('content')
<div id="box">
    {{ Form::open(array('url' => 'sign-up')) }}

    <span class="error-display">{{$errors->first('email')}}</span>
    {{ Form::text('email',Input::old('email'),['placeholder'=>'email', 'class'=>'form-control']) }}
    <br />
    <span class="error-display">{{$errors->first('password')}}</span>
    <input class="form-control" name="password" type="password" value="{{{ Input::old('password') }}}" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
    <br />
    {{ Form::submit('Create Account', ['class'=>'btn btn-primary']) }}

    {{ Form::close() }}
</div>
@stop