<div id="sign-up">
	<div id='form-group-1' class='fade-in col-md-8'>
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
		<div class='form-group'>
			{!! Form::hidden('promo', $promo) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('acc_num', $ldc->customer_identifier) !!} <a href="#" id="acc-num-tooltip" data-toggle="popover" data-content="{{ $ldc->format_criteria_1 }} digit number {{ $ldc->hint }}" data-placement="right"><span class="glyphicon glyphicon-question-sign"></span></a>
			{!! Form::text('acc_num', 'default', ['class' => 'form-control']) !!}
		</div>

		<!-- P2C enrollments must have Federal_Tax_Num for Commercial Enrollments --> 
		@if($plan->type == "Commercial")
			<div class="form-group ">
				{!! Form::label('Federal_Tax_Id_Num', 'Federal Tax Id #') !!}
				{!! Form::text('Federal_Tax_Id_Num', '564456465', ['class' => 'form-control']) !!}
			</div>
			<div class="form-group ">
				{!! Form::label('fname', 'Company Name') !!}
				{!! Form::text('fname', 'Brett Inc.', ['class' => 'form-control']) !!}
			</div>
			<div class="form-group" style="visibility:hidden">
				{!! Form::label('lname', 'Last Name') !!}
				{!! Form::text('lname', 'P2C', ['class' => 'form-control']) !!}
			</div>
		@else
			<div class="form-group ">
				{!! Form::label('fname', 'First Name') !!}
				{!! Form::text('fname', 'Brett', ['class' => 'form-control']) !!}
			</div>
			<div class="form-group ">
				{!! Form::label('lname', 'Last Name') !!}
				{!! Form::text('lname', 'Wolverton', ['class' => 'form-control']) !!}
			</div>
		@endif
		<!-- //////////////////////////////////////////////////////////////////// --> 
		
		<div id='enroll_btns' class="form-group">
			<button id='next1' name="next1" type="button" class="next btn btn-default glyphicon glyphicon-arrow-right col-xs-3 col-xs-offset-5 fade-in-slow"></button>
		</div>
	</div>
	<div id='form-group-2' class='fade-in col-md-8'>
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
			<button id='previous2' name="previous2" type="button" class="previous btn btn-default glyphicon glyphicon-arrow-left col-xs-3 col-xs-offset-2 fade-in-slow"></button>
			<button id='next2' name="next2" type="button" class="next btn btn-default glyphicon glyphicon-arrow-right col-xs-3 col-xs-offset-2 fade-in-slow"></button>
		</div>
	</div>
	<div id='form-group-3' class='fade-in col-md-8'>
		<div class="form-title"><h3 class='form-group'>Mailing Information</h3></div>
		<div class="form-group">
			{!! Html::image('images/progress-step-3.png') !!}
		</div>
		<div class="form-group ">
			<div class="checkbox">
				<label><input id="same_address" name="same_address" type="checkbox" value="checked">Same Address</label>
			</div>
		</div>
		<div class="form-group ">
			{!! Form::label('ma1', 'Mailing Address Line 1') !!}
			{!! Form::text('ma1', '14009 Juniper Street', ['class' => 'form-control']) !!}
		</div>
		<div class="form-group ">
			{!! Form::label('ma2', 'Mailing Address Line 2') !!}
			{!! Form::text('ma2', 'Apartment 1', ['class' => 'form-control']) !!}
		</div>
		<div class="form-group ">
			{!! Form::label('mcity', 'Mailing City') !!}
			{!! Form::text('mcity', 'Kansas City', ['class' => 'form-control']) !!}
		</div>
		<div class="form-group ">
			{!! Form::label('mstate', 'Mailing State') !!}
			{!! Form::text('mstate', $state, ['class' => 'form-control']) !!}
		</div>
		<div class="form-group ">
			{!! Form::label('mzip', 'Mailing Zip') !!}
			{!! Form::text('mzip', $zip, ['class' => 'form-control']) !!}
		</div>
		<div id='enroll_btns' class="form-group">
			<button id='previous3' name="previous3" type="button" class="previous btn btn-default glyphicon glyphicon-arrow-left col-xs-3 col-xs-offset-2 fade-in-slow"></button>
			<button id='next3' name="next3" type="button" class="next btn btn-default glyphicon glyphicon glyphicon-arrow-right col-xs-3 col-xs-offset-2 fade-in-slow"></button>
		</div>
	</div>
	<div id='form-group-4' class='fade-in col-md-8'>
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

		@if($promo !== null)
			<div class="form-group ">
				{!! Form::label('agent_code', 'Agent Code') !!}
				{!! Form::text('agent_code', $promo, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group ">
				{!! Form::label('sub_agent_code', 'Sub Agent Code') !!}
				{!! Form::text('sub_agent_code', '', ['class' => 'form-control']) !!}
			</div>
		@endif

		@if($type === 'internal')
			<div class="form-group ">
				{!! Form::label('agent_code', 'Agent Code') !!}
				{!! Form::text('agent_code', '', ['class' => 'form-control']) !!}
			</div>
		@endif

		<div id="terms-container" class="form-group">
			<div class="checkbox">
				<label><input id="terms_conditions" name="terms_conditions" type="checkbox" value="checked"><a id="terms-link" target="_blank" href="{!! URL::asset("pdf/disclosure-statements/Great-American-Power-Disclosure-Statement-" . $plan->ldc . ".pdf") !!}">Accept Terms & Conditions</a></label>
			</div>
		</div>

		<div id="optin-container">
			<div class="form-group">
				{!! Form::label('optin', 'Receive offers from Great American Power') !!}
				{!! Form::checkbox('optin', 'checked',['class' => 'form-control']) !!}
			</div>
		</div>

		<style>
			.fileUpload {
			    position: relative;
			    overflow: hidden;
			}
			.fileUpload input.upload {
			    position: absolute;
			    top: 0;
			    right: 0;
			    margin: 0;
			    padding: 0;
			    font-size: 20px;
			    cursor: pointer;
			    opacity: 0;
			    filter: alpha(opacity=0);
			}
		</style>

		@if($promo !== null)
			<div id="upload-container" class="form-group">
				<div class="fileUpload btn btn-primary">
				    <span id="upload-label">Upload File</span>
				    <input type="file" name="file" id="upload-btn" class="upload" onchange="$('#filename').html($(this).val().slice(12) + ' added.'); $('#upload-label').hide();" />
				</div>
			</div>
			<div class="form-group">
				<span id="filename"></span>
			</div>
		@endif

		<div class='form-group'>
			{!! Form::hidden('plan_id', $plan->id) !!}
			{!! Form::hidden('type', $type) !!}
		</div>
		<div id='enroll_btns' class="form-group">
			<div id="previous-container">
				<button id='previous4' name="previous4" type="button" class="previous btn btn-default glyphicon glyphicon-arrow-left col-xs-3 col-xs-offset-2 fade-in-slow"></button>
			</div>
			<div class='col-xs-3 col-xs-offset-2 fade-in-slow'>
				{!! Form::submit('Finish', ['class' => 'btn btn-default', 'id' => 'submit', 'name' => 'submit']) !!}
				<span id='loading-div' class=''>{!! Html::image('images/default.gif', 'loading-wheel',array('class' => 'img-responsive')) !!}</span>
			</div>
		</div>
	</div>
	<div id="chosen-plan" class="col-md-3 chosen-plan float-shadow fade-in">
		<div class="price_table_container">
			<div class="price_table_heading">{!! $plan->ldc !!}</div>
			<div class="price_table_body">
				<div class="price_table_row cost"><strong><p>{!! $plan->rate !!}
					@if($plan->rate2 !== "")
					<br> {!! $plan->rate2 !!}
					@endif
				/kWh</p></strong></div>
				<div class="price_table_row"><strong>{!! $plan->length . " Months" !!}</strong></div>
				<div class="price_table_row"><strong>{!! $plan->type !!}</strong></div>
				<div class="price_table_row etf last_row">
					<strong>{!! $plan->etf !!}</strong>
					<a href="#" id="acc-num-tooltip" data-toggle="popover" data-content="{{ $plan->etf_description }}" data-placement="right"><span class="glyphicon glyphicon-question-sign"></span></a>
				</div>
				
			</div>
			<div id="change-plan" class="sign-up-container">
				<a href="{!! URL::previous() !!}">Change</a>
			</div>
		</div>
	</div>
	<!--  <script type="text/javascript">$(".chosen-plan").hide();</script>  -->
	@section('powered-by-gap')
	<div class="fade-in">
		@if($promo !== null)
	        <div id="" class="fade-in" style="max-width:400px; margin:0 auto;">
	            {!! Html::image('images/powered-by-gap-trans.png', '', array('class' => 'form-group fade-in')) !!}
	        </div>
		@endif
	</div>
	@endsection
</div>