<div class="form-group">
  {{ Form::label('email','Email:') }}
  {{ Form::text('email',null,['placeholder'=>'name@example.com', 'class'=>'form-control']) }}
</div>

<div class="form-group">
  {{ Form::label('password','Password:') }}
  {{ Form::password('password',['placeholder'=>'&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;', 'class'=>'form-control']) }}
</div>