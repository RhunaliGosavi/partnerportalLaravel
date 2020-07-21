@extends('frontend.layouts.app')
@section('title')
    Sales Kit Marketing Information
@endsection
@section('content')
    <section class="page-top">
        <div class="back-btn">
            <button class="btn"><img src="{{url('/assets_frontend/images/back-btn-icon.png')}}"></button>
        </div>
        <div class="page-heading">
            <h1>Marketing Information</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('salesKit')}}">Sales Kit</a></li>
                <li class="breadcrumb-item active" aria-current="page">Marketing Information </li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="page-content-box">
        <div class="tab-sec">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class=" active" id="tab-name1" data-toggle="tab" href="#tab1" role="tab" aria-controls="home" aria-selected="true">Sales Team Contests</a>
                </li>
                <li class="nav-item">
                    <a class="" id="tab-name2" data-toggle="tab" href="#tab2" role="tab" aria-controls="profile" aria-selected="false">Customer Offers & Schemes</a>
                </li>
                <li class="nav-item">
                    <a class="" id="tab-name3" data-toggle="tab" href="#tab3" role="tab" aria-controls="contact" aria-selected="false">Marketing Visuals</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab-name1">
                    <div class="market-info-content">
                        <div class="loan-product-select">
                            <div class="row">
                                <div class="col-md-6">
                                    <span><label class="loan-sel-lbl">Loan Product:</label></span>
                                    <span><div class="select-category">
                                        <div class="custome-select">
                                            <select id="loan_product">
                                                <option>Select Loan Product</option>
                                                @foreach ($loan_products as $loan_product)
                                                    <option value="{{ $loan_product->id }}" @if(old('loan_product') == $loan_product['id']) selected @endif>{{ $loan_product->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div></span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <button class="btn primary-btn">Incentive & Run Rate Calculator</button>
                                </div>
                            </div>
                        </div>
                        <div class="sales-contest">
                            @php $i=0 @endphp
                            @foreach($team_contests as $team_contest)
                                <div class="contest-box">
                                    <h3>Contest {{++$i}}</h3>
                                    <div class="desc">
                                        <label>Short Description:</label>
                                        <p>{!! $team_contest->content_data !!}</p>
                                    </div>
                                    <div class="action-sec">
                                        <a href="#" class="view-link getDialog" data-toggle="modal" data-target="#myModal" data-url="{{"/storage/salesKit/marketingInformation/salesContest/".$team_contest->file_path }}"><img src="{{url('/assets_frontend/images/pdf-icon.png')}}">View Contest Details</a>
                                        <a href="{{'/storage/sales/kit/marketinginformation/salescontest/'.$team_contest->file_path}}" download="{{'/storage/salesKit/marketingInformation/salesContest/'.$team_contest->file_path}}"   class="download-link"><img src="{{url('/assets_frontend/images/download-icon.png')}}"></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab-name4">
                    <div class="market-info-content">
                        <div class="loan-product-select">
                            <div class="row">
                                <div class="col-md-6">
                                    <span><label class="loan-sel-lbl">Loan Product:</label></span>
                                    <span><div class="select-category">
                                    <div class="custome-select">
                                        <select id="loan_product_scheme">
                                            <option>Select Loan Product</option>
                                            @foreach ($loan_products as $loan_product)
                                                <option value="{{ $loan_product->id }}" @if(old('loan_product') == $loan_product['id']) selected @endif>{{ $loan_product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    </div></span>
                                </div>
                            </div>
                        </div>
                        <div class="offer-list">
                            <ul>
                                @foreach($customer_schemes as $customer_scheme)
                                    <li>
                                        <div class="list-box">
                                            <a href="{{'/storage/sales/kit/marketinginformation/customerscheme/'.$customer_scheme->file_path}}" download="{{'/storage/sales/kit/marketinginformation/customerscheme/'.$customer_scheme->file_path}}" >Download {{$customer_scheme->file_path}} Here</a>
                                                <img src="{{url('/assets_frontend/images/pdf-icon.svg')}}" class="icon">
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab-name3">
                    <div class="market-info-content">
                        <div class="loan-product-select">
                            <div class="row">
                            <div class="col-md-6">
                                <span><label class="loan-sel-lbl">Loan Product:</label></span>
                                <span><div class="select-category">
                                    <div class="custome-select">
                                        <select id="loan_product_visual">
                                            <option>Select Loan Product</option>
                                            @foreach ($loan_products as $loan_product)
                                                <option value="{{ $loan_product->id }}" @if(old('loan_product') == $loan_product['id']) selected @endif>{{ $loan_product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div></span>
                            </div>
                            </div>
                        </div>
                        <div class="marketing-sec">
                            <div class="row">
                                <div class="col-md-2 verticle-tab-menu">
                                    <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
                                        @foreach($visual_categories->unique('name') as $count => $visual_category)
                                            <li class="nav-item">
                                                <a class="nav-link <?php if($count == 0) { echo 'active'; } ?>" id="#visual{{$visual_category->id}}-tab" data-toggle="tab" href="#visual{{$visual_category->id}}" role="tab" aria-controls="#visual{{$visual_category->id}}" aria-selected="true">{{$visual_category->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-md-10 verticle-tab-content">
                                    <div class="tab-content visuals" id="myTabContent">
                                        @foreach($visual_categories as $count => $visual_category)
                                        @foreach($visual_category->marketing_visual_category as $visuals)
                                            <div class="tab-pane fade <?php if($count == 0) { echo ' show active'; } ?>" id="visual{{$visual_category->id}}" role="tabpanel" aria-labelledby="visual{{$visual_category->id}}-tab">
                                                {!! $visuals->file_path !!}
                                            </div>
                                        @endforeach
                                        @endforeach
                                    </div>
                                </div>
                            </div>
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

        $("#loan_product").on("change", function(){
            var selected = $(this).val();
            $.ajax({
                type: "GET",
                data: { id: selected },
                url: base_url+'/sales/kit/marketing/contests',
                success: function(res) {
                    if(res){
                        var items = [];
                        for (var i = 0; i < res.length; i++) {
                            items.push('<div class="contest-box">\
                                <h3>Contest '+(i+1)+'</h3>\
                                <div class="desc">\
                                    <label>Short Description:</label>\
                                    <p>'+ res[i].content_data +'</p>\
                                </div>\
                                <div class="action-sec">\
                                    <a href="#" class="view-link getDialog" data-toggle="modal" data-target="#myModal" data-url="/storage/sales/kit/marketinginformation/salescontest/'+res[i].file_path+'"><img src="'+base_url+'/assets_frontend/images/pdf-icon.png">View Contest Details</a>\
                                    <a href="/storage/sales/kit/marketinginformation/salescontest/'+res[i].file_path+'" download="/storage/sales/kit/marketinginformation/salescontest/'+res[i].file_path+'" class="download-link"><img src="'+base_url+'/assets_frontend/images/download-icon.png" alt="download"></a>\
                                </div>\
                            </div>');
                        }
                        $('.sales-contest').html(items.join(''));
                    }
                }
            });
        });

        $("#loan_product_scheme").on("change", function(){
            var selected = $(this).val();
            $.ajax({
                type: "GET",
                data: { id: selected },
                url: base_url+'/sales/kit/marketing/schemes',
                success: function(res) {
                    if(res){
                        var items = [];
                        for (var i = 0; i < res.length; i++) {
                            items.push('<li>\
                                        <div class="list-box">\
                                            <a href="/storage/sales/kit/marketinginformation/customerscheme/'+res[i].file_path+'" download="/storage/sales/kit/marketinginformation/customerscheme/'+res[i].file_path+'" >Download '+res[i].file_path+' Here</a>\
                                                <img src="'+base_url+'/assets_frontend/images/pdf-icon.svg" class="icon">\
                                        </div>\
                                    </li>');
                        }
                        $('.offer-list ul').html(items.join(''));
                    }
                }
            });
        });

        $("#loan_product_visual").on("change", function(){
            var selected = $(this).val();
            $.ajax({
                type: "GET",
                data: { id: selected },
                url: base_url+'/sales/kit/marketing/visuals',
                success: function(res) {
                    if(res){
                        var tabs = [];
                        var tabItems = [];
                        for (var i = 0; i < res.length; i++) {
                            var activeClass = (i==0) ? 'active' : '';
                            var tabActiveClass = (i==0) ? 'show active' : '';
                            tabs.push('<li class="nav-item">\
                                            <a class="nav-link '+ activeClass + '" id="#visual'+res[i].id+'-tab" data-toggle="tab" href="#visual'+res[i].id+'" role="tab" aria-controls="#visual'+res[i].id+'" aria-selected="true">'+res[i].name+'</a>\
                                        </li>');

                            for (var j = 0; j < res[i].marketing_visual_category.length; j++) {
                                tabItems.push('<div class="tab-pane fade '+ tabActiveClass + '"          id="visual'+res[i].id+'" role="tabpanel" aria-labelledby="visual'+res[i].id+'-tab">\
                                '+res[i].marketing_visual_category[j].file_path+'</div>');
                            }
                        }
                        $('.nav-pills').html(tabs.join(''));
                        $('.visuals').html(tabItems.join(''));
                    }
                }
            });
        });
    </script>
@endsection