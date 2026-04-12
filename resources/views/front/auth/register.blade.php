@section('register')
@endsection
@include('front.includes.header')

<!-- start banner Area -->
<div class="page-banner" style="background-image:url('{{ asset('/uploads/'.$banner->image) }}')">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h1 class="text-uppercase">Register</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ action('Front\FrontController@index') }}">Home</a></li>
                        <li>Register Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End banner Area -->


<div class="contact-message">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="row d-flex justify-content-center mb-4">
                    <div class="col-sm-3 align-self-center text-center">
                        <h5>Already registered ?</h5>
                    </div>
                    <div class="payment-button">
                    <a class="btn  btn-primary rounded" href="{{ route('cyber.hosted.pay')}}" style="text-decoration:none;">Pay Here</a>
                    </div>
                    
                </div>
                
                <h4>REGISTRATION</h4>
                @if ($errors->any())
                    <div class='alert alert-danger'>
                        <ul>
                            @foreach ($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (\Session::has('msg'))
                    <div class='alert alert-success'>
                        <p>{{ \Session::get('msg') }}</p>
                    </div></br>
                    {{-- @elseif(\Session::has('error'))
          <div class = 'alert alert-danger'>
            <p>{{ \Session::get('error') }}</p></div> --}}
                @endif
                <form action="{{ route('customer.register') }}" method="POST"  style="max-width: 1200px;">
                    @csrf
                    <div class="col">
                        <div class="col-12 col-sm-12">
                            <h2 class="personal_detail_section">PERSONAL DETAILS</h2>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="fullname">Full Name</label>
                                    <input type="text" class="form-control" name="fullname" placeholder="Full Name*" required autofocus>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="gender">Gender</label>
                                    <select id="gender" name="gender" class="form-control" required>
                                        <option value="" selected="selected" class="gf_placeholder">Choose Gender*
                                        </option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="dob">Date Of Birth*</label>
                                    <input type="date" class="form-control" name="dob" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="Enter Email*" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="confirmEmail">Confirm Email</label>
                                    <input type="email" class="form-control" name="confirmEmail" id="confemail" onblur="myFunction()"
                                        placeholder="Confirm Email*" required>
                                </div>
                            </div>
                            <div class="form-row">


                                <div class="form-group col-md-6">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" name="phoneNo" class="form-control"
                                        placeholder="Enter Phone Number(Including ISD Code)*" required maxlength="15">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="whatsappNo">Whatsapp Number</label>
                                    <input type="text" class="form-control" name="whatsappNo"
                                        placeholder="Enter Whatsapp Number(Including ISD Code)*" required maxlength="15">
                                </div>
                            </div>
                            <div class="form-row">


                                <div class="form-group col-md-6">
                                    <label for="nationality">Nationality</label>
                                    <input type="text" class="form-control" name="nationality"
                                        placeholder="Nationality*" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cResidence">Residence</label>
                                    <input type="text" class="form-control" name="cResidence"
                                        placeholder="Country of Residence*" required>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col">
                        <h2 class="course_detail_section">COURSE DETAILS</h2>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="course">Course</label>
                                <select id="course" name="course" class="form-control" required>
                                    <option value="" selected="selected" class="gf_placeholder">Name Of Course*
                                    </option>
                                   <option value="100 Hours Yoga Teacher Training">100 Hours Yoga Teacher Training
                                    </option>
                                    <option value="200 Hours Yoga Teacher Training">200 Hours Yoga Teacher Training
                                    </option>
                                    <option value="300 Hours Yoga Teacher Training">300 Hours Yoga Teacher Training
                                    </option>
                                    <option value="500 Hours Yoga Teacher Training">500 Hours Yoga Teacher Training
                                    </option>
                                    <option value="Sound Healing Yoga Teacher Training">Sound Healing Yoga Teacher Training
                                    </option>
                                    <option value="Retreat Course">Retreat
                                    </option>
                                    <option value="Spanish Training">Spanish Training 
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="startDate">Course Start Date</label>
                                <input type="date" class="form-control" name="startDate"
                                    required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="accommodation">Accommodation</label>
                                <select id="accommodation" name="accommodation" class="form-control" required>
                                    <option value="" selected="selected" class="gf_placeholder">Accommodation
                                        Type*</option>
                                    <option value="Share Room">Share Room</option>
                                    <option value="Private Room">Private Room</option>
                                    <option value="Triple Room">Triple Room</option>
                                    <option value="Air condition">Air condition Rooms are available on extra fee
                                    </option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="practiceTime">Practicing Time</label>
                                <select id="practiceTime" name="practiceTime" class="form-control">
                                    <option value="" selected="selected" class="gf_placeholder">How long have
                                        you been Practicing for?</option>
                                    <option value="less than 6 months">Less than 6 monts</option>
                                    <option value="6 monts - 1 year">6 monts - 1 year</option>
                                    <option value="2-3 year">2-3 year</option>
                                    <option value="3-5 year">3-5 year</option>
                                    <option value="5-10 year">5-10 year</option>
                                    <option value="10+ year">10+ year</option>
                                    <option value="Never">Never</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="yogaExperience">Tell us about your yoga experience*</label>
                            <textarea name="yogaExperience" class="textarea small" placeholder="Yin, Ashtanga, Vinyasa, Hatha, iyengar ..."
                                aria-required="true" aria-invalid="false" rows="10" cols="50" required>
                    </textarea>
                        </div>
                        <div class="form-row">
                            <label for="purposeOfcourse">Purpose of this teacher training course or retreat</label>
                            <textarea name="purposeOfcourse" class="textarea small" placeholder="If yes ,please give details"
                                aria-required="true" aria-invalid="false" rows="10" cols="50">
                    </textarea>
                        </div>
                        <div class="form-row">
                            <label for="medicalCondition">Any medical conditions / injuries /anything else you want to
                                share with us*</label>
                            <textarea name="medicalCondition" class="textarea small" placeholder="please explain" aria-required="true"
                                aria-invalid="false" rows="10" cols="50" required>
                    </textarea>
                        </div>
                        <div class="form-row">
                            <label for="specialRequirement">Special Dietary Requirements?</label>
                            <textarea name="specialRequirement" class="textarea small" placeholder="please explain" aria-required="true"
                                aria-invalid="false" rows="10" cols="50">
                    </textarea>
                        </div>
                        <div class="form-row">
                            <label for="EmergencyContact">Name, email and phone number to contact in case of
                                emergency*</label>
                            <textarea name="EmergencyContact" class="textarea small" placeholder="please explain" aria-required="true"
                                aria-invalid="false" rows="10" cols="50" required>
                    </textarea>
                        </div>
                        <div class="form-row">
                            <label for="comments">Any Comments or Questions</label>
                            <textarea name="comments" class="textarea small" placeholder="please explain" aria-required="true"
                                aria-invalid="false" rows="10" cols="50">
                    </textarea>
                        </div>
                    </div>
                    <div class="col">
                        <h2 class="section_referral">REFERRALS</h2>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="hearUs">HOW DID YOU HEAR ABOUT US?*</label>
                                <select id="hearUs" name="hearUs" class="form-control" required>
                                    <option value="" selected="selected" class="gf_placeholder">Please Select
                                    </option>
                                    <option value="Word of Month">Word of Month</option>
                                    </option>
                                    <option value="Facebook">Facebook</option>
                                    <option value="Instagram">Instagram</option>
                                    <option value="Friend Referral">Friend Referral</option>
                                    <option value="Print Advertising">Print Advertising</option>
                                    <option value="google">Google</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="reffered">If referred by a friend please tell us who?</label>
                                <input type="text" class="form-control" name="reffered"
                                    placeholder="Name of the person you were referred by if Any">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <h2 class="section_coupon">Coupon Code</h2>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="coupon_code" placeholder="Enter Discount Coupon Code">
                        </div>
                    </div>

                    <div class="col">
                        <h2 class="section_terms_condition">TERMS & CONDITIONS</h2>
                        <input type="checkbox" name="termsCondition" class="terms_condition_check"
                            value="I understand that by submitting my application form I agree to the Terms &amp; Conditions of booking set out by Pokhara Yoga School."
                            style="float:left; width:27px;" required>
                        <label class="gfield_consent_label" for="input_5_41_1">I understand that by submitting my
                            application form I agree to the Terms &amp; Conditions of booking set out by Pokhara Yoga
                            School.</label>
                        <a href="#">Terms &amp; Condition</a>
                    </div>
                    <div class="col-md-6 md-form"> 
                                  <div class="row d-flex m-auto align-items-center  pt-2">
                                    <div class="col-md-3 col-xs-4 w-auto">
                                      <label for="captcha_h" class="captcha_h d-flex justify-content-between fz-4">                        
                                        <span  id="num1" class="chaptcha_item num1"></span>
                                        <span  id="plus" class="chaptcha_item plus">+</span>
                                        <span  id="num2" class="chaptcha_item num2"></span>
                                        <span  id="equal" class="chaptcha_item equal">=</span>
                                      </label>
                                    </div>
                                    <div class="col-md-7 col-xs-8 w-auto">
                                        <label for="captcha_h" class="captcha_h d-flex justify-content-between fz-4">
                                            <input type="number"  name="captcha_response" placeholder="Captcha Answer" id="captcha_res" value="" class="captcha_res m-0" required>
                                        </label>
                                    </div>
                                  </div>
                                </div>
                                
                                <!--Prevent honeybot-->
                        <input type="text"  name="website" placeholder="Enter your website" style="display:none">

                                   
                                  </div>
                                </div>
                    <!--<div class="col-12 d-flex  p-2">-->
                    <!--    <div class="g-recaptcha"  data-sitekey="{{config('google_captcha.site_key')}}"></div>-->
                    <!--    </div>-->
                    <input type="submit" value="Submit"
                        class="btn btn-success send-btn text-white pt-2 pb-3 text-uppercasecaptchaBtn "
                        style="font-size: 20px; width:auto;">

            </div>
        </div>

    </div>
</div>
</form>
</div>
</div>
</div>
</div>

<script>
    function myFunction() {
        var email = document.getElementById("email").value;
        console.log(email);
        var confemail = document.getElementById("confemail").value;
        if(email != confemail) {
            alert('Email Not Matching !');
        }
    }
</script>

@include('front.includes.footer')
