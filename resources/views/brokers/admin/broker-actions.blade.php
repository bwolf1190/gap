<div class="row">
	<div id="broker-admin-nav" class="col-xs-3 col-xs-offset-9">
		<ul id="broker-actions">
			<li>{!! Html::linkAction('BrokerController@plans', 'Plans', array("broker" => Auth::user()->name)) !!}</li>
			<li>{!! Html::linkAction('BrokerController@enrollments', 'Enrollments') !!}</li>
			<li>{!! Html::linkAction('BrokerController@subAgents', 'Subagents', array("broker" => Auth::user()->name)) !!}</li>
		</ul>
	</div>
</div>