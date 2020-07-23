<div class="col-md-7 border-right">
    <div class="calculate_slider">
        <div class="slider_bar">
            <p>PartPayment:Existing Outstanding (in INR)</p>
            <input type="range" min="10000" max="100000" value="10000" class="slider" id="myRange6"  onchange="getPartPayment()">
        </div>
        <span id="slider_range6"></span>
    </div>
    <div class="calculate_slider">
        <div class="slider_bar">
            <p>Existing Rate of Interest (in %)</p>
            <input type="range" min="10000" max="100000" value="10000" class="slider" id="myRange7" onchange="getPartPayment()">
        </div>
        <span id="slider_range7"></span>
    </div>
    <div class="calculate_slider">
        <div class="slider_bar">
            <p>Loan Tenure</p>
            <input type="range" min="10000" max="100000" value="10000" class="slider" id="myRange8" onchange="getPartPayment()">
        </div>
        <span id="slider_range8"></span>
    </div>
    <div class="calculate_slider">
        <div class="slider_bar">
            <p>Existing Emi</p>
            <input type="range" min="10000" max="100000" value="10000" class="slider" id="myRange9" onchange="getPartPayment()">
        </div>
        <span id="slider_range9"></span>
    </div>
    <div class="calculate_slider">
        <div class="slider_bar">
            <p>Part Payment</p>
            <input type="range" min="10000" max="100000" value="10000" class="slider" id="myRange10" onchange="getPartPayment()">
        </div>
        <span id="slider_range10"></span>
    </div>

  </div>

  <div class="col-md-5 border-center">
      <div class="graph-chart">
          <img src="{{url('/assets_frontend/images/graph.png')}}" class="img-fluid" alt="graph" >
          <div class="graph_info">
              <p>Revised Outstanding</p>
              <span>₹ 25,000</span>
          </div>
      </div>
      <div class="graph-chart ">
          <img src="{{url('/assets_frontend/images/graph.png')}}" class="img-fluid" alt="graph">
          <div class="graph_info">
              <p>Revised EMI</p>
              <span>₹ 25,000</span>
          </div>
      </div>
      <div class="graph-chart ">
        <img src="{{url('/assets_frontend/images/graph.png')}}" class="img-fluid" alt="graph">
        <div class="graph_info">
            <p>Revised Tenure</p>
            <span>₹ 25,000</span>
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
