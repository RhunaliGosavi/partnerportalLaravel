@extends('layouts.app')

@section('content')
    <div class="row">
		<div class="col-md-12">
			<div class="m-portlet">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text"> Edit Customer Scheme</h3>
						</div>
					</div>
				</div>
                <form class="m-form m-form--fit m-form--label-align-right" action="{{url('customerScheme/update/'.$custScheme->id)}}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="m-portlet__body">
                        <div class="form-group m-form__group row {{ $errors->has('loan_product') ? 'has-danger' : ''}}">
							<label class="col-3 col-form-label">Loan Product</label>
							<div class="col-md-4">
								<select class="form-control" name="loan_product" id="loan_product">
									<option value="">Select Loan Product</option>
                                    @foreach ($loan_products as $loan_product)
                                        <option value="{{ $loan_product->id }}" @if($loan_product['id'] == $custScheme['loan_product_id']) selected @endif>{{ $loan_product->name }}</option>
                                    @endforeach
								</select>
                                @if ($errors->has('loan_product'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('loan_product') }}
                                </div>
                                @endif
							</div>
						</div>
                        <div class="form-group m-form__group row {{ $errors->has('file') ? 'has-danger' : ''}}">
                            <label class="col-3 col-form-label">Select File</label>
                            <div class="col-md-4">
                                <input type="file" name="file"  id="file" value="{{old('file',$custScheme->file_path)}}" class="form-control">
                                <!-- <input type="hidden" name="file_old"  id="file_old" value="{{$custScheme->file_path}}" class="form-control"> -->
                                @if ($errors->has('file'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('file') }}
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
									<a href="{{url('customerScheme')}}" class="btn btn-secondary">Cancel</a>
								</div>
							</div>
						</div>
					</div>
				</form>
            </div>
		</div>
	</div>
@endsection