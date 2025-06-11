@extends('layouts.master')

@section('page_title', 'Sliders')

@section('content')
    @include('layouts.partials.breadcrumbs', [
        'title' => 'Sliders',
        'breadcrumbs' => [['text' => 'Home', 'url' => '#'], ['text' => 'Sliders']],
    ])
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Slider List</h3>
            <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary float-right">
                <i class="fas fa-plus"></i> Add Slider
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Image</th>
                            <th>Button Text</th>
                            <th>Button URL</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                            <tr>
                                <td>{{ $slider->id }}</td>
                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->subtitle ?? 'N/A' }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $slider->image) }}" width="100" alt="Slider Image">
                                </td>
                                <td>{{ $slider->button_text ?? 'N/A' }}</td>
                                <td>
                                    @if ($slider->button_link)
                                        <a href="{{ $slider->button_link }}" target="_blank">{{ $slider->button_link }}</a>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox"
                                               class="custom-control-input status-toggle"
                                               id="statusToggle{{ $slider->id }}"
                                               data-id="{{ $slider->id }}"
                                               {{ $slider->is_active ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="statusToggle{{ $slider->id }}"></label>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('admin.sliders.edit', $slider) }}"
                                       class="btn btn-warning btn-sm"
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.sliders.destroy', $slider) }}"
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

@section('scripts')

    <script>
        $(document).ready(function () {
            $('.status-toggle').change(function () {
                var sliderId = $(this).data('id');
                var isActive = $(this).prop('checked') ? 1 : 0;

                $.ajax({
                    url: `/admin/sliders/toggle-status/${sliderId}`,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        is_active: isActive
                    },
                    success: function (response) {
                        if (response.success) {
                            toastr.success(response.message || 'Status updated successfully!');
                        } else {
                            toastr.error(response.message || 'Failed to update status.');
                        }
                    },
                    error: function (xhr) {
                        var errorMessage = xhr.responseJSON?.message || 'An error occurred. Please try again.';
                        toastr.error(errorMessage);
                    }
                });
            });
        });
    </script>
@endsection
