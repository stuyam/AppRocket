<div class="form-group">
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
</div>