<table class="table">
    <thead>
    <th>Zip</th>
			<th>Ldc Id</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($zips as $zip)
        <tr>
            <td>{!! $zip->zip !!}</td>
			<td>{!! $zip->ldc_id !!}</td>
            <td>
                <a href="{!! route('zips.edit', [$zip->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('zips.delete', [$zip->id]) !!}" onclick="return confirm('Are you sure wants to delete this Zip?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
