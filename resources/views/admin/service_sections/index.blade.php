@extends('layouts.master')

@section('page_title', 'Service Sections')

@section('content')
    @include('layouts.partials.breadcrumbs', [
        'title' => 'Service Sections',
        'breadcrumbs' => [['text' => 'Home', 'url' => '#'], ['text' => 'Service Sections']],
    ])

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Service Sections</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.service-sections.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="image1">Image <span class="text-danger">*</span></label>
                        <input type="file" name="image" id="image" class="form-control">
                        @if ($serviceSection && $serviceSection->image)
                            <img src="{{ asset('storage/' . $serviceSection->image) }}" alt="Image" class="img-thumbnail mt-2" style="max-height: 100px;">
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="title">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $serviceSection->title ?? old('title') }}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="subtitle">Subtitle <span class="text-danger">*</span></label>
                        <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ $serviceSection->subtitle ?? old('subtitle') }}">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="type">Pages <span class="text-danger">*</span></label>
                        <select name="page_id[]" id="page_id" class="form-control select2" required multiple>
                            @if(count($pages) > 0)
                            @foreach ($pages as $page)
                                <option value="{{$page->id}}" @if(isset($serviceSection) && $serviceSection->pages->contains($page->id)) selected @endif>{{ $page->title }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
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
