@extends('layouts.app')

@section('content')

        <div class="m-content">
        <form class="m-form m-form--fit m-form--label-align-right" action="{{url('corporatePpt/store')}}" method="POST">
			<div class="row">
            <div class="col-lg-12">
            <div class="m-portlet">
                <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text"> Calculator Policy Input</h3>
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
                                <div class="form-group m-form__group row {{ $errors->has('title') ? 'has-danger' : ''}}">
                                    <label class="col-3 col-form-label">FORI</label>
                                    <div class="col-md-4">
                                        <input type="text" name="title" placeholder="FORI" value="{{old('title')}}" class="form-control">
                                        @if ($errors->has('title'))
                                        <div class="form-control-feedback">
                                            {{ $errors->first('title') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group m-form__group row {{ $errors->has('title') ? 'has-danger' : ''}}">
                                    <label class="col-3 col-form-label">ROI</label>
                                    <div class="col-md-4">
                                        <input type="text" name="title" placeholder="ROI" value="{{old('title')}}" class="form-control">
                                        @if ($errors->has('title'))
                                        <div class="form-control-feedback">
                                            {{ $errors->first('title') }}
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
                                <div class="form-group m-form__group row {{ $errors->has('title') ? 'has-danger' : ''}}">
                                    <label class="col-3 col-form-label">FORI</label>
                                    <div class="col-md-4">
                                        <input type="text" name="title" placeholder="FORI" value="{{old('title')}}" class="form-control">
                                        @if ($errors->has('title'))
                                        <div class="form-control-feedback">
                                            {{ $errors->first('title') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group m-form__group row {{ $errors->has('title') ? 'has-danger' : ''}}">
                                    <label class="col-3 col-form-label">LTV</label>
                                    <div class="col-md-4">
                                        <input type="text" name="title" placeholder="LTV" value="{{old('title')}}" class="form-control">
                                        @if ($errors->has('title'))
                                        <div class="form-control-feedback">
                                            {{ $errors->first('title') }}
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
                                        <button type="reset" class="btn btn-brand">Submit</button>
                                        <button type="reset" class="btn btn-secondary">Cancel</button>
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