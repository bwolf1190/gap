<div class="container">
  <div class="row">
    @foreach($plans as $plan)

    @if(count($plans) === 3)
          <div class="col-md-3 col-md-offset-1 col-sm-6 col-xs-12 float-shadow"> 
    @elseif(count($plans) === 2)
          <div class="col-md-3 col-md-offset-2 col-sm-6 col-xs-12 float-shadow"> 
    @else       
          <div class="col-md-3 col-sm-6 col-xs-12 float-shadow">  
    @endif      
              <div class="price_table_container">
                  <div class="price_table_heading">{!! $plan->ldc !!}</div>
                  <div class="price_table_body">
                      
                      @if($plan->rate2 == "")
                        <div class="price_table_row cost"><strong><p style="padding-top:25px;">{!! $plan->rate !!} 
                      @else
                        <div class="price_table_row cost"><strong><p>{!! $plan->rate !!} 
                      @endif
                      
                      @if($plan->rate2 !== "")
                        <br> {!! $plan->rate2 !!}  
                      @endif

                      </p></strong></div>

                      <div class="price_table_row name" style="height"><strong>{!! $plan->length . " Month " . $plan->name !!}</strong></div>
                      @if($plan->meter != "")
                        <div class="price_table_row"><strong>{!! $plan->meter . " Meter" !!}</strong></div>
                      @endif
                      
                      @if($plan->reward != "")
                        <div class="price_table_row reward">
                          <a href="{{ $plan->reward_link }}" title="Click for more information" target="_blank">{!! $plan->reward !!}</a>
                          <a href="#" id="acc-num-tooltip" data-container="body" data-html="true" data-toggle="popover" data-content="{{ $plan->reward_description }}" data-placement="bottom"><span class="glyphicon glyphicon-question-sign"></span></a>
                        </div>
                      @endif
                      <div class="price_table_row etf last_row">
                          <div>
                            <strong>{!! $plan->etf !!}</strong>
                            <a href="#" id="acc-num-tooltip" data-toggle="popover" data-content="{{ $plan->etf_description }}" data-placement="bottom"><span class="glyphicon glyphicon-question-sign"></span></a>
                          </div>
                      @if(!(is_null($plan->daily_fee)))
                          <div>
                            <strong>{!! $plan->daily_fee !!}</strong>
                            <a href="#" id="acc-num-tooltip" data-toggle="popover" data-content="{{ $plan->daily_fee_description }}" data-placement="bottom"><span class="glyphicon glyphicon-question-sign"></span></a>
                          </div>
                      @endif
                      </div>
                  </div>
                  <div class="sign-up-container">
                    <a href="{!! route('start', ['id' => $plan->id,'promo' => $promo, 'type' => $type]) !!}">Sign Up</a>
                  </div>
              </div>
          </div>
     @endforeach
  </div>
</div>