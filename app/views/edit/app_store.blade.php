<div class="form-group">
    {{ Form::label('app_store', 'App Store URL') }}<br />
    <span class="error-display">{{$errors->first('app_store')}}</span>
    {{ Form::text('app_store', $data['app_store'],['placeholder'=>'http://apple.com/23423412412', 'class'=>'form-control']) }}
</div>