@extends('layouts.master')

@section('page_title', 'Add Register Section')

@section('content')
    @include('layouts.partials.breadcrumbs', [
        'title' => 'Add Register Section',
        'breadcrumbs' => [['text' => 'Home', 'url' => '#'], ['text' => 'Register Sections', 'url' => route('admin.register-sections.index')], ['text' => 'Add Register Section']],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add New Register Section</h3>
            <a href="{{ route('admin.register-sections.index') }}" class="btn btn-secondary float-right">Back to List</a>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.register-sections.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control-file" required>
                </div>

                <div class="form-group">
                    <label for="icon">Icon</label>
                    <input type="file" name="icon" id="icon" class="form-control-file" required>
                </div>

                <div class="form-group">
                    <label for="charity_name">Charity Name</label>
                    <input type="text" name="charity_name" id="charity_name" class="form-control" value="{{ old('charity_name') }}" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="contact_text">Contact Text</label>
                    <input type="text" name="contact_text" id="contact_text" class="form-control" value="{{ old('contact_text') }}" required>
                </div>

                <div class="form-group">
                    <label for="contact_link">Contact Link</label>
                    <input type="url" name="contact_link" id="contact_link" class="form-control" value="{{ old('contact_link') }}" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="{{ route('admin.register-sections.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
