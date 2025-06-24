@extends('front.layouts.master')

@section('content')
    <section class="volunteer-section section-padding">
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-lg-8 text-center">
                    <h2>{{ $city->name }} Sangathan Members</h2>
                    <h5 class="text-muted">{{ $district->name }} District</h5>
                </div>
            </div>


            @forelse($membersBySector as $sector => $members)
                <div class="my-4">
                    <h4 class="text-primary border-bottom pb-2">{{ $sector }}</h4>
                    <div class="row">
                        @foreach ($members as $member)
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="vol-card wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="image">
                                        <img src="{{ asset('front_assets/assets/images/volunteer/1.jpg') }}" alt="">
                                        <span class="hover-icon"><i class="flaticon-phone"></i></span>
                                        <ul>
                                           
                                            <li>
                                                <a href="tel:{{ $member->mobile }}">
                                                    📞 {{ $member->mobile }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="text">
                                        <h3><a href="#">{{ $member->name }}</a></h3>
                                        <span>{{ $member->role_title }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @empty
                <p>No Sangathan members found in this city.</p>
            @endforelse
        </div>
    </section>

@endsection
