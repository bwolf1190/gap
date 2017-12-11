@extends('master')



@section('page-title', 'Historical Rates - Great American Power')



@section('navbar-brand')



    {!! Html::style('css/historical-rates.css') !!}

    <a id="nav-brand" class="nav-brand" href="/"> {!! Html::image('images/gap-fcp-swoosh.jpg') !!}</a>



@endsection



@section('content')



    <div id="historical-container" class="container">

    	<div class="row">

    		<div class="col-xs-10 col-xs-offset-1">

        		<br><span id="title"><center>Historical Rates</center></span>

        	</div>

        </div><br><br><br><br>

        <div class="row">

        	@foreach($ldcs as $ldc)

        		@if($ldc->ldc != "Duke")

	        		<div class="row">

	        			<div class="col-xs-10 col-xs-offset-1">

		        			<h2>{!! $ldc->ldc . " Residential"  !!}</h2>

		        			<object width="900" height="900" data="{!! URL::asset("pdf/historical-rates/Great-American-Power-Historical-Rates-" . $ldc->ldc . "-Residential.pdf?v=1") !!}"></object>

	        			</div>

	        		</div>

	        		<br><br>

	        		<div class="row">

	        			<div class="col-xs-10 col-xs-offset-1">

	        				<h2>{!! $ldc->ldc . " Commercial"  !!}</h2>

	        				<object width="900" height="900" data="{!! URL::asset("pdf/historical-rates/Great-American-Power-Historical-Rates-" . $ldc->ldc . "-Commercial.pdf") !!}"></object>

	        			</div>

	        		</div>

	        		<br><br>

	        	@endif

        	@endforeach

        </div>

    </div>



@endsection



