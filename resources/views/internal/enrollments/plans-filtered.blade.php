
<div class="container">
  <div class="row">
    @foreach($plans as $plan)
          <div class="col-md-3 col-sm-6 col-xs-12 float-shadow">        
              <div class="price_table_container">
                  <div class="price_table_heading">{!! $plan->ldc !!}</div>
                  <div class="price_table_body">
                      <div class="price_table_row cost"><strong><p>{!! $plan->rate !!} 

                        @if($plan->rate2 !== "")
                          <br> {!! $plan->rate2 !!}  
                        @endif

                      /kWh</p></strong></div>

                      <div class="price_table_row"><strong>{!! $plan->length . " Months" !!}</strong></div>
                      <div class="price_table_row"><strong>{!! $plan->type !!}</strong></div>
                      <div class="price_table_row etf last_row">
                          <strong>{!! $plan->etf !!}</strong>
                          <a href="#" id="acc-num-tooltip" data-toggle="popover" data-content="{{ $plan->etf_description }}" data-placement="bottom"><span class="glyphicon glyphicon-question-sign"></span></a>
                      </div> 
                      <div>
                          @if($plan->daily_fee == 'Rate Surety Pledge')
                          <strong>{!! $plan->daily_fee !!}</strong>
                          <a href="#" id="acc-num-tooltip" data-toggle="popover" data-content="{{ $plan->daily_fee_description }}" data-placement="bottom"><span class="glyphicon glyphicon-question-sign"></span></a>
                          @endif
                          </div>                             
                  </div>
                  <div class="sign-up-container">
                    <a href="{!! route('internal-start', [ 'id' => $plan->id]) !!}">Sign Up</a>
                  </div>
              </div>
          </div>
     @endforeach
  </div>
</div>