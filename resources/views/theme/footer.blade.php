<footer id="footer" class="footer-main-block">
    <div class="container">
        <div class="footer-block">
            <div class="row">
                @php
                    $widgets = App\WidgetSetting::first();
                @endphp
                @if(isset($widgets))

                <div class="col-lg-3 col-md-6">
                    <div class="widget"><b>{{ $widgets->widget_one }}</b></div>
                    <div class="footer-link">
                        <ul>
                            @if($gsetting->instructor_enable == 1)
                                @if(Auth::check())
                                    @if(Auth::User()->role == "user")
                                    <li><a href="#" data-toggle="modal" data-target="#myModalinstructor" title="Become An Instructor">{{ __('frontstaticword.BecomeAnInstructor') }}</a></li>
                                    @endif
                                @else
                                    <li><a href="{{ route('login') }}" title="Become an instructor">{{ __('frontstaticword.BecomeAnInstructor') }}</a></li>
                                @endif
                            @endif
                            <li><a href="{{ route('about.show') }}" title="About">{{ __('frontstaticword.Aboutus') }}</a></li>
                            @if(Auth::check())
                                <li><a href="{{url('user_contact')}}" title="About">{{ __('frontstaticword.Contactus') }}</a></li>
                            @else
                                <li><a href="{{ route('login') }}" title="Contact Us">{{ __('frontstaticword.Contactus') }}</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget"><b>{{ $widgets->widget_two }}</b></div>
                    <div class="footer-link">
                        <ul>
                            <li><a href="{{ route('careers.show') }}" title="Careers">{{ __('frontstaticword.Careers') }}</a></li>
                            <li><a href="{{ route('blog.all') }}" title="Blog">{{ __('frontstaticword.Blog') }}</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget"><b>{{ $widgets->widget_three }}</b></div>
                    <div class="footer-link">
                        <ul>
                            <li><a href="{{ route('help.show') }}" title="Help">{{ __('frontstaticword.Help&Support') }}</a></li>
                            @php
                                $pages = App\Page::get();
                            @endphp

                            @if(isset($pages))
                                @foreach($pages as $page)
                                    @if($page->status == 1)
                                    <li><a href="{{ route('page.show', $page->slug) }}" title="Help">{{ $page->title }}</a></li>
                                    @endif
                                @endforeach
                            @endif


                            {{-- blogs --}}


                        </ul>
                    </div>
                </div>
                @endif

                {{-- Language en --}}
                {{-- <div class="col-lg-3 col-md-6">
                    @php
                        $languages = App\Language::all();
                    @endphp
                    @if(isset($languages) && count($languages) > 0)
                    <div class="footer-dropdown txt-rgt">
                        <a href="#" class="a" data-toggle="dropdown"><i class="fa fa-globe rgt-15"></i>{{Session::has('changed_language') ? ucfirst(Session::get('changed_language')) : ''}}<i class="fa fa-angle-up lft-10"></i></a>


                        <ul class="dropdown-menu">

                            @foreach($languages as $language)
                            <a href="{{ route('languageSwitch', $language->local) }}"><li>{{$language->name}}</li></a>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div> --}}
            </div>
        </div>
    </div>
    <hr>
    <div class="tiny-footer">
        <div class="container">
            <div class="row">

                <div class="col-md-3">

                            @php
                                $logo = App\Setting::first();
                            @endphp


                                    <div class="mb-3">
                                        @if($logo->logo_type == 'L')
                                        <a href="{{ url('/') }}" title="logo">

                                            <img src="{{ asset('images/logo/'.$logo->logo) }}" alt="logo" class="img"  height="60px"></a>
                                    @else()
                                        <a href="{{ url('/') }}"><b>{{ $logo->project_title }}</b></a>
                                    @endif
                                    </div>

                            {{-- </li>

                            <li>{{ $cpy_txt }}</li> --}}
                        <h4>About</h4>

                        <div class="mb-3">
                        </div>
                        <ul>
                            @php
                                $page = \App\Page::all();
                            @endphp

                            <li>
                                <a href="">
                                    News Impact Our leadership
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('our.team') }}">
                                    Our team
                                </a>
                            </li>

                            <li>
                                <a href="">
                                    Our content specialist
                                </a>
                            </li>



                            @foreach ($page as $item)
                                <li>
                                    <a href="{{ route('page.show',$item->slug) }}">
                                        {{ $item->title }}
                                    </a>
                                </li>
                            @endforeach

                {{--
                    Instructor's Guide And Student's Guide
                    --}}

                    @auth()

                        @if(auth()->user()->role =='instructor')
                                <li>
                                    <a href="{{ route('instructor.guide') }}">
                                        Instructor's Guide
                                    </a>
                                </li>
                        @endif


                        @if(auth()->user()->role =='user')



                                <li>
                                    <a href="{{ route('student.guide') }}">
                                        Student's Guide
                                    </a>
                                </li>
                        @endif
                    @endauth



                            {{-- <li><a href="{{url('terms_condition')}}" title="Terms">{{ __('frontstaticword.Terms&Condition') }}</a></li> --}}
                            {{-- <li><a href="{{url('privacy_policy')}}" title="Policy">{{ __('frontstaticword.PrivacyPolicy') }}</a></li> --}}
                        </ul>
                    </div>


                <div class="col-md-3">
                    <div class="mb-6">
                    </div>
                    <div class="">
                        <h4>Our Partners </h4>
                        <ul>
                            <li>
                                <a href="#">Finance Partner</a>
                            </li>

                            <li>
                                <a href="#">Corporate Partner</a>
                            </li>

                            <li>
                                <a href="#">academic Partner</a>
                            </li>



                        </ul>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="">
                        <h4> Careers </h4>
                        <ul>
                            <li>
                                <a href="#">Finance Partner</a>
                            </li>

                            <li>
                                <a href="#">Corporate Partner</a>
                            </li>

                            <li>
                                <a href="#">Academic Partner</a>
                            </li>
                        </ul>
                    </div>
                </div>





                <div class="col-md-3">
                    <div class="">
                        <h4>Blogs</h4>
                        <ul>
                            @php
                                $page = \App\Page::all();
                            @endphp

                            @php
                                $blogs = \App\Blog::whereNull('class_id')->get();

                                // dd($blogs);
                            @endphp

                            @foreach ($blogs as $value)
                                <li><a href="{{ url('detail/blog', $value->id) }}" title="Help">{{ $value->heading }}</a></li> <br>

                            @endforeach

                            {{-- <li><a href="{{url('terms_condition')}}" title="Terms">{{ __('frontstaticword.Terms&Condition') }}</a></li> --}}
                            {{-- <li><a href="{{url('privacy_policy')}}" title="Policy">{{ __('frontstaticword.PrivacyPolicy') }}</a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

@include('instructormodel')
