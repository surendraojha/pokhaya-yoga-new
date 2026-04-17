@extends('front.layouts.main')

@section('content')
    <!-- PAGE BANNER (exactly as in payment.html) -->
    <div class="page-banner">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="strokeme">
                            <h1>Payment</h1>
                            <ul class="breadcrumb">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li>Payment</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- REGISTRATION / PAYMENT FORM SECTION -->
    <div class="register-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    {{-- Display validation errors if any --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form id="frm-nicasia" action="{{ route('cyber.confirm.pay') }}" method="POST">
                        @csrf

                        {{-- HIDDEN FIELDS (required for payment gateway) --}}
                        <input type="hidden" name="access_key" value="{{ @$data['access_key'] }}">
                        <input type="hidden" name="profile_id" value="{{ @$data['profile_id'] }}">
                        <input type="hidden" name="transaction_uuid" value="{{ @$data['transaction_uuid'] }}">
                        <input type="hidden" name="signed_field_names"
                               value="access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency,payment_method,bill_to_forename,bill_to_surname,bill_to_email,bill_to_phone,bill_to_address_line1,bill_to_address_city,bill_to_address_state,bill_to_address_country,bill_to_address_postal_code">
                        <input type="hidden" name="unsigned_field_names" value="card_type,card_number,card_expiry_date">
                        <input type="hidden" name="signed_date_time" value="{{ @$data['signed_date_time'] }}">
                        <input type="hidden" name="locale" value="en">
                        <input type="hidden" name="auth_trans_ref_no" value="1234">
                        <input type="hidden" name="bill_to_address_line1" value="">
                        <input type="hidden" name="bill_to_address_city" value="">
                        <input type="hidden" name="bill_to_address_state" value="">
                        <input type="hidden" name="bill_to_address_country" value="">
                        <input type="hidden" name="bill_to_address_postal_code" value="">
                        <input type="hidden" name="transaction_type" id="transaction_type" value="sale">
                        <input type="hidden" name="reference_number" id="reference_number"
                               value="{{ @$data['reference_number'] }}">
                        <input type="hidden" name="payment_method" value="card">
                        <input type="hidden" name="signature" value="">
                        <input type="hidden" name="card_type" value="001">
                        <input type="hidden" name="card_number" value="">
                        <input type="hidden" name="card_expiry_date" value="">

                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <h2>Please fill the details</h2>
                            </div>

                            {{-- First Name --}}
                            <div class="col-md-6">
                                <div class="md-form">
                                    <label>First Name <span>*</span></label>
                                    <input type="text" name="bill_to_forename" class="form-control"
                                           placeholder="First Name" value="{{ old('bill_to_forename') }}" required>
                                </div>
                            </div>

                            {{-- Last Name --}}
                            <div class="col-md-6">
                                <div class="md-form">
                                    <label>Last Name <span>*</span></label>
                                    <input type="text" name="bill_to_surname" class="form-control"
                                           placeholder="Last Name" value="{{ old('bill_to_surname') }}" required>
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="col-md-6">
                                <div class="md-form">
                                    <label>Email <span>*</span></label>
                                    <input type="email" name="bill_to_email" class="form-control"
                                           placeholder="Email" value="{{ old('bill_to_email') }}" required>
                                </div>
                            </div>

                            {{-- Phone Number --}}
                            <div class="col-md-6">
                                <div class="md-form">
                                    <label>Phone Number <span>*</span></label>
                                    <input type="text" name="bill_to_phone" class="form-control"
                                           placeholder="Phone Number" value="{{ old('bill_to_phone') }}" required>
                                </div>
                            </div>

                            {{-- Amount --}}
                            <div class="col-md-6">
                                <div class="md-form">
                                    <label>Amount <span>*</span></label>
                                    <input type="number" name="amount" class="form-control"
                                           placeholder="00.00" value="{{ old('amount') }}" step="any" required>
                                </div>
                            </div>

                            {{-- Currency --}}
                            <div class="col-md-6">
                                <div class="md-form">
                                    <label>Currency <span>*</span></label>
                                    <select name="currency" class="form-select" required>
                                        <option value="">Select Currency</option>
                                        <option value="NPR" {{ old('currency') == 'NPR' ? 'selected' : '' }}>NPR</option>
                                        <option value="USD" {{ old('currency') == 'USD' ? 'selected' : '' }}>USD</option>
                                        <option value="INR" {{ old('currency') == 'INR' ? 'selected' : '' }}>INR</option>
                                        <option value="AUD" {{ old('currency') == 'AUD' ? 'selected' : '' }}>AUD</option>
                                        <option value="GBP" {{ old('currency') == 'GBP' ? 'selected' : '' }}>GBP</option>
                                        <option value="EUR" {{ old('currency') == 'EUR' ? 'selected' : '' }}>EUR</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Submit Button --}}
                            <div class="col-md-12">
                                <div class="md-form">
                                    <button type="submit" class="btn btn-primary">
                                        Submit <i class="fa fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection