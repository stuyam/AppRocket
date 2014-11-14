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


<div id="side-bar">
    <?php
    $value = ['name', 'title', 'about', 'app_store', 'copyright', 'phone_color', 'background', 'text_color'];
    foreach($value as $v)
    {
      if( Input::has($v) )
        $data[$v] = Input::old($v);
      elseif( isset($old_data[$v]) )
        $data[$v] = $old_data[$v];
      else
        $data[$v] = null;
    }?>

    {{ Form::open(['route' => 'post.edit', 'files' => 'true']) }}

        @include('edit.id')
        @include('edit.name')
        @include('edit.title')
        @include('edit.about')
        @include('edit.app_store')
        @include('edit.copyright')
        @include('edit.screenshots')
        @include('edit.background')
        @include('edit.phone_color')
        @include('edit.text_color')

        {{ Form::submit('Save Page', ['class'=>'btn btn-primary', 'id'=>'submit']) }}
        {{ link_to_route('dashboard', 'Cancel', null, ['class'=>'btn btn-default']) }}

    {{ Form::close() }}
</div>
@stop

@section('js')

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