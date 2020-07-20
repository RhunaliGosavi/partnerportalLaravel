@extends('frontend.layouts.app')
@section('title')
	Employee Helpdesk
@endsection
@section('content')
  <section class="page-top">
    <div class="page-heading">
      <h1>Employee Helpdesk</h1>
    </div>
  </section>
  <section class="page-content-box">
      <div class="application-status helpdesk">
          <div class="helpdesk_head">
              <div class="helpdesk_head-title">
                  <h2>HR Helpdesk Related Documents</h2>
                  <p class="mb-4">Kindly enter following information in order to check your application status.</p>
              </div>
              <form>
                  <div class="form-group input-field">
                      <input type="text" class="form-control search-box" Placeholder="Search Documents" id="search" />
                      <svg xmlns="http://www.w3.org/2000/svg" width="22.43" height="22.43" viewBox="0 0 22.43 22.43"><defs><style>.a{fill:#fff;stroke:#fff;stroke-width:0.6px;}</style></defs><g transform="translate(0.3 0.3)"><path class="a" d="M9.613,0a9.613,9.613,0,1,0,9.613,9.613A9.625,9.625,0,0,0,9.613,0Zm0,17.452a7.839,7.839,0,1,1,7.839-7.839A7.848,7.848,0,0,1,9.613,17.452Z"/><g transform="translate(14.967 14.967)"><path class="a" d="M357.648,356.393l-5.088-5.088a.887.887,0,1,0-1.255,1.255l5.088,5.088a.887.887,0,0,0,1.255-1.255Z" transform="translate(-351.046 -351.046)"/></g></g></svg>
                  </div>
              </form>
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
                @if(count($helpdesks))
                  @foreach($helpdesks as $desk)
                  
                  <tr>
                      <td>{{$desk->name}}</td>
                      <td>{{$desk->file_size_in_mb}}</td>
                      <td><a href="{{url('/storage/employee/helpdesk/upload/').'/'.$desk->file_path}}" target="_blank">View</a></td>
                      <td><a href="{{url('/storage/employee/helpdesk/upload/').'/'.$desk->file_path}}" download="{{$desk->file_path}}"><img src="{{url('/assets_frontend/images/down-arrow.png')}}" alt="download" class="img-fluid"/></a></td>
                  </tr>
                
                  @endforeach
                @endif
              </tbody>
          </table>
      </div>
  </section>
  <script type="text/javascript">
    $(document).ready(function(){
        $(document).on("keyup",'.search-box', function(){
            /* Get input value on change */
            var inputVal = $(this).val();
            var resultDropdown = $(".result");
            if(inputVal.length){
                $.get(base_url+"/search", {term: inputVal}).done(function(data){
                  resultDropdown.empty();
                    // Display the returned data in browser
                    resultDropdown.html(data);
                });
            } else{
                $.get(base_url+"/search", {term: ''}).done(function(data){
                  resultDropdown.empty();
                    // Display the returned data in browser
                    resultDropdown.html(data);
                });
            }
        });
        
        // Set search input value on click of result item
        $(document).on("click", ".result p", function(){
            $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
            $(this).parent(".result").empty();
        });
    });
  </script>
@endsection
