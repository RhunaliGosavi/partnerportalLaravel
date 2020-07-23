<div class="col-md-7 border-right">
    <div class="calculate_slider">
        <div class="slider_bar">
            <p>emi cal:Loan Value</p>
            <input type="range" min="10000" max="100000" value="10000" class="slider" id="myRange6" onchange="getEmiCalculator()">
        </div>
        <span id="slider_range6"></span>
    </div>
    <div class="calculate_slider">
        <div class="slider_bar">
            <p> Rate of Interest (in %)</p>
            <input type="range" min="10000" max="100000" value="10000" class="slider" id="myRange7">
        </div>
        <span id="slider_range7"></span>
    </div>
    <div class="calculate_slider">
        <div class="slider_bar">
            <p>Loan Tenure</p>
            <input type="range" min="10000" max="100000" value="10000" class="slider" id="myRange8">
        </div>
        <span id="slider_range8"></span>
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
    function getEmiCalculator(){

        var loan_amount=$('#myRange6').val();
        var roi=$('#myRange7').val();
        var loan_tenure=$('#myRange8').val();

        $.ajax({
            url: base_url+'/sales/kit/get_emi_calculator',
            type: "post",
            data: {'loan_amount':loan_amount,'roi':roi,'loan_tenure':loan_tenure,_token: '{{csrf_token()}}'} ,
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
