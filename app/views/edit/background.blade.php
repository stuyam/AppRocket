<?php
if( substr($data['background'], 0, 1) == '#')
    $data['background_color'] = $data['background'];
else
    $data['background_image'] = $data['background'];
?>

<div class="form-group">
    {{ Form::label('background', 'Page Background') }}
    <span class="error-display">{{$errors->first('background')}}</span>
    <table class="table" id="background-table">
        <tr>
            <td>
                <input checked="checked" name="back_option" type="radio" value="color" id="back-radio2">
                <input type="text" name="background_color" id="color" class="form-control" data-control="wheel" value="{{{ $data['background_color'] or '#ffffff' }}}">
            </td>
        </tr>
        <tr>
            <td>
                <input name="back_option" type="radio" value="image" id="back-radio1">
                <span class="btn btn-default btn-file" id="background-button">
                    Choose Image{{ Form::file('background_image', ['id'=>'background-choose']) }}
                </span>
                <input name="blur" id="blur-input" type="range" min="0" max="20" step=".2" value="0">
            </td>
        </tr>
    </table>
</div>