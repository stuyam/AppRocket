@extends('template')

@section('css')
<link rel="stylesheet" href="/css/app.css">
@stop

@section('content')
<style>
    body{
        <? if(substr($background, 0, 1) === '#')
        {
            echo 'background:'.$background;
        }
        else
        {
            echo "background: url(backgrounds/$background) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;";
        } ?>
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-push-6">
            <h1 id="title" class="{{{ $text_color }}}">{{{ $title }}}</h1>
            <p class="{{{ $text_color }}}">
                {{{ $about }}}
            </p>
            <?php if (empty($store_url))
            {
                echo '<img src="/img/appstore-soon.png" id="store"/>';
            }
            else
            {
                echo '<a href="'.$store_url.'"><img src="/img/appstore.png" id="store"/></a>';
            }
            ?>
        </div>
        <div class="col-md-6 col-md-pull-6">
            <img src="/img/{{{ $phone_color }}}.png" id="device" />
            <div class="fadein">
                <?php
                $images = explode(',', $image);
                foreach($images as $image)
                {
                    echo '<img src="/screens/'.$image.'" class="screen" />';
                }
                ?>
            </div>
            <?php
            if(count($images) > 1)
            {
                echo '<script>var save = true;</script>';
            }
            else
            {
                echo '<script>var save = false;</script>';
            }
            ?>
        </div>
    </div>
</div>
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