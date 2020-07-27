<div class="col-sm-12 col-md-6 col-lg-8 col-xl-7 sub-select">
    <div class="form-group d-lg-flex d-md-block">
      <label for="choose-balance">Choose Your Preference:</label>
        <span class="custome-select" id="choose-balance">
            <select id="select_preference" class="changeval">
                <option value="change in emi">Change In EMI Only</option>
                <option value="change in tenure">Change In Tenure</option>
                <option value="part payment">Part Payment</option>

            </select>
        </span>
    </div>
  </div>
  <div class="alert alert-danger alert-dismissible fade show showError col-md-4" role="alert" style="display:none;">
</div>
    <div class="col-md-7 border-right">
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
              <input class='slider changeval' id='s22'  min='12' max="18" oninput='am22.value=s22.value' type='range' value='12'>
          </div>
          <span id="slider_range"><input class='range__amount changeval' max="18" id='am22'  min='12' oninput='s22.value=am22.value' type='number' value='12'></span>
      </div>
      <div class="calculate_slider">
        <div class="slider_bar">
            <p>Existing ROI (In %)</p>
            <input class='slider changeval' id='s33' max='50000000' min='0' oninput='am33.value=s33.value' type='range' value='0'>

        </div>
        <span id="slider_range"><input class='range__amount changeval' id='am33' max='50000000' min='0' oninput='s33.value=am33.value' type='number' value='0'></span>

    </div>
    <div class="calculate_slider">
        <div class="slider_bar">
            <p>Balance Tenure(in Months)</p>
            <input class='slider changeval' id='s44' min="12" max="180" oninput='am44.value=s44.value' type='range' value='12'>
        </div>
        <span id="slider_range"><input class='range__amount changeval' id='am44'  min="12" max="180" oninput='s44.value=am44.value' type='number' value='12'></span>
    </div>

    <div class="calculate_slider">
        <div class="slider_bar">
            <p>Existing EMI(in INR)</p>
            <input class='slider changeval' id='s55' min="12" max="180" oninput='am55.value=s55.value' type='range' value='12'>
        </div>
        <span id="slider_range"><input class='range__amount changeval' id='am55'  min="12" max="180" oninput='s55.value=am55.value' type='number' value='12'></span>
    </div>
 </div>

    <div class="col-md-5 border-center">

        <div class="other-info">
            <ul>
                <li><label>Revised Outstansing (In INR)</label><span id="reOutstanding">0</span></li>
                <li><label>Revised EMI (In INR)</label><span id="reEmi">0</span></li>
                <li><label>Revised Tenure (In Months)</label><span id="reTenure">0</span></li>

            </ul>
        </div>
    </div>
  <script>
      $(document).ready(function(){
    //getPresonalLoan();
        $('.changeval').on('input',function(){
            getBalanceTransfer();
        });

    });
    function getBalanceTransfer(){

        var existing_outstanding=$('#myRange6').val();
        var balance_tenure=$('#myRange7').val();
        var existing_roi=$('#myRange8').val();
        var existing_emi=$('#myRange9').val();
        var proposed_roi=$('#myRange10').val();
        var cost_of_bt_request=$('#myRange11').val();
        var choose_your_tenure=$('#myRange12').val();
        var choose_your_preference='existing_emi_change_in_tenure';


        $.ajax({
            url: base_url+'/sales/kit/get_balance_transfer',
            type: "post",
            data: {'existing_outstanding':existing_outstanding,'balance_tenure':balance_tenure,'existing_roi':existing_roi,'existing_emi':existing_emi,'proposed_roi':proposed_roi,'cost_of_bt_request':cost_of_bt_request,'choose_your_tenure':choose_your_tenure,'choose_your_preference':choose_your_preference,_token: '{{csrf_token()}}'} ,
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
