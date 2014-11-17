<div class="form-group">
    {{ Form::label('image', 'App Screenshot') }}<br />
    <span class="error-display">{{$errors->first('screen-0')}}</span>
    <div class="btn-group btn-group-justified" id="top-row">
        <span class="btn btn-default btn-file" id="screen-0-btn">
            Choose File 1&#42;{{ Form::file('screen-0', ['id'=>'screen-0']) }}
            {{ Form::hidden('screen-0-meta', $data['screen-0-meta']) }}
        </span>
        <span class="btn btn-default btn-file" id="screen-1-btn">
            Choose File 2{{ Form::file('screen-1', ['id'=>'screen-1']) }}
            {{ Form::hidden('screen-1-meta', $data['screen-1-meta']) }}
        </span>
    </div>
    <div class="btn-group btn-group-justified" id="bottom-row">
        <span class="btn btn-default btn-file" id="screen-2-btn">
            Choose File 3{{ Form::file('screen-2', ['id'=>'screen-2']) }}
            {{ Form::hidden('screen-2-meta', $data['screen-2-meta']) }}
        </span>
        <span class="btn btn-default btn-file" id="screen-3-btn">
            Choose File 4{{ Form::file('screen-3', ['id'=>'screen-3']) }}
            {{ Form::hidden('screen-3-meta', $data['screen-3-meta']) }}
        </span>
    </div>
</div>