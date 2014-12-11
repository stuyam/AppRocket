<div class="form-group">
    {{ Form::label('copyright', 'Copyright&#42;') }}<br />
    <span class="error-display">{{$errors->first('copyright')}}</span>
    {{ Form::text('copyright', $data['copyright'],['class'=>'form-control', 'required'=>'required']) }}
</div>