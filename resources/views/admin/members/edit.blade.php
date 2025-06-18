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
          <div class="col-md-6 form-floating mb-3">
            <input name="mobile" id="mobile" type="text" class="form-control" value="{{ old('mobile', $member->mobile) }}">
            <label for="mobile">Mobile</label>
          </div>
        </div>

        <div class="form-section">
          <div class="form-floating mb-3">
            <textarea name="address" id="address" class="form-control" style="height:120px">{{ old('address',$member->address) }}</textarea>
            <label for="address">Area / Address</label>
          </div>
          <div class="row">
            <div class="col-md-4 form-floating mb-3">
              <input name="city" type="text" class="form-control" value="{{ old('city', $member->city) }}">
              <label>City</label>
            </div>
            <div class="col-md-4 form-floating mb-3">
              <select name="district" class="form-select">
                <option value="" disabled selected>Select District</option>
                @foreach(['Udaipur', 'Jaipur', 'Jodhpur', 'Ajmer'] as $dist)
                <option value="{{ $dist }}" {{ old('district',$member->district)==$dist?'selected':'' }}>{{ $dist }}</option>
                @endforeach
              </select>
              <label>District</label>
            </div>
            <div class="col-md-4 form-floating mb-3">
              <input name="permanent_address" class="form-control" value="{{ old('permanent_address', $member->permanent_address) }}">
              <label>Permanent Address</label>
            </div>
          </div>
        </div>

        <div class="row form-section">
          @foreach(['gotra_self'=>'Self Gotra','gotra_mother'=>'Mother Gotra','gotra_nani'=>'Nani Gotra','gotra_dadi'=>'Dadi Gotra'] as $field => $label)
          <div class="col-md-3 form-floating mb-3">
            <select name="{{ $field }}" class="form-select">
              <option value="" disabled selected>Select Gotra</option>
              @foreach(['Bhardwaj','Gautam','Kashyap','Vats','Vashishtha'] as $g)
              <option value="{{ $g }}" {{ old($field,$member->$field)==$g?'selected':'' }}>{{ $g }}</option>
              @endforeach
            </select>
            <label>{{ $label }}</label>
          </div>
          @endforeach
        </div>

        <div class="row form-section">
          <div class="col-md-4 form-floating mb-3">
            <select name="kuldevi_place" class="form-select">
              <option value="" disabled selected>Select Kuldevi</option>
              @foreach(['Ashapura', 'Chamunda', 'Karni Mata'] as $val)
              <option value="{{ $val }}" {{ old('kuldevi_place', $member->kuldevi_place)==$val?'selected':'' }}>{{ $val }}</option>
              @endforeach
            </select>
            <label>Kuldevi</label>
          </div>
          <div class="col-md-4 form-floating mb-3">
            <select name="bheruji_place" class="form-select">
              <option value="" disabled selected>Select Bheruji</option>
              @foreach(['Bheru Mandir A', 'Bheru Mandir B'] as $val)
              <option value="{{ $val }}" {{ old('bheruji_place', $member->bheruji_place)==$val?'selected':'' }}>{{ $val }}</option>
              @endforeach
            </select>
            <label>Bheruji</label>
          </div>
          <div class="col-md-4 form-floating mb-3">
            <select name="satimata_place" class="form-select">
              <option value="" disabled selected>Select Satimata</option>
              @foreach(['Sati Mata A', 'Sati Mata B'] as $val)
              <option value="{{ $val }}" {{ old('satimata_place', $member->satimata_place)==$val?'selected':'' }}>{{ $val }}</option>
              @endforeach
            </select>
            <label>Satimata</label>
          </div>
        </div>

        <div class="row form-section">
          <div class="col-md-6 form-floating mb-3">
            <select name="marital_status" class="form-select">
              <option value="" disabled>Select Marital Status</option>
              @foreach(['Single','Married','Widow'] as $m)
              <option value="{{ $m }}" {{ old('marital_status', $member->marital_status)==$m ? 'selected':'' }}>{{ $m }}</option>
              @endforeach
            </select>
            <label>Marital Status</label>
          </div>
          <div class="col-md-6 form-floating mb-3">
            <select name="qualifications" class="form-select">
              <option value="" disabled>Select Qualification</option>
              @foreach(['10th','12th','Graduate','Postgraduate','PhD'] as $q)
              <option value="{{ $q }}" {{ old('qualifications', $member->qualifications)==$q ? 'selected':'' }}>{{ $q }}</option>
              @endforeach
            </select>
            <label>Education</label>
          </div>
        </div>

        <div class="row form-section">
          <div class="col-md-6 form-floating mb-3">
            <input name="job_or_business" id="job_or_business" type="text" class="form-control" value="{{ old('job_or_business',$member->job_or_business) }}">
            <label for="job_or_business">Business Name / Job</label>
          </div>
          <div class="col-md-6 form-floating mb-3">
            <input name="work_city" id="work_city" type="text" class="form-control" value="{{ old('work_city',$member->work_city) }}">
            <label for="work_city">Work Place</label>
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
