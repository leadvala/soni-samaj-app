@extends('layouts.master')

@section('page_title', 'Edit Donation')

@section('content')
    @include('layouts.partials.breadcrumbs', [
        'title' => 'Edit Donation',
        'breadcrumbs' => [
            ['text' => 'Home', 'url' => '#'],
            ['text' => 'Donations', 'url' => route('admin.donations.index')],
            ['text' => 'Edit Donation'],
        ],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Blog</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.donations.update', $donation->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $donation->title) }}" required>
                </div>

                <div class="form-group">
                    <label for="short_description">Short Description</label>
                    <textarea name="short_description" id="short_description" class="form-control" rows="3">{{ old('short_description', $donation->short_description) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" required>{{ old('description', html_entity_decode($donation->description)) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @if($donation->image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $donation->image) }}" alt="Current Image" class="img-fluid" width="200">
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="goal">Goal</label>
                    <input type="text" name="goal" id="goal" class="form-control" value="{{ old('title', $donation->goal) }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    
@endsection
