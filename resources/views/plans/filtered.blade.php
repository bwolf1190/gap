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
                      <div class="price_table_row cost"><strong><p>{!! $plan->rate !!} 

                        @if($plan->rate2 !== "")
                          <br> {!! $plan->rate2 !!}  
                        @endif

                      </p></strong></div>

                      <div class="price_table_row"><strong>{!! $plan->length . " Months" !!}</strong></div>
                      <div class="price_table_row name"><strong>{!! $plan->name . " " . $plan->meter !!}</strong></div>
                      <div class="price_table_row"><strong>{!! $plan->type !!}</strong></div>
                      <div class="price_table_row"><a target="_blank" href="{!! URL::asset("pdf/historical-rates/Great-American-Power-Historical-Rates-" . $plan->ldc . "-" . $plan->type . ".pdf") !!}">Historical Rates</a></div>
                      <div class="price_table_row etf last_row">
                          <strong>{!! $plan->etf !!}</strong>
                          <a href="#" id="acc-num-tooltip" data-toggle="popover" data-content="{{ $plan->etf_description }}" data-placement="bottom"><span class="glyphicon glyphicon-question-sign"></span></a>
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