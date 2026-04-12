@if(!$relatedcourse->isEmpty())
<div class="more-courses btm-30">
    <h2 class="more-courses-heading">{{ __('frontstaticword.RelatedCourses') }}</h2>
    <div class="row">
        @foreach($relatedcourse as $rel)
        @if($rel->courses->status == 1)
        <div class="col-lg-4 col-sm-6">
            <div class="together-img">
                <div class="student-view-block">
                    <div class="view-block">
                        <div class="view-img">
                            @if($rel->courses['preview_image'] !== NULL &&
                            $rel->courses['preview_image'] !== '')
                            <a
                                href="{{ route('user.course.show',['id' => $rel->course_id, 'slug' => $rel->courses->slug ]) }}"><img
                                    src="{{ asset('images/course/'.$rel->courses->preview_image) }}"
                                    alt="student">
                            </a>
                            @else
                            <a
                                href="{{ route('user.course.show',['id' => $rel->course_id, 'slug' => $rel->courses->slug ]) }}"><img
                                    src="{{ Avatar::create($rel->courses->title)->toBase64() }}"
                                    alt="student">
                            </a>
                            @endif
                        </div>
                        {{-- Add to wishlisht --}}
                        @if (Auth::check())
                        @php
                        $wishtt = App\Wishlist::where('user_id',
                        Auth::User()->id)->where('course_id', $rel->course_id)->first();
                        @endphp
                        @if ($wishtt == NULL)
                        <div class="heart">
                            <form id="demo-form2" method="post"
                                action="{{ url('show/wishlist', $rel->course_id) }}"
                                data-parsley-validate
                                class="form-horizontal form-label-left">
                                {{ csrf_field() }}

                                <input type="hidden" name="user_id"
                                    value="{{Auth::User()->id}}" />
                                <input type="hidden" name="course_id"
                                    value="{{$rel->course_id}}" />

                                <button class="wishlisht-btn heart" title="Add to wishlist"
                                    type="submit"><i
                                        class="fa fa-heart rgt-10"></i></button>
                            </form>
                        </div>
                        @else
                        <div class="heart-two">
                            <form id="demo-form2" method="post"
                                action="{{ url('remove/wishlist', $rel->course_id) }}"
                                data-parsley-validate
                                class="form-horizontal form-label-left">
                                {{ csrf_field() }}

                                <input type="hidden" name="user_id"
                                    value="{{Auth::User()->id}}" />
                                <input type="hidden" name="course_id"
                                    value="{{$rel->course_id}}" />

                                <button class="wishlisht-btn heart"
                                    title="Remove from Wishlist" type="submit"><i
                                        class="fa fa-heart rgt-10"></i></button>
                            </form>
                        </div>
                        @endif
                        @else
                        <div class="heart">
                            <a href="{{ route('login') }}" title="heart"><i
                                    class="fa fa-heart rgt-10"></i></a>
                        </div>
                        @endif
                        {{-- Add to wishlisht end--}}

                        <div class="view-dtl">
                            <div class="view-heading btm-10"><a
                                    href="{{ route('user.course.show',['id' => $rel->course_id, 'slug' => $rel->courses->slug ]) }}">{{ str_limit($rel->courses['title'], $limit = 30, $end = '...') }}</a>
                            </div>
                            <p class="btm-10"><a herf="#">by {{ $rel->user['fname'] }}</a>
                            </p>
                            <div class="rating">
                                <ul>
                                    <li>
                                        <?php
                        $learn = 0;
                        $price = 0;
                        $value = 0;
                        $sub_total = 0;
                        $sub_total = 0;
                        $reviews = App\ReviewRating::where('course_id',$rel->course_id)->where('status','1')->get();
                        ?>
                                        @if(!empty($reviews[0]))
                                        <?php
                        $count =  App\ReviewRating::where('course_id',$rel->course_id)->count();

                        foreach($reviews as $review){
                            $learn = $review->price*5;
                            $price = $review->price*5;
                            $value = $review->value*5;
                            $sub_total = $sub_total + $learn + $price + $value;
                        }

                        $count = ($count*3) * 5;
                        $rat = $sub_total/$count;
                        $ratings_var = ($rat*100)/5;
                        ?>

                                        <div class="pull-left">
                                            <div class="star-ratings-sprite"><span
                                                    style="width:<?php echo $ratings_var; ?>%"
                                                    class="star-ratings-sprite-rating"></span>
                                            </div>
                                        </div>
                                        @else
                                        <div class="pull-left no-rating">
                                            {{ __('frontstaticword.NoRating') }}
                                        </div>
                                        @endif
                                    </li>

                                    <?php
                        $learn = 0;
                        $price = 0;
                        $value = 0;
                        $sub_total = 0;
                        $count =  count($reviews);
                        $onlyrev = array();

                        $reviewcount = App\ReviewRating::where('course_id', $course->id)->where('status',"1")->WhereNotNull('review')->get();

                        foreach($reviews as $review){

                            $learn = $review->learn*5;
                            $price = $review->price*5;
                            $value = $review->value*5;
                            $sub_total = $sub_total + $learn + $price + $value;
                        }

                        $count = ($count*3) * 5;

                        if($count != "")
                        {
                            $rat = $sub_total/$count;

                            $ratings_var = ($rat*100)/5;

                            $overallrating = ($ratings_var/2)/10;
                        }

                        ?>

                                    @php
                                    $reviewsrating = App\ReviewRating::where('course_id',
                                    $rel->course_id)->first();
                                    @endphp
                                    @if(!empty($reviewsrating))
                                    <li>
                                        <b>({{ round($overallrating, 1) }})</b>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                            @if( $rel->courses->type == 1)

                            @if($rel->courses->discount_price == !NULL)
                            <div class="rate text-right">
                                <ul>
                                    <li><a><b><i
                                                    class="{{ $currency['icon'] }}"></i>{{ $rel->courses['discount_price'] }}</b></a>
                                    </li>&nbsp;
                                    <li><a><b><strike><i
                                                        class="{{ $currency['icon'] }}"></i>{{ $rel->courses['price'] }}</strike></b></a>
                                    </li>
                                </ul>
                            </div>
                            @else
                            <div class="rate text-right">
                                <ul>
                                    <li><a><b><i
                                                    class="{{ $currency['icon'] }}"></i>{{ $rel->courses['price'] }}</b></a>
                                    </li>
                                </ul>
                            </div>
                            @endif
                            @else
                            <div class="rate text-right">
                                <ul>
                                    <li><a><b>{{ __('frontstaticword.Free') }}</b></a></li>
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>
@endif
