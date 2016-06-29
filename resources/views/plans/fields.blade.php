<!-- Name Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('priority', 'Priority:') !!}
    {!! Form::text('priority', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Ldc Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('ldc', 'Ldc:') !!}
	{!! Form::text('ldc', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('type', 'Type:') !!}
	{!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<!-- Length Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('length', 'Length:') !!}
	{!! Form::text('length', null, ['class' => 'form-control']) !!}
</div>

<!-- Rate Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('rate', 'Rate:') !!}
	{!! Form::text('rate', null, ['class' => 'form-control']) !!}
</div>

<!-- Rate 2 Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('rate2', 'Rate 2:') !!}
    {!! Form::text('rate2', null, ['class' => 'form-control']) !!}
</div>


<!-- Etf Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('etf', 'Etf:') !!}
	{!! Form::text('etf', null, ['class' => 'form-control']) !!}
</div>

<!-- Meter Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('meter', 'Meter:') !!}
	{!! Form::text('meter', null, ['class' => 'form-control']) !!}
</div>

<!-- Promo Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('promo', 'Promo:') !!}
	{!! Form::text('promo', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('code', 'Code:') !!}
	{!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
