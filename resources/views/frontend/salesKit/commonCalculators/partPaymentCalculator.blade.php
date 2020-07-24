<div class="col-sm-12 col-md-6 col-lg-8 col-xl-7 sub-select">
    <div class="form-group d-lg-flex d-md-block">
      <label for="choose-balance">Part payment :Choose Balance Transfer Preference:</label>
        <span class="custome-select" id="choose-balance">
            <select>
                <option>BT-Existing Tenor & Change in EMI</option>
                <option>BT-Existing Tenor & Change in EMI</option>
                <option>BT-Existing Tenor & Change in EMI</option>
            </select>
        </span>
    </div>
  </div>
    <div class="col-md-7 border-right">
      <div class="calculate_slider">
          <div class="slider_bar">
              <p>Existing Outstanding (in INR)</p>
              <input type="range" min="10000" max="100000" value="10000" class="slider" id="myRange6">
          </div>
          <span id="slider_range6"></span>
      </div>
      <div class="calculate_slider">
          <div class="slider_bar">
              <p>Balance Tenure (in Months)</p>
              <input type="range" min="10000" max="100000" value="10000" class="slider" id="myRange7">
          </div>
          <span id="slider_range7"></span>
      </div>
      <div class="calculate_slider">
          <div class="slider_bar">
              <p>Existing Rate of Interest (in %)</p>
              <input type="range" min="10000" max="100000" value="10000" class="slider" id="myRange8">
          </div>
          <span id="slider_range8"></span>
      </div>
      <div class="calculate_slider">
          <div class="slider_bar">
              <p>Existing EMI (in INR)</p>
              <input type="range" min="10000" max="100000" value="10000" class="slider" id="myRange9">
          </div>
          <span id="slider_range9"></span>
      </div>
      <div class="calculate_slider">
          <div class="slider_bar">
              <p>Proposed Rate of Interest (in %)</p>
              <input type="range" min="10000" max="100000" value="10000" class="slider" id="myRange10">
          </div>
          <span id="slider_range10"></span>
      </div>
      <div class="calculate_slider">
        <div class="slider_bar">
            <p>Proposed Tenure (in Months)</p>
            <input type="range" min="10000" max="100000" value="10000" class="slider" id="myRange11">
        </div>
        <span id="slider_range11"></span>
      </div>
    </div>

    <div class="col-md-5 border-center">
        <div class="graph-chart">
            <img src="images/graph.png" class="img-fluid" alt="graph">
            <div class="graph_info">
                <p>Revised Outstanding</p><span>₹ 25,000</span>
            </div>
        </div>
        <div class="graph-chart ">
            <img src="images/graph.png" class="img-fluid" alt="graph">
            <div class="graph_info">
                <p>Revised EMI</p>
                <span>₹ 25,000</span>
            </div>
        </div>
        <div class="graph-chart ">
          <img src="images/graph.png" class="img-fluid" alt="graph">
          <div class="graph_info">
              <p>Revised Tenure</p>
              <span>₹ 25,000</span>
          </div>
      </div>
    </div>
</div>
</div>
  <script src="{{url('/assets_frontend/js/custom.js')}}"></script>
  <script>
    function getPartPayment(){

        var outstanding=$('#myRange6').val();
        var existing_roi=$('#myRange7').val();
        var loan_tenure=$('#myRange8').val();
        var existing_emi=$('#myRange9').val();
        var part_payment=$('#myRange10').val();
        var type='existing emi';


        $.ajax({
            url: base_url+'/sales/kit/get_part_payment',
            type: "post",
            data: {'outstanding':outstanding,'existing_roi':existing_roi,'loan_tenure':loan_tenure,'existing_emi':existing_emi,'part_payment':part_payment,'type':type,_token: '{{csrf_token()}}'} ,
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
