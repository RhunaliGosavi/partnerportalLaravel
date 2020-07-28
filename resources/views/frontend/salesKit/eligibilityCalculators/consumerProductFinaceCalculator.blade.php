
    <div class="col-md-7 border-right">

        <div class="alert alert-danger alert-dismissible fade show showError col-md-4" role="alert" style="display:none;">
        </div>
        <div class="calculate_slider">
            <div class="slider_bar">
                <p>Loan Amount (in INR)</p>
                <input class='slider changeval' id='s1'  min='5000' max="1000000" oninput='am1.value=s1.value' type='range' value='0' >
            </div>
            <span id="slider_range"><input class='range__amount changeval' id='am1'  min='5000' max="1000000" oninput='s1.value=am1.value' type='number' value='0'></span>
        </div>
        <div class="calculate_slider">
          <div class="slider_bar">
              <p>Rate Of Intterest (in %)</p>
              <input class='slider changeval' id='s2'  oninput='am2.value=s2.value' type='range' value='0'>
          </div>
          <span id="slider_range"><input class='range__amount changeval' id='am2'  oninput='s2.value=am2.value' type='number' value='0'></span>
      </div>
      <div class="calculate_slider">
        <div class="slider_bar">
            <p>Loan Tenure (In Months)</p>
            <input class='slider changeval' id='s3' max='36' min='6' oninput='am3.value=s3.value' type='range' value='6'>

        </div>
        <span id="slider_range"><input class='range__amount changeval' id='am3' max='36' min='6' oninput='s3.value=am3.value' type='number' value='6'></span>

    </div>
    <div class="calculate_slider">
        <div class="slider_bar">
            <p>Advance EMI (In Months)</p>
            <input class='slider changeval' id='s4' min="0" max="500" oninput='am4.value=s4.value' type='range' value='0'>
        </div>
        <span id="slider_range"><input class='range__amount changeval' min="0" max="500" id='am4'  oninput='s4.value=am4.value' type='number' value='0'></span>
    </div>


    </div>

    <div class="col-md-5 border-center">
        <h3 class="graph-caption">Break-up of Net Loan Amount</h3>
        <div class="graph-chart">
            <div id="semiChart">No data to display</div>
            <div class="graph_info">
                <ul>
                    <li class="legend1"><label>Principal Amt</label><span id="applicablePri">₹ 0</span></li>
                    <li class="legend2"><label>Interest Amt</label><span id="applicableInterest">₹ 0</span></li>
                </ul>
            </div>
        </div>

      <div class="other-info">
        <ul>

            <li><label> EMI (In INR)</label><span id="emi">₹ 0</span></li>
            <li><label>Advanced EMI (In INR)</label><span id="advEmi">₹ 0</span></li>
            <li><label>Net Loan (In INR)</label><span id="netLoan">₹ 0</span></li>

        </ul>
    </div>
    </div>
<script>
     $(document).ready(function(){
       // getLoanAgainstProperty();
       $('.changeval').on('change',function(){
        var validate= validateInput(this.id);
        if(validate){

            $('.showError').show();
            $('.showError').text(validate);
            setTimeout(function(){ $(".alert-danger").fadeOut(); }, 5000);
            return false;
        }
        getConsumerProductFinance();
      });
    });
    function getConsumerProductFinance(){

        var loan_amount=$('#s1').val();
        var interest=$('#s2').val();
        var loan_tenure=$('#s3').val();
        var advance_emi=$('#s4').val();
        if(loan_amount<=0 || interest<=0 || advance_emi<=0){
            return false;
        }

        $.ajax({
            url: base_url+'/sales/kit/get_consumer_product_finance',
            type: "post",
            data: {'loan_amount':loan_amount,'interest':interest,'loan_tenure':loan_tenure,'advance_emi':advance_emi,_token: '{{csrf_token()}}'} ,
            success: function (response) {

                var res=JSON.parse(response);

                var  applicableSumInt=(res.applicable_amortization_details!='undefined') ? res.applicable_amortization_details.sum_interest : 0;
                var  applicableSumPri=(res.applicable_amortization_details!='undefined') ? res.applicable_amortization_details.sum_principal : 0;

                semiHightChart(applicableSumPri,applicableSumInt,'semiChart');
                if(applicableSumInt<=0){
                    $('#semiChart').text('No data available');
                }

                $('#applicablePri').text('₹ '+res.applicable_amortization_details.sum_principal_text);
                $('#applicableInterest').text('₹ '+res.applicable_amortization_details.sum_interest_text);

                $('#emi').text('₹ '+res.Emi_text);
                $('#advEmi').text('₹ '+res.AdvancedEMI_text);
                $('#netLoan').text('₹ '+res.NetLoan_text);



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
                msg=(value<=0 || value1=="") ? ' Enter loan amount'  : '';
                (msg) ? $('#s1').val(min) :  $('#s1').val(value);
                break;
            case 'am2':
                msg=(value<=0  || value1=="") ? ' Enter rate of interest' : '';
                (msg) ? $('#s2').val(min) :  $('#s2').val(value);

                break;

            case 'am4':
                msg=(value<=0  || value1=="") ? ' Enter advance EMI' : '';
                (msg) ? $('#s4').val(min) :  $('#s4').val(value);
                break;


        }

        return msg;
    }
    </script>

