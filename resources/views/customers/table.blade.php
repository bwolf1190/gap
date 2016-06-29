<table class="table">
    <thead>
    <th>Acc Num</th>
			<th>Fname</th>
			<th>Lname</th>
			<th>Sa1</th>
			<th>Sa2</th>
			<th>Scity</th>
			<th>Sstate</th>
			<th>Szip</th>
			<th>Ma1</th>
			<th>Ma2</th>
			<th>Mcity</th>
			<th>Mstate</th>
			<th>Mzip</th>
			<th>Same Address</th>
			<th>Email</th>
			<th>Confirm Email</th>
			<th>Phone</th>
			<th>Promo</th>
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
			<td>{!! $customer->same_address !!}</td>
			<td>{!! $customer->email !!}</td>
			<td>{!! $customer->confirm_email !!}</td>
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
