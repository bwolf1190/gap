<table class="table">
    <thead>
            <th><a href="/sort-enrollments/enroll_date">Enroll Date</a></th>
			<th><a href="/sort-enrollments/confirm_date">Confirm Date</a></th>
            <th><a href="/sort-enrollments/customer_id">First Name</a></th>
            <th><a href="">Last Name</a></th>
            <th><a href="/sort-enrollments/customer_id">Promo</a></th>
            <th><a href="/sort-enrollments/plan_id">Plan Id</a></th>
            <th><a href="/sort-enrollments/agent_id">Agent Id</a></th>
			<th><a href="/sort-enrollments/status">Status</a></th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($enrollments as $enrollment)
        <tr>
            <td>{!! $enrollment->enroll_date !!}</td>
			<td>{!! $enrollment->confirm_date !!}</td>
            <td>{!! $enrollment->customer->fname !!}</td>
            <td>{!! $enrollment->customer->lname !!}</td>
            <td>{!! $enrollment->plan->promo !!}</td>
			<td>{!! $enrollment->plan_id !!}</td>
            <td>{!! $enrollment->agent_id !!}</td>
			<td>{!! $enrollment->status !!}</td>
            <td>
                <a href="{!! route('enrollments.edit', [$enrollment->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('enrollments.delete', [$enrollment->id]) !!}" onclick="return confirm('Are you sure wants to delete this Enrollment?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
