<div class="carousel-caption fade-in-slow">
    <div id="" class="margin-top-20">
        <h1>Sign Up Today</h1>
        <div class="row margin-top-30">
            {!! Form::open(['action' => 'LdcController@search']) !!}
            {!! csrf_field() !!}
            <div id="sign-up-form" class="">
                <div id="zip" class="form-group col-sm-5">
                    {!! Form::text('zip', 'Zip Code', ['class' => 'form-control']) !!}
                </div>
                <script type="text/javascript">
                $("input[name=zip]").click(function(e){
                $(this).val("");
                });
                </script>
                <div class="row">
                    <div id="" class="form-group">
                        <input id="next" class="col-sm-3" type="submit" name="Residential" value="Residential">
                        <input id="next" class="col-sm-3" type="submit" name="Commercial" value="Commercial">
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>