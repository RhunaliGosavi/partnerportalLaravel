@extends('layouts.app')

@section('content')

        <div class="m-content">
            @if(empty($policy))
                <form class="m-form m-form--fit m-form--label-align-right" action="{{url('calculator-policy/store')}}" method="POST">
            @else
                <form class="m-form m-form--fit m-form--label-align-right" action="{{url('calculator-policy/store').'/'.$policy->id}}" method="POST">
            @endif
           @csrf 
        <div class="row">
            <div class="col-lg-12">
            <div class="m-portlet">
                <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text"> Calculator Policy</h3>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
				<div class="col-lg-6">
                    <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" m-portlet="true" id="m_portlet_tools_2">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <span class="m-portlet__head-icon">
                                      <i class="flaticon-coins"></i>
                                    </span>
                                    <h3 class="m-portlet__head-text">
                                       Personal Loan
                                    </h3>
                                </div>
                            </div>
                            
                        </div>
                       
                           <div class="m-portlet__body">
                                <div class="form-group m-form__group row {{ $errors->has('personal_loan_fori') ? 'has-danger' : ''}}">
                                    <label class="col-3 col-form-label">FORI</label>
                                    <div class="col-md-4">
                                        <input type="text" name="personal_loan_fori" placeholder="FORI" value="{{!empty($policy) ? $policy->personal_loan_fori : ''}}" class="form-control">
                                        @if ($errors->has('personal_loan_fori'))
                                        <div class="form-control-feedback">
                                            {{ $errors->first('personal_loan_fori') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group m-form__group row {{ $errors->has('personal_loan_roi') ? 'has-danger' : ''}}">
                                    <label class="col-3 col-form-label">ROI</label>
                                    <div class="col-md-4">
                                        <input type="text" name="personal_loan_roi" placeholder="ROI" value="{{!empty($policy) ? $policy->personal_loan_roi : old('personal_loan_roi')}}" class="form-control">
                                        @if ($errors->has('personal_loan_roi'))
                                        <div class="form-control-feedback">
                                            {{ $errors->first('personal_loan_roi') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                              
                            </div>
                     
					</div>
                </div>
                <div class="col-lg-6">
                    <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" m-portlet="true" id="m_portlet_tools_2">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <span class="m-portlet__head-icon">
                                      <i class="flaticon-coins"></i>
                                    </span>
                                    <h3 class="m-portlet__head-text">
                                       Loan Against Property
                                    </h3>
                                </div>
                            </div>
                            
                        </div>
                     
                        
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group row {{ $errors->has('loan_against_property_fori') ? 'has-danger' : ''}}">
                                    <label class="col-3 col-form-label">FORI</label>
                                    <div class="col-md-4">
                                        <input type="text" name="loan_against_property_fori" placeholder="FORI" value="{{!empty($policy) ? $policy->loan_against_property_fori : old('loan_against_property_fori')}}" class="form-control">
                                        @if ($errors->has('loan_against_property_fori'))
                                        <div class="form-control-feedback">
                                            {{ $errors->first('loan_against_property_fori') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group m-form__group row {{ $errors->has('loan_against_property_ltv') ? 'has-danger' : ''}}">
                                    <label class="col-3 col-form-label">LTV</label>
                                    <div class="col-md-4">
                                        <input type="text" name="loan_against_property_ltv" placeholder="LTV" value="{{!empty($policy) ? $policy->loan_against_property_ltv : old('loan_against_property_ltv')}}" class="form-control">
                                        @if ($errors->has('loan_against_property_ltv'))
                                        <div class="form-control-feedback">
                                            {{ $errors->first('loan_against_property_ltv') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                
                            </div>
                            
					</div>
                </div>
                <div class="col-lg-12">
                    <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" m-portlet="true" id="m_portlet_tools_2">
                       <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="submit" class="btn btn-brand">Submit</button>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
                </div>
              
            </div>
        </form>
		</div>


@endsection