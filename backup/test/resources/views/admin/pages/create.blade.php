@extends('layouts.master')

@section('page_title', 'Add Page')

@section('content')
    @include('layouts.partials.breadcrumbs', [
        'title' => 'Add Page',
        'breadcrumbs' => [
            ['text' => 'Home', 'url' => '#'],
            ['text' => 'Pages', 'url' => route('admin.pages.index')],
            ['text' => 'Add Page']
        ],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add New Page</h3>
            <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary float-right">Back to List</a>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.pages.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="title">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter page title" required>
                </div>
                <div class="form-group">
                    <label for="icon">Icon</label>
                    <input type="file" name="icon" id="icon" class="form-control" accept="image/*" required>
                    <small class="form-text text-muted">Upload an icon for the page.</small>
                </div>

                <div class="form-group">
                    <label for="type">Type <span class="text-danger">*</span></label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="service" selected>Service</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">Description <span class="text-danger">*</span></label>
                    <textarea name="description" id="description" rows="4" class="form-control" placeholder="Enter a short description" required></textarea>
                </div>

                <div class="form-group">
                    <label for="content">Content <span class="text-danger">*</span></label>
                    <textarea name="content" id="content" rows="6" class="form-control" placeholder="Enter page content" required></textarea>
                </div>

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">Save Page</button>
                    <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
