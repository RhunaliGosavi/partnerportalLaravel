@extends('layouts.app')

@section('content')
<div class="row">
		<div class="col-md-12">
			<div class="m-portlet">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text"> Dashboard</h3>
						</div>
					</div>
				</div>
				<div class="m-portlet__body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="m-demo-icon">
                                <a href="{{url('/users')}}" border='0'>
                                    <div class="m-demo-icon__preview">
                                        <i class="flaticon-users"></i>
                                    </div>
                                    <div class="m-demo-icon__class">
                                        Employees </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="m-demo-icon">
                                <a href="{{url('/employee-dashboard')}}" border='0'>
                                    <div class="m-demo-icon__preview">
                                        <i class="flaticon-users"></i>
                                    </div>
                                    <div class="m-demo-icon__class">
                                        Employee Dashboard </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="m-demo-icon">
                                <a href="{{url('/employee-helpdesk')}}" border='0'>
                                    <div class="m-demo-icon__preview">
                                        <i class="flaticon-users"></i>
                                    </div>
                                    <div class="m-demo-icon__class">
                                        Employee Helpdesk </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="m-demo-icon">
                                <a href="{{url('/links')}}" border='0'>
                                    <div class="m-demo-icon__preview">
                                        <i class="flaticon-users"></i>
                                    </div>
                                    <div class="m-demo-icon__class">
                                        Important Links </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="m-demo-icon">
                                <a href="{{url('/referCustomer')}}" border='0'>
                                    <div class="m-demo-icon__preview">
                                        <i class="flaticon-users"></i>
                                    </div>
                                    <div class="m-demo-icon__class">
                                        Refer Friend </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="m-demo-icon">
                                <a href="{{url('/applyNowRequests')}}" border='0'>
                                    <div class="m-demo-icon__preview">
                                        <i class="flaticon-users"></i>
                                    </div>
                                    <div class="m-demo-icon__class">
                                        Apply Now Requests </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="m-demo-icon">
                                <a href="{{url('/loanProduct')}}" border='0'>
                                    <div class="m-demo-icon__preview">
                                        <i class="flaticon-users"></i>
                                    </div>
                                    <div class="m-demo-icon__class">
                                        Loan Product </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="m-demo-icon">
                                <a href="{{url('/salesProduct')}}" border='0'>
                                    <div class="m-demo-icon__preview">
                                        <i class="flaticon-users"></i>
                                    </div>
                                    <div class="m-demo-icon__class">
                                        Sales Kit </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="m-demo-icon">
                                <a href="{{url('/calculator-policy')}}" border='0'>
                                    <div class="m-demo-icon__preview">
                                        <i class="flaticon-users"></i>
                                    </div>
                                    <div class="m-demo-icon__class">
                                        Calculator Policy </div>
                                </a>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
@endsection
