<!-- Name Field -->
<div class="form-group">
    {!! Form::label('Name', 'Name:') !!}
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

<!-- Question Field -->
<div class="form-group">
    {!! Form::label('Question', 'Message:') !!}
	{!! Form::textarea('question', null, ['class' => 'form-control']) !!}
</div>

<!-- Notes Field -->
<div class="form-group">
    {!! Form::label('notes', 'Notes:') !!}
	{!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['OPEN' => 'OPEN', 'CLOSED' => 'CLOSED']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary submit', 'id' => 'submit']) !!}
</div>
