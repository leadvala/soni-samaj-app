@extends('layouts.master')

@section('page_title', 'Edit Case Study')

@section('content')
    @include('layouts.partials.breadcrumbs', [
        'title' => 'Edit Case Study',
        'breadcrumbs' => [
            ['text' => 'Home', 'url' => '#'],
            ['text' => 'Case Study', 'url' => route('admin.case-studies.index')],
            ['text' => 'Edit Case Study'],
        ],
    ])
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Case Study</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.case-studies.update', $caseStudy->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $caseStudy->title) }}" required>
                </div>

                <div class="form-group">
                    <label for="subtitle">Subtitle</label>
                    <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ old('subtitle', $caseStudy->subtitle) }}">
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @if($caseStudy->image)
                        <div class="mt-2">
                            <label>Current Image:</label>
                            <img src="{{ asset('storage/' . $caseStudy->image) }}" alt="Image" style="max-width: 100px;">
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
@endsection
