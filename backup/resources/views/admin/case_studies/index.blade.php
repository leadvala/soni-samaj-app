@extends('layouts.master')

@section('page_title', 'Case Studies')


@section('content')
    @include('layouts.partials.breadcrumbs', [
        'title' => 'Case Studies',
        'breadcrumbs' => [['text' => 'Home', 'url' => '#'], ['text' => 'Case Studies']],
    ])
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Case Studies</h3>
            <a href="{{ route('admin.case-studies.create') }}" class="btn btn-primary float-right">Add New</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($caseStudies as $caseStudy)
                        <tr>
                            <td>{{ $caseStudy->title }}</td>
                            <td>{{ $caseStudy->subtitle }}</td>
                            <td>
                                @if ($caseStudy->image)
                                    <img src="{{ asset('storage/' . $caseStudy->image) }}" alt="Image"
                                        style="max-width: 100px;">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.case-studies.edit', $caseStudy->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('admin.case-studies.destroy', $caseStudy->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure to delete?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                </form>
                                {{-- <a href="{{ route('admin.case-studies.edit', $caseStudy->id) }}"
                                    class="btn btn-warning">Edit</a>
                                <form action="{{ route('admin.case-studies.destroy', $caseStudy->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
