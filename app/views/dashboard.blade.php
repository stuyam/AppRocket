@extends('template')

@section('css')
<link rel="stylesheet" href="/css/dashboard.css">
@stop

@section('content')
{{ Session::get('message') ? '<div class="alert alert-success" role="alert">'.Session::get('message').'</div>' :'' }}
<div id="box">
    <table class="table">
        @foreach ($pages as $page)
        <?php
            $data = json_decode($page->data, true);
        ?>
        <tr>
            <td>
                <a href="/{{{ $page->name }}}">{{{ $data['title'] }}}</a>

                <button class="btn btn-default btn-sm pull-right" data-toggle="modal" data-target="#modal-{{ $page->id }}">
                    <span class="glyphicon glyphicon-trash"></span> Delete
                </button>
                <a href="/{{{ $page->name }}}/edit" class="btn btn-default btn-sm pull-right">
                    <span class="glyphicon glyphicon-pencil"></span> Edit
                </a>
                <!-- Modal -->
                <div class="modal fade" id="modal-{{ $page->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-{{ $page->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete your App page {{{ $page->title }}}?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                {{ link_to($page->id.'/delete', 'Delete Page', ['class'=>'btn btn-danger']) }}
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
    {{ link_to_route('edit', 'Create New Rocket Page', null, ['class'=>'btn btn-primary full-width']) }}
</div>
@stop