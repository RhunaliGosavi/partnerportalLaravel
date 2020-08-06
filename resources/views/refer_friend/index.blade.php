@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="m-portlet">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text"> Refer Friend Requests</h3>
						</div>
					</div>
					<div class="m-portlet__head-tools">
						<div class="col-xl-3 order-1 order-xl-2">
							<a href="{{url('referFriendExport')}}" id="btnDownload" class="btn btn-danger download">Excel </a>
						</div>
					</div>
				</div>
				<div class="m-portlet__body">
					<div id="refer_friend">
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){

			table = $('#refer_friend').mDatatable( {
                data: {
                    type: 'remote',
                    source: {
                      	read: {
                        // sample GET method
	                        method: 'get',
	                        url: base_url+'/fetchReferFriendRequests',
	                        map: function(raw) {
	                            // sample data mapping
	                          	var dataSet = raw;
		                        if (typeof raw.data !== 'undefined') {
		                            dataSet = raw.data;
		                        }
		                        return dataSet;
                      		},
                  		},
             		},
             		pageSize: 50,
                    serverPaging: true,
                    serverFiltering: true,
                    serverSorting: true,
          		},
      		 	pagination:true,
              	// column sorting
              	sortable: true,
              	"columns": [
              		{ field: "source_user_id",title:'Lead Genrated Source', template:function(row) {
                    		if(row.source_user_id && row.employee.name) {
                    			return 'AFL Employee';
                    		} else {
                    			return '-';
                    		}
	                    }
					},
              		{ field: "employee.name",title:'Source Name', template:function(row) {
                    		if(row.source_user_id && row.employee.name) {
                    			return row.employee.name;
                    		} else {
                    			return '-';
                    		}
	                    }
					},
              		{ field: "employee.employee_id",title:'Source ID', template:function(row) {
                    		if(row.source_user_id && row.employee.employee_id) {
                    			return row.employee.employee_id;
                    		} else {
                    			return '-';
                    		}
	                    }
					},
                    { field: "relation_with_customer.relationship",title:'Relationship With Customer', template:function(row) {
                    		if(row.source_user_id && row.relation_with_customer.relationship) {
                    			return row.relation_with_customer.relationship;
                    		} else {
                    			return '-';
                    		}
	                    }
					},
                    { field: "name",title:'Applicant Name'},
                    { field: "email",title:'Email'},
                    { field: "mobile_number",title:'Mobile Number'},
                    { field: "loan_product",title:'Loan Product', template:function(row) {
                    		if(row.loan_product_id && row.loan_product.name) {
                    			return row.loan_product.name;
                    		} else {
                    			return '-';
                    		}
	                    }
	                },
	                { field: "loan_amount",title:'Loan Amount (INR)'},
	                { field: "prefered_contact_time",title:'Prefered Contact Time'}
              	]
      		});
		});
	</script>
@endsection
