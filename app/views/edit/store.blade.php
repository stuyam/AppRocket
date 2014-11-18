<div class="form-group">
    {{ Form::label('app_store', 'App Store URL') }}<br />
    <span class="error-display">{{$errors->first('app_store')}}</span>
    {{ Form::text('app_store', $data['app_store'], ['placeholder'=>'http://apple.com/1234', 'class'=>'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('google_play', 'Google Play URL') }}<br />
    <span class="error-display">{{$errors->first('google_play')}}</span>
    {{ Form::text('google_play', $data['google_play'], ['placeholder'=>'http://google.com/1234', 'class'=>'form-control']) }}
</div>