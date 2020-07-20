@extends('frontend.layouts.app')
@section('title')
	Apply Now
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
            <li class="breadcrumb-item"><a href="{{url('apply_now')}}">Application status tracker</a></li>
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
              <form>
                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="appId">Application ID</label>
                              <input type="number" class="form-control" placeholder="Enter ID" id="appId">
                          </div>
                      </div>
                      <div class="col-md-1">
                          <span>or</span>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="appName">Applicant's name</label>
                              <input type="text" class="form-control" placeholder="Enter Name" id="appName">
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="datepicker">Date of birth</label>
                              <input type="text" id="datepicker" class="form-control input-group date" />
                              <img src="{{url('assets_frontend/images/calendar.svg')}}" class="img-fluid calender" alt="calender" />
                          </div>
                      </div>
                      <div class="col-md-1">
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="MobNum">Registered Mobile Number</label>
                              <input type="number" class="form-control" placeholder="Enter Mobile Number" id="MobNum">
                          </div>
                      </div>
                  </div>
                  <div class="form_btn">
                      <button type="button" class="btn btn-primary btn-search">Search</button>
                      <button type="button" class="btn btn-primary btn-clear">Clear</button>
                  </div>
              </form>
          </div>
      </section>

      <section class="page-content-box">
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
                  <tbody>
                      <tr>
                          <td>AX000123</td>
                          <td>Steven smith</td>
                          <td>Personal loan</td>
                          <td>Completed</td>
                      </tr>
                      <tr>
                          <td>AX000124</td>
                          <td>Steven smith</td>
                          <td>Car loan</td>
                          <td>Completed</td>
                      </tr>
                      <tr>
                          <td>AX000124</td>
                          <td>Steven smith</td>
                          <td>Car loan</td>
                          <td>Completed</td>
                      </tr>
                      <tr>
                          <td>AX000124</td>
                          <td>Steven smith</td>
                          <td>Car loan</td>
                          <td>Completed</td>
                      </tr>
                      <tr>
                          <td>AX000124</td>
                          <td>Steven smith</td>
                          <td>Car loan</td>
                          <td>Completed</td>
                      </tr>
                      <tr>
                          <td>AX000124</td>
                          <td>Steven smith</td>
                          <td>Car loan</td>
                          <td>Completed</td>
                      </tr>

                      <tr>
                          <td>AX000124</td>
                          <td>Steven smith</td>
                          <td>Car loan</td>
                          <td>Completed</td>
                      </tr>
                      <tr>
                          <td>AX000124</td>
                          <td>Steven smith</td>
                          <td>Car loan</td>
                          <td>Completed</td>
                      </tr>
                      <tr>
                          <td>AX000124</td>
                          <td>Steven smith</td>
                          <td>Car loan</td>
                          <td>Completed</td>
                      </tr>
                      <tr>
                          <td>AX000124</td>
                          <td>Steven smith</td>
                          <td>Car loan</td>
                          <td>Completed</td>
                      </tr>
                  </tbody>
              </table>
          </div>
      </section>

<!--main end-->
    <script type="text/javascript">
    	$(document).on('change','#loan-type', function() {
    		var type = $('#loan-type option:selected').val();

    		if(type == 1) {
    			$('#hr_loan').show();
    			$('#other_loan').hide();
    		} else {
    			$('#hr_loan').hide();
    			$('#other_loan').show();
    		}
    	});
    	var type = $('#loan-type option:selected').val();

		if(type == 1) {
			$('#hr_loan').show();
			$('#other_loan').hide();
		} else {
			$('#hr_loan').hide();
			$('#other_loan').show();
		}
    </script>
@endsection
