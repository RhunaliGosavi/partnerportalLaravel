@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="m-portlet">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text"> User Listing</h3>
						</div>
					</div>
				</div>
				<div class="m-portlet__body">
					<ul class="nav nav-tabs  m-tabs-line m-tabs-line--success" role="tablist">
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link active Tabs" data-toggle="tab" href="#m_tabs_2_1" role="tab" data-status="1">AFL Employees</a>
						</li>
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link Tabs" data-toggle="tab" href="#m_tabs_2_2" role="tab" data-status="2">Business Partners</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="m_tabs_2_1" role="tabpanel">
							<div id="afl_employee">
							</div>
						</div>
						<div class="tab-pane" id="m_tabs_2_2" role="tabpanel">
							<div id="business_partner">
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
				selectedTable = 'afl_employee';
			} else {
				selectedTable = 'business_partner';
			}
			table = $('#'+selectedTable).mDatatable( {
                data: {
                    type: 'remote',
                    source: {
                      	read: {
                        // sample GET method
	                        method: 'get',
	                        url: base_url+'/fetchAFLEmployees',
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
              		{ field: "name",title:'Name'},
                    { field: "email",title:'Email'},
                    { field: "employee_id",title:'Employee Id'},
                    { field: "pan_number",title:'PAN Number'},
                    { field: "mobile_number",title:'Mobile Number'},
                    { field: "status",title:'Status'},
                    { 
              			field: "Actions",
		                width: 60,
		                title: "Actions",
		                sortable: false,
		                overflow: 'visible',
		                template:function(row,a,i)  {
		                	html = '<a href="'+base_url+'/user/edit/'+row.id+'" title="Edit User" class="dropdown-item"><i class="la la-edit"></i>Edit User</a></div>';
		                	return '<div class="dropdown ' + (i.getPageSize()-a<=4? 'dropup':'' ) + '"><a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">\
                                <i class="la la-ellipsis-h"></i>\
                            </a>\
                            <div class="dropdown-menu dropdown-menu-right">'+html+'</div></div>';
                        }
                    }
              	]
      		});
		});
		$(document).on('click','.Tabs',function() {
	    	var selectedTab = $(this).data('status');
		    var userPolicyKeywordSearch = $('#userPolicyKeywordSearch').val();

		    var selectedTable = '';
		    if(1 == selectedTab) {
				selectedTable = 'afl_employee';
			} else {
				selectedTable = 'business_partner';
			}

		    
		    if('afl_employee' == selectedTable) {
		    	table.destroy();
		    	table = $('#'+selectedTable).mDatatable( {
		    		data: {
	                    type: 'remote',
	                    source: {
	                      	read: {
	                        // sample GET method
		                        method: 'get',
		                        url: base_url+'/fetchAFLEmployees',
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
	              		{ field: "name",title:'Name'},
	                    { field: "email",title:'Email'},
	                    { field: "employee_id",title:'Employee Id'},
	                    { field: "pan_number",title:'PAN Number'},
                    	{ field: "mobile_number",title:'Mobile Number'},
	                    { field: "status",title:'Status'},
	                    { 
	              			field: "Actions",
			                width: 60,
			                title: "Actions",
			                sortable: false,
			                overflow: 'visible',
			                template:function(row,a,i)  {
			                	html = '<a href="'+base_url+'/user/edit/'+row.id+'" title="Edit User" class="dropdown-item"><i class="la la-edit"></i>Edit User</a></div>';
			                	return '<div class="dropdown ' + (i.getPageSize()-a<=4? 'dropup':'' ) + '"><a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">\
	                                <i class="la la-ellipsis-h"></i>\
	                            </a>\
	                            <div class="dropdown-menu dropdown-menu-right">'+html+'</div></div>';
	                        }
	                    }
	              	]
		    	});
		    }
		});
	</script>
@endsection