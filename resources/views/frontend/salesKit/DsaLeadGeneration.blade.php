@extends('frontend.layouts.app')
@section('title')
    DSA Lead Generation
@endsection
@section('breadcum')
<section class="page-top">
  <div class="back-btn">
    <button class="btn"><img src="{{url('/assets_frontend/images/back-btn-icon.png')}}"></button>
  </div>
  <div class="page-heading">
    <h1>DSA Lead Generation</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{url('salesKit')}}">Sales Kit</a></li>
        <li class="breadcrumb-item"><a href="#"> DSA Onboarding Details</a></li>
        <li class="breadcrumb-item"><a class="text-dark" href="{{url('salesKit/DSALeadGeneration')}}">DSA Lead Generation</a></li>
      </ol>
    </nav>
  </div>
</section>
@endsection
@section('content')
<section class="page-content-box">
    <div class="application-status dsa-lead-generation">
        <h2 class="mb-3">Bank Account Details</h2>
        <form>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="accNum">Bank Account Number</label>
                        <input type="number" class="form-control" placeholder="Enter Account Number" id="accNum" name="bank_acc_number">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="ifsc">IFSC Code</label>
                        <input type="number" class="form-control" placeholder="Enter IFSC Code" id="ifsc" name="ifsc_code">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="BankName">Bank Name</label>
                        <span class="custome-select" id="BankName">
                            <select name="bank_name">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                            </select>
                        </span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="BranchName">Branch Name</label>
                        <span class="custome-select" id="BranchName">
                            <select name="branch_name">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                            </select>
                        </span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="upi">UPI ID</label>
                        <input type="number" class="form-control" placeholder="Enter UPI ID" id="upi" name="upi_id">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="dsa-verify">
                        <a href="">Verify Details</a>
                        <span>Verified Sucessfully</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="application-status dsa-lead-generation">
        <h2 class="mb-3">Personal Information</h2>
        <form>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="accNum">Name</label>
                        <input type="number" class="form-control" placeholder="Enter Account Number" id="name" name="name">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="ifsc">Mobile Number</label>
                        <input type="number" class="form-control" placeholder="Enter Mobile Number" id="mobile_number" name="mobile_number">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="datepicker1">Date of birth</label>
                        <input type="text" id="datepicker1" class="form-control input-group date" data-date-format="mm-dd-yyyy" name="dob">
                        <img src="{{url('assets_frontend/images/calendar.svg')}}" class="img-fluid calender" alt="calender" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="BranchName">Email ID</label>
                        <input type="number" class="form-control" placeholder="Enter Email Id" id="email" name="email">       
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="upi">Gender</label>
                        <span class="custome-select" id="BranchName" name="gender">
                            <select>
                              <option>Male</option>
                              <option>Female</option>
                              <option>Other</option>
                            </select>
                        </span>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="application-status dsa-lead-generation">
        <h2 class="mb-3">Address Information</h2>
        <form>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="accNum">Type of Address</label>
                        <span class="custome-select" id="BankName">
                            <select>
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                            </select>
                        </span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="ifsc">Address Line 1</label>
                        <input type="text" class="form-control" placeholder="Enter Address Line 1" id="address1" name="address_line1">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="BankName">Address Line 2</label>
                        <input type="text" class="form-control" placeholder="Enter Address Line 2" id="address2" name="address_line2">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="BranchName">Pin Code</label>
                        <input type="text" class="form-control" placeholder="Enter Pin Code" id="pin_code" name="pincode">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="upi">City</label>
                        <input type="text" class="form-control" placeholder="Enter City" id="city" name="city">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="upi">State</label>
                        <input type="text" class="form-control" placeholder="Enter State" id="state" name="state">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="application-status dsa-lead-generation">
        <h2 class="mb-3">Agency Information</h2>
        <form>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="accNum">Agency Name</label>
                        <input type="text" class="form-control" placeholder="Enter Agency Name" id="agencyName" name="agency_name">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="ifsc">GST Number</label>
                        <input type="text" class="form-control" placeholder="Enter GST Number" id="gst" name="gst_number">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="BankName">Official Email ID</label>
                        <input type="text" class="form-control" placeholder="Enter Email Id" id="official_email" name="official_email">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="BranchName">Official Mobile Number</label>
                        <input type="text" class="form-control" placeholder="Enter Mobile Number" id="official_mobile" name="official_mobile_number">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="application-status dsa-lead-generation">
        <h2 class="mb-3">Document Upload</h2>
        <form>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="import_upload">
                            <input type="file" name="file1" id="file" class="input-file">
                            <label for="file" class="btn btn-tertiary js-labelFile">
                                <span class="js-fileName">
                                    
                                </span>
                                <img src="{{url('assets_frontend/images/upload.png')}}" class="img-fluid upload-file" alt="add" />
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="import_upload">
                            <input type="file" name="file2" id="file2" class="input-file2">
                            <label for="file2" class="btn btn-tertiary js-labelFile2">
                                <span class="js-fileName2">
                                    
                                </span>
                                <img src="{{url('assets_frontend/images/upload.png')}}" class="img-fluid upload-file" alt="add" />
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <img src="{{url('assets_frontend/images/close.png')}}" class="img-fluid add-field" alt="add" />
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <button type="button" class="btn btn-upload m-0">Upload</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section> 
<script type="text/javascript">
    $(function () {
        $('#datepicker1').datepicker({
        });
    });
    (function() {
        'use strict';
        $('.input-file').each(function() {
        var $input = $(this),
            $label = $input.next('.js-labelFile'),
            labelVal = $label.html();
        
        $input.on('change', function(element) {
            var fileName = '';
            if (element.target.value) fileName = element.target.value.split('\\').pop();
            fileName ? $label.addClass('has-file').find('.js-fileName').html(fileName) : $label.removeClass('has-file').html(labelVal);
        });
        });
    
    })();
    (function() {
        'use strict';
        $('.input-file2').each(function() {
        var $input2 = $(this),
            $label2 = $input2.next('.js-labelFile2'),
            labelVal2 = $label2.html();
        
        $input2.on('change', function(element) {
            var fileName2 = '';
            if (element.target.value) fileName2 = element.target.value.split('\\').pop();
            fileName2 ? $label2.addClass('has-file').find('.js-fileName2').html(fileName2) : $label2.removeClass('has-file').html(labelVal2);
        });
        });
    
    })();
  </script> 
@endsection