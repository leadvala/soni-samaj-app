@extends('layouts.master')

@section('page_title', 'About Sections')

@section('content')
    @include('layouts.partials.breadcrumbs', [
        'title' => 'About Sections',
        'breadcrumbs' => [['text' => 'Home', 'url' => '#'], ['text' => 'About Sections']],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">About Sections</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.about-sections.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="image1">Image 1</label>
                        <input type="file" name="image1" id="image1" class="form-control">
                        @if ($aboutSection && $aboutSection->image1)
                            <img src="{{ asset('storage/' . $aboutSection->image1) }}" alt="Image 1" class="img-thumbnail mt-2" style="max-height: 100px;">
                        @endif
                    </div>
                    <div class="form-group col-md-4">
                        <label for="image2">Image 2</label>
                        <input type="file" name="image2" id="image2" class="form-control">
                        @if ($aboutSection && $aboutSection->image2)
                            <img src="{{ asset('storage/' . $aboutSection->image2) }}" alt="Image 2" class="img-thumbnail mt-2" style="max-height: 100px;">
                        @endif
                    </div>
                    <div class="form-group col-md-4">
                        <label for="since_counter">Since Counter</label>
                        <input type="text" name="since_counter" id="since_counter" class="form-control" value="{{ $aboutSection->since_counter ?? old('since_counter') }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $aboutSection->title ?? old('title') }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="subtitle">Subtitle</label>
                        <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ $aboutSection->subtitle ?? old('subtitle') }}">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4" required>{{ $aboutSection->description ?? old('description') }}</textarea>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabs Table -->
    <div class="card mt-5">
        <div class="card-header d-flex justify-content-between align-items-end">
            <button class="btn btn-success" data-toggle="modal" data-target="#addTabModal">Add Tab</button>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Video URL</th>
                        <th>Points</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($aboutSection) &&count($aboutSection->aboutTabs) > 0)
                    @foreach ($aboutSection->aboutTabs as $tab)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $tab->title }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $tab->content) }}" alt="Tab Image" width="100">
                            </td>
                            <td><a href="{{ $tab->video_url }}" class="btn btn-link" target="_blank">Video Link</a></td>
                            <td>
                                @foreach (json_decode($tab->points) as $point)
                                    <p>{{ $point }}</p>
                                @endforeach
                            </td>
                            <td>
                                <!-- Edit Button -->
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#editTabModal"
                                    data-id="{{ $tab->id }}"
                                    data-title="{{ $tab->title }}"
                                    data-content="{{ asset('storage/' . $tab->content) }}"
                                    data-video-url="{{ $tab->video_url }}"
                                    data-points="{{ implode(',', json_decode($tab->points)) }}">
                                    <i class="fas fa-edit"></i>
                                </button>

                                <!-- Delete Button with Confirmation -->
                                <form action="{{ route('admin.about-sections.tabs-destroy', $tab->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this tab?');">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>


    <!-- Add Tab Modal -->
    <div class="modal fade" id="addTabModal" tabindex="-1" aria-labelledby="addTabModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTabModalLabel">Add New Tab</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.about-sections.tabs')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="tab_title">Tab Title</label>
                            <input type="text" name="title" id="tab_title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="tab_content">Image</label>
                            <input type="file" name="content_image" id="tab_content" class="form-control" accept="image/*" required>
                        </div>
                        <div class="form-group">
                            <label for="tab_video_url">Video URL</label>
                            <input type="url" name="video_url" id="tab_video_url" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="tab_points">Points</label>
                            <textarea name="points[]" id="tab_points" class="form-control" rows="4" required></textarea>
                            <small>Enter points separated by commas (e.g., Point 1, Point 2)</small>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Save Tab</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Tab Modal -->
<div class="modal fade" id="editTabModal" tabindex="-1" aria-labelledby="editTabModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTabModalLabel">Edit Tab</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.about-sections.tabs-update')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="tab_id" id="edit_tab_id"> <!-- To hold the tab ID -->

                    <div class="form-group">
                        <label for="edit_tab_title">Tab Title</label>
                        <input type="text" name="title" id="edit_tab_title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_tab_content">Image</label>
                        <input type="file" name="content_image" id="edit_tab_content" class="form-control" accept="image/*">
                        <img id="edit_tab_content_preview" class="img-thumbnail mt-2" style="max-height: 50px;" />
                    </div>
                    <div class="form-group">
                        <label for="edit_tab_video_url">Video URL</label>
                        <input type="url" name="video_url" id="edit_tab_video_url" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_tab_points">Points</label>
                        <textarea name="points[]" id="edit_tab_points" class="form-control" rows="4" required></textarea>
                        <small>Enter points separated by commas (e.g., Point 1, Point 2)</small>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Update Tab</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#editTabModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var tabId = button.data('id');
    var tabTitle = button.data('title');
    var tabContent = button.data('content');
    var tabVideoUrl = button.data('video-url');
    var tabPoints = button.data('points');

    var modal = $(this);
    modal.find('#edit_tab_id').val(tabId);
    modal.find('#edit_tab_title').val(tabTitle);
    modal.find('#edit_tab_video_url').val(tabVideoUrl);
    modal.find('#edit_tab_points').val(tabPoints); // Display each point in a new line

    // Set content image preview if available
    if (tabContent) {
        modal.find('#edit_tab_content_preview').attr('src', tabContent);
    }
});

    })
</script>

@endsection
