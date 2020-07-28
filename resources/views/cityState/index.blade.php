@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="m-portlet">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text"> City List</h3>
						</div>
					</div>
					<div class="m-portlet__head-tools">
						<div class="row">
							<div class="col-xl-3 order-2 order-xl-1">
								<form name="import_file" id="import_file" action="{{url('city_state/import')}}" method="post" enctype="multipart/form-data">
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
					<div class="row" style="margin-bottom:10px">
						<div class="col-md-9">
						</div>
						<div class="col-md-3">
							<div class="m-input-icon m-input-icon--left">
								<input type="text" class="form-control m-input m-input--solid" placeholder="Search..." id="generalSearch">
								<span class="m-input-icon__icon m-input-icon__icon--left">
									<span>
										<i class="la la-search"></i>
									</span>
								</span>
							</div>
						</div>
					</div>
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
	                        url: base_url+'/city_state/all',
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
				   search: {
                         input: $('#generalSearch'),
                   },
              	// column sorting
              	sortable: true,
				  
              	"columns": [
                    { field: "pincode",title:'Pincode'},
                    { field: "office_city",title:'City'},
                    { field: "state",title:'State'},
                    { field: "circle",title:'Circle Name'},
                    { field: "region",title:'Region Name'},
                    { field: "division",title:'Division'},
                    { field: "office_type",title:'Office Type'},
                    { field: "delivery",title:'Delivery'},
                    { field: "district",title:'District'},
                    { 
              			field: "Actions",
		                width: 60,
		                title: "Actions",
		                sortable: false,
		                overflow: 'visible',
		                template:function(row,a,i)  {
		                	var html = '<a href="'+base_url+'/city_state/delete/'+row.id+'" title="Delete Record" class="dropdown-item"><i class="la la-trash"></i>Delete Record</a></div>';
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