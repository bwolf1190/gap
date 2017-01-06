<table class="table">
    <thead>
    		<th><a href="/sort-plans/priority">Priority</a></th>
    		<th><a href="/sort-plans/name">Name</a></th>
			<th><a href="/sort-plans/ldc">Ldc</a></th>
			<th><a href="/sort-plans/type">Type</a></th>
			<th><a href="/sort-plans/length">Length</a></th>
            <th><a href="/sort-plans/rate">Rate</a></th>
			<th><a href="/sort-plans/rate2">Rate 2</a></th>
			<th><a href="/sort-plans/etf">ETF</a></th>
            <th><a href="/sort-plans/etf_description">ETF Description</a></th>
			<th><a href="/sort-plans/meter">Meter</a></th>
			<th><a href="/sort-plans/promo">Promo</a></th>
            <th><a href="/sort-plans/code">Utilibill Code</a></th>
			<th><a href="/sort-plans/price_code">Price Code</a></th>
    <th width="50px">Action</th>
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
            <td>{!! $plan->code !!}</td>
			<td>{!! $plan->price_code !!}</td>
            <td>
                <a href="{!! route('plans.edit', [$plan->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('plans.delete', [$plan->id]) !!}" onclick="return confirm('Are you sure wants to delete this Plan?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
