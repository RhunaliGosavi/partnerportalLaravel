@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="m-portlet">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text"> Create New User</h3>
						</div>
					</div>
				</div>
				<form class="m-form m-form--fit m-form--label-align-right" action="{{url('user/store')}}" method="POST">
					@csrf
					<div class="m-portlet__body">
						<div class="form-group m-form__group row">
							<label class="col-3 col-form-label">User Type</label>
							<div class="col-md-4">
								<select class="form-control" name="user_type" id="user_type">
									<option value="">Select User Type</option>
									<option value="{{\Config::get('constant')['user_types']['AFL_EMPLOYEE']}}">AFL Employee</option>
									<option value="{{
									Config::get('constant')['user_types']['BUSSINESS_PARTNER']
								}}">Bussiness Partner</option>
								</select>
							</div>
						</div>
						<hr>
						<div class="" id="afl_employee" style="display: none">
							<div class="form-group m-form__group row">
								<label class="col-3 col-form-label">Employee Id</label>
								<div class="col-md-4">
									<input type="text" name="employee_id" placeholder="Employee Id" value="{{old('employee_id')}}" required class="form-control">
									@if ($errors->has('employee_id'))
                                    <span class="help-block">
	                                        <strong>{{ $errors->first('employee_id') }}</strong>
	                                    </span>
	                                @endif
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label class="col-3 col-form-label">PAN Number</label>
								<div class="col-md-4">
									<input type="text" name="pan_number" placeholder="PAN Number" value="{{old('pan_number')}}" required class="form-control">
									@if ($errors->has('pan_number'))
                                    <span class="help-block">
	                                        <strong>{{ $errors->first('pan_number') }}</strong>
	                                    </span>
	                                @endif
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label class="col-3 col-form-label">Mobile Number</label>
								<div class="col-md-4">
									<input type="text" name="mobile_number" placeholder="Mobile Number" value="{{old('mobile_number')}}" required class="form-control">
									@if ($errors->has('mobile_number'))
                                    <span class="help-block">
	                                        <strong>{{ $errors->first('mobile_number') }}</strong>
	                                    </span>
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
									<button type="submit" class="btn btn-success">Submit</button>
									<a href="{{url('users')}}" class="btn btn-secondary">Cancel</a>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
		
			if(1 == $('#user_type option:selected').val()) {
				$('#afl_employee').show();
			} else {
				$('#afl_employee').hide();
			}
		});

		$(document).on('change', '#user_type', function() {
			if(1 == $('#user_type option:selected').val()) {
				$('#afl_employee').show();
			} else {
				$('#afl_employee').hide();
			}
		});
	</script>
@endsection