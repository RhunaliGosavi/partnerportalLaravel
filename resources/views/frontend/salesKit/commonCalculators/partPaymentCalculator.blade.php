<div class="col-sm-12 col-md-6 col-lg-8 col-xl-7 sub-select">
    <div class="form-group d-lg-flex d-md-block">
      <label for="choose-balance">Choose Your Preference:</label>
        <span class="custome-select" id="choose-balance">
            <select id="select_preference" class="changeval">
                <option value="existing emi">Part pay with existing EMI</option>
                <option value="revised emi">Part pay with revised EMI</option>

            </select>
        </span>
    </div>
  </div>
  <div class="alert alert-danger alert-dismissible fade show showError col-md-4" role="alert" style="display:none;">
</div>
    <div class="col-md-7 border-right">
        <div class="calculate_slider">
            <div class="slider_bar">
                <p>Outstanding (in INR)</p>
                <input class='slider changeval' id='s11'  min='100000' max="50000000" oninput='am11.value=s11.value' type='range' value='100000' >
            </div>
            <span id="slider_range"><input class='range__amount changeval' id='am11'  min='100000' max="50000000" oninput='s11.value=am11.value' type='number' value='100000'></span>
        </div>
        <div class="calculate_slider">
          <div class="slider_bar">
              <p>Existing ROI (in %)</p>
              <input class='slider changeval' id='s22'  min='12' max="18" oninput='am22.value=s22.value' type='range' value='12'>
          </div>
          <span id="slider_range"><input class='range__amount changeval' max="18" id='am22'  min='12' oninput='s22.value=am22.value' type='number' value='12'></span>
      </div>
      <div class="calculate_slider">
        <div class="slider_bar">
            <p>Loan Tenure (In Months)</p>
            <input class='slider changeval' id='s33' max='180' min='12' oninput='am33.value=s33.value' type='range' value='12'>

        </div>
        <span id="slider_range"><input class='range__amount changeval' id='am33' max='180' min='12' oninput='s33.value=am33.value' type='number' value='12'></span>

    </div>

    <div class="calculate_slider">
        <div class="slider_bar">
            <p>Part Payment (in INR)</p>
            <input class='slider changeval' id='s55' min="0" max="50000000" oninput='am55.value=s55.value' type='range' value='0'>
        </div>
        <span id="slider_range"><input class='range__amount changeval' id='am55'  min="0" max="50000000" oninput='s55.value=am55.value' type='number' value='0'></span>
    </div>
 </div>

    <div class="col-md-5 border-center">

        <div class="other-info">
            <ul>
                <li><label>Outstansing (In INR)</label><span id="outstanding">0</span></li>
                <li><label>Revised EMI (In INR)</label><span id="reEmi">0</span></li>
                <li><label>Desired Tenure (In Months)</label><span id="desTenure">0</span></li>

            </ul>
        </div>
    </div>



  <script>
    $(document).ready(function(){
       // getLoanAgainstProperty();
        $('.changeval').on('input',function(){
          getPartPayment();
        });
    });
    function getPartPayment(){

        var outstanding=$('#s11').val();
        var existing_roi=$('#s22').val();
        var loan_tenure=$('#s33').val();
        var existing_emi=$('#s44').val();
        var part_payment=$('#s55').val();
        var type=$('#select_preference').val();

        if(outstanding<=0 || existing_roi<=0 || loan_tenure<=0 ||  part_payment<=0){
            return false;
        }


        $.ajax({
            url: base_url+'/sales/kit/get_part_payment',
            type: "post",
            data: {'outstanding':outstanding,'existing_roi':existing_roi,'loan_tenure':loan_tenure,'part_payment':part_payment,'type':type,_token: '{{csrf_token()}}'} ,
            success: function (response) {

                var res=JSON.parse(response);
                $('#outstanding').text(res.revisedOutStanding);
                $('#reEmi').text(res.revisedEmi);
                $('#desTenure').text(res.revisedTenure);


                //console.log(res);

            },
            error: function(jqXHR, textStatus, errorThrown) {
                $('#error_alert').text('Something went wrong ,Please try again');
                $('#alertMsg').show();
            }
        });


    }
    </script>
