@extends('frontend.layouts.app')
@section('title')
	Important Links
@endsection
@section('content')
	<section class="page-top">
	  <div class="page-heading">
	    <h1>Important Links</h1>
	  </div>
	</section>
	<section class="page-content-box">
	    <div class="application-status important-links">
	        <h2 class="mb-3">Important Links</h2>
	        <table class="table mt-4 table-responsive">
	            <thead>
	              <tr>
	                <th>Sr.no</th>
	                <th>Portal name</th>
	                <th>Web link</th>
	              </tr>
	            </thead>
	            <tbody>
	            	@if(count($links))
	            		@php $x = 0; @endphp
	            		@foreach($links as $link)
	            		@php $x++; @endphp
						<tr>
						    <td>{{$x}}</td>
						    <td>{{$link->portal_name}}</td>
						    <td><a href="{{$link->web_link}}">{{$link->web_link}}</a></td>
						</tr>
						@endforeach
					@else
						<tr>
							<td rowspan="3" colspan="3" class="text-center">No Record Found</td>
						</tr>
					@endif
	            </tbody>
	        </table>
	    </div>
	</section>
@endsection