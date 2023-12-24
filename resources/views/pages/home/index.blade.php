@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="page-title">Home Page</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            @forelse ($banners as $banner)
                <div class="col-lg-4">
                    {{-- boostrap5 > Component > Card --}}
                    <div class="card home-card">
                        <img src="{{ config('images.access_path') }}/{{ $banner->images->name }}" alt="banner image"
                            class="banner-image card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $banner->title }}</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                            <a href="#" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-lg-12">
                    <h2 class="text-danger">Not Found</h2>
                </div>
            @endforelse
        </div>
    </div>
@endsection

@push('css')
    <style>
        .page-title {
            paddinf-top: 10vh;
            paddinf-bottom: 5vh;
            font-size: 4rem;
            color: indigo;
        }

        /* .banner-image {
            width: 350px;
            height: 150px;
        } */

        .banner-image{
            max-height: 10rem;
            max-width: 30rem;
        }
    </style>
@endpush
