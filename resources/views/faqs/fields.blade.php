

<!-- Question Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('question', 'Question:') !!}
	{!! Form::textarea('question', null, ['class' => 'form-control']) !!}
</div>

<!-- Answer Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('answer', 'Answer:') !!}
	{!! Form::textarea('answer', null, ['class' => 'form-control']) !!}
</div>

<!-- Key1 Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('key1', 'Key1:') !!}
	{!! Form::text('key1', null, ['class' => 'form-control']) !!}
</div>

<!-- Key2 Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('key2', 'Key2:') !!}
	{!! Form::text('key2', null, ['class' => 'form-control']) !!}
</div>

<!-- Key3 Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('key3', 'Key3:') !!}
	{!! Form::text('key3', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
