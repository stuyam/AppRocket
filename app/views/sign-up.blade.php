@extends('template')

@section('css')
<link rel="stylesheet" href="/css/sign-up.css">
@stop

@section('content')
<div id="box">
    {{ Form::open(array('url' => 'sign-up')) }}

    {{ Form::text('email',null,['placeholder'=>'email', 'class'=>'form-control']) }}
    <br />
    <input class="form-control" name="password" type="password" value="" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
    <br />
    {{ Form::submit('Create Account', ['class'=>'btn btn-primary']) }}

    {{ Form::close() }}
</div>
@stop