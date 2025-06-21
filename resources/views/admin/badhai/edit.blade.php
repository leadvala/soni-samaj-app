@extends('admin.layout')

@section('content')

<style>
  .form-container {
    background: #fffdf5;
    border-radius: 12px;
    padding: 2rem;
    box-shadow: 0 4px 12px rgba(0,0,0,0.06);
  }
  .form-heading {
    background: linear-gradient(to right, #ffe082, #ffd54f);
    padding: 1rem 1.5rem;
    border-radius: 10px;
    font-size: 1.4rem;
    font-weight: bold;
    color: #8a5800;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
  }
</style>

<div class="container py-4">
  <div class="form-container">
    <div class="form-heading">✏️ Edit Badhai Entry</div>

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

      <div class="row g-3 mb-3">
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
        <label class="form-label fw-semibold">Description <small class="text-muted">(optional)</small></label>
        <textarea name="description" class="form-control" rows="3">{{ old('description', $badhai->description) }}</textarea>
      </div>

      <div class="row g-3 mb-3">
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

      <div class="mb-4">
        <label class="form-label fw-semibold">Replace Photo <small class="text-muted">(optional, JPG/PNG)</small></label>
        <input type="file" name="photo" class="form-control">
        @if ($badhai->photo_path)
          <div class="mt-2">
            <img src="{{ asset('storage/' . $badhai->photo_path) }}" alt="Current Photo"
                 class="img-thumbnail border" style="max-height: 120px;">
          </div>
        @endif
      </div>

      <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary me-2 shadow-sm">
          <i class="bi bi-check-circle me-1"></i> Update
        </button>
        <a href="{{ route('admin.badhai.index') }}" class="btn btn-outline-secondary">Cancel</a>
      </div>
    </form>
  </div>
</div>
@endsection
