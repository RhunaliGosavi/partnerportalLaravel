@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="m-portlet">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text"> DSA Onboarding Details</h3>
						</div>
					</div>
					<div class="m-portlet__head-tools">
						<div class="row">
		                    <div class="col-xl-3 order-2 order-xl-1">
								<a href="{{url('/dsa/create')}}" border='0'>
		                            <button id="sample_editable_1_new" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"> Add New
		                                <i class="fa fa-plus"></i>
		                            </button>
		                        </a>
		                    </div>
		                </div>
					</div>
				</div>
				<div class="m-portlet__body">
					<div id="dsa">
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			
			table = $('#dsa').mDatatable( {
                data: {
                    type: 'remote',
                    source: {
                      	read: {
                        // sample GET method
	                        method: 'get',
	                        url: base_url+'/fetchDsaList',
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
              		{ field: "title",title:'Document Title'},
                    { field: "file_size_in_mb",title:'File Size', template: function(row, index, datatable) {
								return row.file_size_in_mb + ' MB' ;
							}
						},
                    { 
              			field: "Actions",
		                width: 60,
		                title: "Actions",
		                sortable: false,
		                overflow: 'visible',
		                template:function(row,a,i)  {
		                	html = '<a href="'+base_url+'/dsa/edit/'+row.id+'" title="Edit DSA" class="dropdown-item"><i class="la la-edit"></i>Edit DSA</a><a href="'+base_url+'/dsa/delete/'+row.id+'" title="Delete DSA" class="dropdown-item"><i class="la la-trash"></i>Delete DSA</a><a href="'+base_url+'/storage/dsa/'+row.file_path+'" title="Download DSA" class="dropdown-item"><i class="la la-download"></i>Download DSA</a>';
		                	// <a href="'+base_url+'/dsa/view/'+row.id+'" title="View DSA" class="dropdown-item"><i class="la la-eye"></i>View DSA</a>
		                	return '<div class="dropdown ' + (i.getPageSize()-a<=4? 'dropup':'' ) + '"><a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">\
                                <i class="la la-ellipsis-h"></i>\
                            </a>\
                            <div class="dropdown-menu dropdown-menu-right">'+html+'</div></div>';
                        }
                    }
              	]
      		});
		});
	</script>
@endsection