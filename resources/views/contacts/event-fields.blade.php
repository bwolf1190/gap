<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', 'Phone:') !!}
	{!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
	{!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Inquiry Field -->
<div class="form-group">
    {!! Form::label('inquiry', 'Inquiry:') !!}
	{!! Form::textarea('inquiry', null, ['class' => 'form-control']) !!}
</div>

<div id="pot" class="form-group">
	{!! Form::hidden('honey', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
	{!! Form::submit('Submit', ['class' => 'btn btn-primary submit', 'id' => 'submit']) !!}
</div>
