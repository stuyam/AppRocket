<div class="form-group">
    {{ Form::label('background', 'Page Background') }}
    <span class="error-display">{{$errors->first('background')}}</span>
    <table class="table" id="background-table">
        <tr>
            <td>
                <input name="back_option" type="radio" value="image" id="back-radio1">
                <span class="btn btn-default btn-file" id="background-button">
                    Choose Image{{ Form::file('background', ['id'=>'background-choose']) }}
                </span>
            </td>
        </tr>
        <tr>
            <td>
                <input checked="checked" name="back_option" type="radio" value="color" id="back-radio2">
                <input type="text" name="background_color" id="color" class="form-control" data-control="wheel" value="{{{ Input::old('email') or '#ffffff' }}}">
            </td>
        </tr>
    </table>
</div>