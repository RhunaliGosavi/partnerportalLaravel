@extends('frontend.layouts.app')
@section('title')
	Sanctioned Cases
@endsection
@section('breadcum')

<section class="page-top">
    <div class="back-btn">
        <a class="btn" href="{{url()->previous()}}"><img src="{{url('/assets_frontend/images/back-btn-icon.png')}}"></a>
    </div>
    <div class="login-search">
      <div class="page-heading">
          <h1>Total sanctioned Cases</h1>
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{url('dashboard/totallogins')}}">Total Sanctioned Cases</a></li>
              </ol>
          </nav>
      </div>
      <form>
          <div class="form-group input-field search_bar">
              <input type="search" class="form-control" Placeholder="Search" onkeyup="getSearchResult()" id="search"/>
              <img src="{{url('/assets_frontend/images/search-btn-icon.svg')}}" alt="search" class="img-fluid">
          </div>
      </form>
    </div>
  </section>

@endsection
@section('content')

      <section class="page-content-box">
          <div class="application-status total-logins">
              <div class="filter">
                  <div class="from-date">
                      <span><label>From :</label></span>
                      <span class="custome-select">
                        <select name="from_month" class="datePick" id="from_month">
							{{$current_month = date('m') }}

							@php $MonthArray = array(
							"1" => "January", "2" => "February", "3" => "March", "4" => "April",
							"5" => "May", "6" => "June", "7" => "July", "8" => "August",
							"9" => "September", "10" => "October", "11" => "November", "12" => "December",
							) @endphp
							@foreach($MonthArray as $monthNum=>$month)
							<option value="{{$monthNum}}" @if($monthNum ==  $current_month) selected @endif>{{$month}}</option>
							@endforeach
						</select>
                      </span>
                      <span class="custome-select">
                        <select name="from_year" class="datePick" id="from_year">
							{{ $starting_year  =date('Y', strtotime('-4 year')) }}
							{{ $ending_year = date('Y') }}
							{{$current_year = date('Y') }}
							@for ($starting_year; $starting_year <= $ending_year; $starting_year++)
								<option value="{{ $starting_year }}"  @if($starting_year ==  $current_year) selected @endif>{{ $starting_year }}</option>
							@endfor

						</select>
                      </span>
                  </div>
                  <div class="to-date">
                      <span><label>To :</label></span>
                      <span class="custome-select">
                        <select name="to_month" class="datePick" id="to_month">
							{{$current_month = date('m') }}

							@php $MonthArray = array(
							"1" => "January", "2" => "February", "3" => "March", "4" => "April",
							"5" => "May", "6" => "June", "7" => "July", "8" => "August",
							"9" => "September", "10" => "October", "11" => "November", "12" => "December",
							) @endphp
							@foreach($MonthArray as $monthNum=>$month)
								<option value="{{$monthNum}}" @if($monthNum ==  $current_month) selected @endif>{{$month}}</option>
							@endforeach

                        </select>
                      </span>
                      <span class="custome-select">
                        <select  name="to_year" class="datePick" id="to_year">
							{{ $starting_year  =date('Y', strtotime('-4 year')) }}
							{{ $ending_year = date('Y') }}
							{{$current_year = date('Y') }}
							@for ($starting_year; $starting_year <= $ending_year; $starting_year++)
								<option value="{{ $starting_year }}"  @if($starting_year ==  $current_year) selected @endif>{{ $starting_year }}</option>
							@endfor
                        </select>
                      </span>
                  </div>
              </div>
              <div class="col-md-4 alert alert-danger offset-md-8" role="alert" style="display:none;" id="alertMsg">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				 <span id="error_alert">Select Valid date Range</span>
		      </div>
              <table class="table table-responsive">
                  <thead>
                    <tr>
                      <th>Sr. No.</th>
                      <th>Application No.</th>
                      <th>Customer Name</th>
                      <th>Product Type</th>
                      <th>Applied Amount</th>
                      <th>Login Date</th>
                      <th>Status</th>
                      <th>Sanctioned Amount</th>
                      <th>Sanctioned Date</th>
                      <th>Disbursed Amount</th>
                      <th>Disbursement Date</th>
                      <th>Sales Officer</th>
                      <th>Sales Supervisor</th>
                      <th>Sourcing Location</th>
                      <th>Sourcing Agency</th>
                    </tr>
                  </thead>
                  <tbody id="loginDetails">


                  </tbody>
                </table>
          </div>
      </section>

    <script type="text/javascript">
    	$( document ).ready(function() {
            var pathArray = window.location.pathname.split('/');
            var start_date=pathArray[3];
            var end_date=pathArray[4];

            var startSplit=start_date.split("-");
            var from_month=startSplit[1];
            var from_year=startSplit[0];
            var endSplit=end_date.split("-");
            var to_month=endSplit[1];
            var to_year=endSplit[0];

            $('#from_month option[value='+from_month+']').attr("selected", "selected");
            $('#from_year option[value='+from_year+']').attr("selected", "selected");
            $('#to_month option[value='+to_month+']').attr("selected", "selected");
            $('#to_year option[value='+to_year+']').attr("selected", "selected");

            getLoginDetails(start_date,end_date,to_month,to_year,'');
        });

   function getSearchResult(){
        var to_year=$('#to_year').val();
        var to_month=  $('#to_month').val();
        var from_year= $('#from_year').val();
        var from_month=$('#from_month').val();
        var start_date=from_year+'-'+from_month+'-1';
		var end_date=to_year+'-'+to_month+'-31';

        var searchVal=$('#search').val();

       // if(searchVal.length>3){
        getLoginDetails(start_date,end_date,to_month,to_year,searchVal);

        //}
      }
    $('.datePick').on('change',function(){

        $('#alertMsg').hide();
        var to_year=$('#to_year').val();
        var to_month=  $('#to_month').val();
        var from_year= $('#from_year').val();
        var from_month=$('#from_month').val();

        if(from_year>to_year){
            $('#alertMsg').show();
            return false;
        }else if(from_year==to_year && from_month>to_month){
            $('#alertMsg').show();
            return false;
        }else if(new Date().getFullYear()==to_year || new Date().getFullYear()==from_year){

            var currMonth=new Date().getMonth() +1;
            if(currMonth<to_month || currMonth<from_month){
                $('#alertMsg').show();
                return false;
            }
        }
        var start_date=from_year+'-'+from_month+'-1';
        var end_date=to_year+'-'+to_month+'-31';

        getLoginDetails(start_date,end_date,to_month,to_year,'');
    });

    function getLoginDetails(start_date,end_date,to_month,to_year,searchval){


    $.ajax({
        url: base_url+'/dashboard/gettotallogins',
        type: "post",
        data: {'start_date':start_date,'end_date':end_date,'to_month':to_month,'to_year':to_year,'search_val':searchval,'type':'sanctioned',_token: '{{csrf_token()}}'} ,
        success: function (response) {

            var res=JSON.parse(response);
            $('#loginDetails tr').remove();
            var html='';
            if(res.length>0){
                $.each(res, function(key, value) {

                        html+='<tr><td>'+(key+1)+'</td><td>'+res[key]['application_number']+'</td><td>'+res[key]['customer_name']+'</td><td>'+res[key]['product_type']+'</td><td>'+res[key]['applied_amount']+'</td><td>'+res[key]['application_login_date']+'</td><td>'+res[key]['application_status']+'</td><td>'+res[key]['sanctioned_amount']+'</td><td>'+res[key]['sanctioned_date']+'</td><td>'+res[key]['disbursed_amount']+'</td><td>'+res[key]['disbursement_date']+'</td><td>'+res[key]['sales_officer_name']+'</td><td>'+res[key]['sales_supervisors_name']+'</td><td>'+res[key]['sourcing_location']+'</td><td>'+res[key]['sourcing_agency']+'</td></tr>';

                });
            }else{
                html+='<tr><td colspan="4" class="text-center" style="color:red">NO DATA AVAILABLE</td></tr>';

            }
            $('#loginDetails').append(html);
            console.log(res);

        },
        error: function(jqXHR, textStatus, errorThrown) {
            $('#error_alert').text('Something went wrong ,Please try again');
            $('#alertMsg').show();
        }
    });
    }
</script>


@endsection
