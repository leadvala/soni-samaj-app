@extends('admin.layout')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<style>.bg-gradient-custom { background: linear-gradient(45deg, #667eea, #764ba2); }</style>

<div class="container my-5">
  <div class="card shadow-sm border-0 rounded">
    <div class="card-header bg-gradient-custom text-white text-center py-3">
      <h4 class="mb-0"><i class="bi bi-person-plus-fill me-2"></i>Add New Member</h4>
    </div>

    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger"><ul>@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
      @endif

      <form method="POST" enctype="multipart/form-data" action="{{ route('admin.members.store') }}">
        @csrf
        <div class="row g-3">

          {{-- Personal Info --}}
          <div class="col-md-6 form-floating">
            <input name="name" id="name" class="form-control" placeholder="Full Name" value="{{ old('name') }}" required>
            <label for="name">Full Name *</label>
          </div>
          <div class="col-md-6 form-floating">
            <input name="father_name" id="father_name" class="form-control" placeholder="Father’s Name" value="{{ old('father_name') }}">
            <label for="father_name">Father’s Name</label>
          </div>
          <div class="col-md-6 form-floating">
            <input name="mother_name" id="mother_name" class="form-control" placeholder="Mother’s Name" value="{{ old('mother_name') }}">
            <label for="mother_name">Mother’s Name</label>
          </div>
          <div class="col-md-3 form-floating">
            <input type="date" name="dob" id="dob" class="form-control" value="{{ old('dob') }}">
            <label for="dob">Date of Birth</label>
          </div>
          {{-- add after dob --}}
<div class="col-md-3 form-floating">
  <select name="gender" id="gender" class="form-select" required>
    <option value="" disabled>Select Gender</option>
    <option value="Male"   {{ old('gender')=='Male' ? 'selected' : '' }}>Male</option>
    <option value="Female" {{ old('gender')=='Female' ? 'selected' : '' }}>Female</option>
    <option value="Other"  {{ old('gender')=='Other' ? 'selected' : '' }}>Other</option>
  </select>
  <label for="gender">Gender *</label>
</div>

          <div class="col-md-3 form-floating">
            <select name="marital_status" id="marital_status" class="form-select" required>
              <option value="" disabled>Select Marital Status</option>
              <option value="Single" {{ old('marital_status')=='Single'?'selected':'' }}>Single</option>
              <option value="Married" {{ old('marital_status')=='Married'?'selected':'' }}>Married</option>
              <option value="Widow" {{ old('marital_status')=='Widow'?'selected':'' }}>Widow</option>
            </select>
            <label for="marital_status">Marital Status *</label>
          </div>

          {{-- Address --}}
          <div class="col-12 form-floating">
            <textarea name="address" id="address" class="form-control" style="height:80px" required>{{ old('address') }}</textarea>
            <label for="address">Current Address *</label>
          </div>
          <div class="form-check mb-3">
            <input type="checkbox" id="copyAddress" class="form-check-input" onclick="copyAddress()">
            <label for="copyAddress" class="form-check-label">Same as Current Address</label>
          </div>
          <div class="col-12 form-floating">
            <textarea name="permanent_address" id="permanent_address" class="form-control" style="height:80px" required>{{ old('permanent_address') }}</textarea>
            <label for="permanent_address">Permanent Address *</label>
          </div>

          {{-- District --}}
          <div class="col-md-4 form-floating">
            <input type="text" name="district" id="district" class="form-control" placeholder="District" value="{{ old('district') }}" required>
            <label for="district">District *</label>
          </div>

          {{-- Workplace / City --}}
          <div class="col-md-4 form-floating">
            <input name="work_place" id="work_place" class="form-control" placeholder="Workplace / City" value="{{ old('work_place') }}" required>
            <label for="work_place">Workplace / City *</label>
          </div>

          {{-- Area --}}
          <div class="col-md-4 form-floating">
            <textarea name="area" id="area" class="form-control" style="height:80px" required>{{ old('area') }}</textarea>
            <label for="area">Area *</label>
          </div>

          {{-- Gotra Dropdowns --}}
          @foreach (['gotra' => 'Gotra', 'gotra_self' => 'Self Gotra', 'gotra_mother' => 'Mother Gotra', 'gotra_nani' => 'Nani Gotra', 'gotra_dadi' => 'Dadi Gotra'] as $field => $label)
          <div class="col-md-2 form-floating">
            <select name="{{ $field }}" id="{{ $field }}" class="form-select" @if($field == 'gotra') required @endif>
              <option value="">{{ $label }}</option>
              @foreach ($gotras as $g)
                <option value="{{ $g }}" {{ old($field)==$g ? 'selected':'' }}>{{ $g }}</option>
              @endforeach
            </select>
            <label for="{{ $field }}">{{ $label }}</label>
          </div>
          @endforeach

          {{-- Studies & Blood Group --}}
          <div class="col-md-6 form-floating">
            <select name="qualifications" id="qualifications" class="form-select" required>
              <option value="" disabled>Select Studies</option>
              <option value="Matric" {{ old('qualifications')=='Matric'?'selected':'' }}>Matric</option>
              <option value="Intermediate" {{ old('qualifications')=='Intermediate'?'selected':'' }}>Intermediate</option>
              <option value="Graduate" {{ old('qualifications')=='Graduate'?'selected':'' }}>Graduate</option>
              <option value="Post Graduate" {{ old('qualifications')=='Post Graduate'?'selected':'' }}>Post Graduate</option>
              <option value="PhD" {{ old('qualifications')=='PhD'?'selected':'' }}>PhD</option>
            </select>
            <label for="qualifications">Studies *</label>
          </div>
          <div class="col-md-6 form-floating">
            <select name="blood_group" id="blood_group" class="form-select" required>
              <option value="" disabled>Select Blood Group</option>
              @foreach(['A+','A-','B+','B-','O+','O-','AB+','AB-'] as $bg)
              <option value="{{ $bg }}" {{ old('blood_group')==$bg?'selected':'' }}>{{ $bg }}</option>
              @endforeach
            </select>
            <label for="blood_group">Blood Group *</label>
          </div>

          {{-- Contact --}}
          <div class="col-md-6 form-floating">
            <input name="mobile" id="mobile" class="form-control" placeholder="Mobile" value="{{ old('mobile') }}" required>
            <label for="mobile">Mobile *</label>
          </div>
          <div class="col-md-6 form-floating">
            <input name="whatsapp" id="whatsapp" class="form-control" placeholder="WhatsApp" value="{{ old('whatsapp') }}">
            <label for="whatsapp">WhatsApp</label>
          </div>

          {{-- Photo --}}
          <div class="col-12">
            <label for="photo" class="form-label">Upload Photo</label>
            <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
          </div>

          {{-- Job & Business --}}
          <div class="col-md-6 form-floating">
            <input name="job_or_business" id="job_or_business" class="form-control" placeholder="Job or Business" value="{{ old('job_or_business') }}">
            <label for="job_or_business">Job or Business</label>
          </div>
          <div class="col-md-6 form-floating">
            <input name="business_name" id="business_name" class="form-control" placeholder="Business Name" value="{{ old('business_name') }}">
            <label for="business_name">Business Name</label>
          </div>
          <div class="col-md-6 form-floating">
            <input name="business_location" id="business_location" class="form-control" placeholder="Business Location" value="{{ old('business_location') }}">
            <label for="business_location">Business Location</label>
          </div>
          <div class="col-md-6 form-floating">
            <select name="job_type" id="job_type" class="form-select">
              <option value="" disabled>Select Job Type</option>
              <option value="Private" {{ old('job_type')=='Private'?'selected':'' }}>Private</option>
              <option value="Government" {{ old('job_type')=='Government'?'selected':'' }}>Government</option>
            </select>
            <label for="job_type">Job Type</label>
          </div>
          <div class="col-md-6 form-floating">
            <input name="designation" id="designation" class="form-control" placeholder="Designation" value="{{ old('designation') }}">
            <label for="designation">Designation</label>
          </div>

          {{-- Religious Places --}}
          @foreach(['satimata_place'=>'Satimata Place','bheruji_place'=>'Bheruji Place','kuldevi_place'=>'Kuldevi Place'] as $field => $label)
          <div class="col-md-4 form-floating">
            <select name="{{ $field }}" id="{{ $field }}" class="form-select">
              <option value="">{{ $label }}</option>
              @foreach ($religiousList as $place)
              <option value="{{ $place }}" {{ old($field)==$place?'selected':'' }}>{{ $place }}</option>
              @endforeach
            </select>
            <label for="{{ $field }}">{{ $label }}</label>
          </div>
          @endforeach
        </div>

        {{-- Submit --}}
        <div class="mt-4 text-center">
          <button type="submit" class="btn btn-primary px-5 py-2"><i class="bi bi-save me-2"></i>Save Member</button>
          <a href="{{ route('admin.members.index') }}" class="btn btn-outline-secondary px-5 py-2 ms-2">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- Scripts --}}
<script>
  function copyAddress() {
    document.getElementById('permanent_address').value = document.getElementById('address').value;
  }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_KEY') }}&libraries=places&callback=initAutocomplete" async defer></script>
<script>
  function initAutocomplete() {
    new google.maps.places.Autocomplete(
      document.getElementById('district'),
      {types:['(regions)'], componentRestrictions:{country:'IN'}}
    );
    new google.maps.places.Autocomplete(
      document.getElementById('area'),
      {types:['geocode'], componentRestrictions:{country:'IN'}}
    );
  }
</script>
@endsection
