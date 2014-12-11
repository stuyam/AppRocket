<div class="form-group">
    {{ Form::label('phone_color', 'Phone Color') }}<br />
    <span class="error-display">{{$errors->first('phone_color')}}</span>
    <select class="form-control" name="phone_color">
        <option value="black" {{{ $data['phone_color'] == 'black'?'selected=selected':''}}}>Black</option>
        <option value="silver" {{{ $data['phone_color'] == 'silver'?'selected=selected':''}}}>Silver</option>
        <option value="gold" {{{ $data['phone_color'] == 'gold'?'selected=selected':''}}}>Gold</option>
        <option value="blue" {{{ $data['phone_color'] == 'blue'?'selected=selected':''}}}>Blue</option>
        <option value="green" {{{ $data['phone_color'] == 'green'?'selected=selected':''}}}>Green</option>
        <option value="red" {{{ $data['phone_color'] == 'red'?'selected=selected':''}}}>Red</option>
        <option value="yellow" {{{ $data['phone_color'] == 'yellow'?'selected=selected':''}}}>Yellow</option>
        <option value="white" {{{ $data['phone_color'] == 'white'?'selected=selected':''}}}>White</option>
    </select>
</div>