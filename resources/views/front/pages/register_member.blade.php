@extends('front.layouts.master')
@section('content')
<section class="contact-page section-padding bg-light">
  <div class="container py-4">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        @if(session('message'))
          <div class="alert alert-success text-center">{{ session('message') }}</div>
        @endif

        <div class="card shadow-sm border-0 p-4">
          <h2 class="text-center text-primary mb-1">📝 Register Member</h2>
          <p class="text-center text-muted mb-4">* indicates required fields</p>
          
          <form action="{{ route('front.store_member') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-4">
              <!-- Personal Info -->
              <div class="border rounded p-3 bg-white">
                <h5 class="mb-3 text-primary">👤 Personal Information</h5>
                <div class="row g-3">
                  <div class="col-md-6"><label class="form-label">Full Name *</label><input type="text" name="name" class="form-control" required></div>
                  <div class="col-md-6"><label class="form-label">Father's Name *</label><input type="text" name="father_name" class="form-control" required></div>
                  <div class="col-md-6"><label class="form-label">Mother's Name *</label><input type="text" name="mother_name" class="form-control" required></div>
                  <div class="col-md-6"><label class="form-label">Date of Birth *</label><input type="date" name="dob" class="form-control" required></div>
                  <div class="col-md-6"><label class="form-label">Gender *</label>
                    <select name="gender" class="form-select" required>
                      <option value="">Select Gender</option>
                      <option>Male</option><option>Female</option><option>Other</option>
                    </select>
                  </div>
                  <div class="col-md-6"><label class="form-label">Marital Status *</label>
                    <select name="marital_status" class="form-select" required>
                      <option value="">Select Status</option>
                      <option>Single</option><option>Married</option><option>Divorced</option><option>Widow</option>
                    </select>
                  </div>
                </div>
              </div>

              <!-- Address Info -->
              <div class="border rounded p-3 bg-white">
                <h5 class="mb-3 text-primary">🏠 Address Information</h5>
                <div class="row g-3">
                  <div class="col-md-6"><label class="form-label">Current Address *</label><input type="text" name="address" class="form-control" required></div>
                  <div class="col-md-6">
                    <label class="form-label">Permanent Address *</label>
                    <input type="text" name="permanent_address" id="permanent_address" class="form-control" required>
                    <div class="form-check mt-1">
                      <input type="checkbox" id="same_address" class="form-check-input">
                      <label class="form-check-label">Same as above</label>
                    </div>
                  </div>
                  <div class="col-md-6"><label class="form-label">District *</label><input type="text" name="district" id="district" class="form-control" placeholder="Start typing district..." required></div>
                  <div class="col-12"><label class="form-label">Area / Locality *</label><textarea name="area" id="area" class="form-control" rows="3" required></textarea></div>
                </div>
              </div>

              <!-- Gotra Info -->
              <div class="border rounded p-3 bg-white">
                <h5 class="mb-3 text-primary">🧬 Gotra Details</h5>
                <div class="row g-3">
                  @php $gotras = ['Rundwal','Bamlaa']; @endphp
                  @foreach(['Self'=>'gotra_self','Mother'=>'gotra_mother','Nani'=>'gotra_nani','Dadi'=>'gotra_dadi'] as $label => $field)
                  <div class="col-md-6">
                    <label class="form-label">Gotra – {{ $label }} *</label>
                    <select name="{{ $field }}" class="form-select" required>
                      <option value="">Select</option>
                      @foreach($gotras as $g) <option>{{ $g }}</option> @endforeach
                    </select>
                  </div>
                  @endforeach
                </div>
              </div>

              <!-- Education & Medical -->
              <div class="border rounded p-3 bg-white">
                <h5 class="mb-3 text-primary">🎓 Education & Medical Info</h5>
                <div class="row g-3">
                  <div class="col-md-6"><label class="form-label">Qualification *</label>
                    <select name="qualifications" class="form-select" required>
                      <option value="">Select Qualification</option>
                      @foreach(['10th','12th','Graduate','Post Graduate','PhD','Other'] as $q)
                        <option>{{ $q }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-6"><label class="form-label">Blood Group *</label>
                    <select name="blood_group" class="form-select" required>
                      <option value="">Select Blood Group</option>
                      @foreach(['A+','A-','B+','B-','O+','O-','AB+','AB-'] as $bg)
                        <option>{{ $bg }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>

              <!-- Contact Info -->
              <div class="border rounded p-3 bg-white">
                <h5 class="mb-3 text-primary">📞 Contact & Photo</h5>
                <div class="row g-3">
                  <div class="col-md-6"><label class="form-label">Mobile Number *</label><input type="text" name="mobile" class="form-control" required></div>
                  <div class="col-md-6"><label class="form-label">WhatsApp Number *</label><input type="text" name="whatsapp" class="form-control" required></div>
                  <div class="col-md-6"><label class="form-label">Profile Picture *</label><input type="file" name="photo" accept="image/*" class="form-control" required></div>
                </div>
              </div>

              <!-- Work Info -->
              <div class="border rounded p-3 bg-white">
                <h5 class="mb-3 text-primary">💼 Work Information</h5>
                <div class="row g-3">
                  <div class="col-md-6"><label class="form-label">Job or Business *</label>
                    <select name="job_or_business" class="form-select" required>
                      <option value="">Select</option><option>Job</option><option>Business</option>
                    </select>
                  </div>
                  <div class="col-md-6"><label class="form-label">Business Name</label><input type="text" name="business_name" class="form-control"></div>
                  <div class="col-md-6"><label class="form-label">Business Location</label><input type="text" name="business_location" class="form-control"></div>
                  <div class="col-md-6"><label class="form-label">Job Type</label>
                    <select name="job_type" class="form-select">
                      <option value="">Select Type</option><option>Private</option><option>Government</option>
                    </select>
                  </div>
                  <div class="col-md-6"><label class="form-label">Designation</label><input type="text" name="designation" class="form-control"></div>
                  <div class="col-md-6"><label class="form-label">Work Place</label><input type="text" name="work_place" class="form-control"></div>
                </div>
              </div>

              <!-- Religious Info -->
              <div class="border rounded p-3 bg-white">
                <h5 class="mb-3 text-primary">🛕 Religious Information</h5>
                <div class="row g-3">
                  @foreach(['Satimata'=>'satimata_place','Bheruji'=>'bheruji_place','Kuldevi'=>'kuldevi_place'] as $label=>$field)
                  <div class="col-md-4"><label class="form-label">{{ $label }} Place *</label>
                    <select name="{{ $field }}" class="form-select" required>
                      <option value="">Select</option>
                      @foreach($religiousList ?? [] as $place)
                        <option>{{ $place }}</option>
                      @endforeach
                    </select>
                  </div>
                  @endforeach
                </div>
              </div>

              <!-- Submit Button -->
              <div class="col-12 text-center mt-4">
                <button type="submit" class="btn btn-primary px-5 py-2 shadow-sm">Register</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Google Maps Places Autocomplete -->
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_KEY') }}&libraries=places&callback=initAutocomplete" async defer></script>
<script>
  function initAutocomplete() {
    const opts = { types: ['(regions)'], componentRestrictions: { country: 'IN' } };
    const districtInput = document.getElementById('district');
    const areaInput     = document.getElementById('area');
    if (districtInput) new google.maps.places.Autocomplete(districtInput, opts);
    if (areaInput) new google.maps.places.Autocomplete(areaInput, { types: ['geocode'], componentRestrictions: { country: 'IN' } });

    document.getElementById('same_address').addEventListener('change', function () {
      if (this.checked) {
        document.getElementById('permanent_address').value = document.querySelector('input[name="address"]').value;
      }
    });
  }
</script>
@endsection
