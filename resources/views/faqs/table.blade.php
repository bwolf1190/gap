

@foreach($faqs as $faq)

<div class="panel panel-default">
    <h4 class="panel-title">
    <a data-toggle="collapse" data-parent="#accordion" href="{!! '#' . $faq->id !!}">
    <span class='fade-in question'>Q.</span><span id="question">{!! $faq->question !!}</span></a>
    </h4>

    <div id="{!! $faq->id !!}" class="panel-collapse collapse">
        <div class="panel-body"><span class='answer'>Answer</span><br> 
        	{!! $faq->answer !!}
        </div>
    </div>

</div>

@endforeach

