@extends('admin.admin-master')

@section('content')

<div id="dashboard-container" class="">
    <div class="row">
        <a href="/plans"><div id="plans-btn" class="col-xs-12 col-md-3 col-md-offset-3 box grey">
            <div class=" inner-box">
                <h2>Plans</h2>
            </div>
        </div></a>
        <a href="/customers"><div id="customers-btn" class="col-xs-12 col-md-3 col-md-offset-1 box grey">
            <div class=" inner-box">
                <h2>Customers</h2>
            </div>
        </div></a>
    </div>
    <div class="row">
        <a href="/enrollments"><div id="enrollments-btn" class="col-xs-12 col-md-3 col-md-offset-3  box grey">
            <div class=" inner-box">
                <h2>Enrollments</h2>
            </div>
        </div></a>
        <a href="/ldcs"><div id="internal-enrollments-btn" class="col-xs-12 col-md-3 col-md-offset-1 box grey">
            <div class=" inner-box">
                <h2>LDCs</h2>
            </div>
        </div></a>
    </div>
    <div class="row">
        <a href="/broker-enrollments/s"><div id="brokers-btn" class="col-xs-12 col-md-3 col-md-offset-3 box grey">
            <div class=" inner-box">
                <h2>Broker Enrollments</h2>
            </div>
        </div></a>
        <a href="/faqs"><div id="faqs-btn" class="col-xs-12 col-md-3 col-md-offset-1 box grey">
            <div class=" inner-box">
                <h2>FAQs</h2>
            </div>
        </div></a>
    </div>

</div>

@endsection
