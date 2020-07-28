
    <div class="calculator_content incentive_calculator">
      <div class="row">

            <div class="col-sm-12 col-md-6 col-lg-4">

                <div class="form-group">
                    <span class="custome-select" id="loan_catagories">
                        <select id="selectType">
                          <option value="pick up">Pick Up</option>
                          <option value="preference">Choose your Preference</option>
                        </select>
                    </span>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 preferenceField" style="display:none;">
                <form>
                    <div class="form-group">
                        <span class="custome-select" >
                            <select id="bucketType">
                                <option value="bkt1">Bucket-1 : Referral (Day 1 to 30)</option>
                                <option value="bkt2">Bucket-2 : DPD  (Day 31 to 60)</option>
                                <option value="bkt3">Bucket-3 : DPD  (Day 61 to 90)</option>
                                <option value="bkt4">Bucket-4 : DPD  (Day 120 And Above)</option>
                            </select>
                        </span>
                    </div>
                </form>
            </div>
      </div>
      <div class="alert alert-danger alert-dismissible fade show showError col-md-4" role="alert" style="display:none;">
    </div>

    <div class="row pickUpField" id="pickupField">
      <div class="col-sm-12 col-md-6 col-lg-4">
        <div class="form-group">
          <label for="cases">Total No. of cases (In count):</label>
          <input type="number" class="form-control" placeholder="Enter No Of Cases" id="cases">
      </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4">
          <div class="form-group">
              <label for="EmiCollect">EMI collected (Only Bucket-1:Pick up):</label>
              <input type="number" class="form-control" placeholder="Enter Amount" id="EmiCollect">
          </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4">
        <button type="button" class="btn btn-primary btn-search custom-btn" onclick="getCollectionIncentive('pickUp')">Submit</button>
      </div>
    </div>
      <div class="row preferenceField" id="preferenceField" style="display:none;">
        <div class="col-sm-12 col-md-6 col-lg-4">
          <div class="form-group">
            <label for="collectedAmount">Amount To Be Collected (Over Due):</label>
            <input type="number" class="form-control" placeholder="Enter Amount" id="collectedAmount">
        </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="form-group">
                <label for="posod">POS OD (In INR)</label>
                <input type="number" class="form-control" placeholder="Enter POS OD" id="posod">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="form-group">
                <label for="rollback">RollBack (In INR)</label>
                <input type="number" class="form-control" placeholder="Enter Rollback" id="rollback">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="form-group">
                <label for="posForOdCollected">POS For OD Collected (In INR)</label>
                <input type="number" class="form-control" placeholder="Enter POS For OD Collected" id="posForOdCollected">
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
          <button type="button" class="btn btn-primary btn-search custom-btn" onclick="getCollectionIncentive('preference')">Submit</button>
        </div>
      </div>
      <div class="row pickUpOpt" style="display:none;">
        <div class="col-12">
          <table class="area-tbl">
            <tr>
              <td>% achieved (Only Bucket-1:Pick up</td>
              <td id="achievedPer"></td>
            </tr>
            <tr>
              <td>Incentive per case (In INR) (Only Bucket-1:Pick Up)</td>
              <td id="incentivePer"></td>
            </tr>
          </table>
        </div>
      </div>

      <div class="row referenceOpt" style="display:none;">
        <div class="col-12">
          <table class="area-tbl">
            <tr>
              <td>Rollback (In %)</td>
              <td id="optRollback"></td>
            </tr>
            <tr>
              <td>Resolution (In %)</td>
              <td id="optResolution"></td>
            </tr>
            <tr>
                <td>Comission (In %)</td>
                <td id="optComission"></td>
            </tr>
            <tr>
                <td>Incentive Amount (In INR</td>
                <td id="incentiveAmount"></td>
            </tr>
          </table>
        </div>
      </div>

    </div>

  <script>
      $(document).ready(function(){

          $('#selectType').on('change',function(){
              $('.preferenceField').hide();
              $('.pickUpField').hide();
              $('.referenceOpt').hide();
              $('.pickUpOpt').hide();
              if(this.value=='pick up'){
                $('#EmiCollect').val('');
                $('#cases').val('');
                $('.pickUpField').show();
              }
              if(this.value=='preference'){
                $('#bucketType').val('bkt1');
                $('#rollback').val('');
                $('#posod').val('');
                $('#posForOdCollected').val('');
                $('#collectedAmount').val('');
                $('.preferenceField').show('');
              }

          });
      });
    function getCollectionIncentive($type){

        var type=$('#selectType').val();
        var emiCollect=$('#EmiCollect').val();
        var noOfCases=$('#cases').val();
        var bucketTYpe=$('#bucketType').val();
        var rollback=$('#rollback').val();
        var posOd=$('#posod').val();
        var posForOdCollected=$('#posForOdCollected').val();
        var amountTobeCollected=$('#collectedAmount').val();
        if($type=='pickUp'){
            msg='';
            if(emiCollect==''){
                msg='Enter EMI collected';
            }
            if(noOfCases==''){
                msg='Enter number Of cases';
            }
            if(msg!=''){
                $('.showError').show();
                $('.showError').text(msg);
                setTimeout(function(){ $(".alert-danger").fadeOut(); }, 5000);
                return false;

            }
        }
        if($type=='preference'){
            msg='';
            if(rollback==''){
                msg='Enter rollback';
            }
            if(posOd==''){
                msg='Enter POS OD';
            }
            if(posForOdCollected==''){
                msg='Enter POS for OD collected';
            }
            if(msg!=''){
                $('.showError').show();
                $('.showError').text(msg);
                setTimeout(function(){ $(".alert-danger").fadeOut(); }, 5000);
                return false;

            }
        }


        $.ajax({
            url: base_url+'/sales/kit/get_collection_incentive',
            type: "post",
            data: {'type':type,'emiCollect':emiCollect,'noOfCases':noOfCases,'bucketTYpe':bucketTYpe,'rollback':rollback,'posOd':posOd,'posForOdCollected':posForOdCollected,_token: '{{csrf_token()}}'} ,
            success: function (response) {

                var res=JSON.parse(response);
                $('.pickUpOpt').hide();
                $('.referenceOpt').hide();
                if($type=='pickUp'){
                     $('#achievedPer').text(res.archieved +' %');
                     $('#incentivePer').text(res.incentivePerCase);
                     $('.pickUpOpt').show();
                }
                if($type=="preference"){
                    $('#optRollback').text(res.rollback + ' %');
                    $('#optResolution').text(res.resolution + ' %');
                    $('#optComission').text(res.comission + ' %');
                    $('#incentiveAmount').text('₹ '+res.incentiveAmount);
                    $('.referenceOpt').show();
                }

                console.log(res);

            },
            error: function(jqXHR, textStatus, errorThrown) {
                $('#error_alert').text('Something went wrong ,Please try again');
                $('#alertMsg').show();
            }
        });


    }
    </script>
