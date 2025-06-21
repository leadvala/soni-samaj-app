@extends('admin.layout')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

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
    <div class="form-heading">🎉 Add New Badhai Entry</div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('admin.badhai.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="row g-3 mb-3">
        <div class="col-md-6 form-floating">
          <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" required>
          <label>Name *</label>
        </div>

        <div class="col-md-6 form-floating">
          <select name="reason" class="form-select" required>
            <option value="" disabled selected>Select Occasion</option>
            @foreach(['विवाह', 'नौकरी', 'पुरस्कार', 'शिक्षा'] as $reason)
              <option value="{{ $reason }}" {{ old('reason') == $reason ? 'selected' : '' }}>{{ $reason }}</option>
            @endforeach
          </select>
          <label>Occasion *</label>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label fw-semibold">Description <small class="text-muted">(optional)</small></label>
        <textarea name="description" class="form-control" rows="3" placeholder="Write a few words...">{{ old('description') }}</textarea>
      </div>

      <div class="row g-3 mb-3">
        <div class="col-md-6 form-floating">
          <input type="date" name="date" class="form-control" value="{{ old('date') }}" required>
          <label>Date *</label>
        </div>
        <div class="col-md-6 form-floating">
          <input type="text" name="city" class="form-control" placeholder="City" value="{{ old('city') }}">
          <label>City (optional)</label>
        </div>
      </div>

      <div class="mb-4">
        <label class="form-label fw-semibold">Upload Photo <small class="text-muted">(JPG/PNG, max 2MB)</small></label>
        <input type="file" name="photo" class="form-control">
      </div>

      <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary me-2 shadow-sm">
          <i class="bi bi-check-circle-fill me-1"></i> Submit
        </button>
        <a href="{{ route('admin.badhai.index') }}" class="btn btn-outline-secondary">
          Cancel
        </a>
      </div>
    </form>
  </div>
</div>
@endsection
