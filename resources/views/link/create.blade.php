@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="m-portlet">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text"> Create New Link</h3>
						</div>
					</div>
				</div>
				<form class="m-form m-form--fit m-form--label-align-right" action="{{url('link/store')}}" method="POST">
					@csrf
					<div class="m-portlet__body">
						<div class="form-group m-form__group row {{ $errors->has('portal_name') ? 'has-danger' : ''}}">
							<label class="col-3 col-form-label">Portal Name</label>
							<div class="col-md-4">
								<input type="text" name="portal_name" placeholder="Portal Name" value="{{old('portal_name')}}" class="form-control">
								@if ($errors->has('portal_name'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('portal_name') }}
                                </div>
                                @endif
							</div>
						</div>
						<div class="form-group m-form__group row {{ $errors->has('web_link') ? 'has-danger' : ''}}">
							<label class="col-3 col-form-label">Web Link</label>
							<div class="col-md-4">
								<input type="text" name="web_link" placeholder="Web Link" value="{{old('web_link')}}" class="form-control">
								@if ($errors->has('web_link'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('web_link') }}
                                </div>
                                @endif
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
									<a href="{{url('links')}}" class="btn btn-secondary">Cancel</a>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection