

<div id="sign-up">

	<div id='form-group-1' class='fade-in'>
		<div class="form-title"><h3 class='form-group'>Personal Information</h3></div>
		<div class="form-group">

			{!! Html::image('images/progress-step-1.png') !!}

		</div>

		<div class='form-group'>
			{!! Form::hidden('format_criteria_1', $ldc->format_criteria_1) !!}
		</div>

		<div class='form-group'>
			{!! Form::hidden('format_criteria_2', $ldc->format_criteria_2) !!}
		</div>

		<div class="form-group ">
		     {!! Form::label('acc_num', $ldc->customer_identifier) !!} <a href="#" id="acc-num-tooltip" data-toggle="tooltip" title="{{ $ldc->hint }}" data-placement="top"><span class="glyphicon glyphicon-question-sign"></span></a>
			{!! Form::text('acc_num', 'default', ['class' => 'form-control']) !!}
		</div>

		<div class="form-group ">
		     {!! Form::label('fname', 'First Name') !!}
			{!! Form::text('fname', 'Brett', ['class' => 'form-control']) !!}
		</div>

		<div class="form-group ">
		     {!! Form::label('lname', 'Last Name') !!}
			{!! Form::text('lname', 'Wolverton', ['class' => 'form-control']) !!}
		</div>
		
		<div id='enroll_btns' class="form-group">
			<button id='next' type="button" class="next btn btn-default glyphicon glyphicon-arrow-right col-xs-3 col-xs-offset-5 fade-in-slow"></button>
		</div>
	</div>

	<div id='form-group-2' class='fade-in'>
		<div class="form-title"><h3 class='form-group'>Service Information</h3></div>
		<div class="form-group">

			{!! Html::image('images/progress-step-2.png') !!}

		</div>
		<div class="form-group ">
		     {!! Form::label('sa1', 'Service Address Line 1') !!}
			{!! Form::text('sa1', '14009 Juniper Street', ['class' => 'form-control']) !!}
		</div>

		<div class="form-group ">
		     {!! Form::label('sa2', 'Service Address Line 2') !!}
			{!! Form::text('sa2', 'Apartment 1', ['class' => 'form-control']) !!}
		</div>

		<div class="form-group ">
		     {!! Form::label('scity', 'Service City') !!}
			{!! Form::text('scity', 'Kansas City', ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
		     {!! Form::label('sstate', 'Service State') !!}
			{!! Form::text('sstate', $state, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group ">
		     {!! Form::label('szip', 'Service Zip') !!}
			{!! Form::text('szip', $zip, ['class' => 'form-control']) !!}
		</div>
		<div id='enroll_btns' class="form-group">

			<button id='previous' type="button" class="previous btn btn-default glyphicon glyphicon-arrow-left col-xs-3 col-xs-offset-2 fade-in-slow"></button>
			<button id='next' type="button" class="next btn btn-default glyphicon glyphicon-arrow-right col-xs-3 col-xs-offset-2 fade-in-slow"></button>
		</div>
	</div>

	<div id='form-group-3' class='fade-in'>
		<div class="form-title"><h3 class='form-group'>Mailing Information</h3></div>
		<div class="form-group">

			{!! Html::image('images/progress-step-3.png') !!}

		</div>
		<div class="form-group ">
		    <div class="checkbox">
				<label><input id="check-same" name="same_address" type="checkbox" value="checked">Same Address</label>
			</div>
		</div>

		<div class="form-group ">
		     {!! Form::label('ma1', 'Mailing Address Line 1') !!}
			{!! Form::text('ma1', '', ['class' => 'form-control']) !!}
		</div>

		<div class="form-group ">
		     {!! Form::label('ma2', 'Mailing Address Line 2') !!}
			{!! Form::text('ma2', '', ['class' => 'form-control']) !!}
		</div>

		<div class="form-group ">
		     {!! Form::label('mcity', 'Mailing City') !!}
			{!! Form::text('mcity', '', ['class' => 'form-control']) !!}
		</div>

		<div class="form-group ">
		     {!! Form::label('mstate', 'Mailing State') !!}
			{!! Form::text('mstate', '', ['class' => 'form-control']) !!}
		</div>

		<div class="form-group ">
		     {!! Form::label('mzip', 'Mailing Zip') !!}
			{!! Form::text('mzip', '', ['class' => 'form-control']) !!}
		</div>
		<div id='enroll_btns' class="form-group">

			<button id='previous' type="button" class="previous btn btn-default glyphicon glyphicon-arrow-left col-xs-3 col-xs-offset-2 fade-in-slow"></button>
			<button id='next' type="button" class="next btn btn-default glyphicon glyphicon glyphicon-arrow-right col-xs-3 col-xs-offset-2 fade-in-slow"></button>
		</div>
	</div>



	<div id='form-group-4' class='fade-in'>
		<div class="form-title"><h3 class='form-group'>Contact Information</h3></div>
		<div class="form-group">

			{!! Html::image('images/progress-step-4.png') !!}

		</div>
		<div class="form-group ">
		     {!! Form::label('email', 'Email') !!}
			{!! Form::email('email', 'bwolverton@greatamericanpower.com', ['class' => 'form-control']) !!}
		</div>
		<div class="form-group ">
		     {!! Form::label('confirm_email', 'Confirm Email') !!}
			{!! Form::email('confirm_email', 'bwolverton@greatamericanpower.com', ['class' => 'form-control']) !!}
		</div>

		<div class="form-group ">
		     {!! Form::label('phone', 'Phone') !!}
			{!! Form::text('phone', '8162104584', ['class' => 'form-control']) !!}
		</div>

		<div class='form-group'>
			{!! Form::hidden('plan_id', $plan) !!}
		</div>

		<div id='enroll_btns' class="form-group">

				<button id='previous' type="button" class="previous btn btn-default glyphicon glyphicon-arrow-left col-xs-3 col-xs-offset-2 fade-in-slow"></button>
				<div class='col-xs-3 col-xs-offset-2 fade-in-slow'>
					{!! Form::submit('Finish', ['class' => 'btn btn-default', 'id' => 'submit']) !!}

					<span id='loading-div' class=''>{!! Html::image('images/default.gif', 'loading-wheel',array('class' => 'img-responsive')) !!}</span>
				</div>

		</div>

	</div>

	@section('powered-by-gap')
		<div class="fade-in">
		    @if($promo !== null)
			    <div id="powered-by-gap" class="form-group">
			            {!! Html::image('images/powered-by-gap-trans.png', 'footer-brand-img', array('class' => 'img-responsive')) !!}
			    </div>   
		    @endif
		</div>

	@endsection


</div>

