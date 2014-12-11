<div class="form-group">
    {{ Form::label('name', 'Unique Page Name&#42;') }}<br />
    <span class="error-display">{{$errors->first('name')}}</span>
    {{ Form::text('name', $data['name'], ['placeholder'=>'name', 'class'=>'form-control', 'required'=>'required']) }}
</div>