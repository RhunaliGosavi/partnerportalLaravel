@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="m-portlet">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text"> Customer Schemes</h3>
						</div>
					</div>
					<div class="m-portlet__head-tools">
						<div class="row">
                            <div class="col-xl-3 order-2 order-xl-1">
								<a href="{{url('/customerScheme/create')}}" border='0'>
		                            <button id="sample_editable_1_new" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"> Add New
		                                <i class="fa fa-plus"></i>
		                            </button>
		                        </a>
		                    </div>
		                </div>
					</div>
				</div>
				<div class="col-md-4">
                    <div class="m-input-icon m-input-icon--left">
                        <input type="text" class="form-control m-input m-input--solid" placeholder="Search..." id="generalSearch">
                        <span class="m-input-icon__icon m-input-icon__icon--left">
                            <span>
                                <i class="la la-search"></i>
                            </span>
                        </span>
                    </div>
                </div>
				<div class="m-portlet__body">
                     <div class="tab-content">
                        <div class="tab-pane active" id="m_tabs_2_1" role="tabpanel">
                            <div id="customerSchemeData">
                            </div>
                        </div>
                   </div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			table = $('#customerSchemeData').mDatatable( {
                data: {
                    type: 'remote',
                    source: {
                      	read: {
                        // sample GET method
	                        method: 'get',
	                        url: base_url+'/customerScheme/all',
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
                    { field: "loan_product.name",title:'Loan Product'},
                    { 
                        field: "file_path",
                        title:'File Link',
                        template: function(row, index, datatable) {	
                            return '<a href="'+base_url+'/storage/salesKit/marketingInformation/customerScheme/'+row.file_path+'">'+row.file_path+'</a>'; 
                        }
                    },
                    { 
              			field: "Actions",
		                width: 60,
		                title: "Actions",
		                sortable: false,
		                overflow: 'visible',
		                template:function(row,a,i)  {
		                	var html = '<a href="'+base_url+'/customerScheme/delete/'+row.id+'" title="Delete Record" class="dropdown-item"><i class="la la-trash"></i>Delete Record</a><a href="'+base_url+'/customerScheme/edit/'+row.id+'" title="Delete Record" class="dropdown-item"><i class="la la-trash"></i>Edit Record</a></div>';
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