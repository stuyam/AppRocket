<div class="form-group">
    {{ Form::label('analytics', 'Google Analytics') }}<br />
    <span class="error-display">{{$errors->first('analytics')}}</span>
    {{ Form::text('analytics', $data['analytics'], ['placeholder'=>'UA-XXXXX-X', 'class'=>'form-control']) }}
</div>