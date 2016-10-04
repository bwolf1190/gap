<!-- Enroll Date Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('enroll_date', 'Enroll Date:') !!}
	{!! Form::text('enroll_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Confirm Date Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('confirm_date', 'Confirm Date:') !!}
	{!! Form::text('confirm_date', null, ['class' => 'form-control']) !!}
</div>

<!-- P2C Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('p2c', 'P2C:') !!}
	{!! Form::text('p2c', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('status', 'Status:') !!}
	{!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>





