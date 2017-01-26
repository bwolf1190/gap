@extends('master')

@section('page-title', 'Offers - Great American Power')

@section('content')

		<div class="remodal-bg">
		  <a href="#modal"></a><br>
			<div class="remodal" data-remodal-id="modal" role="dialog" aria-labelledby="modalTitle" aria-describedby="modalDesc">
			  <div>
			    <div id="modalTitle"><h2>More Offers</h2></div>
			    <p id="modalDesc" style="text-align:left;">
			    	<br>
					Congratulations, you now qualify for our special rebate offers!  Please click yes below to learn more!
			    </p>
			  </div>
			  <br>
			 		<button id="yes-btn" data-remodal-action="confirm" class="remodal-confirm" style="background-color:green;" onclick="window.location.href='http://www.safestreets.com/GAP1/';">Yes, please</button>
			 		<button id="no-btn" data-remodal-action="cancel" class="remodal-cancel" style="background-color:#bf0000;" onclick="window.location.href='{!! url("/") !!}';">No, thank you</button>
			<div class="row">
				{!! Html::image('images/gap-swoosh.jpg') !!}
			</div>		
			</div>
		</div>

@endsection

@section('bottom-scripts')
	{!! Html::style('css/welcome.css') !!}
	{!! Html::style('css/enroll.css') !!}
	{!! Html::style('css/master.css') !!}
	{!! Html::style('dist/remodal.css') !!}
	{!! Html::style('dist/remodal-default-theme.css') !!}
	{!! Html::style('css/offers.css') !!}
	{!! Html::script('dist/remodal.js') !!}
	{!! Html::script('js/email-confirmation.js?v=1') !!}
@endsection