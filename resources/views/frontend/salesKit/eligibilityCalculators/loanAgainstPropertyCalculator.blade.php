
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
            <input type="range" min="12" max="180" value="12" class="slider" id="myRange3" onchange="getLoanAgainstProperty()">
        </div>
        <span id="slider_range2"></span>
    </div>
    <div class="calculate_slider">
        <div class="slider_bar">
            <p>Rate of Interest (in %)</p>
            <input type="range" min="12" max="18" value="12"  step="0.5" class="slider" id="myRange4" onchange="getLoanAgainstProperty()">
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
            <input type="range" min="100000" max="50000000" value="12"  step="0.5" class="slider" id="myRange6" onchange="getLoanAgainstProperty()">
        </div>
        <span id="slider_range5"></span>
    </div>
</div>

<div class="col-md-5 border-center">
    <div class="graph-chart">
        <div id="semiChart">No data to display</div>
        <div class="graph_info">
            <p>Loan Eligibility (Applicable)</p>
            <span id="appAmt"></span>
        </div>
    </div>
    <div class="graph-chart ">
        <div id="desiredSemiChart">No data to display</div>
        <div class="graph_info">
            <p>Loan Eligibility (Desired)</p>
            <span id="desiredAmt"></span>
        </div>
    </div>
</div>
<script src="{{url('/assets_frontend/js/custom.js')}}"></script>
<script>
    $(document).ready(function(){
        getLoanAgainstProperty();
    });
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
                var  applicableSumInt=res.applicable_amortization_details.sum_interest;
                var  applicableSumPri=res.applicable_amortization_details.sum_principal;
                $('#appAmt').text('₹ '+res.applicable_amortization_details.sum_principal_text);
                semiHightChart(applicableSumPri,applicableSumInt,'semiChart');

                var  DesiredSumInt=res.getDesiredAmortizationDetails.sum_interest;
                var  DesiredSumPri=res.getDesiredAmortizationDetails.sum_principal;
                $('#desiredAmt').text('₹ '+res.getDesiredAmortizationDetails.sum_principal_text);
                semiHightChart(DesiredSumPri,DesiredSumInt,'desiredSemiChart');
                console.log(res);

            },
            error: function(jqXHR, textStatus, errorThrown) {
                $('#error_alert').text('Something went wrong ,Please try again');
                $('#alertMsg').show();
            }
        });


    }



        /*************slider changes ********/

        var slider1 = document.getElementById("myRange1");
        var output1 = document.getElementById("slider_range");
        output1.innerHTML = slider1.value;

        slider1.oninput = function() {
        output1.innerHTML = this.value;
        }

        var slider2 = document.getElementById("myRange2");
        var output2 = document.getElementById("slider_range1");
        output2.innerHTML = slider2.value;

        slider2.oninput = function() {
        output2.innerHTML = this.value;
        }

        var slider3 = document.getElementById("myRange3");
        var output3 = document.getElementById("slider_range2");
        output3.innerHTML = slider3.value;

        slider3.oninput = function() {
        output3.innerHTML = this.value;
        }

        var slider4 = document.getElementById("myRange4");
        var output4 = document.getElementById("slider_range3");
        output4.innerHTML = slider4.value;

        slider4.oninput = function() {
        output4.innerHTML = this.value;
        }

        var slider5 = document.getElementById("myRange5");
        var output5 = document.getElementById("slider_range4");
        output5.innerHTML = slider5.value;

        slider5.oninput = function() {
        output5.innerHTML = this.value;
        }
        var slider6 = document.getElementById("myRange6");
        var output6 = document.getElementById("slider_range5");
        output6.innerHTML = slider6.value;

        slider6.oninput = function() {
        output6.innerHTML = this.value;
        }

</script>
