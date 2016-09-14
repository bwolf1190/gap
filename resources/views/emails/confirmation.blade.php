@extends('master')


@section('content')

		<div class="remodal-bg">
		  <a href="#modal"></a><br>
			<div class="remodal" data-remodal-id="modal" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
			  <div>
			    <h2 id="modalTitle" style="color:#bf0000;">Email Confirmed</h2>
			    <p id="modalDesc" style="text-align:left;">
			    	<br>{!! $customer->fname !!}, <div style="text-align:left;"><br> Your email address has been confirmed.  We will now begin to process your enrollment.  Thank you for enrolling with Great American Power!</div>
			    </p>
			  </div>
			  <br>
			  <button id="ok-btn" data-remodal-action="confirm" class="remodal-confirm" onclick="window.location.href='{!! url("/") !!}';">OK</button>
			</div>
		</div>

{!! Html::style('css/welcome.css') !!}
{!! Html::style('css/enroll.css') !!}
{!! Html::style('css/master.css') !!}
{!! Html::style('dist/remodal.css') !!}
{!! Html::style('dist/remodal-default-theme.css') !!}
{!! Html::style('css/modal.css') !!}
{!! Html::script('dist/remodal.js') !!}
{!! Html::script('js/email-confirmation.js') !!}
    
@endsection











