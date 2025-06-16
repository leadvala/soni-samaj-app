@extends('front.layouts.master')
@section('content')
<section class="contact-page section-padding bg-light">
  <div class="container py-4">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        @if(session('message'))
          <div class="alert alert-success text-center">{{ session('message') }}</div>
        @endif
        <div class="card shadow p-4 border-0">
          <h2 class="mb-3 text-center text-primary">Register Member</h2>
          <p class="text-center text-muted">* indicates required fields</p>
          <form action="{{ route('front.store_member') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
              <!-- Personal Info -->
              <div class="col-md-6"><label>Full Name *</label><input type="text" name="name" class="form-control" required></div>
              <div class="col-md-6"><label>Father's Name *</label><input type="text" name="father_name" class="form-control" required></div>
              <div class="col-md-6"><label>Mother's Name *</label><input type="text" name="mother_name" class="form-control" required></div>
              <div class="col-md-6"><label>Date of Birth *</label><input type="date" name="dob" class="form-control" required></div>

              <!-- Gender & Marital -->
              <div class="col-md-6"><label>Gender *</label>
                <select name="gender" class="form-select" required>
                  <option value="">Select Gender</option>
                  <option>Male</option><option>Female</option><option>Other</option>
                </select>
              </div>
              <div class="col-md-6"><label>Marital Status *</label>
                <select name="marital_status" class="form-select" required>
                  <option value="">Select Status</option>
                  <option>Single</option><option>Married</option><option>Divorced</option><option>Widow</option>
                </select>
              </div>

              <!-- Address Info -->
              <div class="col-md-6"><label>Current Address *</label><input type="text" name="address" class="form-control" required></div>
              <div class="col-md-6"><label>Permanent Address *</label><input type="text" name="permanent_address" id="permanent_address" class="form-control" required>
                <div class="form-check mt-1"><input type="checkbox" id="same_address" class="form-check-input"><label class="form-check-label">Same as above</label></div>
              </div>

              <!-- District & Area with Google Autocomplete -->
              <div class="col-md-6"><label>District *</label><input type="text" name="district" id="district" class="form-control" placeholder="Start typing district..." required></div>
              <div class="col-12"><label>Area / Locality *</label><textarea name="area" id="area" class="form-control" rows="3" required></textarea></div>

              <!-- Gotra Dropdowns -->
              @php $gotras = ['Rundwal','Bamlaa']; @endphp
              @foreach(['Self'=>'gotra_self','Mother'=>'gotra_mother','Nani'=>'gotra_nani','Dadi'=>'gotra_dadi'] as $label => $field)
              <div class="col-md-6"><label>Gotra – {{ $label }} *</label>
                <select name="{{ $field }}" class="form-select" required>
                  <option value="">Select</option>
                  @foreach($gotras as $g)
                    <option>{{ $g }}</option>
                  @endforeach
                </select>
              </div>
              @endforeach

              <!-- Qualification & Blood Group -->
              <div class="col-md-6"><label>Qualification *</label>
                <select name="qualifications" class="form-select" required>
                  <option value="">Select Qualification</option>
                  @foreach(['10th','12th','Graduate','Post Graduate','PhD','Other'] as $q)
                    <option>{{ $q }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6"><label>Blood Group *</label>
                <select name="blood_group" class="form-select" required>
                  <option value="">Select Blood Group</option>
                  @foreach(['A+','A-','B+','B-','O+','O-','AB+','AB-'] as $bg)
                    <option>{{ $bg }}</option>
                  @endforeach
                </select>
              </div>

              <!-- Contact & Photo -->
              <div class="col-md-6"><label>Mobile Number *</label><input type="text" name="mobile" class="form-control" required></div>
              <div class="col-md-6"><label>WhatsApp Number *</label><input type="text" name="whatsapp" class="form-control" required></div>
              <div class="col-md-6"><label>Profile Picture *</label><input type="file" name="photo" accept="image/*" class="form-control" required></div>

              <!-- Job / Business -->
              <div class="col-md-6"><label>Job or Business *</label>
                <select name="job_or_business" class="form-select" required>
                  <option value="">Select</option><option>Job</option><option>Business</option>
                </select>
              </div>
              <div class="col-md-6"><label>Business Name</label><input type="text" name="business_name" class="form-control"></div>
              <div class="col-md-6"><label>Business Location</label><input type="text" name="business_location" class="form-control"></div>
              <div class="col-md-6"><label>Job Type</label>
                <select name="job_type" class="form-select">
                  <option value="">Select Type</option><option>Private</option><option>Government</option>
                </select>
              </div>
              <div class="col-md-6"><label>Designation</label><input type="text" name="designation" class="form-control"></div>
              <div class="col-md-6"><label>Work Place</label><input type="text" name="work_place" class="form-control"></div>

              <!-- Religious Place Dropdowns -->
              @foreach(['Satimata'=>'satimata_place','Bheruji'=>'bheruji_place','Kuldevi'=>'kuldevi_place'] as $label=>$field)
              <div class="col-md-4"><label>{{ $label }} Place *</label>
                <select name="{{ $field }}" class="form-select" required>
                  <option value="">Select</option>
                  <!-- You should replace this with actual dynamic options -->
                  @foreach($religiousList ?? [] as $place)
                    <option>{{ $place }}</option>
                  @endforeach
                </select>
              </div>
              @endforeach

              <div class="col-12 text-center mt-4"><button type="submit" class="btn btn-primary px-5 py-2">Register</button></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Google Maps Places Autocomplete -->
<script
  src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_KEY') }}&libraries=places&callback=initAutocomplete"
  async defer>
</script>
<script>
//   document.getElementById('same_address').addEventListener('change', function(){
//     if(this.checked){
//       document.getElementById('permanent_address').value = document.querySelector('input[name="address"]').value;
//     }
//   });

//   function initAutocomplete(){
//     const opts = { types:['(regions)'], componentRestrictions:{country:'in'} };
//     new google.maps.places.Autocomplete(document.getElementById('district'), opts);
//     new google.maps.places.Autocomplete(document.getElementById('area'), { types:['geocode'], componentRestrictions:{country:'in'} });
//   }
//   window.addEventListener('load', initAutocomplete);

</script>
<script>
  function initAutocomplete() {
    const opts = { types: ['(regions)'], componentRestrictions: { country: 'IN' } };

    const districtInput = document.getElementById('district');
    const areaInput     = document.getElementById('area');

    if (districtInput) {
      const districtAuto = new google.maps.places.Autocomplete(districtInput, opts);
    }
    if (areaInput) {
      const areaAuto = new google.maps.places.Autocomplete(areaInput, { types: ['geocode'], componentRestrictions: { country: 'IN' } });
    }

    // Copy address over when checkbox is checked
    document.getElementById('same_address').addEventListener('change', function () {
      if (this.checked) {
        document.getElementById('permanent_address').value = document.querySelector('input[name="address"]').value;
      }
    });
  }
</script>

@endsection
