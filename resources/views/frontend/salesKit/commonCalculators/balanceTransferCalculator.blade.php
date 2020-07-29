<div class="col-sm-12 col-md-6 col-lg-8 col-xl-7 sub-select">
    <div class="form-group d-lg-flex d-md-block">
      <label for="choose-balance">Choose Your Preference:</label>
        <span class="custome-select" id="choose-balance">
            <select id="select_preference" class="changeval">
                <option value="existing_tenure_change_in_emi">BT-Existing Tenure And Change In EMI</option>
                <option value="existing_emi_change_in_tenure">BT-Existing EMI And Change In Tenure</option>
                <option value="flexi_loan_tenure">BT With Flexi Loan Tenure</option>

            </select>
        </span>
    </div>
  </div>

    <div class="col-md-7 border-right">
        <div class="alert alert-danger alert-dismissible fade show showError col-md-4" role="alert" style="display:none;">
        </div>
        <div class="calculate_slider">
            <div class="slider_bar">
                <p>Existing Outstanding (in INR)</p>
                <input class='slider changeval' id='s11'  min='100000' max="50000000" oninput='am11.value=s11.value' type='range' value='100000' >
            </div>
            <span id="slider_range"><input class='range__amount changeval' id='am11'  min='100000' max="50000000" oninput='s11.value=am11.value' type='number' value='100000'></span>
        </div>
        <div class="calculate_slider">
          <div class="slider_bar">
              <p>Balance Tenure  (in Months)</p>
              <input class='slider changeval' id='s22'  min='12' max="180" oninput='am22.value=s22.value' type='range' value='12'>
          </div>
          <span id="slider_range"><input class='range__amount changeval' max="180" id='am22'  min='12' oninput='s22.value=am22.value' type='number' value='12'></span>
      </div>
      <div class="calculate_slider">
        <div class="slider_bar">
            <p>Existing ROI (In %)</p>
            <input class='slider changeval' id='s33' max='18' min='12' oninput='am33.value=s33.value' type='range' value='12'>

        </div>
        <span id="slider_range"><input class='range__amount changeval' id='am33' max='18' min='12' oninput='s33.value=am33.value' type='number' value='12'></span>

    </div>
   

    <div class="calculate_slider">
        <div class="slider_bar">
            <p>Proposed ROI(in %)</p>
            <input class='slider changeval' id='s55' min="0" max="100" oninput='am55.value=s55.value' type='range' value='0'>
        </div>
        <span id="slider_range"><input class='range__amount changeval' id='am55'  min="10" max="100" oninput='s55.value=am55.value' type='number' value='0'></span>
    </div>
    <div class="calculate_slider">
        <div class="slider_bar">
            <p>Cost On BT Request(in INR)</p>
            <input class='slider changeval' id='s66' min="0" max="10000000" oninput='am66.value=s66.value' type='range' value='0'>
        </div>
        <span id="slider_range"><input class='range__amount changeval' id='am66'  min="0" max="10000000" oninput='s66.value=am66.value' type='number' value='0'></span>
    </div>
    <div class="calculate_slider">
        <div class="slider_bar">
            <p>Choose Your Tenure(in Months)</p>
            <input class='slider changeval' id='s77' min="0" max="500" oninput='am77.value=s77.value' type='range' value='0'>
        </div>
        <span id="slider_range"><input class='range__amount changeval' id='am77'  min="0" max="500" oninput='s77.value=am77.value' type='number' value='0'></span>
    </div>
 </div>

    <div class="col-md-5 border-center">

        <div class="other-info">
            <ul>
                <li><label>Revised Outstansing (In INR)</label><span id="reOutstanding">₹ 0</span></li>
                <li><label>Revised EMI (In INR)</label><span id="reEmi">₹ 0</span></li>
                <li><label>Revised Tenure (In Months)</label><span id="reTenure">₹ 0</span></li>

            </ul>
        </div>
    </div>
  <script>
      $(document).ready(function(){
    //getPresonalLoan();
        $('.changeval').on('change',function(){
            if(this.id!="select_preference"){
                var validate= validateInput(this.id);
                if(validate){

                    $('.showError').show();
                    $('.showError').text(validate);
                    setTimeout(function(){ $(".alert-danger").fadeOut(); }, 5000);
                    return false;
                }
            }
            getBalanceTransfer();
        });

    });
    function getBalanceTransfer(){

        var existing_outstanding=$('#s11').val();
        var balance_tenure=$('#s22').val();
        var existing_roi=$('#s33').val();
        
        var proposed_roi=$('#s55').val();
        var cost_of_bt_request=$('#s66').val();
        var choose_your_tenure=$('#s77').val();
        var choose_your_preference=$('#select_preference').val();



       if(existing_outstanding<=0 || balance_tenure<=0 || existing_roi<=0 ||proposed_roi<=0 || cost_of_bt_request<=0 || choose_your_tenure<=0){
           return false;
       }

        $.ajax({
            url: base_url+'/sales/kit/get_balance_transfer',
            type: "post",
            data: {'existing_outstanding':existing_outstanding,'balance_tenure':balance_tenure,'existing_roi':existing_roi,'proposed_roi':proposed_roi,'cost_of_bt_request':cost_of_bt_request,'choose_your_tenure':choose_your_tenure,'choose_your_preference':choose_your_preference,_token: '{{csrf_token()}}'} ,
            success: function (response) {

                var res=JSON.parse(response);
                 $('#reOutstanding').text('₹ '+res.Revised_outstanding);
                 $('#reEmi').text('₹ '+res.Revised_EMI);
                 $('#reTenure').text(res.revised_tenure);

                console.log(res);

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
            
            case 'am55':
                msg=(value<=0 || value1=="") ? ' Enter proposed ROI'  : '';
                (msg) ? $('#s55').val(min) :  $('#s55').val(value);
                break;
            case 'am66':
                msg=(value<=0 || value1=="") ? ' Enter cost on BT request'  : '';
                (msg) ? $('#s66').val(min) :  $('#s66').val(value);
                break;
            case 'am77':
                msg=(value<=0 || value1=="") ? ' Enter Tenure'  : '';
                (msg) ? $('#s77').val(min) :  $('#s77').val(value);
                break;
            }

        return msg;
    }
    </script>
