<div id="sign-up">
	<div id='form-group-1' class='col-md-8'>
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
		@if($plan->commodity == 'electric')
			{!! Form::label('acc_num', $ldc->customer_identifier) !!} <a href="#" id="acc-num-tooltip" data-toggle="popover" data-content="{{ $ldc->format_criteria_1 }} digit number {{ $ldc->hint }}" data-placement="right"><span class="glyphicon glyphicon-question-sign"></span></a>
			{!! Form::text('acc_num', '', ['class' => 'form-control']) !!}
		@else
			{!! Form::label('acc_num', $ldc->customer_identifier) !!} <a href="#" id="acc-num-tooltip" data-toggle="popover" data-content="{{ $ldc->format_criteria_1 }} digit number {{ $ldc->hint }}" data-placement="right"><span class="glyphicon glyphicon-question-sign"></span></a>
			{!! Form::text('acc_num', '', ['class' => 'form-control']) !!}
		@endif
		</div>

		<!-- P2C enrollments must have Federal_Tax_Num for Commercial Enrollments --> 
		@if($plan->type == "Commercial")
			<div class="form-group ">
				{!! Form::label('fname', 'First Name') !!}
				{!! Form::text('fname', '', ['class' => 'form-control']) !!}
			</div>
			<div class="form-group ">
				{!! Form::label('lname', 'Last Name') !!}
				{!! Form::text('lname', '', ['class' => 'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('Federal_Tax_Id_Num', 'Federal Tax Id #') !!}
				{!! Form::text('Federal_Tax_Id_Num', '', ['class' => 'form-control', 'id' => 'federal_tax_id_num']) !!}
			</div>
		@else
			<div class="form-group ">
				{!! Form::label('fname', 'First Name') !!}
				{!! Form::text('fname', '', ['class' => 'form-control']) !!}
			</div>
			<div class="form-group ">
				{!! Form::label('lname', 'Last Name') !!}
				{!! Form::text('lname', '', ['class' => 'form-control']) !!}
			</div>
		@endif
		<!-- //////////////////////////////////////////////////////////////////// --> 
		
		<div id='enroll_btns' class="form-group">
			<button id='previous1' name="previous1" type="button" class="previous btn btn-default col-xs-3 col-xs-offset-2" onclick="history.go(-1);">Back</button>
			<button id='next1' name="next1" type="button" class="next btn btn-default col-xs-3 col-xs-offset-2">Next</button>
		</div>
	</div>
	<div id='form-group-2' class='col-md-8'>
		<div class="form-title"><h3 class='form-group'>Service Information</h3></div>
		<div class="form-group">
			{!! Html::image('images/progress-step-2.png') !!}
		</div>
		<div class="form-group ">
			{!! Form::label('sa1', 'Service Address Line 1') !!}
			{!! Form::text('sa1', '', ['class' => 'form-control']) !!}
		</div>
		<div class="form-group ">
			{!! Form::label('sa2', 'Service Address Line 2') !!}
			{!! Form::text('sa2', '', ['class' => 'form-control']) !!}
		</div>
		<div class="form-group ">
			{!! Form::label('scity', 'Service City') !!}
			{!! Form::text('scity', '', ['class' => 'form-control']) !!}
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
			<button id='previous2' name="previous2" type="button" class="previous btn btn-default col-xs-3 col-xs-offset-2">Back</button>
			<button id='next2' name="next2" type="button" class="next btn btn-default col-xs-3 col-xs-offset-2">Next</button>
		</div>
	</div>
	<div id='form-group-3' class='col-md-8'>
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
			<button id='previous3' name="previous3" type="button" class="previous btn btn-default col-xs-3 col-xs-offset-2">Back</button>
			<button id='next3' name="next3" type="button" class="next btn btn-default col-xs-3 col-xs-offset-2">Next</button>
		</div>
	</div>
	<div id='form-group-4' class='col-md-8'>
		<div class="form-title"><h3 class='form-group'>Contact Information</h3></div>
		<div class="form-group">
			{!! Html::image('images/progress-step-4.png') !!}
		</div>
		<div class="form-group ">
			{!! Form::label('email', 'Email') !!}
			{!! Form::email('email', '', ['class' => 'form-control']) !!}
		</div>
		<div class="form-group ">
			{!! Form::label('confirm_email', 'Confirm Email') !!}
			{!! Form::email('confirm_email', '', ['class' => 'form-control']) !!}
		</div>
		<div class="form-group ">
			{!! Form::label('phone', 'Phone') !!}
			{!! Form::text('phone', '', ['class' => 'form-control']) !!}
		</div>

		@if($promo !== null && $promo != 'GAP')
			<div class="form-group ">
				{!! Form::label('agent_code', 'Agent Code') !!}
				{!! Form::text('agent_code', $promo, ['class' => 'form-control','readonly' => true]) !!}
			</div>
			<div class="form-group ">
				{!! Form::label('sub_agent_code', 'Sub Agent Code') !!}
				{!! Form::text('sub_agent_code', '', ['class' => 'form-control']) !!}
			</div>
		@endif

		@if($promo == 'GAP')
			<div class="form-group ">
				{!! Form::hidden('agent_code', $promo) !!}
			</div>
			<div class="form-group ">
				{!! Form::hidden('sub_agent_code', '') !!}
			</div>
		@endif

		@if($type === 'internal')
			<div class="form-group ">
				{!! Form::label('agent_code', 'Agent Code') !!}
				{!! Form::text('agent_code', '', ['class' => 'form-control']) !!}
			</div>
		@endif

		<div id="optin-container">
			<div class="form-group" style='font-size:.85em;'>
				{!! Form::checkbox('optin', 'checked',['class' => 'form-control']) !!}
				{!! Form::label('optin', 'Receive offers from Great American Power') !!}
			</div>
		</div>

		<div id="terms-container" class="form-group">
			<div class="checkbox">
				<label style='font-size:.85em;'><input id="terms_conditions" name="terms_conditions" type="checkbox" value="checked"><a id="terms-link" target="_blank" href="{!! URL::asset("pdf/disclosure-statements/Great-American-Power-Disclosure-Statement-" . $plan->ldc . ".pdf?v=1") !!}">Accept Terms & Conditions</a></label>
			</div>
		</div>

		<style>
		#upload-container{
			display:none;
		}
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
			{!! Form::hidden('honey', '') !!}
		</div>
		<div id='enroll_btns' class="form-group">
			<div id="previous-container">
				<button id='previous4' name="previous4" type="button" class="previous btn btn-default col-xs-3 col-xs-offset-2">Back</button>
			</div>
			<div class=''>
				{!! Form::submit('Finish', ['class' => 'btn btn-default col-xs-3 col-xs-offset-2', 'id' => 'submit', 'name' => 'submit']) !!}
				<span id='loading-div' class=''>{!! Html::image('images/default.gif', 'loading-wheel',array('class' => 'img-responsive')) !!}</span>
			</div>
		</div>
	</div>
	<div id="chosen-plan" class="col-md-3 chosen-plan float-shadow fade-in">
              <div class="price_table_container" style="margin-top:0px;">

                        @if($plan->green == 'GREEN')
                            <div class="price_table_heading green">{!! $plan->ldc !!}</div>
                        @else
                            <div class="price_table_heading">{!! $plan->ldc !!}</div>
                        @endif

                        @if($plan->green == 'GREEN')
                            <div id="green" class="price_table_heading commodity">100% Green {!! $plan->commodity !!}
                                <a href="#" id="green-energy-tooltip" data-container="body" data-html="true" data-content="{{ $plan->reward_description }}" data-placement="bottom"><span class="glyphicon glyphicon-leaf"></span></a>
                            </div>
                        @else
                            <div class="price_table_heading commodity">{!! $plan->commodity !!}</div>
                        @endif

                       <div class="price_table_body">
                      
                      @if($plan->rate2 == "")
                        <div class="price_table_row cost"><strong><p style="padding-top:25px;">{!! $plan->rate !!} 
                      @else
                        <div class="price_table_row cost"><strong><p>{!! $plan->rate !!} 
                      @endif
                      
                      @if($plan->rate2 !== "")
                        <br> {!! $plan->rate2 !!}  
                      @endif

                      </p></strong></div>

                      <div class="price_table_row name" style="height"><strong>{!! $plan->length . " Month " . $plan->name !!}</strong></div>
                      @if($plan->meter != "")
                        <div class="price_table_row"><strong>{!! $plan->meter . " Meter" !!}</strong></div>
                      @endif
                      @if($plan->reward != "")
                      <div class="price_table_row reward">
                        <a href="{{ $plan->reward_link }}" title="Click for more information" target="_blank">{!! $plan->reward !!}</a>
                        <a href="#" id="acc-num-tooltip" data-toggle="popover" data-content="{{ $plan->reward_description }}" data-placement="bottom"><span class="glyphicon glyphicon-question-sign"></span></a>
                      </div>
                      @endif
                     <div class="price_table_row etf last_row">
                          	<div>
                          		<strong>{!! $plan->etf !!}</strong>
                          		<a href="#" id="acc-num-tooltip" data-toggle="popover" data-content="{{ $plan->etf_description }}" data-placement="bottom"><span class="glyphicon glyphicon-question-sign"></span></a>
                      	</div>
                      @if(!(is_null($plan->daily_fee)))
                          <div>
                          		<strong>{!! $plan->daily_fee !!}</strong>
                          		<a href="#" id="acc-num-tooltip" data-toggle="popover" data-content="{{ $plan->daily_fee_description }}" data-placement="bottom"><span class="glyphicon glyphicon-question-sign"></span></a>
                      	</div>
                      @endif                          
                  </div>
                  <div class="sign-up-container">
                    <a href="{!! URL::previous() !!}">Change</a>
                  </div>
              </div>
          </div>
	</div></div>
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