@extends('frontend.layouts.app')
<style>
  a.btn.document-button {
  background: #97144D;
  color: #fff;
  font-size: 1rem;
  font-family: 'latosemibold';
  padding: 14px 50px;
  margin-right: 40px; }

.document-content_button {
  padding: 40px 40px 30px; }

a.btn.document-button:hover {
  border: 1px solid #97144D;
  color: #97144D;
  background: transparent;
  transition: 0.5s; }

a.btn.document-button:focus {
  box-shadow: none; }
</style>
@section('title')
    DSA Onboarding
@endsection
@section('breadcum')
<section class="page-top">
          <div class="back-btn">
             <button class="btn" href="{{ url()->previous() }}"><img src="{{url('/assets_frontend/images/back-btn-icon.png')}}"></button>
          </div>
          <div class="page-heading">
            <h1>DSA Onboarding Details</h1>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('sales/kit')}}">Sales Kit</a></li>
                <li class="breadcrumb-item"><a href="{{url('sales/kit/DsaOnboarding')}}" class="text-dark">DSA Onboarding Details</a></li>
              </ol>
            </nav>
          </div>
        </section>
@endsection
@section('content')


        <section class="page-content-box">
          <div class="tab-sec">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class=" active" id="document-list" data-toggle="tab" href="#tab1" role="tab" aria-controls="document-list" aria-selected="true">Document List</a>
              </li>
              <li class="nav-item">
                <a class="" id="template" data-toggle="tab" href="#tab2" role="tab" aria-controls="template" aria-selected="false">Template</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab-name1">
                <div class="document-list_content">
                    <div class="document-content_header">
                        <p>Document Title</p>
                    </div>
                    @foreach($dsa_onboarding  as $dsadoc)
                    <p class="document-content_para">{{$dsadoc->title}}</p>
                    @endforeach
                    <div class="document-content_button">
                        <a href="{{url('sales/kit/corporatepresentation')}}" class="btn document-button">Corporate Presentations</a>
                        <a href="{{url('sales/kit/DSALeadGeneration')}}" class="btn document-button">Generate DSA Lead</a>
                    </div>
                </div>
              </div>
              <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab-name2">
                <div class="template_content">
                  <p>Information required for a direct sales channel / agency to be on boarded as an AFL partner</p>
                  <table class="table table-responsive">
                    <thead>
                      <tr>
                        <th>Document Title</th>
                        <th>File Size</th>
                        <th>View Template</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($dsa_onboarding as $key  => $dsadoc)
                      <tr>
                        <td>{{$dsadoc->title}}</td>
                        <td>{{$dsadoc->	file_size_in_mb.' MB'}}</td>
                        <td class=""><a href="#" class="tamplate-view getDialog" data-toggle="modal" data-target="#myModal" data-url="{{"/storage/dsa/".$dsadoc->file_path }}">View</a></td>
                        <td><a href="{{'/storage/dsa/'.$dsadoc->file_path}}" download="{{'/storage/dsa/'.$dsadoc->file_path}}"><img src="{{url('/assets_frontend/images/download.png')}}" class="img-fluid" alt="download"></a></td>
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
                  <div class="document-content_button">
                    <a href="{{url('sales/kit/corporatepresentation')}}" class="btn document-button">Corporate Presentations</a>
                    <a href="{{url('salesKit/DSALeadGeneration')}}" class="btn document-button">Generate DSA Lead</a>
                </div>
                </div>
              </div>
            </div>
          </div>
        </section>

      <div class="modal custom-model-popup" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <iframe src="" width="100%" height="500" id="docPath">Close</iframe>
          </div>
        </div>
      </div>


    <script>
    $('.getDialog').click(function () {
        var url = $(this).attr('data-url');
        $("#docPath").attr("src", url);
    });

    </script>

@endsection
