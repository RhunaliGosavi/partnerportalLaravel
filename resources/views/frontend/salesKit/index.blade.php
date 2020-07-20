@extends('frontend.layouts.app')
@section('title')
    Sales Kit
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
                <li class="breadcrumb-item active" aria-current="page"> Loan Product</li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="product-sec">
        <div class="row">
            @foreach($loan_products as $loan_product)
                <div class="col-md-4">
                    <div class="product-box">
                        <div class="product-box-head">
                        <div class="product-pic">
                        @if ($loan_product->icon !== NULL)
                            <img src="{{url('/storage/loanproduct/'.$loan_product->icon)}}">
                        @else
                            <img src="{{url('/assets_frontend/images/product-pic1.png')}}">
                        @endif
                        </div>
                        <div class="product-name">
                            <h2>{{$loan_product->name}}</h2>
                        </div>
                        </div>
                        <div class="product-box-content">
                        <p>{{$loan_product->description}} </p>
                        <a href="{{url('sales/kit/products').'/'.$loan_product->id}}">Know More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection