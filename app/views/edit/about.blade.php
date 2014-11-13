<div class="form-group">
    {{ Form::label('about', 'App Description&#42;') }}<br />
    <span class="error-display">{{$errors->first('about')}}</span>
    <textarea
        class="form-control"
        name="about"
        cols="10"
        rows="6"
        id="about"
        required
        >{{{ $data['about']  }}}
    </textarea>
</div>