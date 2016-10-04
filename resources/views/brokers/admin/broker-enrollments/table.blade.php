<table class="table">
    <thead>
            <th>Enroll Date</th>
			<th>Confirm Date</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Promo</th>
            <th>Plan Id</th>
            <th>Agent Id</th>
			<th>Status</th>
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
        </tr>
    @endforeach
    </tbody>
</table>
