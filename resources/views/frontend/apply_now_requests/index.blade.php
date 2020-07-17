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
        <h1>Apply Now</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{url('apply_now')}}">Apply now</a></li>
          </ol>
        </nav>
      </div>
    </section>
@endsection
@section('content')
    <section class="page-content-box">
        <div class="application-status apply-now">
            <div class="row">
                <div class="col-md-4">
                    <div class="apply-now_image">
                        <img src="{{url('/assets_frontend/images/applynow.png')}}" class="img-fluid" alt="Refer a Friend" />
                    </div>
                </div>
                <div class="col-md-8">
                    <h2 class="mb-3">Apply Now</h2>
                    @if(session('success'))
                    	<p>{{session('success')}}</p>
                    @endif
                    <form action="{{url('apply_now')}}" method="POST">
                    	@csrf
                        <div class="apply-now_loan">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="loan-product">Loan Type</label>
                                        <span class="custome-select" id="loan-type">
                                            <select name="loan_type">
                                            	<option value="1" @if(old('loan_type') == 1) selected @endif>HR Loan</option>
                                            	<option value="2" @if(old('loan_type') == 2) selected @endif>Other Loan</option>
                                        	</select>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="empId">Employee ID</label>
                                    <input type="text" class="form-control" placeholder="Enter Employee ID" id="empId" name="employee_id" value="{{old('employee_id')}}">
                                    @if ($errors->has('employee_id'))
                                    <div class="form-control-feedback">
	                                    {{ $errors->first('employee_id') }}
	                                </div>
	                                @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="empName">Employee Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Employee Name" id="empName" name="name" value="{{old('name')}}">
                                    @if ($errors->has('name'))
                                    <div class="form-control-feedback">
	                                    {{ $errors->first('name') }}
	                                </div>
	                                @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mobNumber">Mobile number</label>
                                    <input type="number" class="form-control" placeholder="Enter Mobile number" id="mobNumber" name="mobile_number" value="{{old('mobile_number')}}">
                                    @if ($errors->has('mobile_number'))
                                    <div class="form-control-feedback">
	                                    {{ $errors->first('mobile_number') }}
	                                </div>
	                                @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="loan_Product">Loan product</label>
                                    <span class="custome-select" id="loan_Product">
                                    	<select name="loan_product_id" id="hr_loan">
                                          	<option value="1" @if(old('loan_product_id') == 1) selected @endif>HR Loan</option>
                                        </select>
                                        <select name="loan_product_id" id="other_loan" style="display: none;">
                                        	@if(count($loan_products))
                                        		@foreach($loan_products as $loan_product)
                                          			<option value="{{$loan_product->id}}" @if(old('loan_product_id') == $loan_product->id) selected @endif>{{$loan_product->name}}</option>
                                          		@endforeach
                                        	@else
                                          		<option value="">Select Product</option>
                                        	@endif
                                        </select>
                                        @if ($errors->has('loan_product_id'))
	                                    <div class="form-control-feedback">
		                                    {{ $errors->first('loan_product_id') }}
		                                </div>
		                                @endif
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="loanAmount">Loan amount</label>
                                    <input type="number" class="form-control" placeholder="INR" id="loanAmount" name="loan_amount" value="{{old('loan_amount')}}">
                                    @if ($errors->has('loan_amount'))
                                    <div class="form-control-feedback">
	                                    {{ $errors->first('loan_amount') }}
	                                </div>
	                                @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="preferTime">Prefered time to contact</label>
                                    <input type="time" class="form-control" placeholder="HH:MM" id="preferTime" name="prefered_contact_time" value="{{old('prefered_contact_time')}}">
                                    @if ($errors->has('prefered_contact_time'))
                                    <div class="form-control-feedback">
	                                    {{ $errors->first('prefered_contact_time') }}
	                                </div>
	                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="form_btn">
                            <button type="submit" class="btn btn-primary btn-search">Submit</button>
                            <button type="button" class="btn btn-primary btn-clear">Clear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
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