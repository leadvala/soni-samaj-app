@extends('front.layouts.master')

@section('content')
<section class="contact-page section-padding bg-light">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="card shadow p-4 border-0">
                    <h2 class="mb-3 text-center text-primary" style="color:#F74F22 !important;">Register Member</h2>
                    <p class="text-center text-muted">Fields marked with * are required</p>

                    <!-- <form id="contactForm" action="{{ route('front.store_member') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Your Name *</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Father's Name *</label>
                                <input type="text" name="father_name" class="form-control" placeholder="Enter father's name" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Mother's Name *</label>
                                <input type="text" name="mother_name" class="form-control" placeholder="Enter mother's name" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Gotra *</label>
                                <select name="gotra" class="form-select" required>
                                    <option value="">Select Gotra</option>
                                    <option value="swayam">Swayam</option>
                                    <option value="mata">Mata Ki</option>
                                    <option value="dadi">Dadi</option>
                                    <option value="nani">Nani Ki</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Marital Status *</label>
                                <select name="marital_status" class="form-select" required>
                                    <option value="">Select Marital Status</option>
                                    <option value="single">Single</option>
                                    <option value="committed">Committed</option>
                                    <option value="married">Married</option>
                                    <option value="divorced">Divorced</option>
                                    <option value="widowed">Widowed</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Date of Birth *</label>
                                <input type="date" name="dob" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Current Address *</label>
                                <input type="text" name="address" class="form-control" placeholder="Enter current address" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Permanent Address *</label>
                                <input type="text" name="permanent_address" class="form-control" placeholder="Enter permanent address" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Aadhar Verification (JPG, PNG, PDF) *</label>
                                <input type="file" name="aadhar" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Photo (JPG, PNG) *</label>
                                <input type="file" name="photo" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Qualifications *</label>
                                <input type="text" name="qualifications" class="form-control" placeholder="Enter qualification" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Gender *</label>
                                <select name="gender" class="form-select" required>
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Blood Group *</label>
                                <select name="blood_group" class="form-select" required>
                                    <option value="">Select Blood Group</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">House Type *</label>
                                <div class="d-flex gap-3">
                                    <div class="form-check">
                                        <input type="radio" name="house_type" value="rental" id="rental" class="form-check-input" required>
                                        <label class="form-check-label" for="rental">Rental</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="house_type" value="own" id="own" class="form-check-input" required>
                                        <label class="form-check-label" for="own">Own</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Job or Business Description *</label>
                                <input type="text" name="job_or_business" class="form-control" placeholder="Describe your job or business" required>
                            </div>

                            <div class="col-12 text-center mt-4">
                                <button type="submit" class="btn btn-primary px-5 py-2" style="background-color:#F74F22 !important;">Register</button>
                            </div>
                        </div>
                    </form> -->
                    <form id="contactForm" action="{{ route('front.store_member') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row g-3">

        {{-- Personal Info --}}
        <div class="col-md-6">
            <label class="form-label">Full Name *</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Father's Name *</label>
            <input type="text" name="father_name" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Mother's Name *</label>
            <input type="text" name="mother_name" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Date of Birth *</label>
            <input type="date" name="dob" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Gender *</label>
            <select name="gender" class="form-select" required>
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label">Marital Status *</label>
            <select name="marital_status" class="form-select" required>
                <option value="">Select Status</option>
                <option value="single">Single</option>
                <option value="married">Married</option>
                <option value="divorced">Divorced</option>
            </select>
        </div>

        {{-- Address Info --}}
        <div class="col-md-6">
            <label class="form-label">Current Address *</label>
            <input type="text" name="address" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Permanent Address *</label>
            <input type="text" name="permanent_address" class="form-control" id="permanent_address" required>
            <div class="form-check mt-1">
                <input type="checkbox" class="form-check-input" id="same_address">
                <label class="form-check-label" for="same_address">Same as above</label>
            </div>
        </div>

        {{-- Gotra --}}
        <div class="col-md-6">
            <label class="form-label">Gotra – Self *</label>
            <input type="text" name="gotra_self" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Gotra – Mother *</label>
            <input type="text" name="gotra_mother" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Gotra – Nani *</label>
            <input type="text" name="gotra_nani" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Gotra – Dadi *</label>
            <input type="text" name="gotra_dadi" class="form-control" required>
        </div>

        {{-- Education --}}
        <div class="col-md-6">
            <label class="form-label">Qualification *</label>
            <select name="qualifications" class="form-select" required>
                <option value="">Select Qualification</option>
                <option value="10th">10th</option>
                <option value="12th">12th</option>
                <option value="Graduate">Graduate</option>
                <option value="Post Graduate">Post Graduate</option>
                <option value="Other">Other</option>
            </select>
        </div>

        {{-- Medical --}}
        <div class="col-md-6">
            <label class="form-label">Blood Group *</label>
            <select name="blood_group" class="form-select" required>
                <option value="">Select Blood Group</option>
                <option>A+</option><option>A-</option><option>B+</option><option>B-</option>
                <option>O+</option><option>O-</option><option>AB+</option><option>AB-</option>
            </select>
        </div>

        {{-- Contact --}}
        <div class="col-md-6">
            <label class="form-label">Mobile Number *</label>
            <input type="text" name="mobile" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">WhatsApp Number *</label>
            <input type="text" name="whatsapp" class="form-control" required>
        </div>

        {{-- Upload --}}
        <div class="col-md-6">
            <label class="form-label">Profile Picture *</label>
            <input type="file" name="photo" class="form-control" required>
        </div>

        {{-- Work --}}
        <div class="col-md-6">
            <label class="form-label">Job or Business *</label>
            <select name="job_or_business" class="form-select" required>
                <option value="">Select</option>
                <option value="job">Job</option>
                <option value="business">Business</option>
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label">If Job: Type</label>
            <select name="job_type" class="form-select">
                <option value="">Select Type</option>
                <option value="private">Private</option>
                <option value="government">Government</option>
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label">Designation</label>
            <input type="text" name="designation" class="form-control">
        </div>
        <div class="col-md-6">
            <label class="form-label">Work City</label>
            <input type="text" name="work_city" class="form-control">
        </div>

        {{-- Religious Info --}}
        <div class="col-md-6">
            <label class="form-label">Satimata Place</label>
            <input type="text" name="satimata_place" class="form-control">
        </div>
        <div class="col-md-6">
            <label class="form-label">Bheruji Place</label>
            <input type="text" name="bheruji_place" class="form-control">
        </div>
        <div class="col-md-6">
            <label class="form-label">Kuldevi Place</label>
            <input type="text" name="kuldevi_place" class="form-control">
        </div>

        <div class="col-12 text-center mt-4">
            <button type="submit" class="btn btn-primary px-5 py-2" style="background-color:#F74F22 !important;">Register</button>
        </div>
    </div>
</form>

<script>
document.getElementById('same_address').addEventListener('change', function() {
    if (this.checked) {
        document.getElementById('permanent_address').value = document.querySelector('[name="address"]').value;
    }
});
</script>

                </div> <!-- card -->
            </div>
        </div>
    </div>
</section>
@endsection
