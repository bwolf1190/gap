		<div class="remodal-bg">
		  <a href="#modal"></a><br>
			<div class="remodal" data-remodal-id="modal" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
			  <div>
			    <h2 id="modalTitle">Select Your Meter</h2>
			  </div>
			  <div>
			  	<p id="modalDesc">
			  		Please select the type of meter for your account.  <b>Note: selecting the wrong meter will result in an unsuccessful enrollment.</b>
			  	</p>
			    {!! Form::open(['action' => 'LdcController@search', 'id' => 'commercial-meter-form']) !!}
			    	{!! csrf_field() !!}
			    	{!! Form::hidden('service', 'Commercial') !!}
			    	{!! Form::hidden('zip', null, ['id' => 'commercial-zip']) !!}
			    	<div id="select-container" class="row">
			    		{!! Form::select('meter', [null => 'Select Meter', 'PPL' => ['GS1' => 'GS1', 'GS3' => 'GS3'], 'MetEd' => ['GS' => 'GS', 'GSCM' => 'GSCM'] ]) !!}
				    </div>
				    <button id="ok-btn" data-remodal-action="confirm" class="remodal-confirm">GO</button>
				{!! Form::close() !!}
			</div>

			<div class="row">{!! Html::image('images/gap-swoosh.jpg') !!}</div>
			</div>
		</div>