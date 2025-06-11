@extends('layouts.master')
@section('page_title', 'Profile')

@section('content')
    @include('layouts.partials.breadcrumbs', [
        'title' => 'Profile',
        'breadcrumbs' => [['text' => 'Home', 'url' => url('/dashboard')], ['text' => 'Profile']],
    ])
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                @include('profile.partials.update-profile-information-form')
            </div>
            <div class="col-md-6">
                @include('profile.partials.update-password-form')
            </div>
        </div>
        <div class="row">
            <div>
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
@endsection
