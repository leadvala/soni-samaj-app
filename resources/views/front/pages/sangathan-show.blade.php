@extends('front.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold">{{ $district->name }} - Cities</h2>
            <p class="text-muted">Explore the cities under the {{ $district->name }} district.</p>
        </div>

        @if ($district->cities->isEmpty())
            <div class="alert alert-warning text-center">No cities found in this district.</div>
        @else
            <div class="row gy-4 justify-content-center service-slider-s4">
                @foreach ($district->cities as $city)
                    <div class="col-md-4 col-lg-3">
                        <div class="service-card-s2 h-100 d-flex flex-column">
                            <div class="icon mb-3 text-center">
                                <img src="{{ asset('front_assets/assets/images/service/icon-2.svg') }}"
                                    alt="{{ $city->name }}" class="img-fluid" style="max-height: 60px;">
                            </div>
                            <div class="content text-center flex-grow-1">
                                <h5 class="fw-semibold">{{ $city->name }}</h5>
                                <p class="text-muted">Discover more about {{ $city->name }} city.</p>
                            </div>
                            <div class="services-btn text-center mb-3">
                                <a href="{{ route('front.sangathan.city', [$district->id, $city->id]) }}"
                                    class="btn btn-outline-primary btn-sm">See Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="mt-5 text-center">
            <a href="{{ route('front.sangathan') }}" class="btn btn-secondary">
                ← Back to Districts
            </a>
        </div>
    </div>
@endsection
