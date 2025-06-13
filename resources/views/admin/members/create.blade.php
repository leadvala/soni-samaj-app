@extends('admin.layout')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<style>
    .bg-gradient-custom {
  /* Bootstrap primary color with gradient */
  background: var(--bs-primary);
  background-image: var(--bs-gradient); /* enables Bootstrap's gradient utility */ /* :contentReference[oaicite:2]{index=2} */
}

/* You can override gradient direction or colors more vividly, for example: */
.bg-gradient-custom {
  background: linear-gradient(45deg, #667eea, #764ba2);
}

</style>
<div class="container my-5">
  <div class="card shadow-sm border-0 rounded">
   <div class="card-header text-white text-center py-3 bg-gradient-custom">
  <h4 class="mb-0">
    <i class="bi bi-person-plus-fill me-2"></i>
    Add New Member
  </h4>
</div>

    <div class="card-body">
      <form method="POST" enctype="multipart/form-data" action="{{ route('admin.members.store') }}">
        @csrf
        <div class="row g-3">

          <!-- Personal Info -->
          <div class="col-md-6 form-floating">
            <input name="name" class="form-control" id="name" placeholder="Full Name" value="{{ old('name') }}" required>
            <label for="name">Full Name *</label>
          </div>
          <div class="col-md-6 form-floating">
            <input name="father_name" class="form-control" id="father_name" placeholder="Father’s Name" value="{{ old('father_name') }}">
            <label for="father_name">Father’s Name</label>
          </div>
          <div class="col-md-6 form-floating">
            <input name="mother_name" class="form-control" id="mother_name" placeholder="Mother’s Name" value="{{ old('mother_name') }}">
            <label for="mother_name">Mother’s Name</label>
          </div>
          <div class="col-md-3 form-floating">
            <input type="date" name="dob" class="form-control" id="dob" placeholder="Date of Birth" value="{{ old('dob') }}">
            <label for="dob">Date of Birth</label>
          </div>
          <!-- Add this within your .row g-3 blocks, perhaps right after "Mother's Name" -->
<div class="col-md-3 form-floating">
  <select name="gender" class="form-select" id="gender" required>
    <option value="" disabled selected>Select Gender</option>
    <option value="Male" {{ old('gender')=='Male'?'selected':'' }}>Male</option>
    <option value="Female" {{ old('gender')=='Female'?'selected':'' }}>Female</option>
    <option value="Other" {{ old('gender')=='Other'?'selected':'' }}>Other</option>
  </select>
  <label for="gender">Gender *</label>
</div>


          <div class="col-md-3 form-floating">
            <select name="marital_status" class="form-select" id="marital_status">
              <option value="" disabled selected>Select Marital Status</option>
              <option value="Single" {{ old('marital_status')=='Single'?'selected':'' }}>Single</option>
              <option value="Married" {{ old('marital_status')=='Married'?'selected':'' }}>Married</option>
            </select>
            <label for="marital_status">Marital Status</label>
          </div>

          <!-- Address -->
          <div class="col-12 form-floating">
            <textarea name="address" class="form-control" id="address" placeholder="Current Address" style="height:80px">{{ old('address') }}</textarea>
            <label for="address">Current Address</label>
          </div>
          <div class="col-12 form-floating">
            <textarea name="permanent_address" class="form-control" id="perm_address" placeholder="Permanent Address" style="height:80px">{{ old('permanent_address') }}</textarea>
            <label for="perm_address">Permanent Address</label>
          </div>

          <!-- Gotra Details -->
          @foreach(['gotra','gotra_self','gotra_mother','gotra_nani','gotra_dadi'] as $field)
            <div class="col-6 col-md-2 form-floating">
              <input name="{{ $field }}" class="form-control" id="{{ $field }}" placeholder="{{ ucwords(str_replace('_',' ',$field)) }}" value="{{ old($field) }}">
              <label for="{{ $field }}">{{ ucwords(str_replace('_',' ',$field)) }}</label>
            </div>
          @endforeach

          <div class="col-md-6 form-floating">
            <input name="qualifications" class="form-control" id="qualifications" placeholder="Qualifications" value="{{ old('qualifications') }}">
            <label for="qualifications">Qualifications</label>
          </div>
          <div class="col-md-6 form-floating">
            <select name="blood_group" class="form-select" id="blood_group">
              <option value="" disabled selected>Select Blood Group</option>
              @foreach(['A+','A-','B+','B-','O+','O-','AB+','AB-'] as $bg)
                <option value="{{ $bg }}" {{ old('blood_group')==$bg?'selected':'' }}>{{ $bg }}</option>
              @endforeach
            </select>
            <label for="blood_group">Blood Group</label>
          </div>

          <!-- Contact -->
          <div class="col-md-6 form-floating">
            <input name="mobile" class="form-control" id="mobile" placeholder="Mobile" value="{{ old('mobile') }}" required>
            <label for="mobile">Mobile *</label>
          </div>
          <div class="col-md-6 form-floating">
            <input name="whatsapp" class="form-control" id="whatsapp" placeholder="WhatsApp" value="{{ old('whatsapp') }}">
            <label for="whatsapp">WhatsApp</label>
          </div>

          <!-- Photo -->
          <div class="col-12">
            <label for="photo" class="form-label">Upload Photo</label>
            <input type="file" name="photo" id="photo" class="form-control">
          </div>

          <!-- Job Details -->
          <div class="col-md-6 form-floating">
            <input name="job_or_business" class="form-control" id="job_or_business" placeholder="Job or Business" value="{{ old('job_or_business') }}">
            <label for="job_or_business">Job or Business</label>
          </div>
          <div class="col-md-6 form-floating">
            <select name="job_type" class="form-select" id="job_type">
              <option value="" disabled selected>Select Job Type</option>
              <option value="Private" {{ old('job_type')=='Private'?'selected':'' }}>Private</option>
              <option value="Government" {{ old('job_type')=='Government'?'selected':'' }}>Government</option>
            </select>
            <label for="job_type">Job Type</label>
          </div>

          <div class="col-md-6 form-floating">
            <input name="designation" class="form-control" id="designation" placeholder="Designation" value="{{ old('designation') }}">
            <label for="designation">Designation</label>
          </div>
          <div class="col-md-6 form-floating">
            <input name="work_city" class="form-control" id="work_city" placeholder="Work City" value="{{ old('work_city') }}">
            <label for="work_city">Work City</label>
          </div>

          <!-- Religious Info -->
          <div class="col-md-4 form-floating">
            <input name="satimata_place" class="form-control" id="satimata_place" placeholder="Satimata Place" value="{{ old('satimata_place') }}">
            <label for="satimata_place">Satimata Place</label>
          </div>
          <div class="col-md-4 form-floating">
            <input name="bheruji_place" class="form-control" id="bheruji_place" placeholder="Bheruji Place" value="{{ old('bheruji_place') }}">
            <label for="bheruji_place">Bheruji Place</label>
          </div>
          <div class="col-md-4 form-floating">
            <input name="kuldevi_place" class="form-control" id="kuldevi_place" placeholder="Kuldevi Place" value="{{ old('kuldevi_place') }}">
            <label for="kuldevi_place">Kuldevi Place</label>
          </div>
        </div>

        <!-- Save / Cancel -->
        <div class="mt-4 text-center">
          <button type="submit" class="btn btn-primary px-5 py-2">
            <i class="bi bi-save me-2"></i>Save Member
          </button>
          <a href="{{ route('admin.members.index') }}" class="btn btn-outline-secondary px-5 py-2 ms-2">
            Cancel
          </a>
        </div>

      </form>
    </div>
  </div>
</div>
@endsection
