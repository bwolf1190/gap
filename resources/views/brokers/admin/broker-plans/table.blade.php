<table class="table">
    <thead>
    		<th><a href="/sort-plans/priority">Priority</a></th>
    		<th><a href="/sort-plans/name">Name</a></th>
			<th><a href="/sort-plans/ldc">Ldc</a></th>
			<th><a href="/sort-plans/type">Type</a></th>
			<th><a href="/sort-plans/length">Length</a></th>
            <th><a href="/sort-plans/rate">Rate</a></th>
			<th><a href="/sort-plans/rate2">Rate 2</a></th>
			<th><a href="/sort-plans/etf">Etf</a></th>
            <th><a href="/sort-plans/etf_description">Etf Description</a></th>
			<th><a href="/sort-plans/meter">Meter</a></th>
			<th><a href="/sort-plans/promo">Promo</a></th>
    </thead>
    <tbody>
    @foreach($plans as $plan)
        <tr>
            <td>{!! $plan->priority !!}</td>
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
