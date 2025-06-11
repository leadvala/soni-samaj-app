@extends('layouts.master')

@section('page_title', 'Home Settings')

@section('content')
    @include('layouts.partials.breadcrumbs', [
        'title' => 'Home Settings',
        'breadcrumbs' => [
            ['text' => 'Home', 'url' => '#'],
            ['text' => 'Home Settings', 'url' => '#'],
        ],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Home Settings Layout</h3>
        </div>

        <div class="card-body">
            {{-- Slider Section --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="background: #f5f5f5;">
                        <div class="card-body">
                            <h4>Slider Section</h4>
                            <a href="{{ route('admin.sliders.index') }}" class="btn-link">View Sliders</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Register Section --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="background: #f5f5f5;">
                        <div class="card-body">
                            <h4>Register Section</h4>
                            <a href="{{ route('admin.register-sections.index') }}" class="btn-link">View Register Section</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- About Section --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="background: #f5f5f5;">
                        <div class="card-body">
                            <h4>About Section</h4>
                            <a href="{{ route('admin.about-sections.index') }}" class="btn-link">View About Section</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Service Section --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="background: #f5f5f5;">
                        <div class="card-body">
                            <h4>Service Section</h4>
                            <a href="{{ route('admin.about-sections.index') }}" class="btn-link">View Service Section</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Donation Section --}}
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('admin.home-settings.store') }}" method="POST">
                        @csrf
                        <div class="card" style="background: #f5f5f5;">
                            <div class="card-body">
                                <h4>Donation Section</h4>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input type="text" name="donation_title" value="{{ old('donation_title',$homePageSetting?->donation_title) }}" class="form-control" placeholder="Charity makes no decrease in property." required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" name="donation_subtitle" value="{{ old('donation_subtitle',$homePageSetting?->donation_subtitle) }}" class="form-control" placeholder="Helping each other make world better" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <textarea rows="3" name="donation_description" class="form-control" placeholder="We build trust, spread compassion, and inspire others to do the same." required>{{ old('donation_description',$homePageSetting?->donation_description) }}</textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <textarea rows="3" name="donation_points" class="form-control" placeholder="Enter Points" required>{{ old('donation_points',$homePageSetting?->donation_points) }}</textarea>
                                        <span class="form-text text-muted">Enter Points seperated by comma</span>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Volunteer Section --}}
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('admin.home-settings.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card" style="background: #f5f5f5;">
                            <div class="card-body">
                                <h4>Volunteer and Donation</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-12">
                                            <label for="donation_image">Volunteer Image</label><br>
                                            <input type="file" name="volunteer_section_image" class="form-control-file">
                                            @if($homePageSetting?->volunteer_section_image)
                                                <img src="{{ asset('storage/'.$homePageSetting->volunteer_section_image) }}" alt="" width="100" style="margin-top:10px;">
                                            @endif
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="donation_image">Heading</label>
                                            <input type="text" name="volunteer_section_heading" class="form-control" required placeholder="Become an volunteer?" value="{{ old('volunteer_section_heading',$homePageSetting?->volunteer_section_heading) }}">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="donation_image">Link Text</label>
                                            <input type="text" name="volunteer_section_link_text" class="form-control" required placeholder="Text" value="{{ old('volunteer_section_link_text',$homePageSetting?->volunteer_section_link_text) }}">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="donation_image">Link</label>
                                            <input type="text" name="volunteer_section_link" class="form-control" required placeholder="Link" value="{{ old('volunteer_section_link',$homePageSetting?->volunteer_section_link) }}">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <button class="btn btn-primary">Save</button>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group col-md-12">
                                            <label for="donation_image">Donation Image</label><br>
                                            <input type="file" name="donation_section_image" class="form-control-file">
                                            @if($homePageSetting?->donation_section_image)
                                                <img src="{{ asset('storage/'.$homePageSetting->donation_section_image) }}" alt="" width="100" style="margin-top:10px;">
                                            @endif
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="donation_image">Heading</label>
                                            <input type="text" name="donation_section_heading"  class="form-control" required placeholder="Become an donation?" value="{{ old('donation_section_heading',$homePageSetting?->donation_section_heading) }}">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="donation_image">Link Text</label>
                                            <input type="text" name="donation_section_link_text"  class="form-control" required placeholder="Text" value="{{ old('donation_section_link_text',$homePageSetting?->donation_section_link_text) }}">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="donation_image">Link</label>
                                            <input type="text" name="donation_section_link"  class="form-control" required placeholder="Link" value="{{ old('donation_section_link',$homePageSetting?->donation_section_link) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Support Donation Section --}}
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('admin.home-settings.store') }}" method="POST">
                        @csrf
                        <div class="card" style="background: #f5f5f5;">
                            <div class="card-body">
                                <h4>Support Donation Section</h4>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input type="text" name="support_donation_title"  class="form-control" required placeholder="Non profit Charity Fundation" value="{{ old('support_donation_title',$homePageSetting?->support_donation_title) }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" name="support_donation_subtitle"  class="form-control" required placeholder="Helping each other can make world better" value="{{ old('support_donation_subtitle',$homePageSetting?->support_donation_subtitle) }}">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <textarea rows="3" name="support_donation_description"  class="form-control" required placeholder="We build trust, spread compassion, and inspire others to do the same.">{{ old('support_donation_description',$homePageSetting?->support_donation_description) }}</textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <textarea rows="3" name="support_donation_points"  class="form-control" required placeholder="Enter Points">{{ old('support_donation_points',$homePageSetting?->support_donation_points) }}</textarea>
                                        <span class="form-text text-muted">Enter Points seperated by comma</span>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Helping Donation Section --}}
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('admin.home-settings.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card" style="background: #f5f5f5;">
                            <div class="card-body">
                                <h4>Helping Donation Section</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-12">
                                            <label for="donation_image">Subtitle</label>
                                            <input type="text" name="helping_donation_section_subtitle"  class="form-control" required placeholder="Become an volunteer?" value="{{ old('helping_donation_section_subtitle',$homePageSetting?->helping_donation_section_subtitle) }}">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="donation_image">Heading</label>
                                            <input type="text" name="helping_donation_section_heading"  class="form-control" required placeholder="Become an volunteer?" value="{{ old('helping_donation_section_heading',$homePageSetting?->helping_donation_section_heading) }}">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="donation_image">Link Text</label>
                                            <input type="text" name="helping_donation_section_link_text"  class="form-control" required placeholder="Text" value="{{ old('helping_donation_section_link_text',$homePageSetting?->helping_donation_section_link_text) }}">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="donation_image">Link</label>
                                            <input type="text" name="helping_donation_section_link"  class="form-control" required placeholder="Link" value="{{ old('helping_donation_section_link',$homePageSetting?->helping_donation_section_link) }}">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <button class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Press Section --}}
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('admin.home-settings.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card" style="background: #f5f5f5;">
                            <div class="card-body">
                                <h4>Press Section</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-12">
                                            <label for="donation_image">Press Title</label>
                                            <input type="text" name="press_title"  class="form-control" required placeholder="Become an volunteer?" value="{{ old('press_title',$homePageSetting?->press_title) }}">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="donation_image">Press Logo</label><br>
                                            <input type="file" name="press_logo">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <button class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    @if(!empty(homeSettingPressMedia()))
                    <div class="col-md-12">
                        <div class="row">
                        @foreach (homeSettingPressMedia() as $press_logo)
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <img src="{{ asset('storage/'.$press_logo['path']) }}" alt="" width="120" style="margin-bottom: 10px;"><br>
                                    <form action="{{ route('admin.home-settings.destroy', $press_logo['id']) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure to delete?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Last Section --}}
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('admin.home-settings.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card" style="background: #f5f5f5;">
                            <div class="card-body">
                                <h4>Last Section</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-12">
                                            <label for="donation_image">Subtitle</label>
                                            <input type="text" name="last_section_subtitle"  class="form-control" required placeholder="Become an volunteer?" value="{{ old('last_section_subtitle',$homePageSetting?->last_section_subtitle) }}">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="donation_image">Heading</label>
                                            <input type="text" name="last_section_heading"  class="form-control" required placeholder="Become an volunteer?" value="{{ old('last_section_heading',$homePageSetting?->last_section_heading) }}">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <textarea rows="3" name="last_section_points"  class="form-control" required placeholder="Enter Points">{{ old('last_section_points',$homePageSetting?->last_section_points) }}</textarea>
                                            <span class="form-text text-muted">Enter Points seperated by comma</span>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="donation_image">Link Text</label>
                                            <input type="text" name="last_section_link_text"  class="form-control" required placeholder="Text" value="{{ old('last_section_link_text',$homePageSetting?->last_section_link_text) }}">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="donation_image">Link</label>
                                            <input type="text" name="last_section_link"  class="form-control" required placeholder="Link" value="{{ old('last_section_link',$homePageSetting?->last_section_link) }}">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <button class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
