
<div class="col-md-7 border-right">
    <div class="calculate_slider">
        <div class="slider_bar">
            <p>Consumer Finance:Loan Amount</p>
            <input type="range" min="50000" max="1500000" value="50000" class="slider" id="myRange1" onchange="getConsumerProductFinance()">
        </div>
        <span id="slider_range"></span>
    </div>
    <div class="calculate_slider">
        <div class="slider_bar">
            <p>Rate of Interest (in %)</p>
            <input type="range" min="10000" max="100000" value="10000" class="slider" id="myRange2" onchange="getConsumerProductFinance()">
        </div>
        <span id="slider_range1"></span>
    </div>
    <div class="calculate_slider">
        <div class="slider_bar">
            <p>Loan Tenure (in Months)</p>
            <input type="range" min="12" max="60" value="12" class="slider" id="myRange3" onchange="getConsumerProductFinance()">
        </div>
        <span id="slider_range2"></span>
    </div>
    <div class="calculate_slider">
        <div class="slider_bar">
            <p>Advanced EMI</p>
            <input type="range" min="10000" max="100000" value="10000" class="slider" id="myRange4" onchange="getConsumerProductFinance()">
        </div>
        <span id="slider_range3"></span>
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
    function getConsumerProductFinance(){

        var loan_amount=$('#myRange1').val();
        var interest=$('#myRange2').val();
        var loan_tenure=$('#myRange3').val();
        var advance_emi=$('#myRange4').val();

        $.ajax({
            url: base_url+'/sales/kit/get_consumer_product_finance',
            type: "post",
            data: {'loan_amount':loan_amount,'interest':interest,'loan_tenure':loan_tenure,'advance_emi':advance_emi,_token: '{{csrf_token()}}'} ,
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

