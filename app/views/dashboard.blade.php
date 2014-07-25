@extends('template')

@section('css')
<link rel="stylesheet" href="/css/dashboard.css">
@stop

@section('content')
<div id="box">
    <table class="table">
        @foreach ($pages as $page)
        <tr>
            <td>
                <a href="/{{{ $page->name }}}">{{{ $page->title }}}</a>
                <button type="button" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-pencil"></span> Edit
                </button>
                <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">
                    <span class="glyphicon glyphicon-trash"></span> Delete
                </button>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                <button type="button" class="btn btn-danger">Delete Page</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
    <a href="/create"><button type="button" class="btn btn-primary full-width">Create New Rocket Page</button></a>
</div>
@stop