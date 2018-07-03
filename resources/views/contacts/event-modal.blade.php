@extends('master')

@section('page-title', 'Confirmed - Great American Power')

@section('content')

<div class="remodal-bg">
	<a href="#modal"></a><br>
	<div class="remodal" data-remodal-id="modal" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
		<div>
			<h2 id="modalTitle" style="color:#bf0000;">More Info?</h2>
			<!--<p id="modalDesc" style="text-align:left;">-->
				<!--<form method="POST" action="/add-info-request">-->
				{!! Form::open(['action' => 'ContactController@addInfoRequest']) !!}
				        {!! csrf_field() !!}
				        @include('contacts.event-fields')
				{!! Form::close() !!}
			<!--</p>-->
		</div>
		<br>
		<div class="row">{!! Html::image('images/gap-swoosh.jpg') !!}</div>
	</div>
</div>

{!! Html::style('css/welcome.css') !!}
{!! Html::style('css/enroll.css') !!}
{!! Html::style('css/master.css') !!}
{!! Html::style('dist/remodal.css') !!}
{!! Html::style('dist/remodal-default-theme.css') !!}
{!! Html::style('css/modal.css?v=1') !!}
{!! Html::script('dist/remodal.js') !!}
{!! Html::script('js/email-confirmation.js') !!}

@endsection