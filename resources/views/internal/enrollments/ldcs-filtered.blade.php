<div class="container">
    <div class="row">
        <ul id="commodity-tabs" class="nav nav-tabs">
        <li class="active tab"><a id="electric-link" href="/web/select-plan/{{ $plans[0]->type }}/{{ $plans[0]->ldc }}/Electric">Utilities</a></li>
        <li class="inactive tab"><a id="electric-link" href="/web/select-plan/{{ $plans[0]->type }}/{{ $plans[0]->ldc }}/Electric">Utilities</a></li>
        </ul>  

        <div class="tab-content">
            <div id="Electric" class="fade in active">

  @foreach($ldcs as $ldc)
      <div class="col-md-6 col-sm-6 col-xs-12 float-shadow">        
          <div class="price_table_container">
              <div class="price_table_heading">{!! $ldc->ldc !!}</div>
              <div class="price_table_body">
                  <div class="price_table_row cost"><strong>{!! $service !!}</strong></div>
                  <div class="price_table_row"><a href="{!! URL::asset("pdf/historical-rates/Great-American-Power-Historical-Rates-" . $ldc->ldc . "-" . $service . ".pdf") !!}">Historical Rates</a></div>
                  <div class="price_table_row last_row"><a href="{!! URL::asset("pdf/disclosure-statements/Great-American-Power-Disclosure-Statement-" . $ldc->ldc . ".pdf") !!}">Disclosure Statement</a></div>                
              </div>
              <div class="sign-up-container">
                <a href="{!! route('internalPlans', array('s' => $service, 'l' => $ldc->ldc, 'promo' => $promo)) !!}">See Plans</a>
              </div>
          </div>
      </div>
  @endforeach
            </div>
        </div>
    </div>
</div>

  {!! Html::style('css/enroll.css') !!}


<script>
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });

});
</script>