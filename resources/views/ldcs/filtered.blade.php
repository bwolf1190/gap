
  @foreach($ldcs as $ldc)
      <div class="col-md-6 col-sm-6 col-xs-12 float-shadow">        
          <div class="price_table_container">
              <div class="price_table_heading">{!! $ldc->ldc !!}</div>
              <div class="price_table_body">
                  <div class="price_table_row cost"><strong>{!! $service !!}</strong></div>
                  <div class="price_table_row"><a href="{!! URL::asset("pdf/historical-rates/Great-American-Power-Historical-Rates-" . $ldc->ldc . "-" . $service . ".pdf") !!}">Historical Rates</a></div>
                  <div class="price_table_row"><a href="{!! URL::asset("pdf/disclosure-statements/Great-American-Power-Disclosure-Statement-" . $ldc->ldc . ".pdf") !!}">Disclosure Statement</a></div>                
              </div>
              <div class="sign-up-container">
                <a href="{!! route('searchPlans', array('s' => $service, 'l' => $ldc->ldc, 'promo' => $promo)) !!}">See Plans</a>
              </div>
          </div>
      </div>
  @endforeach


