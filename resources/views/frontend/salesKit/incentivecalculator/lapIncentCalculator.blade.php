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
            <label for="disbursement_amt"> lap incentive:Disbursement Amount (in INR):</label>
            <input type="number" class="form-control" placeholder="Enter Amount" id="disbursement_amt" >
        </div>
    </div>
  </div>
  <div class="row padding-top">
    <div class="col-sm-12 col-md-6 col-lg-4">
      <div class="form-group">
          <label for="incentive_eligible">Incentive Eligible (in %):</label>
          <input type="number" class="form-control" placeholder="Enter Incentive Eligible" id="incentive_eligible" onchange="getLapIncentive()">
      </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="form-group">
            <label for="incentive_amt">Incentive Amount (in INR):</label>
            <input type="number" class="form-control" placeholder="Enter Incentive Amount" id="incentive_amt" onchange="getLapIncentive()">
        </div>
    </div>
  </div>
  <script src="{{url('/assets_frontend/js/custom.js')}}"></script>
  <script>
    function getLapIncentive(){

        var disbursementAmt=$('#disbursement_amt').val();
        var role=$('#role').val();

        $.ajax({
            url: base_url+'/sales/kit/get_lap_incentive',
            type: "post",
            data: {'disbursementAmt':disbursementAmt,'role':role,_token: '{{csrf_token()}}'} ,
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
