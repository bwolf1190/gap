<div class="table-responsive"><table class="table table-condensed">
    <thead>
    <th>Question</th>
			<th>Answer</th>
			<th>Key1</th>
			<th>Key2</th>
			<th>Key3</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($faqs as $faq)
        <tr>
            <td>{!! $faq->question !!}</td>
			<td>{!! $faq->answer !!}</td>
			<td>{!! $faq->key1 !!}</td>
			<td>{!! $faq->key2 !!}</td>
			<td>{!! $faq->key3 !!}</td>
            <td>
                <a href="{!! route('faqs.edit', [$faq->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('faqs.delete', [$faq->id]) !!}" onclick="return confirm('Are you sure wants to delete this Faq?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>