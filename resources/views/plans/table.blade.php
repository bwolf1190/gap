<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th width="50px">Action</th>
                <th>Name</th>
                <th>LDC</th>
                <th>Type</th>
                <th>Length</th>
                <th>Rate</th>
                <th>Rate 2</th>
                <th>ETF</th>
                <th>Reward</th>
                <th>Promo</th>
                <th>Price Code</th>
            </tr>

        </thead>

        <tbody>
            @foreach($plans as $plan)
            <tr>
                <td>
                    <a href="{!! route('plans.edit', [$plan->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="{!! route('plans.delete', [$plan->id]) !!}" onclick="return confirm('Are you sure wants to delete this Plan?')"><i class="glyphicon glyphicon-remove"></i></a>
                </td>
                <td>{!! $plan->name !!}</td>
                <td>{!! $plan->ldc !!}</td>
                <td>{!! $plan->type !!}</td>
                <td>{!! $plan->length !!}</td>
                <td>{!! $plan->rate !!}</td>
                <td>{!! $plan->rate2 !!}</td>
                <td>{!! $plan->etf_description !!}</td>
                <td>{!! $plan->reward !!}</td>
                <td>{!! $plan->promo !!}</td>
                <td>{!! $plan->price_code !!}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>



