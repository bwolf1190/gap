<table class="table">
    <thead>
    <th>Enroll Date</th>
			<th>Confirm Date</th>
			<th>P2C</th>
			<th>Status</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($enrollments as $enrollment)
        <tr>
            <td>{!! $enrollment->enroll_date !!}</td>
			<td>{!! $enrollment->confirm_date !!}</td>
			<td>{!! $enrollment->p2c !!}</td>
			<td>{!! $enrollment->status !!}</td>
            <td>
                <a href="{!! route('enrollments.edit', [$enrollment->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('enrollments.delete', [$enrollment->id]) !!}" onclick="return confirm('Are you sure wants to delete this Enrollment?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
