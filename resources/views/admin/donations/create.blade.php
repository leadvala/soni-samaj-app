@extends('layouts.master')

@section('page_title', 'Add Donation')

@section('content')
    @include('layouts.partials.breadcrumbs', [
        'title' => 'Add Donation',
        'breadcrumbs' => [
            ['text' => 'Home', 'url' => '#'],
            ['text' => 'Donations', 'url' => route('admin.donations.index')],
            ['text' => 'Add Donations'],
        ],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add New Donation</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.donations.store') }}" method="POST" enctype="multipart/form-data">
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
                    <label for="goal">Goal</label>
                    <input type="number" name="goal" id="goal" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
    
@endsection
