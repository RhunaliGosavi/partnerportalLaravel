@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="m-portlet">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text"> Edit DSA</h3>
						</div>
					</div>
				</div>
				<form class="m-form m-form--fit m-form--label-align-right" action="{{url('dsa/update/').'/'.$dsa->id}}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="m-portlet__body">
						<div class="form-group m-form__group row {{ $errors->has('title') ? 'has-danger' : ''}}">
							<label class="col-3 col-form-label">Document Title</label>
							<div class="col-md-4">
								<input type="text" name="title" placeholder="Document Title" value="{{$dsa->title}}" class="form-control">
								@if ($errors->has('title'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                                @endif
							</div>
						</div>
						<div class="form-group m-form__group row {{ $errors->has('file') ? 'has-danger' : ''}}">
							<label class="col-3 col-form-label">Web Link</label>
							<div class="col-md-4">
								<input type="file" name="file"  id="file" value="{{old('file',$dsa->file_path)}}" class="form-control">
                                <input type="hidden" name="file_old"  id="file_old" value="{{$dsa->file_path}}" class="form-control">
                                <input type="hidden" name="file_size_in_mb"  id="file_size_in_mb" value="{{$dsa->file_size_in_mb}}" class="form-control">
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
									<a href="{{url('dsaList')}}" class="btn btn-secondary">Cancel</a>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection