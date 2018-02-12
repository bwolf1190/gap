@extends('master')
@section('content')
<div id="enroll_container" class="filtered-table-container container">
	<div class="remodal-bg">
		<a href="#modal"></a><br>
		<div class="remodal" data-remodal-id="modal" role="dialog" aria-labelledby="modalTitle" aria-describedby="modalDesc">
			<div>
				<div id="modalTitle"><h2>Already Customer</h2></div>
				<p id="modalDesc" style="text-align:center;">
					<br><br>Sorry, we cannot complete this enrollment as we already have an active account on record for you.  Please contact Customer Care at 1-877-215-4140 if you have any questions.
				</p>
			</div>
			<br>
			<button id="ok-btn" data-remodal-action="confirm" class="remodal-confirm" onclick="window.location.href='{!! url("/") !!}';">OK</button>
			<div class="row">{!! Html::image('images/gap-swoosh.jpg') !!}</div>
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