<div class="col-md-7 border-right">
    <div class="calculate_slider">
        <div class="slider_bar">
            <p>Repricing cal:Existing Outstanding (in INR)</p>
            <input type="range" min="10000" max="100000" value="10000" class="slider" id="myRange6" onchange="getRepricing()">
        </div>
        <span id="slider_range6"></span>
    </div>
    <div class="calculate_slider">
        <div class="slider_bar">
            <p>Balance Tenure (in Months)</p>
            <input type="range" min="10000" max="100000" value="10000" class="slider" id="myRange7" onchange="getRepricing()">
        </div>
        <span id="slider_range7"></span>
    </div>
    <div class="calculate_slider">
        <div class="slider_bar">
            <p>Existing Rate of Interest (in %)</p>
            <input type="range" min="10000" max="100000" value="10000" class="slider" id="myRange8" onchange="getRepricing()">
        </div>
        <span id="slider_range8"></span>
    </div>
    <div class="calculate_slider">
        <div class="slider_bar">
            <p>Existing EMI (in INR)</p>
            <input type="range" min="10000" max="100000" value="10000" class="slider" id="myRange9" onchange="getRepricing()">
        </div>
        <span id="slider_range9"></span>
    </div>
    <div class="calculate_slider">
        <div class="slider_bar">
            <p>Proposed Rate of Interest (in %)</p>
            <input type="range" min="10000" max="100000" value="10000" class="slider" id="myRange10" onchange="getRepricing()">
        </div>
        <span id="slider_range10"></span>
    </div>

  </div>

  <div class="col-md-5 border-center">
      <div class="graph-chart">
          <img src="{{url('/assets_frontend/images/graph.png')}}" class="img-fluid" alt="graph">
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
    function getRepricing(){

        var existing_outstanding=$('#myRange6').val();
        var balance_tenure=$('#myRange7').val();
        var existing_roi=$('#myRange8').val();
        var existing_emi=$('#myRange9').val();
        var proposed_roi=$('#myRange10').val();
        var type='part payment';


        $.ajax({
            url: base_url+'/sales/kit/get_repricing',
            type: "post",
            data: {'existing_outstanding':existing_outstanding,'balance_tenure':balance_tenure,'existing_roi':existing_roi,'existing_emi':existing_emi,'proposed_roi':proposed_roi,'type':type,_token: '{{csrf_token()}}'} ,
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
