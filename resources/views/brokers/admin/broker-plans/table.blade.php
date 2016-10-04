<table class="table">
    <thead>
    		<th>Name</th>
			<th>Ldc</th>
			<th>Type</th>
			<th>Length</th>
            <th>Rate</th>
			<th>Rate 2</th>
			<th>Etf</th>
            <th>Etf Description</th>
			<th>Meter</th>
			<th>Promo</th>
    </thead>
    <tbody>
    @foreach($plans as $plan)
        <tr>
            <td>{!! $plan->name !!}</td>
			<td>{!! $plan->ldc !!}</td>
			<td>{!! $plan->type !!}</td>
			<td>{!! $plan->length !!}</td>
            <td>{!! $plan->rate !!}</td>
			<td>{!! $plan->rate2 !!}</td>
			<td>{!! $plan->etf !!}</td>
            <td>{!! $plan->etf_description !!}</td>
			<td>{!! $plan->meter !!}</td>
			<td>{!! $plan->promo !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>
