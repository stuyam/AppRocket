@extends('ng-template')

@section('css')
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="/css/edit.css">
@stop

@section('content')
<style>
    body{
        background: url(backgrounds/@{{ $background }}) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-push-6">
            <h1 id="title" class="@{{ $text_color }}">@{{ $title }}</h1>
            <p class="@{{ $text_color }}">
                @{{ $about }}
            </p>
            <?php if (empty($store_url))
                echo '<img src="/img/appstore-soon.png" id="store"/>';
            else
                echo '<a href="'.$store_url.'"><img src="/img/appstore.png" id="store"/></a>';
            ?>
        </div>
        <div class="col-md-6 col-md-pull-6">
            <img ng-src="/img/@{{ $phone_color }}.png" id="device" />
            <div class="fadein">
<!--                --><?php
//                $images = explode(',', $image);
//                foreach($images as $image)
//                {
//                    echo '<img src="/screens/'.$image.'" class="screen" />';
//                }
//                ?>
<!--            </div>-->
<!--            --><?php
//            if(count($images) > 1)
//            {
//                echo '<script>var save = true;</script>';
//            }
//            else
//            {
//                echo '<script>var save = false;</script>';
//            }
//            ?>
        </div>
    </div>
</div>

<div id="side-bar">
    {{ Form::open(array('url' => 'create', 'files' => 'true')) }}

    {{ Form::label('name', 'Unique Page Name') }}
    {{ Form::text('name',null,['placeholder'=>'name', 'class'=>'form-control','style'=>'width:50%;']) }}
    <br />

    {{ Form::label('title', 'App Title') }}
    {{ Form::text('title',null,['placeholder'=>'Facebook', 'class'=>'form-control', 'ng-model'=>'$title']) }}
    <br />
    {{ Form::label('about', 'App Description') }}
    {{ Form::textarea('about',null,['placeholder'=>'Facebook is an amazing app to create and share stuff with your friends', 'class'=>'form-control','ng-model'=>'$about']) }}
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
    {{ 'Black: '.Form::radio('phone_color', 'black', true, ['ng-model'=>'$phone_color']) }}<br />
    {{ 'White: '.Form::radio('phone_color', 'white', ['ng-model'=>'$phone_color']) }}<br />

    {{ Form::label('text_color', 'Page Text Color') }}<br />
    {{ 'Black: '.Form::radio('text_color', 'black', true) }}<br />
    {{ 'White: '.Form::radio('text_color', 'white') }}

    {{ Form::submit('Create Page', ['class'=>'btn btn-primary']) }}

    {{ Form::close() }}
</div>
@stop

@section('js')

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.20/angular.js"></script>
    <script src="/js/EditController.js"></script>

    <script>
        $(document).ready(function(){
            if(save) {
                $('.screen:gt(0)').hide();
                setInterval(function () {
                    $('.fadein > :first-child').fadeOut().next('.screen').fadeIn().end().appendTo('.fadein');
                }, 5000);
            }
        });
    </script>

@stop