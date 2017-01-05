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
						text text text
			    </p>
			  </div>
			  <br>
			 		<button id="ok-btn" data-remodal-action="confirm" class="remodal-confirm" onclick="window.location.href='https://www.espn.com';">Yes</button>
			 		<button data-remodal-action="cancel" class="remodal-cancel" onclick="window.location.href='{!! url("/") !!}';">No</button>
			</div>
		</div>

@endsection

@section('bottom-scripts')
	{!! Html::style('css/welcome.css') !!}
	{!! Html::style('css/enroll.css') !!}
	{!! Html::style('css/master.css') !!}
	{!! Html::style('dist/remodal.css') !!}
	{!! Html::style('dist/remodal-default-theme.css') !!}
	{!! Html::style('css/modal.css') !!}
	{!! Html::script('dist/remodal.js') !!}
	{!! Html::script('js/email-confirmation.js?v=1') !!}
@endsection