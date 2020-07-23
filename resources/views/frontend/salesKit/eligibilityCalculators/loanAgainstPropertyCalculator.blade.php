
<div class="col-md-7 border-right">
    <div class="calculate_slider">
        <div class="slider_bar">
            <p>loan against propery:Monthly Income (in INR)</p>
            <input type="range" min="50000" max="1500000" value="50000" class="slider" id="myRange1" onchange="getLoanAgainstProperty()">
        </div>
        <span id="slider_range"></span>
    </div>
    <div class="calculate_slider">
        <div class="slider_bar">
            <p>Obligation (in INR)</p>
            <input type="range" min="10000" max="100000" value="10000" class="slider" id="myRange2" onchange="getLoanAgainstProperty()">
        </div>
        <span id="slider_range1"></span>
    </div>
    <div class="calculate_slider">
        <div class="slider_bar">
            <p>Loan Tenure (in Months)</p>
            <input type="range" min="12" max="60" value="12" class="slider" id="myRange3" onchange="getLoanAgainstProperty()">
        </div>
        <span id="slider_range2"></span>
    </div>
    <div class="calculate_slider">
        <div class="slider_bar">
            <p>Rate of Interest (in %)</p>
            <input type="range" min="12" max="24" value="12"  step="0.5" class="slider" id="myRange4" onchange="getLoanAgainstProperty()">
        </div>
        <span id="slider_range3"></span>
    </div>

    <div class="calculate_slider">
        <div class="slider_bar">
            <p>Property Value</p>
            <input type="range" min="10000" max="100000" value="10000" class="slider" id="myRange5" onchange="getLoanAgainstProperty()">
        </div>
        <span id="slider_range4"></span>
    </div>

    <div class="calculate_slider">
        <div class="slider_bar">
            <p>Expected Loan Amount (in INR)</p>
            <input type="range" min="12" max="24" value="12"  step="0.5" class="slider" id="myRange6" onchange="getLoanAgainstProperty()">
        </div>
        <span id="slider_range5"></span>
    </div>
</div>

<div class="col-md-5 border-center">
    <div class="graph-chart">
        <img src="{{url('/assets_frontend/images/graph.png')}}" class="img-fluid" alt="graph">
        <div class="graph_info">
            <p>Loan Eligibility (Applicable)</p>
            <span>₹ 25,000</span>
        </div>
    </div>
    <div class="graph-chart ">
        <img src="{{url('/assets_frontend/images/graph.png')}}" class="img-fluid" alt="graph">
        <div class="graph_info">
            <p>Loan EMI (Applicable)</p>
            <span>₹ 25,000</span>
        </div>
    </div>
</div>
<script src="{{url('/assets_frontend/js/custom.js')}}"></script>
<script>
     /****loan against property calculator*****/

    function getLoanAgainstProperty(){

        var monthly_income=$('#myRange1').val();
        var Obligation=$('#myRange2').val();
        var loan_tenure=$('#myRange3').val();
        var rate_of_interest=$('#myRange4').val();
        var loan_amount=$('#myRange5').val();
        var propery_value=$('#myRange6').val();

        $.ajax({
            url: base_url+'/sales/kit/get_loan_against_property',
            type: "post",
            data: {'montly_income':monthly_income,'Obligation':Obligation,'loan_tenure':loan_tenure,'expected_loan_amount':loan_amount,'rate_of_interest':rate_of_interest,'propery_value':propery_value,_token: '{{csrf_token()}}'} ,
            success: function (response) {

                var res=JSON.parse(response);
                console.log(res);

            },
            error: function(jqXHR, textStatus, errorThrown) {
                $('#error_alert').text('Something went wrong ,Please try again');
                $('#alertMsg').show();
            }
        });


    }

</script>
