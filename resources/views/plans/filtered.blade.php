<div class="container">
    <div class="row">
        <ul class="nav nav-tabs">
        <li class="active"><a id="electric-link" href="#electric">Electric</a></li>
        <li><a id="gas-link" href="#gas">Gas</a></li>
        </ul>  

        <div class="tab-content">
            <div id="electric" class="fade in active">
                @foreach($electric_plans as $electric_plan)

                    @if(count($electric_plans) === 3)
                        <div class="col-md-3 col-md-offset-1 col-sm-6 col-xs-12 float-shadow"> 
                    @elseif(count($electric_plans) === 2)
                        <div class="col-md-3 col-md-offset-2 col-sm-6 col-xs-12 float-shadow"> 
                    @else       
                        <div class="col-md-3 col-sm-6 col-xs-12 float-shadow">  
                    @endif      
                        <div class="price_table_container">
                            <div class="price_table_heading">{!! $electric_plan->ldc !!}</div>
                            <div class="price_table_body">

                            @if($electric_plan->rate2 == "")
                                <div class="price_table_row cost"><strong><p style="padding-top:25px;">{!! $electric_plan->rate !!} 
                            @else
                                <div class="price_table_row cost"><strong><p>{!! $electric_plan->rate !!} 
                            @endif

                            @if($electric_plan->rate2 !== "")
                                <br> {!! $electric_plan->rate2 !!}  
                            @endif

                            </p></strong></div>

                            <div class="price_table_row name" style="height"><strong>{!! $electric_plan->length . " Month " . $electric_plan->name !!}</strong></div>
                            
                            @if($electric_plan->meter != "")
                                <div class="price_table_row"><strong>{!! $electric_plan->meter . " Meter" !!}</strong></div>
                            @endif

                            @if($electric_plan->reward != "")
                                <div class="price_table_row reward">
                                    <a href="{{ $electric_plan->reward_link }}" title="Click for more information" target="_blank">{!! $electric_plan->reward !!}</a>
                                    <a href="#" id="acc-num-tooltip" data-container="body" data-html="true" data-toggle="popover" data-content="{{ $electric_plan->reward_description }}" data-placement="bottom"><span class="glyphicon glyphicon-question-sign"></span></a>
                                </div>
                            @endif
                            <div class="price_table_row etf last_row">
                                <div>
                                    <strong>{!! $electric_plan->etf !!}</strong>
                                    <a href="#" id="acc-num-tooltip" data-toggle="popover" data-content="{{ $electric_plan->etf_description }}" data-placement="bottom"><span class="glyphicon glyphicon-question-sign"></span></a>
                                </div>

                                @if(!(is_null($electric_plan->daily_fee)))
                                    <div>
                                        <strong>{!! $electric_plan->daily_fee !!}</strong>
                                        <a href="#" id="acc-num-tooltip" data-toggle="popover" data-content="{{ $electric_plan->daily_fee_description }}" data-placement="bottom"><span class="glyphicon glyphicon-question-sign"></span></a>
                                    </div>
                                @endif
                            </div>
                            </div>
                            <div class="sign-up-container">
                                <a href="{!! route('start', ['id' => $electric_plan->id,'promo' => $promo, 'type' => $type]) !!}">Sign Up</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div id="electric" class="fade">
                @foreach($gas_plans as $gas_plan)

                    @if(count($gas_plans) === 3)
                        <div class="col-md-3 col-md-offset-1 col-sm-6 col-xs-12 float-shadow"> 
                    @elseif(count($gas_plans) === 2)
                        <div class="col-md-3 col-md-offset-2 col-sm-6 col-xs-12 float-shadow"> 
                    @else       
                        <div class="col-md-3 col-sm-6 col-xs-12 float-shadow">  
                    @endif      
                        <div class="price_table_container">
                            <div class="price_table_heading">{!! $gas_plan->ldc !!}</div>
                            <div class="price_table_body">

                            @if($gas_plan->rate2 == "")
                                <div class="price_table_row cost"><strong><p style="padding-top:25px;">{!! $gas_plan->rate !!} 
                            @else
                                <div class="price_table_row cost"><strong><p>{!! $gas_plan->rate !!} 
                            @endif

                            @if($gas_plan->rate2 !== "")
                                <br> {!! $gas_plan->rate2 !!}  
                            @endif

                            </p></strong></div>

                            <div class="price_table_row name" style="height"><strong>{!! $gas_plan->length . " Month " . $gas_plan->name !!}</strong></div>
                            
                            @if($gas_plan->meter != "")
                                <div class="price_table_row"><strong>{!! $gas_plan->meter . " Meter" !!}</strong></div>
                            @endif

                            @if($gas_plan->reward != "")
                                <div class="price_table_row reward">
                                    <a href="{{ $gas_plan->reward_link }}" title="Click for more information" target="_blank">{!! $gas_plan->reward !!}</a>
                                    <a href="#" id="acc-num-tooltip" data-container="body" data-html="true" data-toggle="popover" data-content="{{ $gas_plan->reward_description }}" data-placement="bottom"><span class="glyphicon glyphicon-question-sign"></span></a>
                                </div>
                            @endif
                            <div class="price_table_row etf last_row">
                                <div>
                                    <strong>{!! $gas_plan->etf !!}</strong>
                                    <a href="#" id="acc-num-tooltip" data-toggle="popover" data-content="{{ $gas_plan->etf_description }}" data-placement="bottom"><span class="glyphicon glyphicon-question-sign"></span></a>
                                </div>

                                @if(!(is_null($gas_plan->daily_fee)))
                                    <div>
                                        <strong>{!! $gas_plan->daily_fee !!}</strong>
                                        <a href="#" id="acc-num-tooltip" data-toggle="popover" data-content="{{ $gas_plan->daily_fee_description }}" data-placement="bottom"><span class="glyphicon glyphicon-question-sign"></span></a>
                                    </div>
                                @endif
                            </div>
                            </div>
                            <div class="sign-up-container">
                                <a href="{!! route('start', ['id' => $gas_plan->id,'promo' => $promo, 'type' => $type]) !!}">Sign Up</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>


<script>
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });

});
</script>