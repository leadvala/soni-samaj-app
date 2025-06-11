@extends('front.layouts.master')

@section('content')
<style>
    .form-check-input {
        transform: scale(1.2);
        margin-right: 6px;
    }

    .form-check-label {
        font-weight: 500;
        font-size: 16px;
    }
</style>
    <!--start of contact-page -->
    <section class="contact-page section-padding">
        <div class="container">

            <div class="contact-wrap">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="">
                            @if (session('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif
                            <div class="title">
                                <h2>Register Member</h2>
                                <p>Required fields are marked *</p>
                            </div>
                            <form id="contactForm" action="{{ route('front.store_member') }}" method="POST"
                                class="contact-form" enctype="multipart/form-data">
                                @csrf
                                <!-- Name -->
                                <div class="input-item">
                                    <input id="name" class="fild" type="text" placeholder="Your Name*"
                                        name="name" required>
                                    <label><i class="flaticon-user"></i></label>
                                </div>
                                <!-- Father's Name -->
                                <div class="input-item">
                                    <input id="father_name" name="father_name" class="fild" type="text"
                                        placeholder="Father's Name*" required>
                                    <label><i class="flaticon-user"></i></label>
                                </div>
                                <!-- Mother's Name -->
                                <div class="input-item">
                                    <input id="mother_name" name="mother_name" class="fild" type="text"
                                        placeholder="Mother's Name*" required>
                                    <label><i class="flaticon-user"></i></label>
                                </div>
                                <!-- Gotra -->
                                <div class="input-item">
                                    <select id="gotra" name="gotra" class="fild" required>
                                        <option value="">Select Gotra*</option>
                                        <option value="swayam">Swayam</option>
                                        <option value="mata">Mata Ki</option>
                                        <option value="dadi">Dadi</option>
                                        <option value="nani">Nani Ki</option>
                                    </select>
                                    <label><i class="flaticon-user"></i></label>
                                </div>
                                <!-- Marital Status -->
                                <div class="input-item">
                                    <select id="marital_status" name="marital_status" class="fild" required>
                                        <option value="">Select Marital Status*</option>
                                        <option value="single">Single</option>
                                        <option value="committed">Committed</option>
                                        <option value="married">Married</option>
                                        <option value="divorced">Divorced</option>
                                        <option value="widowed">Widowed</option>
                                    </select>
                                    <label><i class="flaticon-user"></i></label>
                                </div>
                                <!-- Date of Birth -->
                                <div class="input-item">
                                    <input id="dob" name="dob" class="fild" type="date"
                                        placeholder="Date of Birth*" required>
                                    <label><i class="flaticon-calendar"></i></label>
                                </div>
                                <!-- Address -->
                                <div class="input-item">
                                    <input id="address" name="address" class="fild" placeholder="Current Address*"
                                        required></input>
                                    <label><i class="flaticon-user"></i></label>
                                </div>
                                <!-- Permanent Address -->
                                <div class="input-item">
                                    <input id="permanent_address" name="permanent_address" class="fild"
                                        placeholder="Permanent Address*" required></input>
                                    <label><i class="flaticon-user"></i></label>
                                </div>
                                <!-- Aadhar Verification -->
                                <div class="input-item">
                                    <span for="aadhar" class="mb-2">Aadhar Verification*</span>
                                    <input id="aadhar" name="aadhar" class="fild" type="file" required>
                                </div>
                                <!-- Photo -->
                                <div class="input-item">
                                    <span for="photo">Photo*</span>
                                    <input id="photo" name="photo" class="fild" type="file" required>
                                </div>
                                <!-- Qualifications -->
                                <div class="input-item">
                                    <input id="qualifications" class="fild" name="qualifications" type="text"
                                        placeholder="Qualifications*" required>
                                    <label><i class="flaticon-user"></i></label>
                                </div>
                                <!-- Gender -->
                                <div class="input-item">
                                    <select id="gender" class="fild" name="gender" required>
                                        <option value="">Select Gender*</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <label><i class="flaticon-user"></i></label>
                                </div>
                                <!-- Blood Group -->
                                <div class="input-item">
                                    <select id="blood_group" name="blood_group" class="fild" required>
                                        <option value="">Select Blood Group*</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                    </select>
                                    <label><i class="flaticon-user"></i></label>
                                </div>
                                <!-- Rental or Own House -->
                                <!-- <div class="input-item">
                                    <label class="radio-label">
                                        <input type="radio" name="house_type" value="rental" required> Rental
                                    </label>
                                    <label class="radio-label">
                                        <input type="radio" name="house_type" value="own"> Own
                                    </label>
                                </div> -->
                                <!-- Rental or Own House -->
<div class="mb-3">
    <label class="form-label">Do you live in a rental or own house?*</label>
    <div class="row">
        <div class="col-auto">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="house_type" id="rental" value="rental" required>
                <label class="form-check-label" for="rental">Rental</label>
            </div>
        </div>
        <div class="col-auto">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="house_type" id="own" value="own" required>
                <label class="form-check-label" for="own">Own</label>
            </div>
        </div>
    </div>
</div>




                                <!-- Job or Business -->
                                <div class="input-item">
                                    <input id="job_or_business" name="job_or_business" class="fild" type="text"
                                        placeholder="Job/Business Description*" required>
                                    <label><i class="flaticon-user"></i></label>
                                </div>
                                <!-- Submit -->
                                <div class="input-item submitbtn">
                                    <input class="fild" type="submit" value="Register">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end of contact-page -->
@endsection