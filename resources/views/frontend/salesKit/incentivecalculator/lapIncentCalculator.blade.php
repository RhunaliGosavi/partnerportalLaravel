<div class="alert alert-danger alert-dismissible fade show showError col-md-4" role="alert" style="display:none;">
</div>
<div class="row border-bottom">
    <div class="col-sm-12 col-md-6 col-lg-4">
      <div class="form-group">
          <label for="role">Select Your Role:</label>
          <span class="custome-select" >
              <select id="role">
                <option value="sales officer">Sales Officer</option>
                <option value="portfolio manager">Portfolio Manager</option>
                <option value="area sales manager">Area sales Manager</option>
              </select>
          </span>
      </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="form-group">
            <label for="disbursement_amt"> Disbursement Amount (in INR):</label>
            <input type="number" class="form-control" placeholder="Enter Amount" id="disbursement_amt" >
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-4">
        <button type="button" class="btn btn-primary btn-search custom-btn" onclick="getLapIncentive()">Submit</button>
      </div>
  </div>
    <div class="row padding-top opBlock" style="display:none;">
        <div class="col-12">
          <table class="area-tbl">
            <tr>
              <td>Incentive Eligible (In %) </td>
              <td id="inceEligible"></td>
            </tr>
            <tr>
              <td>Incentive Amount (In INR) </td>
              <td id="incAmount"></td>
            </tr>
          </table>
        </div>
      </div>


  <script>
    function getLapIncentive(){

        var disbursementAmt=$('#disbursement_amt').val();
        var role=$('#role').val();
        if(disbursementAmt==''){
            $('.showError').show();
            $('.showError').text('Enter disbursrment amount');
            setTimeout(function(){ $(".alert-danger").fadeOut(); }, 5000);
            return false;
        }

        $.ajax({
            url: base_url+'/sales/kit/get_lap_incentive',
            type: "post",
            data: {'disbursementAmt':disbursementAmt,'role':role,_token: '{{csrf_token()}}'} ,
            success: function (response) {

                var res=JSON.parse(response);
                $('.opBlock').hide();
                if(res){
                    $('#inceEligible').text(res.Incentive_eligible+ ' %');
                    $('#incAmount').text('₹ '+res.Incentive_amount);
                    $('.opBlock').show();
                }
                //console.log(res);

            },
            error: function(jqXHR, textStatus, errorThrown) {
                $('#error_alert').text('Something went wrong ,Please try again');
                $('#alertMsg').show();
            }
        });


    }
    </script>
