@extends('frontend.layouts.app')
@section('title')
    Sales Kit @if($loan_products) {{$loan_products->name}} @endIf
@endsection
@section('content')
    <section class="page-top">
        <div class="back-btn">
            <a class="btn" href="{{url()->previous()}}"><img src="{{url('/assets_frontend/images/back-btn-icon.png')}}"></a>
        </div>
        <div class="page-heading">
            <h1>Axis Finance Loan Products</h1>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('sales/kit')}}">Sales Kit</a></li>
                <li class="breadcrumb-item"><a href="{{url('sales/kit/products/'.$loan_products->id)}}">Loan Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">@if($loan_products) {{$loan_products->name}} @endIf </li>
            </ol>
            </nav>
        </div>
    </section>
    <section class="page-content-box">
        <div class="tab-sec">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @if($products)
                    @foreach($products->unique('name') as $count => $product)
                        <li class="nav-item">
                            <a @if ($count == 0) class="active" @endif id="tab-name{{$product->id}}" data-toggle="tab" href="#tab{{$product->id}}" role="tab" aria-controls="home" aria-selected="true">{{$product->name}}</a>
                        </li>
                    @endforeach
                @endif
            </ul>
            <div class="tab-content" id="myTabContent">
                @if($products)
                    @foreach($products as $count => $product)
                        @if($product->name !== Config::get('constant')['sales_kit_products']['DOCUMENT_CHECKLIST'])
                            <div class="tab-pane fade<?php if($count == 0) { echo ' show active'; } ?>" id="tab{{$product->id}}" role="tabpanel" aria-labelledby="tab-name{{$product->id}}">
                                @if($product->name === Config::get('constant')['sales_kit_products']['PRODUCT_FAQ'])
                                    <div class="faq-search-sec">
                                        <input type="text" placeholder="Search FAQ" class="faq-search">
                                        <button class="btn search-btn"><img src="{{url('/assets_frontend/images/search-btn-icon.svg')}}"></button>
                                    </div>
                                @endif
                                {!! $product->content_data !!}
                            </div>
                        @endif
                        @if($product->name === Config::get('constant')['sales_kit_products']['DOCUMENT_CHECKLIST'])
                            <div class="tab-pane fade<?php if($count == 0) { echo ' show active'; } ?>" id="tab{{$product->id}}" role="tabpanel" aria-labelledby="tab-name{{$product->id}}">
                                <div class="checklist-sec">
                                    <div class="select-category">
                                        <div class="custome-select">
                                            <select id="loan_product">
                                                <option>Select Document Category</option>
                                                @foreach ($doc_check_categories as $doc_check_category)
                                                    <option value="{{ $doc_check_category->id }}" @if(old('loan_product') == $doc_check_category['id']) selected @endif>{{ $doc_check_category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <ul class="list">
                                        {!! $product->content_data !!}
                                    </ul>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <script>
        $("#loan_product").on("change", function(){
            var selected = $(this).val();
            $.ajax({
                type: "GET",
                data: { id: selected },
                url: base_url+'/sales/kit/docChecklistProduct',
                success: function(res) {
                    if(res){
                        var items = [];
                        for (var i = 0; i < res.length; i++) {
                            items.push('<li>'+res[i].content_data+'</li>');
                        }
                        $('.list').html(items.join(''));
                    }
                }
            });
        });
    </script>
@endsection