@extends('layouts.app')

@section('content')
    <div class="row">
		<div class="col-md-12">
			<div class="m-portlet">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text"> Edit Loan Product</h3>
						</div>
					</div>
				</div>
                <form class="m-form m-form--fit m-form--label-align-right" action="{{url('loanProduct/update/'.$lProduct->id)}}" method="POST">
					@csrf
					<div class="m-portlet__body">
                        <div class="form-group m-form__group row {{ $errors->has('name') ? 'has-danger' : ''}}">
                            <label class="col-3 col-form-label">Name</label>
                            <div class="col-md-4">
                                <input type="text" name="name" placeholder="Product Name" value="{{ $lProduct->name }}" class="form-control">
                                @if ($errors->has('name'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group m-form__group row {{ $errors->has('description') ? 'has-danger' : ''}}">
                            <label class="col-3 col-form-label">Description</label>
                            <div class="col-md-9">
                                <!-- <input type="text" name="description" placeholder="Description" value="{{ $lProduct->description }}" class="form-control"> -->
                                <textarea name="description" id="ckeditor-content" placeholder="Content" class="form-control summernote">
                                    {{ $lProduct->description }}
                                </textarea>
                                @if ($errors->has('description'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('description') }}
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
									<a href="{{url('loanProduct')}}" class="btn btn-secondary">Cancel</a>
								</div>
							</div>
						</div>
					</div>
				</form>
            </div>
		</div>
	</div>
@endsection