@extends('layouts.master')

@section('page_title', 'Add Case Study')

@section('content')
    @include('layouts.partials.breadcrumbs', [
        'title' => 'Add Case Study',
        'breadcrumbs' => [
            ['text' => 'Home', 'url' => '#'],
            ['text' => 'Case Study', 'url' => route('admin.case-studies.index')],
            ['text' => 'Add Case Study'],
        ],
    ])
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add New Case Study</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.case-studies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="subtitle">Subtitle</label>
                    <input type="text" name="subtitle" id="subtitle" class="form-control">
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
