@extends('layouts.master')

@section('page_title', 'Add Testimonial')

@section('content')
    @include('layouts.partials.breadcrumbs', [
        'title' => 'Add Testimonial',
        'breadcrumbs' => [
            ['text' => 'Home', 'url' => '#'],
            ['text' => 'Testimonials', 'url' => route('admin.testimonials.index')],
            ['text' => 'Add Testimonial'],
        ],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add New Testimonial</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="client_name">Client Name</label>
                    <input type="text" name="client_name" id="client_name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="designation">Designation</label>
                    <input type="text" name="designation" id="designation" class="form-control">
                </div>

                <div class="form-group">
                    <label for="review">Review</label>
                    <textarea name="review" id="review" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <div class="form-group">
                    <label for="rating">Rating</label>
                    <input type="number" name="rating" id="rating" class="form-control" min="1" max="5" required>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
