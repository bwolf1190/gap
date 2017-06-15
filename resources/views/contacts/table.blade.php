<div class="table-responsive">
    <table class="hover">
    <thead>
        <th width="50px">Action</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Question</th>
        <th>Notes</th>
        <th>Status</th>
    </thead>
    <tbody>
    @foreach($contacts as $contact)
        <tr>
            <td>
                <a href="{!! route('contacts.edit', [$contact->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('contacts.delete', [$contact->id]) !!}" onclick="return confirm('Are you sure wants to delete this Contact?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
            <td>{!! $contact->name !!}</td>
            <td>{!! $contact->phone !!}</td>
            <td>{!! $contact->email !!}</td>
            <td>{!! $contact->inquiry !!}</td>
            <td>{!! $contact->notes !!}</td>
            <td>{!! $contact->status !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>