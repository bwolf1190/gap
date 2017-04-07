
@if(count($ldcs) === 3) 
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-md-offset-2 col-sm-offset-2"> 
@else
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
@endif

  @foreach($ldcs as $ldc)
      <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 float-shadow">        
          <div class="price_table_container ldc">
              <div class="price_table_heading">{!! $ldc->ldc !!}</div>
              <div class="price_table_body">
                  <div class="price_table_row cost" style="padding-top:40px;"><strong>{!! $service !!}</strong></div>
                  <div class="price_table_row">Secure Rates Available</div>
                  <div class="price_table_row last_row"><a target="_blank" href="{!! URL::asset("pdf/disclosure-statements/Great-American-Power-Disclosure-Statement-" . $ldc->ldc . ".pdf") !!}">Disclosure Statement</a></div>                
              </div>
              <div class="sign-up-container">
                <a href="{!! route('searchPlans', array('type' => $type, 's' => $service, 'l' => $ldc->ldc, 'promo' => $promo)) !!}">See Plans</a>
              </div>
          </div>
      </div>
  @endforeach

</div>

{!! Html::style('css/enroll.css') !!}


