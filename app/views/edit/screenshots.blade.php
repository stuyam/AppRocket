<div class="form-group">
    {{ Form::label('image', 'App Screenshot') }}<br />
    <span class="error-display">{{$errors->first('screenshot')}}</span>
    <div class="btn-group btn-group-justified" id="top-row">
        <span class="btn btn-default btn-file" id="image-btn">
            Choose File 1&#42;{{ Form::file('screenshot1', ['required'=>'required', 'id'=>'image']) }}
        </span>
        <span class="btn btn-default btn-file" id="image2-btn">
            Choose File 2{{ Form::file('screenshot2', ['id'=>'image2']) }}
        </span>
    </div>
    <div class="btn-group btn-group-justified" id="bottom-row">
        <span class="btn btn-default btn-file" id="image3-btn">
            Choose File 3{{ Form::file('screenshot3', ['id'=>'image3']) }}
        </span>
        <span class="btn btn-default btn-file" id="image4-btn">
            Choose File 4{{ Form::file('screenshot4', ['id'=>'image4']) }}
        </span>
    </div>
</div>