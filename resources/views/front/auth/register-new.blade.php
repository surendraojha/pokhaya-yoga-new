@extends('front.layouts.main')
@section('content')

    <x-page-banner :image="asset('/uploads/' . $banner->image)" title="Registration" />
    <div class="register-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">

                    {{-- <div class="row d-flex justify-content-center mb-4">
                        <div class="col-sm-3 align-self-center text-center">
                            <h5>Already registered?</h5>
                        </div>
                        <div class="payment-button">
                            <a class="btn btn-primary rounded" href="{{ route('cyber.hosted.pay') }}"
                                style="text-decoration:none;">Pay Here</a>
                        </div>
                    </div> --}}

                    @if ($errors->any())
                        <div class='alert alert-danger'>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (\Session::has('msg'))
                        <div class='alert alert-success'>
                            <p class="mb-0">{{ \Session::get('msg') }}</p>
                        </div>
                    @endif

                    <form action="{{ route('customer.register') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="personal_detail_section">PERSONAL DETAILS</h2>
                            </div>

                            <div class="hp-container" aria-hidden="true" style="display: none">
                                <input type="text" name="website" id="website" tabindex="-1" autocomplete="off">
                                <input type="text" name="secret_field" id="secret_field" tabindex="-1"
                                    autocomplete="off">
                            </div>

                            <div class="col-md-4">
                                <div class="md-form">
                                    <label>Full Name <span>*</span></label>
                                    <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" placeholder="Full Name" required autofocus value="{{ old('fullname') }}">
                                    @error('fullname')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="md-form">
                                    <label>Gender <span>*</span></label>
                                    <select name="gender" class="form-control @error('gender') is-invalid @enderror" required>
                                        <option value="" selected disabled>Choose Gender</option>
                                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="md-form">
                                    <label>Date of Birth <span>*</span></label>
                                    <input type="date" name="dob" class="form-control @error('dob') is-invalid @enderror" required value="{{ old('dob') }}">
                                    @error('dob')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="md-form">
                                    <label>Email <span>*</span></label>
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="md-form">
                                    <label>Confirm Email <span>*</span></label>
                                    <input type="email" name="confirmEmail" id="confemail" class="form-control @error('confirmEmail') is-invalid @enderror" placeholder="Confirm Email" onblur="myFunction()" required>
                                    @error('confirmEmail')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="md-form">
                                    <label>Phone Number <span>*</span></label>
                                    <input type="text" name="phoneNo" class="form-control @error('phoneNo') is-invalid @enderror" placeholder="Phone Number" required maxlength="15" value="{{ old('phoneNo') }}">
                                    @error('phoneNo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="md-form">
                                    <label>Whatsapp Number <span>*</span></label>
                                    <input type="text" name="whatsappNo" class="form-control @error('whatsappNo') is-invalid @enderror" placeholder="Whatsapp Number" required maxlength="15" value="{{ old('whatsappNo') }}">
                                    @error('whatsappNo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="md-form">
                                    <label>Nationality <span>*</span></label>
                                    <input type="text" name="nationality" class="form-control @error('nationality') is-invalid @enderror" placeholder="Nationality" required value="{{ old('nationality') }}">
                                    @error('nationality')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="md-form">
                                    <label>Residence <span>*</span></label>
                                    <input type="text" name="cResidence" class="form-control @error('cResidence') is-invalid @enderror" placeholder="Country of Residence" required value="{{ old('cResidence') }}">
                                    @error('cResidence')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 mt-4">
                                <h2 class="course_detail_section">COURSE DETAILS</h2>
                            </div>

                            <div class="col-md-6">
                                <div class="md-form">
                                    <label>Course <span>*</span></label>
                                    <select name="course" class="form-control @error('course') is-invalid @enderror" required>
                                        <option value="" selected disabled>Name Of Course</option>
                                        <option value="100 Hours Yoga Teacher Training" {{ old('course') == '100 Hours Yoga Teacher Training' ? 'selected' : '' }}>100 Hours Yoga Teacher Training</option>
                                        <option value="200 Hours Yoga Teacher Training" {{ old('course') == '200 Hours Yoga Teacher Training' ? 'selected' : '' }}>200 Hours Yoga Teacher Training</option>
                                        <option value="300 Hours Yoga Teacher Training" {{ old('course') == '300 Hours Yoga Teacher Training' ? 'selected' : '' }}>300 Hours Yoga Teacher Training</option>
                                        <option value="500 Hours Yoga Teacher Training" {{ old('course') == '500 Hours Yoga Teacher Training' ? 'selected' : '' }}>500 Hours Yoga Teacher Training</option>
                                        <option value="Sound Healing Yoga Teacher Training" {{ old('course') == 'Sound Healing Yoga Teacher Training' ? 'selected' : '' }}>Sound Healing Yoga Teacher Training</option>
                                        <option value="Retreat Course" {{ old('course') == 'Retreat Course' ? 'selected' : '' }}>Retreat</option>
                                        <option value="Spanish Training" {{ old('course') == 'Spanish Training' ? 'selected' : '' }}>Spanish Training</option>
                                    </select>
                                    @error('course')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="md-form">
                                    <label>Course Start Date <span>*</span></label>
                                    <input type="date" name="startDate" class="form-control @error('startDate') is-invalid @enderror" required value="{{ old('startDate') }}">
                                    @error('startDate')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="md-form">
                                    <label>Accommodation <span>*</span></label>
                                    <select name="accommodation" class="form-control @error('accommodation') is-invalid @enderror" required>
                                        <option value="" selected disabled>Accommodation Type</option>
                                        <option value="Share Room" {{ old('accommodation') == 'Share Room' ? 'selected' : '' }}>Share Room</option>
                                        <option value="Private Room" {{ old('accommodation') == 'Private Room' ? 'selected' : '' }}>Private Room</option>
                                        <option value="Triple Room" {{ old('accommodation') == 'Triple Room' ? 'selected' : '' }}>Triple Room</option>
                                        <option value="Air condition" {{ old('accommodation') == 'Air condition' ? 'selected' : '' }}>Air condition Rooms (Extra Fee)</option>
                                    </select>
                                    @error('accommodation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="md-form">
                                    <label>Practicing Time <span>*</span></label>
                                    <select name="practiceTime" class="form-control @error('practiceTime') is-invalid @enderror">
                                        <option value="" selected disabled>How long have you been Practicing?</option>
                                        <option value="less than 6 months" {{ old('practiceTime') == 'less than 6 months' ? 'selected' : '' }}>Less than 6 months</option>
                                        <option value="6 monts - 1 year" {{ old('practiceTime') == '6 monts - 1 year' ? 'selected' : '' }}>6 months - 1 year</option>
                                        <option value="2-3 year" {{ old('practiceTime') == '2-3 year' ? 'selected' : '' }}>2-3 year</option>
                                        <option value="3-5 year" {{ old('practiceTime') == '3-5 year' ? 'selected' : '' }}>3-5 year</option>
                                        <option value="5-10 year" {{ old('practiceTime') == '5-10 year' ? 'selected' : '' }}>5-10 year</option>
                                        <option value="10+ year" {{ old('practiceTime') == '10+ year' ? 'selected' : '' }}>10+ year</option>
                                        <option value="Never" {{ old('practiceTime') == 'Never' ? 'selected' : '' }}>Never</option>
                                    </select>
                                    @error('practiceTime')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="md-form">
                                    <label>Tell us about your yoga experience <span>*</span></label>
                                    <textarea name="yogaExperience" class="form-control @error('yogaExperience') is-invalid @enderror" rows="4" placeholder="Yin, Ashtanga, Vinyasa, Hatha, iyengar ..." required>{{ old('yogaExperience') }}</textarea>
                                    @error('yogaExperience')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="md-form">
                                    <label>Purpose of this teacher training course or retreat</label>
                                    <textarea name="purposeOfcourse" class="form-control @error('purposeOfcourse') is-invalid @enderror" rows="4" placeholder="If yes, please give details">{{ old('purposeOfcourse') }}</textarea>
                                    @error('purposeOfcourse')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="md-form">
                                    <label>Any medical conditions / injuries / anything else <span>*</span></label>
                                    <textarea name="medicalCondition" class="form-control @error('medicalCondition') is-invalid @enderror" rows="4" placeholder="Please explain" required>{{ old('medicalCondition') }}</textarea>
                                    @error('medicalCondition')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="md-form">
                                    <label>Special Dietary Requirements?</label>
                                    <textarea name="specialRequirement" class="form-control @error('specialRequirement') is-invalid @enderror" rows="4" placeholder="Please explain">{{ old('specialRequirement') }}</textarea>
                                    @error('specialRequirement')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="md-form">
                                    <label>Emergency Contact (Name, Email, Phone) <span>*</span></label>
                                    <textarea name="EmergencyContact" class="form-control @error('EmergencyContact') is-invalid @enderror" rows="4" placeholder="Please explain" required>{{ old('EmergencyContact') }}</textarea>
                                    @error('EmergencyContact')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="md-form">
                                    <label>Any Comments or Questions</label>
                                    <textarea name="comments" class="form-control @error('comments') is-invalid @enderror" rows="4" placeholder="Please explain">{{ old('comments') }}</textarea>
                                    @error('comments')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 mt-4">
                                <h2 class="section_referral">Referrals</h2>
                            </div>

                            <div class="col-md-6">
                                <div class="md-form">
                                    <label>HOW DID YOU HEAR ABOUT US? <span>*</span></label>
                                    <select name="hearUs" class="form-control @error('hearUs') is-invalid @enderror" required>
                                        <option value="" selected disabled>Please Select</option>
                                        <option value="Word of Month" {{ old('hearUs') == 'Word of Month' ? 'selected' : '' }}>Word of Mouth</option>
                                        <option value="Facebook" {{ old('hearUs') == 'Facebook' ? 'selected' : '' }}>Facebook</option>
                                        <option value="Instagram" {{ old('hearUs') == 'Instagram' ? 'selected' : '' }}>Instagram</option>
                                        <option value="Friend Referral" {{ old('hearUs') == 'Friend Referral' ? 'selected' : '' }}>Friend Referral</option>
                                        <option value="Print Advertising" {{ old('hearUs') == 'Print Advertising' ? 'selected' : '' }}>Print Advertising</option>
                                        <option value="google" {{ old('hearUs') == 'google' ? 'selected' : '' }}>Google</option>
                                        <option value="Other" {{ old('hearUs') == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('hearUs')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="md-form">
                                    <label>If referred by a friend please tell us who?</label>
                                    <input type="text" name="reffered" class="form-control @error('reffered') is-invalid @enderror" placeholder="Name of the person" value="{{ old('reffered') }}">
                                    @error('reffered')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="md-form">
                                    <label>Coupon Code</label>
                                    <input type="text" name="coupon_code" class="form-control @error('coupon_code') is-invalid @enderror" placeholder="Enter Discount Coupon Code" value="{{ old('coupon_code') }}">
                                    @error('coupon_code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">
                                <div class="md-form d-flex align-items-start">
                                    <input type="checkbox" id="termsCondition" name="termsCondition" value="I understand..." class="mt-1 mr-2" required @if(old('termsCondition')) checked @endif>
                                    <label for="termsCondition" class="checked">
                                        I understand that by submitting my application form I agree to the <a href="#">Terms & Conditions</a> of booking set out by Pokhara Yoga School.
                                    </label>
                                </div>
                                @error('termsCondition')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mt-3">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <label class="captcha_h d-flex fz-4 mb-0">
                                            <span id="num1" class="chaptcha_item num1"></span>
                                            <span id="plus" class="chaptcha_item plus mx-1">+</span>
                                            <span id="num2" class="chaptcha_item num2"></span>
                                            <span id="equal" class="chaptcha_item equal mx-1">=</span>
                                        </label>
                                    </div>
                                    <div class="col">
                                        <input type="number" name="captcha_response" placeholder="Captcha Answer" class="form-control @error('captcha_response') is-invalid @enderror" required>
                                        @error('captcha_response')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <input type="text" name="website" placeholder="Enter your website" style="display:none">

                            <div class="col-md-12 mt-4">
                                <div class="md-form">
                                    <button type="submit" class="btn btn-primary btn-lg">Submit <i class="fa fa-paper-plane ml-2"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function myFunction() {
                var email = document.getElementById("email").value;
                var confemail = document.getElementById("confemail").value;
                if (email != "" && confemail != "" && email != confemail) {
                    alert('Email Not Matching!');
                }
            }

            // Simple Captcha Generator (Ensure your backend matches this logic)
            document.addEventListener("DOMContentLoaded", function() {
                var n1 = Math.floor(Math.random() * 10) + 1;
                var n2 = Math.floor(Math.random() * 10) + 1;
                document.getElementById("num1").innerText = n1;
                document.getElementById("num2").innerText = n2;
            });
        </script>
    @endpush
@endsection
