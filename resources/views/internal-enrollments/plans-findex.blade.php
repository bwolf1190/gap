@extends('master')

@section('navbar-brand')
    {!! Html::style('css/broker.css') !!}
    {!! Html::style('css/enroll.css') !!} 
    {!! Html::script('js/enroll.js') !!}   
   
    <a id="nav-brand" href="/"> {!! Html::image('images/gap-fcp.png') !!}</a>


@endsection

@section('content')
    <div id="enroll_container" class="filtered-table-container container">
        <div class="row">
            <div  class=''>

                @if(empty($plans))
                    <div class="well text-center">No Ldcs found.</div>
                @else
                    @include('internal-enrollments.plans-filtered')
                @endif

            </div>
        </div>
    </div>
    
@endsection




