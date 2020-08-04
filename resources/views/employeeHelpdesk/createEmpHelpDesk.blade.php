@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="m-portlet">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text"> Create Employee Helpdesk  </h3>
						</div>
					</div>
				</div>
				<form class="m-form m-form--fit m-form--label-align-right" action="{{url('employee-helpdesk/store')}}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="m-portlet__body">
					
						<div class="" id="afl_employee" >
							<div class="form-group m-form__group row {{ $errors->has('title') ? 'has-danger' : ''}}">
								<label class="col-3 col-form-label">Title</label>
								<div class="col-md-4">
									<input type="text" name="title" placeholder="Title" value="{{old('title')}}" class="form-control">
									@if ($errors->has('title'))
                                    <div class="form-control-feedback">
	                                    {{ $errors->first('title') }}
	                                </div>
	                                @endif
								</div>
							</div>
							<div class="form-group m-form__group row {{ $errors->has('file') ? 'has-danger' : ''}}">
								<label class="col-3 col-form-label">Select File</label>
								<div class="col-md-4">
									<input type="file" name="file"  id="file" value="{{old('file')}}" class="form-control">
									@if ($errors->has('file'))
                                    <div class="form-control-feedback">
	                                    {{ $errors->first('file') }}
	                                </div>
	                                @endif
								</div>
							</div>
							<div class="form-group m-form__group row {{ $errors->has('download_flag') ? 'has-danger' : ''}}">
								<label class="col-3 col-form-label">Allow To Download</label>
								<div class="col-md-4 m-radio-inline">
									<label class="m-radio m-radio--solid">
										<input type="radio" name="download_flag" value="1" @if(old('download_flag')) checked="checked" @endif> Yes
										<span></span>
									</label>
									<label class="m-radio m-radio--solid">
										<input type="radio" name="download_flag" value="0" @if(!old('download_flag')) checked="checked" @endif> No
										<span></span>
									</label>
									@if ($errors->has('download_flag'))
                                    <div class="form-control-feedback">
	                                    {{ $errors->first('download_flag') }}
	                                </div>
	                                @endif
								</div>
							</div>
						</div>
					</div>
					<div class="m-portlet__foot m-portlet__foot--fit">
						<div class="m-form__actions m-form__actions">
							<div class="row">
								<div class="col-lg-9">
								</div>
								<div class="col-lg-3 m--align-right">
									<button type="submit" class="btn btn-success" id="updateData">Submit</button>
									<a href="{{url('employee-helpdesk')}}" class="btn btn-secondary">Cancel</a>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	
@endsection