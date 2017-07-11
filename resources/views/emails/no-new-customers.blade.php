@extends('master')

@section('page-title', 'Not Available - Great American Power')

@section('content')

		<div class="remodal-bg">
		  <a href="#modal"></a><br>
			<div class="remodal" data-remodal-id="modal" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
			  <div>
			    <h2 id="modalTitle" style="color:#bf0000;">Not Available</h2>
			    <p id="modalDesc" style="text-align:left;">
			    	<div style="text-align:left;"><br>Sorry, we are not currently enrolling new customers on our website.  Please call  Customer Care at 1-877-215-4140 if you have any questions.</div>
			    </p>
			  </div>
			  <br>
			  <button id="ok-btn" data-remodal-action="confirm" class="remodal-confirm" onclick="window.location.href='{!! url("/") !!}';">OK</button>
			  <div class="row">{!! Html::image('images/gap-swoosh.jpg') !!}</div>
			</div>
		</div>
    
@endsection

@section('bottom-scripts')

	{!! Html::style('css/welcome.css') !!}
	{!! Html::style('css/enroll.css') !!}
	{!! Html::style('css/master.css') !!}
	{!! Html::style('dist/remodal.css') !!}
	{!! Html::style('dist/remodal-default-theme.css') !!}
	{!! Html::style('css/modal.css?v=1') !!}
	{!! Html::script('dist/remodal.js') !!}
	{!! Html::script('js/email-confirmation.js') !!}

@endsection









