<div class="table-responsive">
<table class="table table-hover">
    <thead>
    	<tr>
    		<th width="50px">Action</th>
    		<th>Status</th>
    		<th>Account #</th>
    		<th> Name</th>
                         <th> Plan </th>
                           <th> Enroll Date </th>
                           <th> Confirm Date </th>
    	</tr>
    </thead>
    <tbody>
    @foreach($customers as $customer)
        <tr>
             <td>
                <a href="{!! route('customers.edit', [$customer->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('customers.delete', [$customer->id]) !!}" onclick="return confirm('Are you sure wants to delete this Customer?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
            <td>{!! $customer->status !!}</td>
            <td>{!! $customer->acc_num !!}</td>
	<td>{!! $customer->fname . ' ' . $customer->lname !!}</td>
            <td> 
             @if(!(is_null($customer->enrollment_p2c))) 
                {!! $customer->enrollment_p2c->Plan_Desc !!} 
             @endif
            </td>
                <td>{!! date('m-d-y', strtotime($customer->enrollment->enroll_date)) !!}</td>
	<td>{!! date('m-d-y', strtotime($customer->enrollment->confirm_date)) !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>