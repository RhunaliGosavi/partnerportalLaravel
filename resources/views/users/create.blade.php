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
									<option value="{{\Config::get('constant')['user_types']['AFL_EMPLOYEE']}}" @if(old('user_type') == 1) selected @endif>AFL Employee</option>
									<option value="{{
									Config::get('constant')['user_types']['BUSSINESS_PARTNER']
								}}"  @if(old('user_type') == 2) selected @endif>Bussiness Partner</option>
								</select>
							</div>
						</div>
						<hr>
						<div class="" id="afl_employee" style="display: none">
							<div class="form-group m-form__group row {{ $errors->has('employee_id') ? 'has-danger' : ''}}">
								<label class="col-3 col-form-label">Employee Id</label>
								<div class="col-md-4">
									<input type="text" name="employee_id" placeholder="Employee Id" value="{{old('employee_id')}}" class="form-control" >
									@if ($errors->has('employee_id'))
                                    <div class="form-control-feedback">
	                                    {{ $errors->first('employee_id') }}
	                                </div>
	                                @endif
								</div>
							</div>
							<div class="form-group m-form__group row {{ $errors->has('name') ? 'has-danger' : ''}}">
								<label class="col-3 col-form-label">First Name</label>
								<div class="col-md-4">
									<input type="text" name="name" placeholder="First Name" value="{{old('name')}}" class="form-control" >
									@if ($errors->has('name'))
                                    <div class="form-control-feedback">
	                                    {{ $errors->first('name') }}
	                                </div>
	                                @endif
								</div>
							</div>
							<div class="form-group m-form__group row {{ $errors->has('middle_name') ? 'has-danger' : ''}}">
								<label class="col-3 col-form-label">Middle Name</label>
								<div class="col-md-4">
									<input type="text" name="middle_name" placeholder="Middle Name" value="{{old('middle_name')}}" class="form-control" >
									@if ($errors->has('middle_name'))
                                    <div class="form-control-feedback">
	                                    {{ $errors->first('middle_name') }}
	                                </div>
	                                @endif
								</div>
							</div>
							<div class="form-group m-form__group row {{ $errors->has('last_name') ? 'has-danger' : ''}}">
								<label class="col-3 col-form-label">Last Name</label>
								<div class="col-md-4">
									<input type="text" name="last_name" placeholder="Last Name" value="{{old('last_name')}}" class="form-control" >
									@if ($errors->has('last_name'))
                                    <div class="form-control-feedback">
	                                    {{ $errors->first('last_name') }}
	                                </div>
	                                @endif
								</div>
							</div>
							<div class="form-group m-form__group row {{ $errors->has('hub_name') ? 'has-danger' : ''}}">
								<label class="col-3 col-form-label">Hub Name</label>
								<div class="col-md-4">
									<input type="text" name="hub_name" placeholder="Hub Name" value="{{old('hub_name')}}" class="form-control" >
									@if ($errors->has('hub_name'))
                                    <div class="form-control-feedback">
	                                    {{ $errors->first('hub_name') }}
	                                </div>
	                                @endif
								</div>
							</div>
							<div class="form-group m-form__group row {{ $errors->has('company_name') ? 'has-danger' : ''}}">
								<label class="col-3 col-form-label">Company Name</label>
								<div class="col-md-4">
									<input type="text" name="company_name" placeholder="Company Name" value="{{old('company_name')}}" class="form-control" >
									@if ($errors->has('company_name'))
                                    <div class="form-control-feedback">
	                                    {{ $errors->first('company_name') }}
	                                </div>
	                                @endif
								</div>
							</div>
							<div class="form-group m-form__group row {{ $errors->has('work_location') ? 'has-danger' : ''}}">
								<label class="col-3 col-form-label">Work Location</label>
								<div class="col-md-4">
									<input type="text" name="work_location" placeholder="Work Location" value="{{old('work_location')}}" class="form-control" >
									@if ($errors->has('work_location'))
                                    <div class="form-control-feedback">
	                                    {{ $errors->first('work_location') }}
	                                </div>
	                                @endif
								</div>
							</div>
							<div class="form-group m-form__group row {{ $errors->has('state') ? 'has-danger' : ''}}">
								<label class="col-3 col-form-label">State</label>
								<div class="col-md-4">
									<input type="text" name="state" placeholder="State" value="{{old('state')}}" class="form-control" >
									@if ($errors->has('state'))
                                    <div class="form-control-feedback">
	                                    {{ $errors->first('state') }}
	                                </div>
	                                @endif
								</div>
							</div>
							<div class="form-group m-form__group row {{ $errors->has('department') ? 'has-danger' : ''}}">
								<label class="col-3 col-form-label">Department</label>
								<div class="col-md-4">
									<input type="text" name="department" placeholder="Department" value="{{old('department')}}" class="form-control" >
									@if ($errors->has('department'))
                                    <div class="form-control-feedback">
	                                    {{ $errors->first('department') }}
	                                </div>
	                                @endif
								</div>
							</div>
							<div class="form-group m-form__group row {{ $errors->has('designation') ? 'has-danger' : ''}}">
								<label class="col-3 col-form-label">Designation</label>
								<div class="col-md-4">
									<input type="text" name="designation" placeholder="Designation" value="{{old('designation')}}" class="form-control" >
									@if ($errors->has('designation'))
                                    <div class="form-control-feedback">
	                                    {{ $errors->first('designation') }}
	                                </div>
	                                @endif
								</div>
							</div>
							<div class="form-group m-form__group row {{ $errors->has('job_role') ? 'has-danger' : ''}}">
								<label class="col-3 col-form-label">Job Role</label>
								<div class="col-md-4">
									<input type="text" name="job_role" placeholder="Job Role" value="{{old('job_role')}}" class="form-control" >
									@if ($errors->has('job_role'))
                                    <div class="form-control-feedback">
	                                    {{ $errors->first('job_role') }}
	                                </div>
	                                @endif
								</div>
							</div>
							<div class="form-group m-form__group row {{ $errors->has('product') ? 'has-danger' : ''}}">
								<label class="col-3 col-form-label">Product</label>
								<div class="col-md-4">
									<select name="product" class="form-control">
										<option value="">Select Product</option>	
										<option value="CPF">CPF</option>	
										<option value="PL">PL</option>	
										<option value="BL">BL</option>	
										<option value="LAP">LAP</option>	
										<option value="LAS">LAS</option>	
									</select>
									@if ($errors->has('product'))
                                    <div class="form-control-feedback">
	                                    {{ $errors->first('product') }}
	                                </div>
	                                @endif
								</div>
							</div>
							<div class="form-group m-form__group row {{ $errors->has('mobile_number') ? 'has-danger' : ''}}">
								<label class="col-3 col-form-label">Mobile Number</label>
								<div class="col-md-4">
									<input type="text" name="mobile_number" placeholder="Mobile Number" value="{{old('mobile_number')}}" class="form-control" maxlength="10" required>
									@if ($errors->has('mobile_number'))
                                    <div class="form-control-feedback">
	                                    {{ $errors->first('mobile_number') }}
	                                </div>
	                                @endif
								</div>
							</div>
							<div class="form-group m-form__group row {{ $errors->has('email') ? 'has-danger' : ''}}">
								<label class="col-3 col-form-label">Official Email Id</label>
								<div class="col-md-4">
									<input type="text" name="email" placeholder="Official Email Id" value="{{old('email')}}" class="form-control" required>
									@if ($errors->has('email'))
                                    <div class="form-control-feedback">
	                                    {{ $errors->first('email') }}
	                                </div>
	                                @endif
								</div>
							</div>
							<div class="form-group m-form__group row {{ $errors->has('reporting_manager_name') ? 'has-danger' : ''}}">
								<label class="col-3 col-form-label">Reporting Manager Name</label>
								<div class="col-md-4">
									<input type="text" name="reporting_manager_name" placeholder="Reporting Manager Name" value="{{old('reporting_manager_name')}}" class="form-control" required>
									@if ($errors->has('reporting_manager_name'))
                                    <div class="form-control-feedback">
	                                    {{ $errors->first('reporting_manager_name') }}
	                                </div>
	                                @endif
								</div>
							</div>
							<div class="form-group m-form__group row {{ $errors->has('manager_employee_id') ? 'has-danger' : ''}}">
								<label class="col-3 col-form-label">Manager Employee Id</label>
								<div class="col-md-4">
									<input type="text" name="manager_employee_id" placeholder="Manager Employee Id" value="{{old('manager_employee_id')}}" class="form-control" required>
									@if ($errors->has('manager_employee_id'))
                                    <div class="form-control-feedback">
	                                    {{ $errors->first('manager_employee_id') }}
	                                </div>
	                                @endif
								</div>
							</div>
							<div class="form-group m-form__group row {{ $errors->has('status') ? 'has-danger' : ''}}">
								<label class="col-3 col-form-label">Status</label>
								<div class="col-md-4">
									<select name="status" class="form-control">
										<option value="">Select Status</option>
										<option value="1" selected>Active</option>
										<option value="0">Inactive</option>
									</select>
									@if ($errors->has('status'))
                                    <div class="form-control-feedback">
	                                    {{ $errors->first('status') }}
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