@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="page-title">Product Page</h1>
            </div>
        </div>

        {{-- ONE TO ONE (ONE Product HAS ONE Category) --}}
        {{-- <div class="row justify-content-center">
            @foreach ($products as $product)
                <div class="col-md-4 mt-4">
                    <div class="card product-box border-info mb-4">
                        <div class="card-header"><strong>Name : {{ $product->name }}</strong></div>
                        <div class="card-body">
                            <p class="card-text">{{ $product->intro }}</p>
                            <a href="#" class="card-link">Add to Cart</a>
                            <a href="#" class="btn btn-sm btn-info">Add to Cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div> --}}

        {{-- ONE TO MANY (ONE Category HAS MANY Products) --}}
        {{-- <div class="row justify-content-center">
            @foreach ($categories as $category)
                <div class="col-md-4 mt-4">
                    <div class="card product-box border-info mb-4">
                        <div class="card-header"><strong>Category : {{ $category->name }}</strong></div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($category->products as $product)
                                    <div class="col-md-12 mt-3">
                                        <div class="card category-box">
                                            <div class="card-body">
                                                <p class="card-text">{{ $product->name }}</p>
                                                <h6>{{ $product->intro }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div> --}}

        {{-- MANY TO MANY (Product HAS MANY Categories)
        <div class="row justify-content-center">
            @foreach ($products as $product)
                <div class="col-md-6 mt-4">
                    <div class="card product-box border-info mb-4">
                        <div class="card-header"><strong>Name : {{ $product->name }}</strong></div>
                        <div class="card-body">
                            <p class="card-text">{{ $product->intro }}</p>
                            <div class="row">
                                @foreach ($product->categories as $category)
                                    <div class="col-md-6">
                                        <div class="card category-box">
                                            <div class="card-body">
                                                <h6>{{ $category->name }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div> --}}

        {{-- MANY TO MANY (Category has MANY Products) --}}
        {{-- <div class="row justify-content-center">
            @foreach ($categories as $category)
                <div class="col-md-6 mt-4">
                    <div class="card product-box border-info mb-4">
                        <div class="card-header"><strong>Name : {{ $category->name }}</strong></div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($category->products as $product)
                                    <div class="col-md-6">
                                        <div class="card category-box">
                                            <div class="card-body">
                                                <h6>{{ $product->name }}</h6>
                                                <h6>{{ $product->intro }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div> --}}

        {{-- HAS MANY THROUGH (One Product HAS MANY Comments) --}}
        {{-- <div class="row justify-content-center">
            @foreach ($products as $product)
                <div class="col-md-6 mt-4">
                    <div class="card product-box border-info mb-4">
                        <div class="card-header"><strong>Name : {{ $product->name }}</strong></div>
                        <div class="card-body">
                            <p class="card-text">{{ $product->intro }}</p>
                            <div class="row">
                                @foreach ($product->reviews as $review)
                                    <div class="col-md-6 mt-2">
                                        <div class="card category-box">
                                            <div class="card-body">
                                                <h6>{{ $review->comment }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div> --}}

        {{-- HAS MANY THROUGH (Category -> comment) --}}
        -<div class="row justify-content-center">
            @foreach ($categories as $category)
                <div class="col-md-6 mt-4">
                    <div class="card product-box border-info mb-4">
                        <div class="card-header text-center"><strong>Name : {{ $category->name }}</strong></div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($category->reviews as $review)
                                    <div class="col-md-6 mt-4">
                                        <div class="card category-box">
                                            <div class="card-body">
                                                <div class="card-title"><strong>Product: {{ $review->product->name }}</strong></div>
                                                <p>{{ $review->comment }}</p>
                                                {{-- <h6>{{ $review->intro }}</h6> --}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection

@push('css')
    <style>
        .page-title {
            paddinf-top: 10vh;
            /* paddinf-bottom: 5vh; */
            font-size: 3rem;
            color: rgb(0, 74, 130);
        }

        .product-box {
            background-color: rgba(144, 191, 219, 0.279);
        }

        .banner-image {
            max-height: 10rem;
            max-width: 30rem;
        }

        .category-box {
            background-color: rgba(219, 175, 144, 0.279);
        }
    </style>
@endpush
