@extends('frontend.layouts.app')
@section('title')
	Application Status Tracker
@endsection
@section('breadcum')

	<section class="page-top">
      <div class="back-btn">
        <a class="btn" href="{{url()->previous()}}"><img src="{{url('/assets_frontend/images/back-btn-icon.png')}}"></a>
      </div>
      <div class="page-heading">
        <h1>Application status tracker</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{url('application/status/tracker')}}">Application status tracker</a></li>
          </ol>
        </nav>
      </div>
    </section>
@endsection
@section('content')
  <section class="page-content-box">
          <div class="application-status">
              <h2 class="mb-3">Application Status Tracker</h2>
              <p>Kindly enter following information in order to check your application status.</p>
              <div class="alert alert-danger alert-dismissible fade show showError col-md-4" role="alert" style="display:none;">
               </div>
                    <div class="row">
                      <div class="col-md-4">
                          <div class="form-group {{ $errors->has('appId') ? 'has-danger' : ''}}">
                              <label for="appId">Application ID</label>
                              <input type="number" class="form-control" placeholder="Enter ID" id="appId" name="appId" value="{{old('appId')}}">

                                <div class="form-control-feedback" id="appIdError" style="display:none">

                                </div>

                          </div>
                      </div>
                      <div class="col-md-1">
                          <span>or</span>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group {{ $errors->has('appName') ? 'has-danger' : ''}}">
                              <label for="appName">Applicant's name</label>
                              <input type="text" class="form-control" placeholder="Enter Name" id="appName" name="appName"  value="{{old('appName')}}">

                                <div class="form-control-feedback" id="appNameError" style="display:none;">

                                </div>

                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group " >
                              <label for="datepicker">Date of birth</label>
                              <input type="text" id="datepicker" class="form-control input-group date" name="datepicker" value="{{old('datepicker')}}"/>
                              <img src="{{url('assets_frontend/images/calendar.svg')}}" class="img-fluid calender" alt="calender" />
                                <div class="form-control-feedback " id="datepickerError" style="display:none;">

                                </div>

                          </div>
                      </div>
                      <div class="col-md-1">
                      </div>
                      <div class="col-md-4">
                          <div class="form-group ">
                              <label for="MobNum">Registered Mobile Number</label>
                              <input type="number" class="form-control" placeholder="Enter Mobile Number" id="MobNum" name="MobNum" value="{{old('MobNum')}}">

                                <div class="form-control-feedback" id="mobError" style="display:none;">
                                 </div>

                          </div>
                      </div>
                  </div>
                  <div class="form_btn">
                      <button type="button" id="search" class="btn btn-primary btn-search">Search</button>
                      <button type="reset" class="btn btn-primary btn-clear"  id="clearData">Clear</button>
                  </div>

          </div>
      </section>

      <section class="page-content-box" style="display:none" id="detailSec">
          <div class="application-status application_tracker">
              <h2 class="mb-4">Details</h2>
              <table class="table table-responsive">
                  <thead class="thead-dark">
                      <tr>
                          <th>Application ID</th>
                          <th>Applicant Name</th>
                          <th>Loan Product Name</th>
                          <th>Application Status</th>
                      </tr>
                  </thead>
                  <tbody id="appDetails">

                  </tbody>
              </table>
          </div>
      </section>

<!--main end-->

<script type="text/javascript">
    $(function () {
        $('#datepicker').datepicker({
        });
    });
    $('#clearData').on('click',function(){
        $('#appId').val('');
        $('#appName').val('');
        $('#datepicker').val('');
        $('#MobNum').val('');

    });
    $(document).on('click','#search', function() {
        $("#mobError").text('');
        $("#appIdError").text('');
        $("#appNameError").text('');
        $("#datepickerError").text('');

        var appId= $('#appId').val();
        var appName= $('#appName').val();
        var datepicker= $('#datepicker').val();
        var MobNum= $('#MobNum').val();

        $.ajax({
            url: base_url+'/application/status',
            type: "post",
            data: {'appId':appId,'appName':appName,'datepicker':datepicker,'MobNum':MobNum,_token: '{{csrf_token()}}'} ,
            success: function (response) {

                var res=JSON.parse(response);
                if(res.statusInfo.status=='SUCCESS'){

                   html='';
                   var app_name=res.response.APPLICANT_NAME;
                   var appdet=res.response.APPLICATION_DETAILS;
                    $.each(appdet, function(key, value) {
                        if(appdet.length>0){
                            html+=' <tr> <td>'+appdet[key]['APPLICATION_NO']+'</td> <td>'+app_name+'</td><td>'+appdet[key]['PRODUCT']+'</td> <td>'+appdet[key]['STATUS']+'</td> </tr>';
                        }
                    });
                    html=(html!='') ? html : '<tr><td colspan="2" class="text-center">NO DATA AVAILABLE</td></tr>';
                    $('#appDetails').append(html);
                    $('#detailSec').show();
                }else{
                    $('.showError').show();
                    $('.showError').text(res.response);
                    setTimeout(function(){ $(".alert-danger").fadeOut(); }, 5000);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                //console.log(jqXHR);
            if(jqXHR.responseJSON.errors){
              if(jqXHR.responseJSON.errors.MobNum){
                    $('#mobError').show();
                    $("#mobError").append('<span style="color:red">'+jqXHR.responseJSON.errors.MobNum[0]+'</span>');
                }

                if(jqXHR.responseJSON.errors.appId){

                    $('#appIdError').show();
                    $("#appIdError").append('<span style="color:red">'+jqXHR.responseJSON.errors.appId[0]+'</span>');
                }
                if(jqXHR.responseJSON.errors.appName){

                    $('#appNameError').show();
                    $("#appNameError").append('<span style="color:red">'+jqXHR.responseJSON.errors.appName[0]+'</span>');
                }
                if(jqXHR.responseJSON.errors.datepicker){

                    $('#datepickerError').show();
                    $("#datepickerError").append('<span style="color:red">'+jqXHR.responseJSON.errors.datepicker[0]+'</span>');
                }
              }else{

                $('.showError').show();
                    $('.showError').text('Something went wrong, Please try after some time');
                    setTimeout(function(){ $(".alert-danger").fadeOut(); }, 5000);

              }
            }
        });
    });

    </script>
@endsection
