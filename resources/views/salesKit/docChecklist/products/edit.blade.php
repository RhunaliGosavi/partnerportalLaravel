@extends('layouts.app')

@section('content')
    <div class="row">
		<div class="col-md-12">
			<div class="m-portlet">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text"> Edit Document checklist Product</h3>
						</div>
					</div>
				</div>
                <form class="m-form m-form--fit m-form--label-align-right" action="{{url('docCheckProduct/update/'.$skProduct->id)}}" method="POST">
					@csrf
					<div class="m-portlet__body">
                        <div class="form-group m-form__group row {{ $errors->has('sale_kit_product') ? 'has-danger' : ''}}">
							<label class="col-3 col-form-label">Sales Kit Product</label>
							<div class="col-md-4">
								<select class="form-control" name="sale_kit_product" id="sale_kit_product">
									<option value="">Select Sales Kit Product</option>
                                    @foreach ($sale_kit_products as $sale_kit_product)
                                        <option value="{{ $sale_kit_product->id }}" @if($sale_kit_product['id'] == $skProduct['sales_kit_product_id']) selected @endif>{{ $sale_kit_product->name }}</option>
                                    @endforeach
								</select>
                                @if ($errors->has('sale_kit_product'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('sale_kit_product') }}
                                </div>
                                @endif
							</div>
						</div>
                        <div class="form-group m-form__group row {{ $errors->has('doc_check_category') ? 'has-danger' : ''}}">
							<label class="col-3 col-form-label">Document Checklist Product</label>
							<div class="col-md-4">
								<select class="form-control" name="doc_check_category" id="doc_check_category">
									<option value="">Select Document Checklist Product</option>
                                    @foreach ($doc_check_categories as $doc_check_category)
                                        <option value="{{ $doc_check_category->id }}" @if($doc_check_category['id'] == $skProduct['document_checklist_category_id']) selected @endif>{{ $doc_check_category->name }}</option>
                                    @endforeach
								</select>
                                @if ($errors->has('doc_check_category'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('doc_check_category') }}
                                </div>
                                @endif
							</div>
						</div>
                        <div class="form-group m-form__group row {{ $errors->has('content') ? 'has-danger' : ''}}">
                            <label class="col-3 col-form-label">Content</label>
                            <div class="col-md-4">
                                <!-- <input type="text" name="content" placeholder="Content" value="{{ $skProduct['content_data'] }}" class="form-control"> -->
                                <textarea name="content" id="ckeditor-content" placeholder="Content" class="form-control">
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
									<a href="{{url('docCheckProduct')}}" class="btn btn-secondary">Cancel</a>
								</div>
							</div>
						</div>
					</div>
				</form>
            </div>
		</div>
	</div>
@endsection