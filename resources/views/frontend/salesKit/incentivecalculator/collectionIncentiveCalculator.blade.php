<div class="row border-bottom">
    <div class="col-sm-12 col-md-6 col-lg-4">
      <div class="form-group">
          <label for="role">Choose Type:</label>
          <span class="custome-select" id="getType">
              <select onchange="getCollectionIncentive()">
                <option value="pick up">PickUp</option>
                <option value="preference">Preference</option>

              </select>
          </span>
      </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="form-group">
            <label for="disbursement_amt">Disbursement Amount (in INR):</label>
            <input type="number" class="form-control" placeholder="Enter Amount" id="disbursement_amt" onchange="getCollectionIncentive()">
        </div>
    </div>
  </div>
  <div class="row padding-top">
    <div class="col-sm-12 col-md-6 col-lg-4">
      <div class="form-group">
          <label for="incentive_eligible">Incentive Eligible (in %):</label>
          <input type="number" class="form-control" placeholder="Enter Incentive Eligible" id="incentive_eligible">
      </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="form-group">
            <label for="incentive_amt">Incentive Amount (in INR):</label>
            <input type="number" class="form-control" placeholder="Enter Incentive Amount" id="incentive_amt">
        </div>
    </div>
  </div>
  <script src="{{url('/assets_frontend/js/custom.js')}}"></script>
  <script>
    function getCollectionIncentive(){

        var type='preference';
        var emiCollect=10000;
        var noOfCases=12;
        var bucketTYpe='bkt1';
        var rollback=100000;
        var posOd=1233;
        var posForOdCollected=435435;


        $.ajax({
            url: base_url+'/sales/kit/get_collection_incentive',
            type: "post",
            data: {'type':type,'emiCollect':emiCollect,'noOfCases':noOfCases,'bucketTYpe':bucketTYpe,'rollback':rollback,'posOd':posOd,'posForOdCollected':posForOdCollected,_token: '{{csrf_token()}}'} ,
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
