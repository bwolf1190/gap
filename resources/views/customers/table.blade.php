<table class="table">
    <thead>
    		<th><a href="/sort-customers/acc_num">Account Number</a></th>
			<th><a href="/sort-customers/fname">First</a></th>
			<th><a href="/sort-customers/lname">Last</a></th>
			<th><a href="/sort-customers/sa1">Service Address 1</a></th>
			<th><a href="/sort-customers/sa2">Service Address 2</a></th>
			<th><a href="/sort-customers/scity">Service City</a></th>
			<th><a href="/sort-customers/sstate">Service State</a></th>
			<th><a href="/sort-customers/szip">Service Zip</a></th>
			<th><a href="/sort-customers/ma1">Mail Address 1</a></th>
			<th><a href="/sort-customers/ma2">Mail Address 2</a></th>
			<th><a href="/sort-customers/mcity">Mail City</a></th>
			<th><a href="/sort-customers/mstate">Mail State</a></th>
			<th><a href="/sort-customers/mzip">Mail Zip</a></th>
			<th><a href="/sort-customers/email">Email</a></th>
			<th><a href="/sort-customers/phone">Phone</a></th>
			<th><a href="/sort-customers/promo">Promo</a></th>
    		<th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($customers as $customer)
        <tr>
            <td>{!! $customer->acc_num !!}</td>
			<td>{!! $customer->fname !!}</td>
			<td>{!! $customer->lname !!}</td>
			<td>{!! $customer->sa1 !!}</td>
			<td>{!! $customer->sa2 !!}</td>
			<td>{!! $customer->scity !!}</td>
			<td>{!! $customer->sstate !!}</td>
			<td>{!! $customer->szip !!}</td>
			<td>{!! $customer->ma1 !!}</td>
			<td>{!! $customer->ma2 !!}</td>
			<td>{!! $customer->mcity !!}</td>
			<td>{!! $customer->mstate !!}</td>
			<td>{!! $customer->mzip !!}</td>
			<td>{!! $customer->email !!}</td>
			<td>{!! $customer->phone !!}</td>
			<td>{!! $customer->promo !!}</td>
            <td>
                <a href="{!! route('customers.edit', [$customer->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('customers.delete', [$customer->id]) !!}" onclick="return confirm('Are you sure wants to delete this Customer?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
