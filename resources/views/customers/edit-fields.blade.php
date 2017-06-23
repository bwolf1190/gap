<!-- Account Number -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('acc_num', 'Account #:') !!}
    {!! Form::text('acc_num', null, ['class' => 'form-control']) !!}
</div>

<!-- Fed_Tax_Id_Num Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('Fed_Tax_Id_Num', 'Federal Tax #:') !!}
	{!! Form::text('Fed_Tax_Id_Num', null, ['class' => 'form-control']) !!}
</div>

<!--  Fname Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('fname', 'First:') !!}
	{!! Form::text('fname', null, ['class' => 'form-control']) !!}
</div>

<!--  Lname Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('lname', 'Last:') !!}
    {!! Form::text('lname', null, ['class' => 'form-control']) !!}
</div>

<!--  Sa1 Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('sa1', 'Service Address 1:') !!}
    {!! Form::text('sa1', null, ['class' => 'form-control']) !!}
</div>

<!--  Sa2 Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('sa2', 'Service Address 2:') !!}
    {!! Form::text('sa2', null, ['class' => 'form-control']) !!}
</div>

<!--  Scity Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('scity', 'Service City:') !!}
    {!! Form::text('scity', null, ['class' => 'form-control']) !!}
</div>

<!--  Sstate Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('sstate', 'Service State:') !!}
    {!! Form::text('sstate', null, ['class' => 'form-control']) !!}
</div>

<!--  Szip Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('szip', 'Service Zip:') !!}
    {!! Form::text('szip', null, ['class' => 'form-control']) !!}
</div>

<!--  Ma1 Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('ma1', 'Mailing Address 1:') !!}
    {!! Form::text('ma1', null, ['class' => 'form-control']) !!}
</div>

<!--  Ma2 Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('ma2', 'Mailing Address 2:') !!}
    {!! Form::text('ma2', null, ['class' => 'form-control']) !!}
</div>

<!--  Mcity Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('mcity', 'Mailing City:') !!}
    {!! Form::text('mcity', null, ['class' => 'form-control']) !!}
</div>

<!--  Mstate Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('mstate', 'Mailing State:') !!}
    {!! Form::text('mstate', null, ['class' => 'form-control']) !!}
</div>

<!--  Mzip Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('mzip', 'Mailing Zip:') !!}
    {!! Form::text('mzip', null, ['class' => 'form-control']) !!}
</div>

<!--  Email Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!--  Phone Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['PENDING' => 'PENDING', 'CONFIRMED' => 'CONFIRMED']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>