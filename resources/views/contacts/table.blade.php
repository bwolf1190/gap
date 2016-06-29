<div class="table-responsive"><table class="table table-condensed">
    <thead>
			<th>Name</th>
			<th>Phone</th>
			<th>Email</th>
			<th>Question</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($contacts as $contact)
        <tr>
            <td>{!! $contact->name !!}</td>
			<td>{!! $contact->phone !!}</td>
			<td>{!! $contact->email !!}</td>
			<td>{!! $contact->question !!}</td>
            <td>
                <a href="{!! route('contacts.edit', [$contact->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('contacts.delete', [$contact->id]) !!}" onclick="return confirm('Are you sure wants to delete this Contact?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>