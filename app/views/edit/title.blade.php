<div class="form-group">
    {{ Form::label('title', 'App Title&#42;') }}<br />
    <span class="error-display">{{$errors->first('title')}}</span>
    <input
        class="form-control"
        name="title"
        type="text"
        id="title-input"
        value="{{{ $data['title']  }}}"
        required
        >
</div>