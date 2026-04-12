@if(Auth::check())
                            <div class="report-abuse text-center btm-20">
                                <a href="#" data-toggle="modal" data-target="#myModalCourse" title="report"><i
                                        class="fa fa-flag rgt-10"></i>{{ __('frontstaticword.Report') }}</a>
                            </div>
                            @else
                            <div class="report-abuse text-center btm-20">
                                <a href="{{ route('login') }}" title="report"><i
                                        class="fa fa-flag rgt-10"></i>{{ __('frontstaticword.Report') }}</a>
                            </div>
                            @endif
