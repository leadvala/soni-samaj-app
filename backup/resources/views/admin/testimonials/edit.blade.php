@extends('layouts.master')

@section('page_title', 'Edit Testimonial')

@section('content')
    @include('layouts.partials.breadcrumbs', [
        'title' => 'Edit Testimonial',
        'breadcrumbs' => [
            ['text' => 'Home', 'url' => '#'],
            ['text' => 'Testimonials', 'url' => route('admin.testimonials.index')],
            ['text' => 'Edit Testimonial'],
        ],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Testimonial</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="client_name">Client Name</label>
                    <input type="text" name="client_name" id="client_name" class="form-control" value="{{ old('client_name', $testimonial->client_name) }}" required>
                </div>

                <div class="form-group">
                    <label for="designation">Designation</label>
                    <input type="text" name="designation" id="designation" class="form-control" value="{{ old('designation', $testimonial->designation) }}">
                </div>

                <div class="form-group">
                    <label for="review">Review</label>
                    <textarea name="review" id="review" class="form-control" required>{{ old('review', $testimonial->review) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @if ($testimonial->image)
                        <img src="{{ asset('storage/' . $testimonial->image) }}" alt="Testimonial Image" class="mt-2" style="max-width: 200px;">
                    @endif
                </div>

                <div class="form-group">
                    <label for="rating">Rating</label>
                    <input type="number" name="rating" id="rating" class="form-control" value="{{ old('rating', $testimonial->rating) }}" min="1" max="5" required>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
