@extends('master')

@section('page-title', 'Already Confirmed - Great American Power')

@section('content')

    <div id="enroll_container" class="filtered-table-container container">

		<div class="remodal-bg">
		  <a href="#modal"></a><br>
			<div class="remodal" data-remodal-id="modal" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
			  <div>
			    <div id="modalTitle"><h2>Email Confirmed</h2></div>
			    <p id="modalDesc" style="text-align:center;">
			    	<br><br>Your email address has already been confirmed. 
			    </p>
			  </div>
			  <br>
			  <button id="ok-btn" data-remodal-action="confirm" class="remodal-confirm" onclick="window.location.href='{!! url("/") !!}';">OK</button>
			  <div class="row">{!! Html::image('images/gap-swoosh.jpg') !!}</div>
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
	{!! Html::style('css/modal.css') !!}
	{!! Html::script('dist/remodal.js') !!}
	{!! Html::script('js/email-confirmation.js') !!}

@endsection