<!-- resources/views/admin/badhai/create.blade.php -->
@extends('admin.layout')
@section('content')
<div class="container py-4">
  <h4 class="mb-4">Add New Badhai Entry</h4>

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
    <div class="row mb-3">
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
      <label>Description (optional)</label>
      <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
    </div>

    <div class="row mb-3">
      <div class="col-md-6 form-floating">
        <input type="date" name="date" class="form-control" value="{{ old('date') }}" required>
        <label>Date *</label>
      </div>
      <div class="col-md-6 form-floating">
        <input type="text" name="city" class="form-control" placeholder="City" value="{{ old('city') }}">
        <label>City (optional)</label>
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label">Photo (optional, JPG/PNG, max 2MB)</label>
      <input type="file" name="photo" class="form-control">
    </div>

    <div class="text-end">
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="{{ route('admin.badhai.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
  </form>
</div>
@endsection
