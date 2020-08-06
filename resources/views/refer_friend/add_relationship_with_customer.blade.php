@extends('layouts.app')

@section('content')
    <div class="row">
		<div class="col-md-12">
			<div class="m-portlet">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text"> Add Relationship With Customer</h3>
						</div>
					</div>
				</div>
                <form class="m-form m-form--fit m-form--label-align-right" action="{{url('relationship_with_customer/store')}}" method="POST">
					@csrf
					<div class="m-portlet__body">
                        <div class="form-group m-form__group row {{ $errors->has('relWithCust') ? 'has-danger' : ''}}">
                            <label class="col-3 col-form-label">Name</label>
                            <div class="col-md-4">
                                <input type="text" name="relWithCust" placeholder="Relationship With Customer" value="{{old('relWithCust')}}" class="form-control">
                                @if ($errors->has('relWithCust'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('relWithCust') }}
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
									<a href="{{url('relationshipWithCustomer')}}" class="btn btn-secondary">Cancel</a>
								</div>
							</div>
						</div>
					</div>
				</form>
            </div>
		</div>
	</div>
@endsection
