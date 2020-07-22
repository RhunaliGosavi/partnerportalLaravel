@extends('frontend.layouts.app')
@section('title')
	Dashboard
@endsection
@section('content')
    <div class="banner-sec">
        <div class="owl-carousel owl-theme">
          <div class="item">
            <div class="item-box">
              <div class="item-pic">
                <img src="{{url('assets_frontend/images/banner-pic1.png')}}" class="img-fluid center-pic">
              </div>
              <div class="item-text">
                <h4>Hi, {{ Auth::user()->name }} !</h4>
                <h2>Welcome to Axis Finance</h2>
                <p>All about axis finance activities will be updated here. This is just a dummy text for content position</p>
                <a href="#">Know More</a>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="item-box">
              <div class="item-pic">
                <img src="{{url('assets_frontend/images/banner-pic2.png')}}" class="img-fluid ">
              </div>
              <div class="item-text">
                <h4>Hi, {{ Auth::user()->name }} !</h4>
                <h2>Welcome to Axis Finance</h2>
                <p>All about axis finance activities will be updated here. This is just a dummy text for content position</p>
                <a href="#">Know More</a>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="item-box">
              <div class="item-pic">
                <img src="{{url('assets_frontend/images/banner-pic1.png')}}" class="img-fluid center-pic">
              </div>
              <div class="item-text">
                <h4>Hi, {{ Auth::user()->name }} !</h4>
                <h2>Welcome to Axis Finance</h2>
                <p>All about axis finance activities will be updated here. This is just a dummy text for content position</p>
                <a href="#">Know More</a>
              </div>
            </div>
          </div>
      </div>
      </div>
      <div class="sales-sec">
        <div class="container-fluid ">
          <div class="header-part">
            <div class="row">
              <div class="col-md-3">
                <h2>Sales Performance</h2>
              </div>
              <div class="col-md-9">
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
                    <span class="custome-select" >
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
			  </div>
			</div>
		  </div>
		  <div class="col-md-4 alert alert-danger offset-md-8" role="alert" style="display:none;" id="alertMsg">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				 <span id="error_alert">Select Valid date Range</span>
		   </div>

          <div class="content-part">
            <div class="row">
              <div class="col-md-3">
                <div class="content-box">
                  <h3>Total Logins</h3>
                    <a onclick="redirectToDetails('login')" style="cursor: pointer;"><div class="num" id="logCount"></div></a>
                  <div class="date"><span class="asOndate"></span></div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="content-box">
                  <h3>Sanctioned Cases</h3>
                  <a onclick="redirectToDetails('sanctioned')" style="cursor: pointer;"><div class="num" id="sanctionedCount"></div></a>
                  <div class="date"><span class="asOndate"></span></div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="content-box">
                  <h3>Declined Cases</h3>
                  <a onclick="redirectToDetails('decline')" style="cursor: pointer;"><div class="num" id="declinedCount"></div></a>
                  <div class="date"><span class="asOndate"></span></div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="content-box">
                  <h3>Disbursed Cases</h3>
                  <a onclick="redirectToDetails('disbursed')" style="cursor: pointer;"><div class="num" id="disbursedCount"></div></a>
                  <div class="date"><span class="asOndate"></span></div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
<script>

$( document ).ready(function() {

	var to_year=$('#to_year').val();
	var to_month=  $('#to_month').val();
	var from_year= $('#from_year').val();
	var from_month=$('#from_month').val();
	var start_date=from_year+'-'+from_month+'-1';
	var end_date=to_year+'-'+to_month+'-31';
	getAppDetails(start_date,end_date,to_month,to_year);
});

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

	   getAppDetails(start_date,end_date,to_month,to_year);
    });
    function redirectToDetails(type){

        var to_year=$('#to_year').val();
		var to_month=  $('#to_month').val();
		var from_year= $('#from_year').val();
		var from_month=$('#from_month').val();
        var start_date=from_year+'-'+from_month+'-1';
		var end_date=to_year+'-'+to_month+'-31';
        var redirUrl='/dashboard/totallogins/';
        if(type=="login"){
            redirUrl='/dashboard/totallogins/'

        }
        if(type=="sanctioned"){

           redirUrl='/dashboard/sanctiondcases/';
        }
        if(type=='decline'){
            redirUrl='/dashboard/declinedcases/';
        }
        if(type=="disbursed"){
            redirUrl='/dashboard/disbursedcases/';
        }
        window.location = base_url+redirUrl + start_date+"/"+end_date;

    }

function getAppDetails(start_date,end_date,to_month,to_year){
	$.ajax({
		url: base_url+'/dashboard/getAppdetails',
		type: "post",
		data: {'start_date':start_date,'end_date':end_date,'to_month':to_month,'to_year':to_year,_token: '{{csrf_token()}}'} ,
		success: function (response) {
			var res=JSON.parse(response);
            var total_logins= (res['data']=='')  ?  0: res['data'][0]['total_logins'] ;
            var declined_cases=(res['data']=='') ? 0 : res['data'][0]['declined_cases'];
            var sanctioned_cases=(res['data']=='') ? 0 : res['data'][0]['sanctioned_cases'];
            var disbursed_cases=(res['data']=='')? 0 :res['data'][0]['disbursed_cases'];
			$('#logCount').text(total_logins);
			$('#disbursedCount').text(disbursed_cases);
			$('#declinedCount').text(declined_cases);
			$('#sanctionedCount').text(sanctioned_cases);
			$('.asOndate').text(res['as_on_date']);
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
