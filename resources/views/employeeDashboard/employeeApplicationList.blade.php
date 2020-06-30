@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="m-portlet">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text"> Employee Dashboard</h3>
						</div>
					</div>
					<div class="m-portlet__head-tools">
						<div class="row">
							<div class="col-xl-3 order-2 order-xl-1">
								<form name="import_file" id="import_file" action="{{url('employee/import')}}" method="post" enctype="multipart/form-data">
		                            {{ csrf_field() }}
		                            
		                            <a href="javascript:void(0)" id="import_btn" class="btn btn-warning m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">Import File</a>
		                            <input type="file" name="import_file" style="display: none">
		                            
		                        </form>
		                    </div>
		                    <div class="col-xl-3 order-2 order-xl-1">
		                    </div>
		                
		                </div>
					</div>
				</div>
				<div class="m-portlet__body">
                     <div class="tab-content">
                        <div class="tab-pane active" id="m_tabs_2_1" role="tabpanel">
                            <div id="applicationdata">
                            </div>
                        </div>
                            
                   </div>
                   
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
		
			table = $('#applicationdata').mDatatable( {
                data: {
                    type: 'remote',
                    source: {
                      	read: {
                        // sample GET method
	                        method: 'get',
	                        url: base_url+'/fetch-employee-application-data',
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
             		pageSize: 15,
                    serverPaging: true,
                    serverFiltering: true,
                    serverSorting: true,
          		},
      		 	pagination:true,
              	// column sorting
              	sortable: true,
              	"columns": [
                    { field: "employee_name",title:'Employee Name'},
                    { field: "employee_id",title:'Employee Id'},
                    { field: "application_number",title:'Application Number'},
                    { field: "customer_name",title:'Customer Name'},
                    { field: "product_type",title:'Product Type'},
                    { field: "application_status",title:'Application Status'},
                    { field: "applied_amount",title:'Applied Amount'},
                    { field: "sanctioned_amount",title:'Sanctioned Amount'},
                    { field: "disbursed_amount",title:'Disbursed Amount'},
                    { field: "application_login_date",title:'Application Login Date'},
                    { field: "sanctioned_date",title:'Sanctioned Date'},
                    { field: "declined_date",title:'Declined Date'},
                    { field: "disbursement_date",title:'Disbursement Date'},
                    { field: "sales_officer_name",title:'Sales Officer Name'},
                    { field: "sales_supervisors_name",title:'Sales Supervisors Name'},
                    { field: "sourcing_location",title:'Sourcing Location'},
                    { field: "sourcing_agency",title:'Sourcing Agency'},
                    { 
              			field: "Actions",
		                width: 60,
		                title: "Actions",
		                sortable: false,
		                overflow: 'visible',
		                template:function(row,a,i)  {
		                	var html = '<a href="'+base_url+'/employeeApp/delete/'+row.id+'" title="Delete Record" class="dropdown-item"><i class="la la-trash"></i>Delete Record</a></div>';
		                	return '<div class="dropdown ' + (i.getPageSize()-a<=4? 'dropup':'' ) + '"><a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">\
                                <i class="la la-ellipsis-h"></i>\
                            </a>\
                            <div class="dropdown-menu dropdown-menu-right">'+html+'</div></div>';
                        }
                    }
              	]
      		});
		});
		

		
		$('#import_btn').on('click', function() {
	        $('input[type=file]').click();
	        return false;
	    })

	    $('input[name=import_file]').on('change', function() {
	        $('#import_file').submit();
	    });
	</script>
@endsection