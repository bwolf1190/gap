<table class="table">
    <thead>
    		<th>Priority</th>
    		<th>Name</th>
			<th>Ldc</th>
			<th>Type</th>
			<th>Length</th>
            <th>Rate</th>
			<th>Rate 2</th>
			<th>Etf</th>
			<th>Meter</th>
			<th>Promo</th>
			<th>Code</th>
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
			<td>{!! $plan->meter !!}</td>
			<td>{!! $plan->promo !!}</td>
			<td>{!! $plan->code !!}</td>
            <td>
                <a href="{!! route('plans.edit', [$plan->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('plans.delete', [$plan->id]) !!}" onclick="return confirm('Are you sure wants to delete this Plan?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
