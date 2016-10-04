<div class="row">
	<div id="broker-admin-nav" class="col-xs-3 col-xs-offset-9">
		<ul id="broker-actions">
			<li>{!! Html::linkAction('BrokerController@plans', 'Plans', array("broker" => Auth::user()->name)) !!}</li>
			<li><a href="">Enrollments</a></li>
			<li><a href="">Subagents</a></li>
		</ul>
	</div>
</div>