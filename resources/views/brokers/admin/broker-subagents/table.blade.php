<table class="table">
    <thead>
			<th>ID</th>
            <th>Name</th>
			<th>Email</th>
			<th>Broker</th>
    </thead>
    <tbody>
    @foreach($subagents as $s)
        <tr>
			<td>{!! $s->id !!}</td>
            <td>{!! $s->name !!}</td>
			<td>{!! $s->email !!}</td>
			<td>{!! $s->broker->name !!}</td>
            <td>
                <a href="{!! route('subagents.edit', [$s->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('subagents.delete', [$s->id]) !!}" onclick="return confirm('Are you sure wants to delete this subagent?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
