@extends('template')

@section('css')
create
@stop

@section('content')
<div class="container">
    {{ Form::open(array('url' => 'create', 'files' => 'true')) }}

    {{ Form::label('name', 'Unique Page Name') }}
    {{ Form::text('name',null,['placeholder'=>'name', 'class'=>'form-control','style'=>'width:50%;']) }}
    <br />

    {{ Form::label('title', 'App Title') }}
    {{ Form::text('title',null,['placeholder'=>'Facebook', 'class'=>'form-control']) }}
    <br />
    {{ Form::label('about', 'App Description') }}
    {{ Form::textarea('about',null,['placeholder'=>'Facebook is an amazing app to create and share stuff with your friends', 'class'=>'form-control']) }}
    <br />
    {{ Form::label('store_url', 'App Store URL') }}
    {{ Form::text('store_url',null,['placeholder'=>'http://apple.com/23423412412', 'class'=>'form-control']) }}
    <br />
    {{ Form::label('image', 'App Screenshot (1 is required)') }}
    <span class="btn btn-default btn-file">
        Screen 1{{ Form::file('image', $attributes = array()) }}
    </span>
    {{ Form::file('image2', $attributes = array()) }}
    {{ Form::file('image3', $attributes = array()) }}
    {{ Form::file('image4', $attributes = array()) }}
    <br />
    {{ Form::label('background', 'Page Background Image') }}
    {{ Form::file('background', $attributes = array()) }}
    <br />
    {{ Form::label('phone_color', 'Phone Color') }}<br />
    {{ 'Black: '.Form::radio('phone_color', 'black', true) }}<br />
    {{ 'White: '.Form::radio('phone_color', 'white') }}<br />

    {{ Form::label('text_color', 'Page Text Color') }}<br />
    {{ 'Black: '.Form::radio('text_color', 'black', true) }}<br />
    {{ 'White: '.Form::radio('text_color', 'white') }}

    {{ Form::submit('Create Page', ['class'=>'btn btn-primary']) }}

    {{ Form::close() }}
</div>
@stop