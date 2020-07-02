@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="m-portlet">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text"> Important Links</h3>
						</div>
					</div>
					<div class="m-portlet__head-tools">
						<div class="row">
		                    <div class="col-xl-3 order-2 order-xl-1">
								<a href="{{url('/link/create')}}" border='0'>
		                            <button id="sample_editable_1_new" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"> Add New
		                                <i class="fa fa-plus"></i>
		                            </button>
		                        </a>
		                    </div>
		                </div>
					</div>
				</div>
				<div class="m-portlet__body">
					<div id="link">
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			
			table = $('#link').mDatatable( {
                data: {
                    type: 'remote',
                    source: {
                      	read: {
                        // sample GET method
	                        method: 'get',
	                        url: base_url+'/fetchLinks',
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
              		{ field: "portal_name",title:'Portal Name'},
                    { field: "web_link",title:'Web Link'},
                    { 
              			field: "Actions",
		                width: 60,
		                title: "Actions",
		                sortable: false,
		                overflow: 'visible',
		                template:function(row,a,i)  {
		                	html = '<a href="'+base_url+'/link/edit/'+row.id+'" title="Edit link" class="dropdown-item"><i class="la la-edit"></i>Edit link</a><a href="'+base_url+'/link/delete/'+row.id+'" title="Delete link" class="dropdown-item"><i class="la la-trash"></i>Delete link</a>';
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