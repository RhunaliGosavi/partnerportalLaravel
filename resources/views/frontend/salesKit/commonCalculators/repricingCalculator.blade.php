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
              <p>Existing ROI (in %)</p>
              <input class='slider changeval' id='s22'  min='12' max="18" step="0.1" oninput='am22.value=s22.value' type='range' value='12'>
          </div>
          <span id="slider_range"><input class='range__amount changeval' max="18" step="0.1" id='am22'   min='12' oninput='s22.value=am22.value' type='number' value='12'></span>
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
            <p>Proposed ROI(in %)</p>
            <input class='slider changeval' id='s55' min="8" max="36" step="0.1" oninput='am55.value=s55.value' type='range' value='8'>
        </div>
        <span id="slider_range"><input class='range__amount changeval' id='am55'  step="0.1" min="8" max="36" oninput='s55.value=am55.value' type='number' value='8'></span>
    </div>
 </div>

    <div class="col-md-5 border-center">

        <div class="other-info">
            <ul>
                <li><label>Revised Outstansing (In INR)</label><span id="reOutstanding">₹ 0</span></li>
                <li><label>Revised EMI (In INR)</label><span id="reEmi">₹ 0</span></li>
                <li><label>Revised Tenure (In Months)</label><span id="reTenure"> 0</span></li>

            </ul>
        </div>
    </div>

  <script>
    $(document).ready(function(){
        if($('#s11').val()!=0 || $('#s22').val()!=0  || $('#s44').val()!=0 || $('#s55').val()!=0){
            getRepricing();
        }
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
            getRepricing();
        });

    });
    function getRepricing(){

        var existing_outstanding=$('#s11').val();
        var type=$('#select_preference').val();
        var existing_roi=$('#s22').val();
        var balance_tenure=$('#s44').val();
        var proposed_roi=$('#s55').val();




       if(existing_outstanding<=0 || existing_roi<=0  || balance_tenure<=0 || proposed_roi<=0){

           return false;
       }
        $.ajax({
            url: base_url+'/sales/kit/get_repricing',
            type: "post",
            data: {'existing_outstanding':existing_outstanding,'balance_tenure':balance_tenure,'existing_roi':existing_roi,'proposed_roi':proposed_roi,'type':type,_token: '{{csrf_token()}}'} ,
            success: function (response) {

                var res=JSON.parse(response);
                $('#reOutstanding').text('₹ '+res.revisedOutStanding);
                $('#reEmi').text('₹ '+res.revisedEMI);
                $('#reTenure').text(res.revisedTenure);

                //console.log(res);

            },
            error: function(jqXHR, textStatus, errorThrown) {
                $('#error_alert').text('Something went wrong ,Please try again');
                $('#alertMsg').show();
            }
        });


    }
    function validateInput(id){

        var max =parseFloat($('#'+id).attr('max'));
        var min =parseFloat($('#'+id).attr('min'));
        var value=parseFloat($('#'+id).val());
        var value1=$('#'+id).val();
        if(value1!=''){
        (value < min) ? $('#'+id).val(min) : ((value > max)  ? $('#'+id).val(max) : $('#'+id).val(value) ) ;
        }else{
            $('#'+id).val(0);
        }
        /*var msg='';

        switch (id) {

         }

        return msg;*/
    }
    </script>
