@extends('admin.layout')

@section('content')
<div class="container py-4">
  <h4 class="mb-4">Edit Badhai Entry</h4>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('admin.badhai.update', $badhai->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row mb-3">
      <div class="col-md-6 form-floating">
        <input type="text" name="name" class="form-control" placeholder="Name"
               value="{{ old('name', $badhai->name) }}" required>
        <label>Name *</label>
      </div>
      <div class="col-md-6 form-floating">
        <select name="reason" class="form-select" required>
          <option value="" disabled>Select Occasion</option>
          @foreach(['विवाह', 'नौकरी', 'पुरस्कार', 'शिक्षा'] as $reason)
            <option value="{{ $reason }}" {{ old('reason', $badhai->reason) == $reason ? 'selected' : '' }}>{{ $reason }}</option>
          @endforeach
        </select>
        <label>Occasion *</label>
      </div>
    </div>

    <div class="mb-3">
      <label>Description (optional)</label>
      <textarea name="description" class="form-control" rows="3">{{ old('description', $badhai->description) }}</textarea>
    </div>

    <div class="row mb-3">
      <div class="col-md-6 form-floating">
        <input type="date" name="date" class="form-control"
               value="{{ old('date', $badhai->date) }}" required>
        <label>Date *</label>
      </div>
      <div class="col-md-6 form-floating">
        <input type="text" name="city" class="form-control" placeholder="City"
               value="{{ old('city', $badhai->city) }}">
        <label>City (optional)</label>
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label">Replace Photo (optional)</label>
      <input type="file" name="photo" class="form-control">
      @if ($badhai->photo_path)
        <div class="mt-2">
          <img src="{{ asset('storage/' . $badhai->photo_path) }}" alt="Old Photo" class="img-thumbnail" style="max-height: 120px;">
        </div>
      @endif
    </div>

    <div class="text-end">
      <button type="submit" class="btn btn-primary">Update</button>
      <a href="{{ route('admin.badhai.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
  </form>
</div>
@endsection
