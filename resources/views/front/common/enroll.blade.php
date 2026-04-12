<div class="des-btn-block">
    <div class="row">
        <div class="col-lg-9">
            @if($c->type == 1)
                @if(Auth::check())
                    @if(Auth::User()->role == "admin")
                        <div class="protip-btn">
                            <a href="{{url('show/coursecontent',$c->id)}}" class="btn btn-secondary" title="course">Go To Course</a>
                        </div>
                    @else
                        @php
                            $order = App\Order::where('user_id', Auth::User()->id)->where('course_id', $c->id)->first();
                        @endphp
                        @if(!empty($order) && $order->status == 1)
                            <div class="protip-btn">
                                <a href="{{url('show/coursecontent',$c->id)}}" class="btn btn-secondary" title="course">{{ __('frontstaticword.GoToCourse') }}</a>
                            </div>
                        @else
                            @php
                                $cart = App\Cart::where('user_id', Auth::User()->id)->where('course_id', $c->id)->first();
                            @endphp
                            @if(!empty($cart))
                                <div class="protip-btn">
                                    <form id="demo-form2" method="post" action="{{ route('remove.item.cart',$cart->id) }}">
                                            {{ csrf_field() }}

                                        <div class="box-footer">
                                         <button type="submit" class="btn btn-primary">{{ __('frontstaticword.RemoveFromCart') }}</button>
                                        </div>
                                    </form>
                                </div>
                            @else
                                <div class="protip-btn">
                                    <form id="demo-form2" method="post" action="{{ route('addtocart',['course_id' => $c->id, 'price' => $c->price, 'discount_price' => $c->discount_price ]) }}"
                                        data-parsley-validate class="form-horizontal form-label-left">
                                            {{ csrf_field() }}

                                        <input type="hidden" name="category_id"  value="{{$c->category->id}}" />

                                        <div class="box-footer">
                                         <button type="submit" class="btn btn-primary">{{ __('frontstaticword.AddToCart') }}</button>
                                        </div>
                                    </form>
                                </div>
                            @endif
                        @endif
                    @endif
                @else
                    <div class="protip-btn">
                        <a href="{{ route('login') }}" class="btn btn-primary">
                            <i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;{{ __('frontstaticword.AddToCart') }}</a>
                    </div>
                @endif
            @else
                 @if(Auth::check())
                    @if(Auth::User()->role == "admin")
                        <div class="protip-btn">
                            <a href="{{url('show/coursecontent',$c->id)}}" class="btn btn-secondary" title="course">{{ __('frontstaticword.GoToCourse') }}</a>
                        </div>
                    @else
                        @php
                            $enroll = App\Order::where('user_id', Auth::User()->id)->where('course_id', $c->id)->first();
                        @endphp
                        @if($enroll == NULL)
                            <div class="protip-btn">
                                <a href="{{url('enroll/show',$c->id)}}" class="btn btn-primary" title="Enroll Now">{{ __('frontstaticword.EnrollNow') }}</a>
                            </div>
                        @else
                            <div class="protip-btn">
                                <a href="{{url('show/coursecontent',$c->id)}}" class="btn btn-secondary" title="Cart">{{ __('frontstaticword.GoToCourse') }}</a>
                            </div>
                        @endif
                    @endif
                @else
                    <div class="protip-btn">
                        <a href="{{ route('login') }}" class="btn btn-primary" title="Enroll Now">{{ __('frontstaticword.EnrollNow') }}</a>
                    </div>
                @endif
            @endif
        </div>
        <div class="col-lg-3">
            <div class="protip-wishlist">
                <ul>
                    @if(Auth::check())
                        @php
                            $wish = App\Wishlist::where('user_id', Auth::User()->id)->where('course_id', $c->id)->first();
                        @endphp
                        @if ($wish == NULL)
                            <li class="protip-wish-btn">
                                <form id="demo-form2" method="post" action="{{ url('show/wishlist', $c->id) }}" data-parsley-validate
                                    class="form-horizontal form-label-left">
                                    {{ csrf_field() }}

                                    <input type="hidden" name="user_id"  value="{{Auth::User()->id}}" />
                                    <input type="hidden" name="course_id"  value="{{$c->id}}" />

                                    <button class="wishlisht-btn" title="Add to wishlist" type="submit"><i class="fa fa-heart rgt-10"></i></button>
                                </form>
                            </li>
                        @else
                            <li class="protip-wish-btn-two">
                                <form id="demo-form2" method="post" action="{{ url('remove/wishlist', $c->id) }}" data-parsley-validate
                                    class="form-horizontal form-label-left">
                                    {{ csrf_field() }}

                                    <input type="hidden" name="user_id"  value="{{Auth::User()->id}}" />
                                    <input type="hidden" name="course_id"  value="{{$c->id}}" />

                                    <button class="wishlisht-btn" title="Remove from Wishlist" type="submit"><i class="fa fa-heart rgt-10"></i></button>
                                </form>
                            </li>
                        @endif
                    @else
                        <li class="protip-wish-btn"><a href="{{ route('login') }}" title="heart"><i class="fa fa-heart rgt-10"></i></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
