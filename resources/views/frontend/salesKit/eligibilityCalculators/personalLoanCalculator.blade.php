
    <div class="col-md-7 border-right">
        <div class="alert alert-danger alert-dismissible fade show showError col-md-4" role="alert" style="display:none;">
        </div>
        <div class="calculate_slider">
            <div class="slider_bar">
                <p>Monthly Income (in INR)</p>
                <input class='slider changeval' id='s1'  min='0' max="20000000" oninput='am1.value=s1.value' type='range' value='0' >
            </div>
            <span id="slider_range"><input class='range__amount changeval' id='am1'  min='0' max="20000000" oninput='s1.value=am1.value' type='number' value='0'></span>
        </div>
        <div class="calculate_slider">
          <div class="slider_bar">
              <p>Obligation (in INR)</p>
              <input class='slider changeval' id='s2'  min='0' max="20000000" oninput='am2.value=s2.value' type='range' value='0'>
          </div>
          <span id="slider_range"><input class='range__amount changeval' max="20000000" id='am2'  min='0' oninput='s2.value=am2.value' type='number' value='0'></span>
      </div>
      <div class="calculate_slider">
        <div class="slider_bar">
            <p>Loan Tenure (In Months)</p>
            <input class='slider changeval' id='s3' max='240' min='12' oninput='am3.value=s3.value' type='range' value='12'>

        </div>
        <span id="slider_range"><input class='range__amount changeval' id='am3' max='240' min='12' oninput='s3.value=am3.value' type='number' value='12'></span>

    </div>
    <div class="calculate_slider">
        <div class="slider_bar">
            <p>Loan Amount (in INR)</p>
            <input class='slider changeval' id='s4' max='1500000' min='25000' oninput='am4.value=s4.value' type='range' value='25000'>
        </div>
        <span id="slider_range"><input class='range__amount changeval' id='am4' max='1500000' min='25000' oninput='s4.value=am4.value' type='number' value='25000'></span>
    </div>
    <div class="calculate_slider">
        <div class="slider_bar">
            <p>Rate Of Interest (in %)</p>
            <input class='slider changeval' id='s5' max='30' min='10' oninput='am5.value=s5.value' type='range' value='10'>
        </div>
        <span id="slider_range"><input class='range__amount changeval' id='am5' max='30' min='10'  oninput='s5.value=am5.value' type='number' value='10'></span>
    </div>


    </div>

    <div class="col-md-5 border-center">
        <h3 class="graph-caption">Break-up of Applicable Loan Amount</h3>
        <div class="graph-chart">
            <div id="semiChart">No data to display</div>
            <div class="graph_info">
                <ul>
                    <li class="legend1"><label>Principal Amt</label><span id="applicablePri">₹ 0</span></li>
                    <li class="legend2"><label>Interest Amt</label><span id="applicableInterest">₹ 0</span></li>
                </ul>
            </div>
        </div>
        <h3 class="graph-caption">Break-up of Desired Loan Amount </h3>
        <div class="graph-chart">
            <div id="desiredSemiChart">No data to display</div>
          <div class="graph_info">
              <ul>
                <li class="legend1"><label>Principal Amt</label><span id="desiredPri">₹ 0</span></li>
                <li class="legend2"><label>Interest Amt</label><span id="desiredInterest">₹ 0</span></li>
              </ul>
          </div>
      </div>
      <div class="other-info">
        <ul>
            <li><label>Applicable Loan Amount (In INR)</label><span id="oploanAmount">₹ 0</span></li>
            <li><label>Applicable EMI (In INR)</label><span id="oploanEmi">₹ 0</span></li>
            <li><label>Desired FOIR</label><span id="opFoir">0 %</span></li>
            <li><label>Desired EMI (In INR)</label><span id="opEmi">₹ 0</span></li>
            <li><label>Desired ROI</label><span id="opRoi">0 %</span></li>
        </ul>
    </div>
    </div>



<script>
$(document).ready(function(){
    //getPresonalLoan();
    $('.changeval').on('change ',function(){

       var validate= validateInput(this.id);
       if(validate){

            $('.showError').show();
            $('.showError').text(validate);
            setTimeout(function(){ $(".alert-danger").fadeOut(); }, 5000);
            return false;
       }
        getPresonalLoan();
    });
   /* $(".changeval").inputFilter(function(value) {
        return /^-?\d*$/.test(value);
    });*/
});



function getPresonalLoan(){

var monthly_income=$('#s1').val();
var Obligation=$('#s2').val();
var loan_tenure=$('#s3').val();
var expected_loan_amount=$('#s4').val();
var rate_of_interest=$('#s5').val();


if(monthly_income<=0 || Obligation<=0 || loan_tenure<=0 || expected_loan_amount<=0 || rate_of_interest<=0){
    return false;
}


$.ajax({
    url: base_url+'/sales/kit/get_personal_loan',
    type: "post",
    data: {'montly_income':monthly_income,'Obligation':Obligation,'loan_tenure':loan_tenure,'expected_loan_amount':expected_loan_amount,'rate_of_interest':rate_of_interest,_token: '{{csrf_token()}}'} ,
    success: function (response) {

        var res=JSON.parse(response);
        /*****applicable*****/
        console.log(res);
        if(res){
        var  applicableSumInt=res.applicable_amortization_details.sum_interest;
        var  applicableSumPri=res.applicable_amortization_details.sum_principal;


        semiHightChart(applicableSumPri,applicableSumInt,'semiChart');
        if(applicableSumInt<=0){
           $('#semiChart').text('No Data Available');
        }
        $('#applicablePri').text('₹ '+res.applicable_amortization_details.sum_principal_text);
        $('#applicableInterest').text('₹ '+res.applicable_amortization_details.sum_interest_text);


        /****desired*****/
        var  DesiredSumInt=res.getDesiredAmortizationDetails.sum_interest;
        var  DesiredSumPri=res.getDesiredAmortizationDetails.sum_principal;

        semiHightChart(DesiredSumPri,DesiredSumInt,'desiredSemiChart');
        if(DesiredSumInt<=0){
           $('#desiredSemiChart').text('No Data Available');
        }
        $('#desiredPri').text('₹ '+res.getDesiredAmortizationDetails.sum_principal_text);
        $('#desiredInterest').text('₹ '+res.getDesiredAmortizationDetails.sum_interest_text);

        $('#opEmi').text('₹ '+res.DesiredEmai);
        $('#opFoir').text(res.DesiredFOIR);
        $('#opRoi').text(res.DesiredROI);
        $('#oploanAmount').text('₹ '+res.ApplicableAmt_text);
        $('#oploanEmi').text('₹ '+res.ApplicableEMI_text);

        }

        //console.log(res);


    },
    error: function(jqXHR, textStatus, errorThrown) {
        $('#error_alert').text('Something went wrong ,Please try again');
        $('#alertMsg').show();
    }
});


}
function validateInput(id){

    var max =parseInt($('#'+id).attr('max'));
    var min =parseInt($('#'+id).attr('min'));
    var value=parseInt($('#'+id).val());
    var value1=$('#'+id).val();
    if(value1!=''){
    (value < min) ? $('#'+id).val(min) : ((value > max)  ? $('#'+id).val(max) : $('#'+id).val(value) ) ;
    }else{
        $('#'+id).val(0);
    }
    var msg='';

    switch (id) {
        case 'am1':
            msg=(value<=0 || value1=="") ? ' Enter monthly income'  : '';
            (msg) ? $('#s1').val(min) :  $('#s1').val(value);
            break;
        case 'am2':
            msg=(value<=0  || value1=="") ? ' Enter Obligation' : '';
            (msg) ? $('#s2').val(min) :  $('#s2').val(value);

            break;
        case 'am3':
            msg=(value<=0  || value1=="") ? ' Enter Loan Tenure' : '';
            (msg) ? $('#s3').val(min) :  $('#s3').val(value);

            break;
        case 'am4':
            msg=(value<=0  || value1=="") ? ' Enter Loan Amount' : '';
            (msg) ? $('#s4').val(min) :  $('#s4').val(value);
            break;
        case 'am5':
            msg=(value<=0  || value1=="") ? ' Enter rate of interest' : '';
            (msg) ? $('#s5').val(min) :  $('#s5').val(value);
            break;
    }

    return msg;

}



</script>
