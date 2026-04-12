@include('front.includes.header')

<section id="payment-form" class="payment-form" style="margin-top: 170px;">
    <div class="container">

        <div class="row justify-content-center py-5">
            <div class="col-lg-12 text-center">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Continue To Pay</h2>
                <div class="mt-10">
                    <form id="frm-nicasia" action="https://secureacceptance.cybersource.com/pay" method="post">
                        @csrf
                        <div class="mt-6 flex items-center gap-x-6">
                            <a class="btn btn-primary text-sm font-semibold leading-6 text-gray-900" href="{{ route('cyber.hosted.pay') }}">Cancle</a>
                            <button type="submit"
                                class="btn btn-success">Proceed</button>
                        </div>
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <fieldset>
                            @foreach($form_data as $key=>$value)
                                <input type="hidden" name="{{ $key }}" value="{{ $value }}"/>
                                <div class="sm:col-span-2">
                                    <div class="text-sm leading-6">
                                        {{-- <label for="comments" class="font-medium text-gray-900">{{$key}}</label>
                                        <p class="text-gray-500">{{ $value }}</p> --}}
                                    </div>
                                </div>
                            @endforeach
                        </fieldset>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@include('front.includes.footer')
