@extends('layouts.master')

@section('page_title', 'Edit Blog')

@section('content')
    @include('layouts.partials.breadcrumbs', [
        'title' => 'Edit Blog',
        'breadcrumbs' => [
            ['text' => 'Home', 'url' => '#'],
            ['text' => 'Blogs', 'url' => route('admin.blogs.index')],
            ['text' => 'Edit Blog'],
        ],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Blog</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $blog->title) }}" required>
                </div>

                <div class="form-group">
                    <label for="short_description">Short Description</label>
                    <textarea name="short_description" id="short_description" class="form-control" rows="3">{{ old('short_description', $blog->short_description) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" required>{{ old('description', html_entity_decode($blog->description)) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @if($blog->image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $blog->image) }}" alt="Current Image" class="img-fluid" width="200">
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="type">Type</label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="news" {{ old('type', $blog->type) == 'news' ? 'selected' : '' }}>News</option>
                        <option value="blog" {{ old('type', $blog->type) == 'blog' ? 'selected' : '' }}>Blog</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    
@endsection
