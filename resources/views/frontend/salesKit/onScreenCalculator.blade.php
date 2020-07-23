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
                                          <select  id="eligibilityCalType"  onchange="getCalView(this.value)">
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
                                <select id="commonCalculator"  onchange="getCalView(this.value)">
                                    <option value="part_payment">Part Payment Calculator</option>
                                    <option value="repricing">Repricing Calculator</option>
                                    <option value="balance_transfer">Balance Transfer Calculator</option>
                                    <option value="area_conversion">Area Conversion Calculator</option>
                                    <option value="emi">EMI Calculator</option>
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
                  <div class="row" id="commonCal">

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
                                      <select id="incentive" onchange="getCalView(this.value)">
                                          <option value="collection_incentive">Collection Incentive Calculator</option>
                                          <option value="lap_incentive">LAP Incentive Calculator</option>

                                      </select>
                                  </span>
                              </div>
                          </form>
                      </div>
                  </div>

                    <div id="incentiveCal"></div>

                </div>
              </div>
          </div>
        </div>
        <input type="hidden" value="eligibility-cal" id="selectedTab">
      </section>

<script>
        $(document).on('click','.nav-item a',function() {
            $('#selectedTab').val(this.id);
            var type=(this.id=='eligibility-cal') ? 'personal_loan' :((this.id=='common-cal') ? 'part_payment' : 'collection_incentive' );
            getCalView(type);
        });


        function getCalView(type){

            var getDivId=$('#selectedTab').val();
            var divId=(getDivId=='eligibility-cal') ? 'eligibleCal' :((getDivId=='common-cal') ? 'commonCal' : 'incentiveCal' );

            $.ajax({
                url: base_url+'/sales/kit/get_selected_view',
                type: "post",
                data: {'type':type,_token: '{{csrf_token()}}'} ,
                success: function (response) {
                    //console.log(response);

                    if(response){
                        $('#'+divId).html(response);
                    }


                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#error_alert').text('Something went wrong ,Please try again');
                    $('#alertMsg').show();
                }
            });
        }




        $( document ).ready(function() {

            getCalView('personal_loan');
        });
 </script>
@endsection
