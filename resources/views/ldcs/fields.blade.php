<!-- Ldc Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('ldc', 'Ldc:') !!}
	{!! Form::text('ldc', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('customer_identifier', 'Customer Identifier:') !!}
	{!! Form::text('customer_identifier', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('format_criteria_1', 'Format Criteria 1:') !!}
	{!! Form::text('format_criteria_1', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('format_criteria_2', 'Format Criteria 2:') !!}
	{!! Form::text('format_criteria_2', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
