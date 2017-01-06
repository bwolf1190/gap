<!-- Name Field -->
<div class="form-group col-xs-6 col-xs-offset-3">
    {!! Form::label('priority', 'Priority:') !!}
    {!! Form::select('priority', ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-xs-6 col-xs-offset-3">
    {!! Form::label('name', 'Name:') !!}
	{!! Form::select('name', ['Fixed' => 'Fixed', 'Fixed - Last Month Free' => 'Fixed - Last Month Free', 'Fixed - Step Down' => 'Fixed - Step Down', 'Fixed - Step' => 'Fixed - Step', 'Fixed - Last Month Half Price' => 'Fixed - Last Month Half Price', 'Fixed GS' => 'Fixed GS', 'Fixed GM' => 'Fixed GM', 'Fixed GSCM' => 'Fixed GSCM', 'Fixed GS1' => 'Fixed GS1', 'Fixed GS3' => 'Fixed GS3', 'Variable GS3' => 'Variable GS3']) !!}
</div>

<!-- Ldc Field -->
<div class="form-group col-xs-6 col-xs-offset-3">
    {!! Form::label('ldc', 'Ldc:') !!}
	{!! Form::select('ldc', ['BGE' => 'BGE', 'Delmarva' => 'Delmarva', 'Duke' => 'Duke', 'Duquesne' => 'Duquesne', 'MetEd' => 'MetEd', 'PECO' => 'PECO', 'PEPCO' => 'PEPCO', 'PPL' => 'PPL']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-xs-6 col-xs-offset-3">
    {!! Form::label('type', 'Type:') !!}
	{!! Form::select('type', ['Residential' => 'Residential', 'Commercial' => 'Commercial']) !!}
</div>

<!-- Length Field -->
<div class="form-group col-xs-6 col-xs-offset-3">
    {!! Form::label('length', 'Length:') !!}
	{!! Form::number('length', null, ['class' => 'form-control']) !!}
</div>

<!-- Rate Field -->
<div class="form-group col-xs-6 col-xs-offset-3">
    {!! Form::label('rate', 'Rate:') !!}
	{!! Form::text('rate', null, ['class' => 'form-control']) !!}
</div>

<!-- Rate 2 Field -->
<div class="form-group col-xs-6 col-xs-offset-3">
    {!! Form::label('rate2', 'Rate 2:') !!}
    {!! Form::text('rate2', null, ['class' => 'form-control']) !!}
</div>

<!-- Etf Field -->
<div class="form-group col-xs-6 col-xs-offset-3">
    {!! Form::label('etf', 'ETF:') !!}
	{!! Form::select('etf', ['No Early Cancellation Fee' => 'No Early Cancellation Fee', 'Cancellation Fee Applies' => 'Cancellation Fee Applies']) !!}
</div>

<!-- Etf Description Field -->
<div class="form-group col-xs-6 col-xs-offset-3">
    {!! Form::label('etf_description', 'ETF Description:') !!}
    {!! Form::textarea('etf_description', null, ['class' => 'form-control']) !!}
</div>

<!-- Meter Field -->
<div class="form-group col-xs-6 col-xs-offset-3">
    {!! Form::label('meter', 'Meter:') !!}
	{!! Form::text('meter', null, ['class' => 'form-control']) !!}
</div>

<!-- Promo Field -->
<div class="form-group col-xs-6 col-xs-offset-3">
    {!! Form::label('promo', 'Promo:') !!}
	{!! Form::select('promo', ['' => null, 'ENERGYBOB' => 'ENERGYBOB', 'FRONTLINE' => 'FRONTLINE', 'IRONPIGS' => 'IRONPIGS', 'NPE' => 'NPE', 'WMS' => 'WMS']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-xs-6 col-xs-offset-3">
    {!! Form::label('code', 'Code:') !!}
	{!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Code Field -->
<div class="form-group col-xs-6 col-xs-offset-3">
    {!! Form::label('price_code', 'Price Code:') !!}
    {!! Form::text('price_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-xs-3 col-xs-offset-3">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>


<style>

select{
    height:30px;
    width:100%;
    border-radius: 5px;
}

textarea{
    height:60px !important;
}

</style>