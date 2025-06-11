@extends('layouts.master')

@section('page_title', 'Pages List')

@section('content')
    @include('layouts.partials.breadcrumbs', [
        'title' => 'Pages List',
        'breadcrumbs' => [
            ['text' => 'Home', 'url' => '#'],
            ['text' => 'Pages', 'url' => route('admin.pages.index')],
        ],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Pages</h3>
            <a href="{{ route('admin.pages.create') }}" class="btn btn-primary float-right">Add New Page</a>
        </div>

        <div class="card-body">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Slug</th>
                        <th>Icon</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pages as $page)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $page->title }}</td>
                            <td>{{ ucfirst($page->type) }}</td>
                            <td>{{ $page->slug }}</td>
                            <td>
                                @if ($page->icon)
                                    <img src="{{ asset('storage/' . $page->icon) }}" alt="Icon" width="50">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('admin.pages.destroy', $page->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure to delete?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No pages found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
