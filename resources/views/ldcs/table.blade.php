<table class="table">
    <thead>
    <th>Ldc</th>
    <th>Customer ID</th>
    <th>ID Length</th>
    <th>Hint</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($ldcs as $ldc)
        <tr>
            <td>{!! $ldc->ldc !!}</td>
            <td>{!! $ldc->customer_identifier !!}</td>
            <td>{!! $ldc->format_criteria_1 !!}</td>
            <td>{!! $ldc->hint !!}</td>
            <td>
                <a href="{!! route('ldcs.edit', [$ldc->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('ldcs.delete', [$ldc->id]) !!}" onclick="return confirm('Are you sure wants to delete this Ldc?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
