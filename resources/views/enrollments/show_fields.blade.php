<!-- Enroll Date Field -->
<div class="form-group">
    {!! Form::label('enroll_date', 'Enroll Date:') !!}
    <p>{!! $enrollment->enroll_date !!}</p>
</div>

<!-- Confirm Date Field -->
<div class="form-group">
    {!! Form::label('confirm_date', 'Confirm Date:') !!}
    <p>{!! $enrollment->confirm_date !!}</p>
</div>

<!-- P2C Field -->
<div class="form-group">
    {!! Form::label('p2c', 'P2C:') !!}
    <p>{!! $enrollment->p2c !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $enrollment->status !!}</p>
</div>

