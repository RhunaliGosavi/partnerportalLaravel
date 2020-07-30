

    <div class="col-md-7 border-right">
        <div class="alert alert-danger alert-dismissible fade show showError col-md-4" role="alert" style="display:none;">
        </div>
        <div class="calculate_slider">
            <div class="slider_bar">
                <p>Loan value(in INR)</p>
                <input class='slider changeval' id='s11'  min='5000' max="50000000" oninput='am11.value=s11.value' type='range' value='5000' >
            </div>
            <span id="slider_range"><input class='range__amount changeval' id='am11'  min='5000' max="50000000" oninput='s11.value=am11.value' type='number' value='5000'></span>
        </div>
        <div class="calculate_slider">
          <div class="slider_bar">
              <p>Rate Of Interest (in %)</p>
              <input class='slider changeval' id='s22'  min='8' max="36" step=0.1 oninput='am22.value=s22.value' type='range' value='8'>
          </div>
          <span id="slider_range"><input class='range__amount changeval' max="36"  step=0.1 id='am22'  min='8' oninput='s22.value=am22.value' type='number' value='8'></span>
      </div>
      <div class="calculate_slider">
        <div class="slider_bar">
            <p>Loan Tenure (In Months)</p>
            <input class='slider changeval' id='s33' max='180' min='6' oninput='am33.value=s33.value' type='range' value='6'>

        </div>
        <span id="slider_range"><input class='range__amount changeval' id='am33' max='180' min='6' oninput='s33.value=am33.value' type='number' value='6'></span>

    </div>

 </div>

    <div class="col-md-5 border-center">

        <div class="other-info">
            <ul>
                <li><label>EMI(In INR)</label><span id="emi">₹ 0</span></li>
                <li><label>Interest Paid (In INR)</label><span id="intPaid">₹ 0</span></li>
                <li><label>Total Outflow (In INR)</label><span id="totalOutflow">₹ 0</span></li>

            </ul>
        </div>
    </div>

  <script>
      $(document).ready(function(){
        if($('#s11').val()!=0 && $('#s22').val()!=0 && $('#s33').val()!=0){
           getEmiCalculator();
        }
        $('.changeval').on('change',function(){
            var validate= validateInput(this.id);
            if(validate){

                $('.showError').show();
                $('.showError').text(validate);
                setTimeout(function(){ $(".alert-danger").fadeOut(); }, 5000);
                return false;
            }
            getEmiCalculator();
        });

    });
    function getEmiCalculator(){

        var loan_amount=$('#s11').val();
        var roi=$('#s22').val();
        var loan_tenure=$('#s33').val();

        if(loan_amount<=0 || roi<=0 || loan_tenure<=0){
            return false;
        }

        $.ajax({
            url: base_url+'/sales/kit/get_emi_calculator',
            type: "post",
            data: {'loan_amount':loan_amount,'roi':roi,'loan_tenure':loan_tenure,_token: '{{csrf_token()}}'} ,
            success: function (response) {

                var res=JSON.parse(response);
                $('#emi').text('₹ '+res.Emi);
                $('#intPaid').text('₹ '+res.intetest_paid);
                $('#totalOutflow').text('₹ '+res.total_overflow);

                console.log(res);

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
            case 'am22':
                msg=(value<=0 || value1=="") ? ' Enter rate of interest'  : '';
                (msg) ? $('#s22').val(min) :  $('#s22').val(value);
                break;
            case 'am33':
                msg=(value<=0 || value1=="") ? ' Enter loan tenure'  : '';
                (msg) ? $('#s33').val(min) :  $('#s33').val(value);
                break;
            }

        return msg;*/
    }
    </script>
