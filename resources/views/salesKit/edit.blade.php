@extends('layouts.app')

@section('content')
    <div class="row">
		<div class="col-md-12">
			<div class="m-portlet">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text"> Edit Sales Kit Product</h3>
						</div>
					</div>
				</div>
                <form class="m-form m-form--fit m-form--label-align-right" action="{{url('salesProduct/update/'.$skProduct->id)}}" method="POST">
					@csrf
					<div class="m-portlet__body">
                        <div class="form-group m-form__group row {{ $errors->has('loan_product') ? 'has-danger' : ''}}">
							<label class="col-3 col-form-label">Loan Product</label>
							<div class="col-md-4">
								<select class="form-control" name="loan_product" id="loan_product">
									<option value="">Select Loan Product</option>
                                    @foreach ($loan_products as $loan_product)
                                        <option value="{{ $loan_product->id }}" @if($loan_product['id'] == $skProduct['loan_product_id']) selected @endif>{{ $loan_product->name }}</option>
                                    @endforeach
								</select>
                                @if ($errors->has('loan_product'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('loan_product') }}
                                </div>
                                @endif
							</div>
						</div>
                        <div class="form-group m-form__group row {{ $errors->has('name') ? 'has-danger' : ''}}">
                            <label class="col-3 col-form-label">Name</label>
                            <div class="col-md-4">
                                <input type="text" name="name" placeholder="Product Name" value="{{ $skProduct['name'] }}" class="form-control">
                                @if ($errors->has('name'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row {{ $errors->has('content') ? 'has-danger' : ''}}">
                            <label class="col-3 col-form-label">Content</label>
                            <div class="col-md-9">
                                <!-- <input type="text" name="content" placeholder="Content" value="{{ $skProduct['content_data'] }}" class="form-control"> -->
                                <textarea name="content" id="ckeditor-content" placeholder="Content" class="form-control summernote">
                                    {{ $skProduct['content_data'] }}
                                </textarea>
                                @if ($errors->has('content'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('content') }}
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
									<a href="{{url('salesProduct')}}" class="btn btn-secondary">Cancel</a>
								</div>
							</div>
						</div>
					</div>
				</form>
            </div>
		</div>
	</div>
@endsection