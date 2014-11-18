<?php
//Load old input data through normalizer if $data is not set
if (empty($data))
    $data = (new \AppRocket\DataNormalizer())->editorViewData(Input::all());
?>

@extends('template')

@section('css')
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="/css/edit.css">
<link rel="stylesheet" href="/color/jquery.minicolors.css">
@stop

@section('content')
    <div id="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-push-6">
                    <h1 id="title"">title</h1>
                    <p id="about">
                        about
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


<aside id="side-bar">
    {{ Form::open(['route' => 'post.edit', 'files' => 'true']) }}

        @include('edit.id')
        @include('edit.name')
        @include('edit.title')
        @include('edit.about')
        @include('edit.store')
        @include('edit.social')
        @include('edit.analytics')
        @include('edit.copyright')
        @include('edit.screens')
        @include('edit.background')
        @include('edit.phone_color')
        @include('edit.text_color')

        {{ Form::submit('Save Page', ['class'=>'btn btn-primary', 'id'=>'submit', 'data-loading-text'=>'Saving...', 'autocomplete'=>'off']) }}
        {{ link_to_route('dashboard', 'Cancel', null, ['class'=>'btn btn-default', 'id'=>'cancel']) }}

    {{ Form::close() }}
</aside>
@stop

@section('js')
    <script src="/js/EditController.js"></script>
    <script src="/color/jquery.minicolors.min.js"></script>
@stop