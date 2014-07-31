@extends('template')

@section('css')
<link rel="stylesheet" href="/css/sign-up.css">
@stop

@section('content')
<div id="box">
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Step 1: Create Account</a>
            </div>
        </div><!-- /.container-fluid -->
    </nav>
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