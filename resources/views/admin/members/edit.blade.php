@extends('admin.layout')
@section('content')
<div class="container py-4">
  <h3>Edit Member</h3>
  <form method="POST" enctype="multipart/form-data" action="{{ route('admin.members.update', $member) }}">
    @csrf @method('PUT')

    {{-- Personal Info --}}
    <div class="row mb-3">
      <div class="col-md-6">
        <label>Full Name *</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $member->name) }}" required>
      </div>
      <div class="col-md-6">
        <label>Father’s Name</label>
        <input type="text" name="father_name" class="form-control" value="{{ old('father_name', $member->father_name) }}">
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-6"><label>Mother’s Name</label><input type="text" name="mother_name" class="form-control" value="{{ old('mother_name', $member->mother_name) }}"></div>
      <div class="col-md-3"><label>Date of Birth</label><input type="date" name="dob" class="form-control" value="{{ old('dob', $member->dob) }}"></div>
      <!-- <div class="col-md-3"><label>Gender</label><select name="gender" class="form-control"><option value="">Select</option><option value="Male" {{ old('gender', $member->gender)=='Male'?'selected':'' }}>Male</option><option value="Female" {{ old('gender', $member->gender)=='Female'?'selected':'' }}>Female</option></select></div> -->
    </div>

    {{-- Marital Status --}}
    <div class="mb-3">
      <label>Marital Status</label>
<select name="gender" class="form-control" required>
  <option value="">Select Gender</option>
  <option value="Male" {{ old('gender', $member->gender)=='Male'?'selected':'' }}>Male</option>
  <option value="Female" {{ old('gender', $member->gender)=='Female'?'selected':'' }}>Female</option>
</select>


    </div>

    {{-- Address --}}
    <div class="mb-3">
      <label>Current Address</label>
      <textarea name="address" class="form-control">{{ old('address', $member->address) }}</textarea>
    </div>
    <div class="mb-3">
      <label>Permanent Address</label>
      <textarea name="permanent_address" class="form-control">{{ old('permanent_address', $member->permanent_address) }}</textarea>
    </div>

    {{-- Gotra --}}
    <div class="row mb-3">
      <div class="col-md-3"><label>Gotra</label><input type="text" name="gotra" class="form-control" value="{{ old('gotra', $member->gotra) }}"></div>
      <div class="col-md-3"><label>Gotra – Self</label><input type="text" name="gotra_self" class="form-control" value="{{ old('gotra_self', $member->gotra_self) }}"></div>
      <div class="col-md-3"><label>Gotra – Mother</label><input type="text" name="gotra_mother" class="form-control" value="{{ old('gotra_mother', $member->gotra_mother) }}"></div>
      <div class="col-md-3"><label>Gotra – Nani</label><input type="text" name="gotra_nani" class="form-control" value="{{ old('gotra_nani', $member->gotra_nani) }}"></div>
      <div class="col-md-3 mt-2"><label>Gotra – Dadi</label><input type="text" name="gotra_dadi" class="form-control" value="{{ old('gotra_dadi', $member->gotra_dadi) }}"></div>
    </div>

    {{-- Qualifications & Blood --}}
    <div class="row mb-3">
      <div class="col-md-6"><label>Qualifications</label><input type="text" name="qualifications" class="form-control" value="{{ old('qualifications', $member->qualifications) }}"></div>
      <div class="col-md-6"><label>Blood Group</label><select name="blood_group" class="form-control"><option value="">Select</option>@foreach(['A+','A-','B+','B-','O+','O-','AB+','AB-'] as $bg)<option value="{{ $bg }}" {{ old('blood_group', $member->blood_group)==$bg?'selected':'' }}>{{ $bg }}</option>@endforeach</select></div>
    </div>

    {{-- House Type --}}
    <!-- <div class="mb-3"><label>House Type</label><input type="text" name="house_type" class="form-control" value="{{ old('house_type', $member->house_type) }}"></div> -->

    {{-- Contact --}}
    <div class="row mb-3">
      <div class="col-md-6"><label>Mobile *</label><input type="text" name="mobile" class="form-control" value="{{ old('mobile', $member->mobile) }}" required></div>
      <div class="col-md-6"><label>WhatsApp</label><input type="text" name="whatsapp" class="form-control" value="{{ old('whatsapp', $member->whatsapp) }}"></div>
    </div>

    {{-- Photo Upload --}}
    <div class="mb-3">
      <label>Photo</label>
      <input type="file" name="photo" class="form-control">
      @if($member->photo)
        <img src="{{ asset('storage/' . $member->photo) }}" alt="Photo" class="mt-2" width="120">
      @endif
    </div>

    {{-- Job / Business --}}
    <div class="row mb-3">
      <div class="col-md-6"><label>Job or Business</label><input type="text" name="job_or_business" class="form-control" value="{{ old('job_or_business', $member->job_or_business) }}"></div>
      <div class="col-md-6"><label>Job Type</label><select name="job_type" class="form-control"><option value="">Select</option><option value="Private" {{ old('job_type', $member->job_type)=='Private'?'selected':'' }}>Private</option><option value="Government" {{ old('job_type', $member->job_type)=='Government'?'selected':'' }}>Government</option></select></div>
    </div>

    <div class="row mb-3">
      <div class="col-md-6"><label>Designation</label><input type="text" name="designation" class="form-control" value="{{ old('designation', $member->designation) }}"></div>
      <div class="col-md-6"><label>Work City</label><input type="text" name="work_city" class="form-control" value="{{ old('work_city', $member->work_city) }}"></div>
    </div>

    {{-- Religious Info --}}
    <div class="row mb-3">
      <div class="col-md-4"><label>Satimata Place</label><input type="text" name="satimata_place" class="form-control" value="{{ old('satimata_place', $member->satimata_place) }}"></div>
      <div class="col-md-4"><label>Bheruji Place</label><input type="text" name="bheruji_place" class="form-control" value="{{ old('bheruji_place', $member->bheruji_place) }}"></div>
      <div class="col-md-4"><label>Kuldevi Place</label><input type="text" name="kuldevi_place" class="form-control" value="{{ old('kuldevi_place', $member->kuldevi_place) }}"></div>
    </div>

    <button type="submit" class="btn btn-primary">Update Member</button>
    <a href="{{ route('admin.members.index') }}" class="btn btn-secondary">Cancel</a>
  </form>
</div>
@endsection
