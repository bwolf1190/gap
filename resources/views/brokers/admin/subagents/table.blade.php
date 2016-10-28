<table class="table">
    <thead>
			<th>ID</th>
            <th>Name</th>
			<th>Email</th>
			<th>Broker</th>
            <th>Action</th>
    </thead>
    <tbody>
    @foreach($subagents as $s)
        <tr>
			<td>{!! $s->id !!}</td>
            <td>{!! $s->name !!}</td>
			<td>{!! $s->email !!}</td>
			<td>{!! $s->broker->name !!}</td>
            <td>
                <a title='Edit' href="{!! route('subagents.edit', [$s->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a title='Delete' href="{!! route('subagents.delete', [$s->id]) !!}" onclick="return confirm('Are you sure wants to delete this subagent?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
