@extends('layouts.master')

@section('page_title', 'Add Blog')

@section('content')
    @include('layouts.partials.breadcrumbs', [
        'title' => 'Add Blog',
        'breadcrumbs' => [
            ['text' => 'Home', 'url' => '#'],
            ['text' => 'Blogs', 'url' => route('admin.blogs.index')],
            ['text' => 'Add Blog'],
        ],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add New Blog</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="short_description">Short Description</label>
                    <textarea name="short_description" id="short_description" class="form-control" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="type">Type</label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="">Select type</option>
                        <option value="news" {{ old('type') == 'news' ? 'selected' : '' }}>News</option>
                        <option value="blog" selected {{ old('type') == 'blog' ? 'selected' : '' }}>Blog</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
