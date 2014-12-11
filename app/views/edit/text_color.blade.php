<?php $data['text_color'] = $data['text_color'] !== null ?: 'black'; ?>
<div class="form-group">
    {{ Form::label('text_color', 'Page Text Color') }}<br />
    <span class="error-display">{{$errors->first('text_color')}}</span>
    <table class="table">
        <tr><td><input {{{ $data['text_color'] == 'black'?'checked=checked':''}}} name="text_color" type="radio" value="black" id="text_color1"> Black</td></tr>
        <tr><td><input {{{ $data['text_color'] == 'white'?'checked=checked':''}}} name="text_color" type="radio" value="white" id="text_color2"> White</td></tr>
    </table>
</div>