@extends('layouts.master')

@section('page_title', 'Add Slider')

@section('content')
    @include('layouts.partials.breadcrumbs', [
        'title' => 'Add Slider',
        'breadcrumbs' => [['text' => 'Home', 'url' => '#'], ['text' => 'Sliders', 'url' => route('admin.sliders.index')], ['text' => 'Add Slider']],
    ])
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add New Slider</h3>
            <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary float-right">Back to List</a>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                </div>

                <div class="form-group">
                    <label for="subtitle">Subtitle</label>
                    <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ old('subtitle') }}" required>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control-file" required>
                </div>

                <div class="form-group">
                    <label for="button_text">Button Text</label>
                    <input type="text" name="button_text" id="button_text" class="form-control"
                        value="{{ old('button_text') }}">
                </div>

                <div class="form-group">
                    <label for="button_link">Button Link</label>
                    <input type="url" name="button_link" id="button_link" class="form-control"
                        value="{{ old('button_link') }}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
