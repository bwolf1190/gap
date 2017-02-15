@extends('master')

@section('page-title', 'Confirm - Great American Power')

@section('content')

		<div class="remodal-bg">
		  <a href="#modal"></a><br>
			<div class="remodal" style="background-color:white;" data-remodal-id="modal" role="dialog" aria-labelledby="modalTitle" aria-describedby="modalDesc">
			  <div style="overflow:hidden;">
			    <div id="modalTitle" style="border:none;"><h2>Enrollment Fee</h2></div>
			    <p>
			    	<object type="text/html" data="https://linked2pay.com/l2p/services/forms/EA782622" width="615px" height="525px" />
			    </p>
			  </div>
			  <br>
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
	{!! Html::style('css/modal.css') !!}
	{!! Html::script('dist/remodal.js') !!}
	{!! Html::script('js/email-confirmation.js?v=1') !!}
@endsection

