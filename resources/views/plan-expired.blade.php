@extends('master')

@section('content')

<div id="enroll_container" class="filtered-table-container container">

	<div class="remodal-bg">
	  <a href="#modal"></a><br>
		<div class="remodal" data-remodal-id="modal" role="dialog" aria-labelledby="modalTitle" aria-describedby="modalDesc">
		  <div>
		    <div id="modalTitle"><h2>Plan Expired</h2></div>
		    <p id="modalDesc">
		    	<br><br>Sorry, it seems that this plan has expired.  Please contact Customer Care at 1-877-215-4140 to explore other options. You may also view our current rates and select a new plan by visiting us at <a href="https://www.greatamericanpower.com/" style="color:green;">www.greatamericanpower.com</a>.
		    </p>
		  </div>
		  <br>
		  <button id="ok-btn" data-remodal-action="confirm" class="remodal-confirm" onclick="window.location.href='{!! url("/") !!}';">OK</button>
		</div>
	</div>

</div>

{!! Html::style('css/welcome.css') !!}
{!! Html::style('css/enroll.css') !!}
{!! Html::style('css/master.css') !!}
{!! Html::style('dist/remodal.css') !!}
{!! Html::style('css/modal.css') !!}
{!! Html::style('dist/remodal-default-theme.css') !!}
{!! Html::script('dist/remodal.js') !!}
{!! Html::script('js/email-confirmation.js') !!}
    
@endsection