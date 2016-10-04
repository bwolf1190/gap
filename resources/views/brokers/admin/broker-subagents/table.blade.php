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
        </tr>
    @endforeach
    </tbody>
</table>
