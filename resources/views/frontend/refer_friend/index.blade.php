@extends('frontend.layouts.app')
@section('title')
	Refer Friend
@endsection
@section('breadcum')
	<section class="page-top">
      <div class="back-btn">
        <a class="btn" href="{{url()->previous()}}"><img src="{{url('/assets_frontend/images/back-btn-icon.png')}}"></a>
      </div>
      <div class="page-heading">
        <h1>Refer Customer</h1>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{url('refer/customer')}}">Refer Customer</a></li>
          </ol>
        </nav>
      </div>
    </section>
@endsection
@section('content')
    <section class="page-content-box">
        <div class="application-status refer-friend">
            <div class="row">
                <div class="col-md-4">
                    <div class="refer-friend_image">
                        <img src="{{url('/assets_frontend/images/refer-a-friend.png')}}" class="img-fluid" alt="Refer a Friend" />
                    </div>
                </div>
                <div class="col-md-8">
                    <h2 class="mb-3">Refer Customer</h2>
                    <p>Refer a friend by submitting following information</p>
                    @if(session('success'))
                    	<p>{{session('success')}}</p>
                    @endif
                    <form action="{{url('refer_friend')}}" method="POST">
                    	@csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="applicantname">Applicant's name</label>
                                    <input type="text" class="form-control" placeholder="Enter applicants name" id="applicantname" name="name">
                                    @if ($errors->has('name'))
                                    <div class="form-control-feedback">
	                                    {{ $errors->first('name') }}
	                                </div>
	                                @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mobileNum">Mobile number</label>
                                    <input type="number" class="form-control" placeholder="Enter applicants number" id="mobileNum" name="mobile_number">
                                    @if ($errors->has('mobile_number'))
                                    <div class="form-control-feedback">
	                                    {{ $errors->first('mobile_number') }}
	                                </div>
	                                @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="appemail">Email address</label>
                                    <input type="email" class="form-control" placeholder="Enter applicants email address" id="appemail" name="email">
                                    @if ($errors->has('email'))
                                    <div class="form-control-feedback">
	                                    {{ $errors->first('email') }}
	                                </div>
	                                @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="loanProduct">Relationship With Customer</label>
                                    <span class="custome-select">
                                        <select name="relWithCustomer">
                                        	@if(count($relationship))
                                        		@foreach($relationship as $rel)
                                          			<option value="{{$rel->id}}">{{$rel->relationship}}</option>
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
                                    <label for="loanProduct">Loan product</label>
                                    <span class="custome-select">
                                        <select name="loan_product_id">
                                        	@if(count($loan_products))
                                        		@foreach($loan_products as $loan_product)
                                          			<option value="{{$loan_product->id}}">{{$loan_product->name}}</option>
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
                                    <input type="number" class="form-control" placeholder="INR" id="loanAmount" name="loan_amount">
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
                                    <input type="text" class="form-control" placeholder="00/00/0000 HH:MM" id="datetimepicker1" name="prefered_contact_time">
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
                            <button type="reset" class="btn btn-primary btn-clear">Clear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
