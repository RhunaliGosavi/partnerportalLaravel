@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="m-portlet">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text"> Update Employee Helpdesk </h3>
						</div>
					</div>
				</div>
				<form class="m-form m-form--fit m-form--label-align-right" action="{{url('employee-helpdesk/update')}}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="m-portlet__body">
					
						<div class="" id="afl_employee" >
							<div class="form-group m-form__group row {{ $errors->has('title') ? 'has-danger' : ''}}">
								<label class="col-3 col-form-label">Title</label>
								<div class="col-md-4">
									<input type="text" name="title" placeholder="Title" value="{{old('title', $data->name)}}" class="form-control">
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
                                    <input type="file" name="file"  id="file" value="{{old('file',$data->file_path)}}" class="form-control">
                                    <input type="hidden" name="file_old"  id="file_old" value="{{$data->file_path}}" class="form-control">
                                    <input type="hidden" name="file_size_in_mb"  id="file_size_in_mb" value="{{$data->file_size_in_mb}}" class="form-control">
                                    
									@if ($errors->has('file'))
                                    <div class="form-control-feedback">
	                                    {{ $errors->first('file') }}
	                                </div>
	                                @endif
								</div>
							</div>
						</div>
                    </div>
                    <input type="hidden" value="{{$data->id}}" name="id" >
                    <div class="m-portlet__foot m-portlet__foot--fit">
						<div class="m-form__actions m-form__actions">
							<div class="row">
								<div class="col-lg-9">
								</div>
								<div class="col-lg-3 m--align-right">
									<button type="submit" class="btn btn-success">Submit</button>
									<a href="{{url('employee-helpdesk')}}" class="btn btn-secondary">Cancel</a>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script>
	
	</script>
	
@endsection