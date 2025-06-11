@extends('layouts.master')

@section('page_title', 'Edit Page')

@section('content')
    @include('layouts.partials.breadcrumbs', [
        'title' => 'Edit Page',
        'breadcrumbs' => [
            ['text' => 'Home', 'url' => '#'],
            ['text' => 'Pages', 'url' => route('admin.pages.index')],
            ['text' => 'Edit Page']
        ],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Page</h3>
            <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary float-right">Back to List</a>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.pages.update', $page->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $page->title) }}" required>
                </div>

                <div class="form-group">
                    <label for="icon">Icon</label>
                    @if ($page->icon)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $page->icon) }}" alt="Icon" width="50">
                        </div>
                    @endif
                    <input type="file" name="icon" id="icon" class="form-control" accept="image/*">
                    <small class="form-text text-muted">Upload an icon to replace the current one.</small>
                </div>

                <div class="form-group">
                    <label for="type">Type <span class="text-danger">*</span></label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="service" {{ $page->type == 'service' ? 'selected' : '' }}>Service</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">Description <span class="text-danger">*</span></label>
                    <textarea name="description" id="description" rows="4" class="form-control" required>{{ old('description', $page->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="content">Content <span class="text-danger">*</span></label>
                    <textarea name="content" id="content" rows="6" class="form-control" required>{{ old('content', $page->content) }}</textarea>
                </div>

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">Update Page</button>
                    <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
