@extends('admin.layout')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container my-5">
  <div class="card shadow-sm rounded-4">
    <div class="card-header bg-white text-center">
      <h3 class="mb-0">Add New Member</h3>
    </div>
    <div class="card-body p-4">
      <form method="POST" enctype="multipart/form-data" action="{{ route('admin.members.store') }}">
        @csrf

        <div class="row g-3">
          <!-- Full Name -->
          <div class="col-12 col-md-6 form-floating">
            <input type="text" name="name" class="form-control" id="name" placeholder="Full Name" value="{{ old('name') }}" required>
            <label for="name">Full Name *</label>
          </div>
          <div class="col-12 col-md-6 form-floating">
            <input type="text" name="father_name" class="form-control" id="father_name" placeholder="Father’s Name" value="{{ old('father_name') }}">
            <label for="father_name">Father’s Name</label>
          </div>

          <div class="col-12 col-md-6 form-floating">
            <input type="text" name="mother_name" class="form-control" id="mother_name" placeholder="Mother’s Name" value="{{ old('mother_name') }}">
            <label for="mother_name">Mother’s Name</label>
          </div>
          <div class="col-12 col-md-3 form-floating">
            <input type="date" name="dob" class="form-control" id="dob" placeholder="Date of Birth" value="{{ old('dob') }}">
            <label for="dob">Date of Birth</label>
          </div>
          <div class="col-12 col-md-3 form-floating">
            <select name="marital_status" class="form-select" id="marital_status">
              <option selected disabled value="">Select Marital Status</option>
              <option value="Single" {{ old('marital_status')=='Single'?'selected':'' }}>Single</option>
              <option value="Married" {{ old('marital_status')=='Married'?'selected':'' }}>Married</option>
            </select>
            <label for="marital_status">Marital Status</label>
          </div>

          <div class="col-12 form-floating">
            <textarea name="address" class="form-control" id="address" placeholder="Current Address" style="height: 80px">{{ old('address') }}</textarea>
            <label for="address">Current Address</label>
          </div>
          <div class="col-12 form-floating">
            <textarea name="permanent_address" class="form-control" id="perm_address" placeholder="Permanent Address" style="height: 80px">{{ old('permanent_address') }}</textarea>
            <label for="perm_address">Permanent Address</label>
          </div>

          <!-- Gotra Rows -->
          <div class="col-12 row g-3">
            @foreach(['gotra','gotra_self','gotra_mother','gotra_nani','gotra_dadi'] as $field)
              <div class="col-6 col-md-2 form-floating">
                <input type="text" name="{{ $field }}" class="form-control" id="{{ $field }}" placeholder="{{ Str::title(str_replace('_',' ',$field)) }}" value="{{ old($field) }}">
                <label for="{{ $field }}">{{ Str::title(str_replace('_',' ',$field)) }}</label>
              </div>
            @endforeach
          </div>

          <div class="col-12 col-md-6 form-floating">
            <input type="text" name="qualifications" class="form-control" id="qualifications" placeholder="Qualifications" value="{{ old('qualifications') }}">
            <label for="qualifications">Qualifications</label>
          </div>
          <div class="col-12 col-md-6 form-floating">
            <select name="blood_group" class="form-select" id="blood_group">
              <option selected disabled value="">Select Blood Group</option>
              @foreach(['A+','A-','B+','B-','O+','O-','AB+','AB-'] as $bg)
                <option value="{{ $bg }}" {{ old('blood_group')==$bg?'selected':'' }}>{{ $bg }}</option>
              @endforeach
            </select>
            <label for="blood_group">Blood Group</label>
          </div>

          <div class="col-12 col-md-6 form-floating">
            <input type="tel" name="mobile" class="form-control" id="mobile" placeholder="Mobile" value="{{ old('mobile') }}" required>
            <label for="mobile">Mobile *</label>
          </div>
          <div class="col-12 col-md-6 form-floating">
            <input type="tel" name="whatsapp" class="form-control" id="whatsapp" placeholder="WhatsApp" value="{{ old('whatsapp') }}">
            <label for="whatsapp">WhatsApp</label>
          </div>

          <div class="col-12 form-group">
            <label class="form-label" for="photo">Upload Photo</label>
            <input type="file" name="photo" id="photo" class="form-control">
          </div>

          <div class="col-12 col-md-6 form-floating">
            <input type="text" name="job_or_business" class="form-control" id="job_or_business" placeholder="Job or Business" value="{{ old('job_or_business') }}">
            <label for="job_or_business">Job or Business</label>
          </div>
          <div class="col-12 col-md-6 form-floating">
            <select name="job_type" class="form-select" id="job_type">
              <option selected disabled value="">Select Job Type</option>
              <option value="Private" {{ old('job_type')=='Private'?'selected':'' }}>Private</option>
              <option value="Government" {{ old('job_type')=='Government'?'selected':'' }}>Government</option>
            </select>
            <label for="job_type">Job Type</label>
          </div>

          <div class="col-12 col-md-6 form-floating">
            <input type="text" name="designation" class="form-control" id="designation" placeholder="Designation" value="{{ old('designation') }}">
            <label for="designation">Designation</label>
          </div>
          <div class="col-12 col-md-6 form-floating">
            <input type="text" name="work_city" class="form-control" id="work_city" placeholder="Work City" value="{{ old('work_city') }}">
            <label for="work_city">Work City</label>
          </div>

          <div class="col-12 col-md-4 form-floating">
            <input type="text" name="satimata_place" class="form-control" id="satimata_place" placeholder="Satimata Place" value="{{ old('satimata_place') }}">
            <label for="satimata_place">Satimata Place</label>
          </div>
          <div class="col-12 col-md-4 form-floating">
            <input type="text" name="bheruji_place" class="form-control" id="bheruji_place" placeholder="Bheruji Place" value="{{ old('bheruji_place') }}">
            <label for="bheruji_place">Bheruji Place</label>
          </div>
          <div class="col-12 col-md-4 form-floating">
            <input type="text" name="kuldevi_place" class="form-control" id="kuldevi_place" placeholder="Kuldevi Place" value="{{ old('kuldevi_place') }}">
            <label for="kuldevi_place">Kuldevi Place</label>
          </div>
        </div>

        <div class="mt-4 text-center">
          <button type="submit" class="btn btn-lg btn-gradient-primary px-4">
            <i class="bi bi-save2 me-2"></i> Save Member
          </button>
          <a href="{{ route('admin.members.index') }}" class="btn btn-lg btn-outline-secondary px-4 ms-2">
            Cancel
          </a>
        </div>
      </form>
    </div>
  </div>
</div>

<style>
  .btn-gradient-primary {
    background: linear-gradient(45deg,#667eea,#764ba2);
    border: none;
    color: #fff;
  }
  .btn-gradient-primary:hover {
    background: linear-gradient(45deg,#556cd6,#653b97);
  }
</style>

@endsection
