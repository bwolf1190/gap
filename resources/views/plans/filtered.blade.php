
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
                      <div class="price_table_row"><strong>{!! $plan->etf !!}</strong></div>
                                                   
                  </div>
                  <div class="sign-up-container">
                    <a href="{!! route('start', [ 'id' => $plan->id,'promo' => $promo]) !!}">Sign Up</a>
                  </div>
              </div>
          </div>

     @endforeach
 
  </div>
</div>