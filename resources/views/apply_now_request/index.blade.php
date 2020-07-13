@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="m-portlet">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text"> Apply Now Requests</h3>
						</div>
					</div>
					<div class="m-portlet__head-tools">
						<div class="col-xl-5 order-1 order-xl-2">
							<button type="text" id="btnDownload" class="btn btn-danger download">Excel </button>
						</div>
					</div>
				</div>
				<div class="m-portlet__body">
					<ul class="nav nav-tabs  m-tabs-line m-tabs-line--success" role="tablist">
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link active Tabs" data-toggle="tab" href="#m_tabs_2_1" role="tab" data-status="1">HR Loans</a>
						</li>
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link Tabs" data-toggle="tab" href="#m_tabs_2_2" role="tab" data-status="2">Other Loans</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="m_tabs_2_1" role="tabpanel">
							<div id="hr_loan">
							</div>
						</div>
						<div class="tab-pane" id="m_tabs_2_2" role="tabpanel">
							<div id="other_loan">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			var selectedTab = $('.nav-tabs li a.active').data('status');

			if(1 == selectedTab) {
				selectedTable = 'hr_loan';
			} else {
				selectedTable = 'other_loan';
			}
			table = $('#'+selectedTable).mDatatable( {
                data: {
                    type: 'remote',
                    source: {
                      	read: {
                        // sample GET method
	                        method: 'get',
	                        url: base_url+'/fetchHRLoans',
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
              		{ field: "employee_id",title:'Employee Id'},
              		{ field: "name",title:'Applicant Name'},
              		{ field: "mobile_number",title:'Mobile Number'},
                    { field: "designation",title:'Designation'},
                    { field: "prefered_contact_time",title:'Date of Confirmation'},
	                { field: "loan_amount",title:'Loan Amount (INR)'},
                    { field: "employee",title:'Added By', template:function(row) {
                    		if(row.employee_id ) {
                    			return row.employee.name;
                    		} else {
                    			return '';
                    		}
	                    }
	                },
              	]
      		});
		});
		$(document).on('click','.Tabs',function() {
	    	var selectedTab = $(this).data('status');

		    var selectedTable = '';
		    if(1 == selectedTab) {
				selectedTable = 'hr_loan';
			} else {
				selectedTable = 'other_loan';
			}

		    
		    if('hr_loan' == selectedTable) {
		    	table.destroy();
		    	table = $('#'+selectedTable).mDatatable( {
		    		data: {
	                    type: 'remote',
	                    source: {
	                      	read: {
	                        // sample GET method
		                        method: 'get',
		                        url: base_url+'/fetchHRLoans',
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
	              		{ field: "employee_id",title:'Employee Id'},
	              		{ field: "name",title:'Applicant Name'},
	              		{ field: "mobile_number",title:'Mobile Number'},
	                    { field: "designation",title:'Designation'},
	                    { field: "prefered_contact_time",title:'Date of Confirmation'},
		                { field: "loan_amount",title:'Loan Amount (INR)'},
	                    { field: "employee",title:'Added By', template:function(row) {
	                    		if(row.employee_id) {
	                    			return row.employee.name;
	                    		} else {
	                    			return '';
	                    		}
		                    }
		                },
	              	]
		    	});
		    }
		    if('other_loan' == selectedTable) {
		    	table.destroy();
		    	table = $('#'+selectedTable).mDatatable( {
		    		data: {
	                    type: 'remote',
	                    source: {
	                      	read: {
	                        // sample GET method
		                        method: 'get',
		                        url: base_url+'/fetchOtherLoans',
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
	              		{ field: "employee_id",title:'Employee Id'},
	              		{ field: "name",title:'Applicant Name'},
	              		{ field: "mobile_number",title:'Mobile Number'},
	              		{ field: "loan_product",title:'Loan Product', template:function(row) {
                    			if(row.loan_product_id && row.loan_product) {
                    				return row.loan_product.name;
                    			} else {
                    				return '-';
	                    		}
		                    }
		                },
	                    { field: "prefered_contact_time",title:'Preferred Time to Contact'},
		                { field: "loan_amount",title:'Loan Amount (INR)'},
	                    { field: "employee",title:'Added By', template:function(row) {
	                    		if(row.employee_id) {
	                    			return row.employee.name;
	                    		} else {
	                    			return '';
	                    		}
		                    }
		                },
	              	]
		    	});
		    }
		});

		$(document).on('click','.download',function() {
    		var selectedTab = $('.nav-tabs li a.active').data('status');
		    
		    var selectedTable = '';
		    if(1 == selectedTab) {
				var url = base_url+'/hrExport';
			} else {
				var url = base_url+'/otherExport';
			}
			window.location.href = url;
		});
	</script>
@endsection