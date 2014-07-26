@extends('ng-template')

@section('css')
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="/css/edit.css">
<link rel="stylesheet" href="/color/jquery.minicolors.css">
@stop

@section('content')
    <style>
        body{
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
    <div id="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-push-6">
                    <h1 id="title"">@{{ title }}</h1>
                    <p>
                        @{{ about }}
                    </p>
                    <?php if (empty($store_url))
                        echo '<img src="/img/appstore-soon.png" id="store"/>';
                    else
                        echo '<a href="'.store_url.'"><img src="/img/appstore.png" id="store"/></a>';
                    ?>
                </div>
                <div class="col-md-6 col-md-pull-6">
                    <img ng-src="/img/@{{ phone_color }}.png" id="device" />
                    <div id="fade">
<!--                        --><?php
//                        $images = explode(',', $image);
//                        foreach($images as $image)
//                        {
//                            echo '<img src="/screens/'.$image.'" class="screen" />';
//                        }
//                        ?>
<!--                    </div>-->
<!--                    --><?php
//                    if(count($images) > 1)
//                    {
//                        echo '<script>var save = true;</script>';
//                    }
//                    else
//                    {
//                        echo '<script>var save = false;</script>';
//                    }
//                    ?>
                </div>
            </div>
        </div>
    </div>
    </div>


<div id="side-bar">
    {{ Form::open(array('url' => 'create', 'files' => 'true')) }}

    {{ Form::label('name', 'Unique Page Name&#42;') }}<br />
    <span class="error-display">{{$errors->first('name')}}</span>
    {{ Form::text('name',Input::old('name'),['placeholder'=>'name', 'class'=>'form-control', 'required'=>'required']) }}
    <br />

    {{ Form::label('title', 'App Title&#42;') }}<br />
    <span class="error-display">{{$errors->first('title')}}</span>
    <input
        class="form-control"
        ng-model="title"
        name="title"
        type="text"
        id="title-input"
        value="{{{ Input::old('title') or 'App Name' }}}"
        ng-init="title='App Name'"
        required
        >
    <br />
    {{ Form::label('about', 'App Description&#42;') }}<br />
    <span class="error-display">{{$errors->first('about')}}</span>
    <textarea
        class="form-control"
        ng-model="about"
        name="about"
        cols="10"
        rows="6"
        id="about"
        value="{{{ Input::old('about') or 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua' }}}"
        ng-init="about='Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua'"
        required
        >
    </textarea>
    <br />
    {{ Form::label('store_url', 'App Store URL') }}<br />
    <span class="error-display">{{$errors->first('store_url')}}</span>
    {{ Form::text('store_url',Input::old('store_url'),['placeholder'=>'http://apple.com/23423412412', 'class'=>'form-control']) }}
    <br />
    {{ Form::label('copyright', 'Copyright&#42;') }}<br />
    <span class="error-display">{{$errors->first('copyright')}}</span>
    {{ Form::text('copyright',Input::old('copyright'),['class'=>'form-control', 'required'=>'required']) }}
    <br />
    {{ Form::label('image', 'App Screenshot') }}<br />
    <span class="error-display">{{$errors->first('screenshot')}}</span>
    <div class="btn-group btn-group-justified" id="top-row">
        <span class="btn btn-default btn-file" id="image-btn">
            Choose File 1&#42;{{ Form::file('image', ['required'=>'required', 'id'=>'image']) }}
        </span>
        <span class="btn btn-default btn-file" id="image2-btn">
            Choose File 2{{ Form::file('image2', ['id'=>'image2']) }}
        </span>
    </div>
    <div class="btn-group btn-group-justified" id="bottom-row">
        <span class="btn btn-default btn-file" id="image3-btn">
            Choose File 3{{ Form::file('image3', ['id'=>'image3']) }}
        </span>
        <span class="btn btn-default btn-file" id="image4-btn">
            Choose File 4{{ Form::file('image4', ['id'=>'image4']) }}
        </span>
    </div>

    <br />
    {{ Form::label('background', 'Page Background') }}
    <span class="error-display">{{$errors->first('background')}}</span>
    <table class="table" id="backgroung-table">
        <tr>
            <td>
                <input name="back_option" type="radio" value="color" id="back-radio1">
                <span class="btn btn-default btn-file" id="background-button">
                    Choose Image{{ Form::file('background', ['id'=>'background-choose']) }}
                </span>
            </td>
        </tr>
        <tr>
            <td>
                <input checked="checked" name="back_option" type="radio" value="color" id="back-radio2">
                <input type="text" name="background_color" id="color" class="form-control" data-control="wheel" value="{{{ Input::old('email') or '#ffffff' }}}">
            </td>
        </tr>
    </table>

    {{ Form::label('phone_color', 'Phone Color') }}<br />
    <span class="error-display">{{$errors->first('phone_color')}}</span>
    <select class="form-control" ng-model="phone_color" name="phone_color" ng-init="phone_color='black'">
        <option value="black">Black</option>
        <option value="white">White</option>
        <option value="blue">Blue</option>
    </select>

    <br/>

    {{ Form::label('text_color', 'Page Text Color') }}<br />
    <span class="error-display">{{$errors->first('text_color')}}</span>
    <table class="table">
        <tr><td><input checked="checked" name="text_color" type="radio" value="black" id="text_color1"> Black</td></tr>
        <tr><td><input name="text_color" type="radio" value="white" id="text_color2"> White</td></tr>
    </table>

    {{ Form::submit('Create Page', ['class'=>'btn btn-primary', 'id'=>'submit']) }}

    {{ Form::close() }}
</div>
@stop

@section('js')

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.20/angular.js"></script>
    <script src="/js/EditController.js"></script>
    <script src="/color/jquery.minicolors.min.js"></script>

<!--    <script>-->
<!--        $(document).ready(function(){-->
<!--            if(save) {-->
<!--                $('.screen:gt(0)').hide();-->
<!--                setInterval(function () {-->
<!--                    $('.fadein > :first-child').fadeOut().next('.screen').fadeIn().end().appendTo('.fadein');-->
<!--                }, 5000);-->
<!--            }-->
<!--        });-->
<!--    </script>-->


@stop