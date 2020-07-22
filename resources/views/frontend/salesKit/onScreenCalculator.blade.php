@extends('frontend.layouts.app')
@section('title')
	On Screen Calculator
@endsection
@section('breadcum')

    <section class="page-top">
        <div class="back-btn">
          <button class="btn"><img src="{{url('/assets_frontend/images/back-btn-icon.png')}}"></button>
        </div>
        <div class="page-heading">
          <h1>On Screen Calculator</h1>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('sales/kit')}}">Sales Kit</a></li>
              <li class="breadcrumb-item"><a href="#" class="text-dark">On Screen Calculator</a></li>
            </ol>
          </nav>
        </div>
      </section>
@endsection
@section('content')
    <section class="page-content-box">
        <div class="tab-sec">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class=" active" id="eligibility-cal" data-toggle="tab" href="#tab1" role="tab" aria-controls="eligibility-cal" aria-selected="true">Eligibility Calculators</a>
            </li>
            <li class="nav-item">
              <a class="" id="common-cal" data-toggle="tab" href="#tab2" role="tab" aria-controls="common-cal" aria-selected="false">Common Calculators</a>
            </li>
            <li class="nav-item">
              <a class="" id="incentive-cal" data-toggle="tab" href="#tab3" role="tab" aria-controls="incentive-cal" aria-selected="false">Incentive Calculators</a>
            </li>
          </ul>
          <div class="tab-content application-status sales_calculator" id="myTabContent">
              <div class="tab-pane fade show active p-0" id="tab1" role="tabpanel" aria-labelledby="tab-name1">
                  <div class="calculator_content">
                      <div class="row">
                          <div class="col-sm-12 col-md-6 col-lg-4">
                              <form>
                                  <div class="form-group">
                                      <span class="custome-select" id="loan_catagories">
                                          <select  id="eligibilityCalType"  onchange="getEligibilityCalView(this.value)">
                                              <option value="personal_loan">Personal Loan</option>
                                              <option value="loan_against_property">Loan Against Property</option>
                                              <option value="consumer_product_finance">Consumer Product Finance</option>
                                          </select>
                                      </span>
                                  </div>
                              </form>
                          </div>
                      </div>
                      <div class="row" id="eligibleCal">

                      </div>
                  </div>
              </div>
              <div class="tab-pane fade p-0" id="tab2" role="tabpanel" aria-labelledby="tab-name2">
                <div class="calculator_content">
                  <form>
                    <div class="row d-lg-flex d-md-block">
                      <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <span class="custome-select" id="calculator_catagories">
                                <select>
                                    <option>Balance Transfer Calculator</option>
                                    <option>Balance Transfer Calculator</option>
                                    <option>Balance Transfer Calculator</option>
                                </select>
                            </span>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-6 col-lg-8 col-xl-7">
                        <div class="form-group d-lg-flex d-md-block">
                          <label for="choose-balance">Choose Balance Transfer Preference:</label>
                            <span class="custome-select" id="choose-balance">
                                <select>
                                    <option>BT-Existing Tenor & Change in EMI</option>
                                    <option>BT-Existing Tenor & Change in EMI</option>
                                    <option>BT-Existing Tenor & Change in EMI</option>
                                </select>
                            </span>
                        </div>
                      </div>
                    </div>
                  </form>
                  <div class="row">
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
                  </div>
              </div>
              </div>
              <div class="tab-pane fade p-0" id="tab3" role="tabpanel" aria-labelledby="tab-name3">
                <div class="calculator_content incentive_calculator">
                  <div class="row">
                      <div class="col-sm-12 col-md-6 col-lg-4">
                          <form>
                              <div class="form-group">
                                  <span class="custome-select" id="loan_catagories">
                                      <select>
                                          <option>LAP Incentive Calculator</option>
                                          <option>LAP Incentive Calculator</option>
                                          <option>LAP Incentive Calculator</option>
                                      </select>
                                  </span>
                              </div>
                          </form>
                      </div>
                  </div>
                  <div class="row border-bottom">
                    <div class="col-sm-12 col-md-6 col-lg-4">
                      <div class="form-group">
                          <label for="role">Select Your Role:</label>
                          <span class="custome-select" id="role">
                              <select>
                                <option>Sales Officer</option>
                                <option>Sales Officer</option>
                                <option>Sales Officer</option>
                              </select>
                          </span>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="form-group">
                            <label for="disbursement_amt">Disbursement Amount (in INR):</label>
                            <input type="number" class="form-control" placeholder="Enter Amount" id="disbursement_amt">
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
                </div>
              </div>
          </div>
        </div>
      </section>

<script>

       function getPresonalLoan(){

            var monthly_income=$('#myRange1').val();
            var Obligation=$('#myRange2').val();
            var loan_tenure=$('#myRange3').val();
            var expected_loan_amount=$('#myRange4').val();
            var rate_of_interest=$('#myRange5').val();

            $.ajax({
                url: base_url+'/sales/kit/get_personal_loan',
                type: "post",
                data: {'montly_income':monthly_income,'Obligation':Obligation,'loan_tenure':loan_tenure,'expected_loan_amount':expected_loan_amount,'rate_of_interest':rate_of_interest,_token: '{{csrf_token()}}'} ,
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

        function getEligibilityCalView(type){
            alert(type);

            $.ajax({
                url: base_url+'/sales/kit/get_selected_view',
                type: "post",
                data: {'type':type,_token: '{{csrf_token()}}'} ,
                success: function (response) {

                    if(response){
                        $('#eligibleCal').html(response);
                    }


                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#error_alert').text('Something went wrong ,Please try again');
                    $('#alertMsg').show();
                }
            });
        }




        $( document ).ready(function() {

            getEligibilityCalView('personal_loan');
        });
 </script>
@endsection
