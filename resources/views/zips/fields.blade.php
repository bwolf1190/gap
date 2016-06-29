<!-- Zip Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('zip', 'Zip:') !!}
	{!! Form::text('zip', null, ['class' => 'form-control']) !!}
</div>

<!-- Ldc Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('ldc_id', 'Ldc Id:') !!}
	{!! Form::text('ldc_id', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
