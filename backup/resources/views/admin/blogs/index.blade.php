@extends('layouts.master')

@section('page_title', 'Blogs List')

@section('content')
    @include('layouts.partials.breadcrumbs', [
        'title' => 'Blog List',
        'breadcrumbs' => [
            ['text' => 'Home', 'url' => '#'],
            ['text' => 'Blogs'],
        ],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Blogs List</h3>
            <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary float-right">Add New Blogs</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                        <tr>
                            <td>{{ $blog->title }}</td>
                            <td><img src="{{ asset('storage/' . ($blog->image ?? 'default.jpg')) }}" alt="" style="max-width: 100px"></td> 
                            <td>{{ ucfirst($blog->type) }}</td>
                            <td>
                                <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure to delete?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
