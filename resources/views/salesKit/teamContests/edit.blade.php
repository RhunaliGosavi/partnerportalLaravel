@extends('layouts.app')
<head>
    <link href="{{url('assets/css/summernote.min.css')}}" rel="stylesheet"> 
</head>
@section('content')
    <div class="row">
		<div class="col-md-12">
			<div class="m-portlet">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text"> Edit Sales Team Contest</h3>
						</div>
					</div>
				</div>
                <form class="m-form m-form--fit m-form--label-align-right" action="{{url('salesContest/update/'.$sContest->id)}}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="m-portlet__body">
                        <div class="form-group m-form__group row {{ $errors->has('loan_product') ? 'has-danger' : ''}}">
							<label class="col-3 col-form-label">Loan Product</label>
							<div class="col-md-4">
								<select class="form-control" name="loan_product" id="loan_product">
									<option value="">Select Loan Product</option>
                                    @foreach ($loan_products as $loan_product)
                                        <option value="{{ $loan_product->id }}" @if($loan_product['id'] == $sContest['loan_product_id']) selected @endif>{{ $loan_product->name }}</option>
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
                                <input type="file" name="file"  id="file" value="{{old('file',$sContest->file_path)}}" class="form-control">
                                <!-- <input type="hidden" name="file_old"  id="file_old" value="{{$sContest->file_path}}" class="form-control"> -->
                                @if ($errors->has('file'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('file') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row {{ $errors->has('content') ? 'has-danger' : ''}}">
                            <label class="col-3 col-form-label">Content</label>
                            <div class="col-md-9">
                                <!-- <input type="text" name="content" placeholder="Content" value="{{ $sContest['content_data'] }}" class="form-control"> -->
                                <textarea name="content" id="ckeditor-content" placeholder="Content" class="form-control summernote">
                                    {{ $sContest['content_data'] }}
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
									<a href="{{url('salesContest')}}" class="btn btn-secondary">Cancel</a>
								</div>
							</div>
						</div>
					</div>
				</form>
            </div>
		</div>
	</div>
    <script src="{{url('assets/js/summernote.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200,
                placeholder: "Content here..."
            });
        });
    </script>
@endsection