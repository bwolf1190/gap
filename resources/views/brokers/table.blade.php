<table class="table">
    <thead>
    <th>Broker</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($brokers as $broker)
        <tr>
            <td>{!! $broker->broker !!}</td>
            <td>
                <a href="{!! route('brokers.edit', [$broker->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('brokers.delete', [$broker->id]) !!}" onclick="return confirm('Are you sure wants to delete this broker?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
