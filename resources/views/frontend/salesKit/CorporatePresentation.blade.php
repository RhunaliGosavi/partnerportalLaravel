@extends('frontend.layouts.app')
@section('title')
	Corporate Presentations
@endsection
@section('content')
  <section class="page-top">
    <div class="page-heading">
      <h1>Corporate Presentations</h1>
    </div>
  </section>
  <section class="page-content-box">
      <div class="application-status helpdesk">
          <div class="helpdesk_head">
              <div class="helpdesk_head-title">
                  <h2>Corporate Presentations</h2>
                  <!-- <p class="mb-4">Kindly enter following information in order to check your application status.</p> -->
              </div>
          </div>
          
          <table class="table table-responsive mt-2">
              <thead>
                  <tr>
                      <th>Document title</th>
                      <th>File size</th>
                      <th>View template</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody class="result">
                @if(count($corporatepresentations))
                  @foreach($corporatepresentations as $corporate)
                  
                  <tr>
                      <td>{{$corporate->title}}</td>
                      <td>{{$corporate->file_size_in_mb}}</td>
                      <td><a href="{{url('/storage/corporate/').'/'.$corporate->file_path}}" target="_blank">View</a></td>
                      <td><a href="{{url('/storage/corporate/').'/'.$corporate->file_path}}" download="{{$corporate->file_path}}"><img src="{{url('/assets_frontend/images/down-arrow.png')}}" alt="download" class="img-fluid"/></a></td>
                  </tr>
                
                  @endforeach
                @endif
              </tbody>
          </table>
      </div>
  </section>
@endsection
