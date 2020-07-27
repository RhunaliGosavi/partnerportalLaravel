@extends('frontend.layouts.app')
@section('title')
    DSA Lead Generation
@endsection
@section('breadcum')
<section class="page-top">
  <div class="back-btn">
    <a class="btn" href="{{ url()->previous() }}"><img src="{{url('/assets_frontend/images/back-btn-icon.png')}}"></a>
  </div>
  <div class="page-heading">
    <h1>DSA Lead Generation</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{url('sales/kit')}}">Sales Kit</a></li>
        <li class="breadcrumb-item"><a href="{{url('sales/kit/dsaonboarding')}}"> DSA Onboarding Details</a></li>
        <li class="breadcrumb-item"><a class="text-dark" href="{{url('sales/kit/dsaleadgeneration')}}">DSA Lead Generation</a></li>
      </ol>
    </nav>
  </div>
</section>
@endsection
@section('content')
<section class="page-content-box">
    <form action="{{url('sales/kit/dsaleadgeneration')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="application-status dsa-lead-generation">
            <h2 class="mb-3">Bank Account Details</h2>
            @if(session('success'))
                <p>{{session('success')}}</p>
            @endif
            @if(session('error'))
                <p>{{session('error')}}</p>
            @endif
            <!-- <form> -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="accNum">Bank Account Number</label>
                            <input type="text" class="form-control" placeholder="Enter Account Number" id="accNum" name="bank_acc_number" value="{{old('bank_acc_number')}}">
                            @if ($errors->has('bank_acc_number'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('bank_acc_number') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ifsc">IFSC Code</label>
                            <input type="text" class="form-control" placeholder="Enter IFSC Code" id="ifsc_code" name="ifsc_code" value="{{old('ifsc_code')}}">
                            @if ($errors->has('ifsc_code'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('ifsc_code') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="BankName">Bank Name</label>
                            <span class="custome-select">
                                <select id="BankName" name="bank_name">
                                <option value="">Select Bank Name</option>
                                <!-- <option>2</option>
                                <option>3</option> -->
                                </select>
                            </span>
                            <!-- <input type="text" class="form-control" placeholder="Enter Bank Name" id="BankName" name="bank_name" value="Axis Bank" readonly> -->
                            @if ($errors->has('bank_name'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('bank_name') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="BranchName">Branch Name</label>
                            <span class="custome-select">
                                <select id="BranchName" name="branch_name">
                                <option value="">Select Branch Name</option>
                                </select>
                            </span>
                            <!-- <input type="text" class="form-control" placeholder="Enter Banch Name" id="BranchName" name="branch_name" value="Mumbai" readonly> -->
                            @if ($errors->has('branch_name'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('branch_name') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="upi">UPI ID</label>
                            <input type="text" class="form-control" placeholder="Enter UPI ID" id="upi" name="upi_id" value="{{old('upi_id')}}">
                            @if ($errors->has('upi_id'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('upi_id') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="dsa-verify">
                            <a href="" id="verify_bank_details">Verify Details</a>
                            <span class="verify_bank_details" style="display: none">Verified Sucessfully</span>
                        </div>
                    </div>
                </div>
            <!-- </form> -->
        </div>
        <div class="application-status dsa-lead-generation">
            <h2 class="mb-3">Personal Information</h2>
            <!-- <form> -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="accNum">Name</label>
                            <input type="text" class="form-control" placeholder="Enter Your Name" id="name" name="name" value="{{old('name')}}">
                            @if ($errors->has('name'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ifsc">Mobile Number</label>
                            <input type="number" class="form-control" placeholder="Enter Mobile Number" id="mobile_number" name="mobile_number" value="{{old('mobile_number')}}">
                            @if ($errors->has('mobile_number'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('mobile_number') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="datepicker1">Date of birth</label>
                            <input type="text" id="datepicker1" class="form-control input-group date" data-date-format="mm-dd-yyyy" name="dob" value="{{old('dob')}}">
                            <img src="{{url('assets_frontend/images/calendar.svg')}}" class="img-fluid calender" alt="calender" />
                            @if ($errors->has('dob'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('dob') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="BranchName">Email ID</label>
                            <input type="text" class="form-control" placeholder="Enter Email Id" id="email" name="email" value="{{old('email')}}">  
                            @if ($errors->has('email'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif     
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="upi">Gender</label>
                            <span class="custome-select">
                                <select id="gender" name="gender">
                                    <option value="Male" @if(old('gender') == 'Male') selected @endif>Male</option>
                                    <option value="Female" @if(old('gender') == 'Female') selected @endif>Female</option>
                                    <option value="Other" @if(old('gender') == 'Other') selected @endif>Other</option>
                                </select>
                            </span>
                            @if ($errors->has('gender'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('gender') }}
                                </div>
                            @endif 
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="upi">PAN Number</label>
                            <input type="text" class="form-control" placeholder="Enter PAN Number" id="pan_number" name="pan_number" value="{{old('pan_number')}}">
                            @if ($errors->has('pan_number'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('pan_number') }}
                                </div>
                            @endif 
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="dsa-verify">
                            <a href="" id="verify_pan">Verify PAN</a>
                            <span class="verify_pan" style="display: none">Verified Sucessfully</span>
                        </div>
                    </div>
                </div>
            <!-- </form> -->
        </div>
        <div class="application-status dsa-lead-generation">
            <h2 class="mb-3">Address Information</h2>
            <!-- <form> -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="accNum">Type of Address</label>
                            <span class="custome-select">
                                <select id="address_type" name="address_type">
                                <option value="Office" @if(old('address_type') == 'Office') selected @endif>Office</option>
                                <option value="Home" @if(old('address_type') == 'Home') selected @endif>Home</option>
                                </select>
                            </span>
                            @if ($errors->has('address_type'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('address_type') }}
                                </div>
                            @endif 
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ifsc">Address Line 1</label>
                            <input type="text" class="form-control" placeholder="Enter Address Line 1" id="address1" name="address_line1" value="{{old('address_line1')}}">
                            @if ($errors->has('address_line1'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('address_line1') }}
                                </div>
                            @endif 
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="BankName">Address Line 2</label>
                            <input type="text" class="form-control" placeholder="Enter Address Line 2" id="address2" name="address_line2" value="{{old('address_line2')}}">
                            @if ($errors->has('address_line2'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('address_line2') }}
                                </div>
                            @endif 
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="BranchName">Pin Code</label>
                            <input type="text" class="form-control" placeholder="Enter Pin Code" id="pincode" name="pincode" value="{{old('pincode')}}">
                            @if ($errors->has('pincode'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('pincode') }}
                                </div>
                            @endif 
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="upi">City</label>
                            <!-- <input type="text" class="form-control" placeholder="Enter City" id="city" name="city" value="{{old('city')}}"> -->
                            <span class="custome-select">
                                <select id="city" name="city">
                                <option value="">Select City</option>
                                </select>
                            </span>
                            @if ($errors->has('city'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('city') }}
                                </div>
                            @endif 
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="upi">State</label>
                            <!-- <input type="text" class="form-control" placeholder="Enter State" id="state" name="state" value="{{old('state')}}"> -->
                            <span class="custome-select">
                                <select id="state" name="state">
                                <option value="">Select State</option>
                                </select>
                            </span>
                            @if ($errors->has('state'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('state') }}
                                </div>
                            @endif 
                        </div>
                    </div>
                </div>
            <!-- </form> -->
        </div>
        <div class="application-status dsa-lead-generation">
            <h2 class="mb-3">Agency Information</h2>
            <!-- <form> -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="accNum">Agency Name</label>
                            <input type="text" class="form-control" placeholder="Enter Agency Name" id="agencyName" name="agency_name" value="{{old('agency_name')}}">
                            @if ($errors->has('agency_name'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('agency_name') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="BankName">Official Email ID</label>
                            <input type="text" class="form-control" placeholder="Enter Email Id" id="official_email" name="official_email" value="{{old('official_email')}}">
                            @if ($errors->has('official_email'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('official_email') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="BranchName">Official Mobile Number</label>
                            <input type="text" class="form-control" placeholder="Enter Mobile Number" id="official_mobile" name="official_mobile_number" value="{{old('official_mobile_number')}}">
                            @if ($errors->has('official_mobile_number'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('official_mobile_number') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ifsc">GST Number</label>
                            <input type="text" class="form-control" placeholder="Enter GST Number" id="gst" name="gst_number" value="{{old('gst_number')}}">
                            @if ($errors->has('gst_number'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('gst_number') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="dsa-verify">
                            <a href="#" id="verify_gst_number">Verify Details</a>
                            <span class="verify_gst_number" style="display: none">Verified Sucessfully</span>
                        </div>
                    </div>
                </div>
            <!-- </form> -->
        </div>
        <div class="application-status dsa-lead-generation">
            <h2 class="mb-3">Address Proof Details</h2>
            <!-- <h2 class="mb-3">Document Upload</h2> -->
            
            <div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <!-- <label for="accNum">Address Proof Type</label> -->
                            <span class="custome-select">
                                <select id="address_proof_type" name="address_proof_type">
                                    <option value="">Select Address Proof Type</option>
                                    <option value="Adhar Card" @if(old('address_proof_type') == 'Adhar Card') selected @endif>Adhar Card</option>
                                    <option value="Voter Card" @if(old('address_proof_type') == 'Voter Card') selected @endif>Voter Card</option>
                                    <option value="Passport" @if(old('address_proof_type') == 'Passport') selected @endif>Passport</option>
                                </select>
                                @if ($errors->has('address_proof_type'))
                                    <div class="form-control-feedback">
                                        {{ $errors->first('address_proof_type') }}
                                    </div>
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="address_proof_doc" name="address_proof_doc">
                                <label class="custom-file-label" for="customFile">Address Proof</label>
                                </div>
                                @if ($errors->has('address_proof_doc'))
                                    <div class="form-control-feedback">
                                        {{ $errors->first('address_proof_doc') }}
                                    </div>
                                @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="pan_card_doc" name="pan_card_doc">
                                <label class="custom-file-label" for="customFile">Upload PAN Card Here</label>
                                </div>
                                @if ($errors->has('pan_card_doc'))
                                    <div class="form-control-feedback">
                                        {{ $errors->first('pan_card_doc') }}
                                    </div>
                                @endif
                        </div>
                    </div>
                </div>
                <!-- <div class="row" id="files">
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
                </div> -->
            </div>
            <hr>
            <div class="form_btn">
                <button type="submit" id="btnSubmit" class="btn btn-primary btn-search" disabled="disabled" >Submit</button>
                <button type="reset" class="btn btn-primary btn-clear">Clear</button>
            </div>
        </div>
    </form>
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

    $("#verify_pan").on("click", function(event){
        event.preventDefault();
        var pan_number = $("input[name=pan_number]").val();
        $.ajax({
            type: "GET",
            data: { pan_number : pan_number },
            url: base_url+'/verify/pan',
            success: function(response) {
                var res = JSON.parse(response);
                if(res && res.status == "SUCCESS"){
                    // console.log(res);
                    $(".verify_pan").css({
                        'display' : 'block'
                    });
                    if($('.verify_pan').css('display') === 'block' && $('.verify_bank_details').css('display') === 'block' && $('.verify_gst_number').css('display') === 'block')
                    {
                        $("#btnSubmit").attr("disabled", false);
                    } else {
                        $("#btnSubmit").attr("disabled", true);
                    }
                }else{
                    $(".verify_pan").css({
                        'display' : 'none'
                    });
                }
            }
        });
    });

    $("#verify_bank_details").on("click", function(event){
        event.preventDefault();
        var bank_acc_number = $("input[name=bank_acc_number]").val();
        var ifsc_code = $("input[name=ifsc_code]").val();
        $.ajax({
            type: "GET",
            data: { bank_acc_number : bank_acc_number, ifsc_code : ifsc_code },
            url: base_url+'/verify/bank/account',
            success: function(response) {
                var res = JSON.parse(response);
                if(res && res.status == "SUCCESS"){
                    $(".verify_bank_details").css({
                        'display' : 'block'
                    });
                    if($('.verify_pan').css('display') === 'block' && $('.verify_bank_details').css('display') === 'block' && $('.verify_gst_number').css('display') === 'block')
                    {
                        $("#btnSubmit").attr("disabled", false);
                    } else {
                        $("#btnSubmit").attr("disabled", true);
                    }
                }else{
                    $(".verify_bank_details").css({
                        'display' : 'none'
                    });
                }
            }
        });
    });

    $("#verify_gst_number").on("click", function(event){
        event.preventDefault();
        var gst_number = $("input[name=gst_number]").val();
        $.ajax({
            type: "GET",
            data: { gst_number : gst_number },
            url: base_url+'/verify/gstnumber',
            success: function(response) {
                var res = JSON.parse(response);
                if(res && res.status == "SUCCESS"){
                    $(".verify_gst_number").css({
                        'display' : 'block'
                    });
                    if($('.verify_pan').css('display') === 'block' && $('.verify_bank_details').css('display') === 'block' && $('.verify_gst_number').css('display') === 'block')
                    {
                        $("#btnSubmit").attr("disabled", false);
                    } else {
                        $("#btnSubmit").attr("disabled", true);
                    }
                }else{
                    $(".verify_gst_number").css({
                        'display' : 'none'
                    });
                }
            }
        });
    });

    $("#ifsc_code").on("change paste keyup", function(event){
        event.preventDefault();
        var ifsc_code = $(this).val();
        $.ajax({
            type: "GET",
            data: { ifsc_code : ifsc_code },
            url: base_url+'/banks/list',
            success: function(res) {
                if(res.length !== 0){
                    $('select[name="bank_name"]').empty();
                    $.each(res, function(key, value) {
                        $('select[name="bank_name"]').append('<option value="'+ value.bank +'">'+ value.bank +'</option>');
                    });
                    $('select[name="branch_name"]').empty();
                    $.each(res, function(key, value) {
                        $('select[name="branch_name"]').append('<option value="'+ value.branch +'">'+ value.branch +'</option>');
                    });
                }else{
                    $('select[name="bank_name"]').empty();
                    $('select[name="bank_name"]').append('<option value="">Select Bank Name</option>');
                    $('select[name="branch_name"]').empty();
                    $('select[name="branch_name"]').append('<option value="">Select Branch Name</option>');
                }
            }
        });
    });

    $("#pincode").on("change paste keyup", function(event){
        event.preventDefault();
        var pincode = $(this).val();
        $.ajax({
            type: "GET",
            data: { pincode : pincode },
            url: base_url+'/city_state/list',
            success: function(res) {
                if(res.length !== 0){
                    $('select[name="city"]').empty();
                    $.each(res, function(key, value) {
                        $('select[name="city"]').append('<option value="'+ value.city +'">'+ value.city +'</option>');
                    });
                    $('select[name="state"]').empty();
                    $.each(res, function(key, value) {
                        $('select[name="state"]').append('<option value="'+ value.state +'">'+ value.state +'</option>');
                    });
                }else{
                    $('select[name="city"]').empty();
                    $('select[name="city"]').append('<option value="">Select Bank Name</option>');
                    $('select[name="state"]').empty();
                    $('select[name="state"]').append('<option value="">Select Branch Name</option>');
                }
            }
        });
    });
    
  </script> 
@endsection