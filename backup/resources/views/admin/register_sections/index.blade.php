@extends('layouts.master')

@section('page_title', 'Register Sections')

@section('content')
    @include('layouts.partials.breadcrumbs', [
        'title' => 'Register Sections',
        'breadcrumbs' => [['text' => 'Home', 'url' => '#'], ['text' => 'Register Sections']],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Register Sections List</h3>
            <a href="{{ route('admin.register-sections.create') }}" class="btn btn-primary float-right">
                <i class="fas fa-plus"></i> Add Register Section
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Icon</th>
                            <th>Charity Name</th>
                            <th>Description</th>
                            <th>Contact Text</th>
                            <th>Contact Link</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registerSections as $section)
                            <tr>
                                <td><img src="{{ asset('storage/' . $section->image) }}" alt="Image" width="100"></td>
                                <td><img src="{{ asset('storage/' . $section->icon) }}" alt="Icon" width="50"></td>
                                <td>{{ $section->charity_name }}</td>
                                <td>{{ Str::limit($section->description, 50) }}</td>
                                <td>{{ $section->contact_text }}</td>
                                <td><a href="{{ $section->contact_link }}" target="_blank">Contact</a></td>
                                <td>
                                    <!-- Edit Button with Icon -->
                                    <a href="{{ route('admin.register-sections.edit', $section) }}" class="btn btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <!-- Delete Button with Icon -->
                                    <form action="{{ route('admin.register-sections.destroy', $section) }}"
                                          method="POST"
                                          style="display:inline;"
                                          onsubmit="return confirm('Are you sure to delete?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete">
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
    </div>
@endsection
