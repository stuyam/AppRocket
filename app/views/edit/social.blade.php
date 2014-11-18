<div class="form-group">
    {{ Form::label('facebook', 'Facebook URL') }}<br />
    <span class="error-display">{{$errors->first('facebook')}}</span>
    {{ Form::text('facebook', $data['facebook'], ['placeholder'=>'http://facebook.com/1234', 'class'=>'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('twitter', 'Twitter URL') }}<br />
    <span class="error-display">{{$errors->first('twitter')}}</span>
    {{ Form::text('twitter', $data['twitter'], ['placeholder'=>'http://twitter.com/1234', 'class'=>'form-control']) }}
</div>