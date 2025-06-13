@extends('admin.layout')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<style>
  .card-custom { border-radius: .5rem; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
  .form-section { margin-bottom: 1.5rem; }
</style>

<div class="container py-4">
  <div class="card card-custom">
    <div class="card-header bg-primary text-white text-center">
      <h4 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Edit Member</h4>
    </div>
    <div class="card-body">
      <form method="POST" enctype="multipart/form-data" action="{{ route('admin.members.update', $member) }}">
        @csrf @method('PUT')

        <div class="row form-section">
          <div class="col-md-6 form-floating mb-3">
            <input name="name" id="name" type="text" class="form-control" value="{{ old('name', $member->name) }}" required>
            <label for="name">Full Name *</label>
          </div>
          <div class="col-md-6 form-floating mb-3">
            <input name="father_name" id="father_name" type="text" class="form-control" value="{{ old('father_name', $member->father_name) }}">
            <label for="father_name">Father’s Name</label>
          </div>
        </div>

        <div class="row form-section">
          <div class="col-md-4 form-floating mb-3">
            <input name="mother_name" id="mother_name" type="text" class="form-control" value="{{ old('mother_name', $member->mother_name) }}">
            <label for="mother_name">Mother’s Name</label>
          </div>
          <div class="col-md-4 form-floating mb-3">
            <input name="dob" id="dob" type="date" class="form-control" value="{{ old('dob', $member->dob) }}">
            <label for="dob">Date of Birth</label>
          </div>
          <div class="col-md-4 form-floating mb-3">
            <select name="gender" id="gender" class="form-select" required>
              <option value="" disabled>Select Gender *</option>
              <option value="Male" {{ old('gender',$member->gender)=='Male'?'selected':'' }}>Male</option>
              <option value="Female" {{ old('gender',$member->gender)=='Female'?'selected':'' }}>Female</option>
              <option value="Other" {{ old('gender',$member->gender)=='Other'?'selected':'' }}>Other</option>
            </select>
            <label for="gender">Gender *</label>
          </div>
        </div>

        <div class="row form-section">
          <div class="col-md-6 form-floating mb-3">
            <select name="marital_status" id="marital_status" class="form-select">
              <option value="" disabled>Select Marital Status</option>
              <option value="Single" {{ old('marital_status',$member->marital_status)=='Single'?'selected':'' }}>Single</option>
              <option value="Married" {{ old('marital_status',$member->marital_status)=='Married'?'selected':'' }}>Married</option>
            </select>
            <label for="marital_status">Marital Status</label>
          </div>
        </div>

        <div class="form-section">
          <div class="form-floating mb-3">
            <textarea name="address" id="address" class="form-control" style="height:90px">{{ old('address',$member->address) }}</textarea>
            <label for="address">Current Address</label>
          </div>
          <div class="form-floating mb-3">
            <textarea name="permanent_address" id="perm_address" class="form-control" style="height:90px">{{ old('permanent_address',$member->permanent_address) }}</textarea>
            <label for="perm_address">Permanent Address</label>
          </div>
        </div>

        <div class="row form-section">
          @foreach(['gotra','gotra_self','gotra_mother','gotra_nani','gotra_dadi'] as $field)
          <div class="col-md-2 form-floating mb-3">
            <input name="{{ $field }}" id="{{ $field }}" type="text" class="form-control" value="{{ old($field,$member->$field) }}">
            <label for="{{ $field }}">{{ ucwords(str_replace('_',' ',$field)) }}</label>
          </div>
          @endforeach
        </div>

        <div class="row form-section">
          <div class="col-md-6 form-floating mb-3">
            <input name="qualifications" id="qualifications" type="text" class="form-control" value="{{ old('qualifications',$member->qualifications) }}">
            <label for="qualifications">Qualifications</label>
          </div>
          <div class="col-md-6 form-floating mb-3">
            <select name="blood_group" id="blood_group" class="form-select">
              <option value="" disabled>Select Blood Group</option>
              @foreach(['A+','A-','B+','B-','O+','O-','AB+','AB-'] as $bg)
              <option value="{{ $bg }}" {{ old('blood_group',$member->blood_group)==$bg?'selected':'' }}>{{ $bg }}</option>
              @endforeach
            </select>
            <label for="blood_group">Blood Group</label>
          </div>
        </div>

        <div class="row form-section">
          <div class="col-md-6 form-floating mb-3">
            <input name="mobile" id="mobile" type="text" class="form-control" value="{{ old('mobile',$member->mobile) }}" required>
            <label for="mobile">Mobile *</label>
          </div>
          <div class="col-md-6 form-floating mb-3">
            <input name="whatsapp" id="whatsapp" type="text" class="form-control" value="{{ old('whatsapp',$member->whatsapp) }}">
            <label for="whatsapp">WhatsApp</label>
          </div>
        </div>

        <div class="row form-section">
          <div class="col-md-4 mb-3">
            <label class="form-label">Photo</label>
            <input type="file" name="photo" class="form-control">
            @if($member->photo)
            <img src="{{ asset('storage/'.$member->photo) }}" class="img-thumbnail mt-2" style="max-width:120px">
            @endif
          </div>
        </div>

        <div class="row form-section">
          <div class="col-md-6 form-floating mb-3">
            <input name="job_or_business" id="job_or_business" type="text" class="form-control" value="{{ old('job_or_business',$member->job_or_business) }}">
            <label for="job_or_business">Job or Business</label>
          </div>
          <div class="col-md-6 form-floating mb-3">
            <select name="job_type" id="job_type" class="form-select">
              <option value="" disabled>Select Job Type</option>
              <option value="Private" {{ old('job_type',$member->job_type)=='Private'?'selected':'' }}>Private</option>
              <option value="Government" {{ old('job_type',$member->job_type)=='Government'?'selected':'' }}>Government</option>
            </select>
            <label for="job_type">Job Type</label>
          </div>
        </div>

        <div class="row form-section">
          <div class="col-md-6 form-floating mb-3">
            <input name="designation" id="designation" type="text" class="form-control" value="{{ old('designation',$member->designation) }}">
            <label for="designation">Designation</label>
          </div>
          <div class="col-md-6 form-floating mb-3">
            <input name="work_city" id="work_city" type="text" class="form-control" value="{{ old('work_city',$member->work_city) }}">
            <label for="work_city">Work City</label>
          </div>
        </div>

        <div class="row form-section">
          <div class="col-md-4 form-floating mb-3">
            <input name="satimata_place" id="satimata_place" type="text" class="form-control" value="{{ old('satimata_place',$member->satimata_place) }}">
            <label for="satimata_place">Satimata Place</label>
          </div>
          <div class="col-md-4 form-floating mb-3">
            <input name="bheruji_place" id="bheruji_place" type="text" class="form-control" value="{{ old('bheruji_place',$member->bheruji_place) }}">
            <label for="bheruji_place">Bheruji Place</label>
          </div>
          <div class="col-md-4 form-floating mb-3">
            <input name="kuldevi_place" id="kuldevi_place" type="text" class="form-control" value="{{ old('kuldevi_place',$member->kuldevi_place) }}">
            <label for="kuldevi_place">Kuldevi Place</label>
          </div>
        </div>

        <div class="text-center mt-4">
          <button type="submit" class="btn btn-primary px-5">
            <i class="bi bi-save me-2"></i>Update Member
          </button>
          <a href="{{ route('admin.members.index') }}" class="btn btn-outline-secondary px-5 ms-2">Cancel</a>
        </div>

      </form>
    </div>
  </div>
</div>
@endsection
