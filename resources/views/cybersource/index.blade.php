@include('front.includes.header')

<section id="payment-form" class="payment-form" style="margin-top: 170px;">
    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header text-center">{{ __('Please fill the details') }}</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class = 'alert alert-danger'>
                                <ul>
                                    @foreach ($errors->all() as $e)
                                        <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="col-lg-12 ">
                            <div class="row justify-content-center">
                                <form id="frm-nicasia" action="{{ route('cyber.confirm.pay') }}" method="post" class="w-100 d-flex flex-wrap">
                                    @csrf
                                    <input type="hidden" name="access_key" value="{{ @$data['access_key'] }}">
                                    <input type="hidden" name="profile_id" value="{{ @$data['profile_id'] }}">
                                    <input type="hidden" name="transaction_uuid" value="{{ @$data['transaction_uuid'] }}">
                                    <input type="hidden" name="signed_field_names"
                                        value="access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency,payment_method,bill_to_forename,bill_to_surname,bill_to_email,bill_to_phone,bill_to_address_line1,bill_to_address_city,bill_to_address_state,bill_to_address_country,bill_to_address_postal_code">
                                    <input type="hidden" name="unsigned_field_names"
                                        value="card_type,card_number,card_expiry_date">
                                    <input type="hidden" name="signed_date_time" value="{{ @$data['signed_date_time'] }}">
                                    <input type="hidden" name="locale" value="en">
                                    <input type="hidden" name="auth_trans_ref_no" value="1234">
                                    <input type="hidden" name="bill_to_address_line1" value="">
                                    <input type="hidden" name="bill_to_address_city" value="">
                                    <input type="hidden" name="bill_to_address_state" value="">
                                    <input type="hidden" name="bill_to_address_country" value="">
                                    <input type="hidden" name="bill_to_address_postal_code">
                                    <input type="hidden" name="transaction_type" id="transaction_type" value="sale">
                                    <input type="hidden" name="reference_number" id="reference_number" value="{{ @$data['reference_number'] }}">

                                    <div class="form-group col-lg-4 col-md-6">
                                        <label>First name</label>
                                        <div class="mt-2">
                                            <input type="text" name="bill_to_forename" id="bill_to_forename" autocomplete="bill_to_forename" autofocus
                                                value="" required maxlength="30"
                                                class="form-control block w-full rounded-md border-1 py-1.5 text-gray-900 shadow ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-6">
                                        <label>Last name</label>
                                        <div class="mt-2">
                                            <input type="text" name="bill_to_surname" id="bill_to_surname" autocomplete="bill_to_surname" autofocus
                                                value="" required maxlength="30"
                                                class="form-control block w-full rounded-md border-1 py-1.5 text-gray-900 shadow ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-6">
                                        <label>Email</label>
                                        <div class="mt-2">
                                            <input type="email" name="bill_to_email" id="bill_to_email" autocomplete="bill_to_email" autofocus
                                                value="" required
                                                class="form-control block w-full rounded-md border-1 py-1.5 text-gray-900 shadow ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-6">
                                        <label>Phone number</label>
                                        <div class="mt-2">
                                            <input type="text" name="bill_to_phone" id="bill_to_phone" autocomplete="bill_to_phone" autofocus
                                                value="" required minlength="6" maxlength="15"
                                                class="form-control block w-full rounded-md border-1 py-1.5 text-gray-900 shadow ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-6">
                                        <label>Amount</label>
                                        <div class="mt-2">
                                            <input type="text" name="amount" id="amount" autocomplete="amount" autofocus
                                                value="" required
                                                class="form-control block w-full rounded-md border-1 py-1.5 text-gray-900 shadow ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-6">
                                        <label>Currency</label>
                                        <select class="form-select" required name="currency" aria-label="currency">
                                            <option value="" selected>Select Currency</option>
                                            <option value="NPR">NPR</option>
                                            <option value="USD">USD</option>
                                            <option value="INR">INR</option>
                                            <option value="AUD">AUD</option>
                                            <option value="GBP">GBP</option>
                                            <option value="EUR">EUR</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Enter the captch</label>
                                        <div class="row d-flex m-auto align-items-center">
                                            <div class=" col-xs-4 mr-2">
                                            <label for="captcha_h" class="captcha_h d-flex justify-content-between mt-2 fz-4">
                                              <span  id="num1" class="chaptcha_item num1"></span>
                                              <span  id="plus" class="chaptcha_item plus">+</span>
                                              <span  id="num2" class="chaptcha_item num2"></span>
                                              <span  id="equal" class="chaptcha_item equal">=</span>
                                            </label>
                                          </div>
                                          <div class="col-xs-4 ml-2">
                                              <label for="captcha_h" class="captcha_h d-flex justify-content-between mt-2 fz-4">
                                                  <input type="number"  name="captcha_response" placeholder="Captcha Answer" id="captcha_res" value="" class="captcha_res mb-0" required autofocus>
                                              </label>
                                          </div>
                                        </div>
                                      </div>
                                    <input type="hidden" name="payment_method" value="card">
                                    <input type="hidden" name="signature" value="">
                                    <input type="hidden" name="card_type" value="001">
                                    <input type="hidden" name="card_number" value="">
                                    <input type="hidden" name="card_expiry_date" value="">
                                    <div class="col-lg-12 text-center mt-6 flex items-center justify-end gap-x-6">
                                        <a href="{{ url('/') }}"
                                            class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                                        <button type="submit"
                                            class="captchaBtn rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-black shadow hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@include('front.includes.footer')
