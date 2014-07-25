@extends('template')

@section('css')
<link rel="stylesheet" href="/css/sign-up.css">
@stop

@section('content')
<div id="box">
    {{ Form::open(array('url' => 'login')) }}

    {{ Form::text('email',null,['placeholder'=>'email']) }}
    <br />
    {{ '<input name="password" type="password" value="" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">' }}
    <br />
    {{ Form::submit('Sign In') }}

    {{ Form::close() }}
</div>
@stop