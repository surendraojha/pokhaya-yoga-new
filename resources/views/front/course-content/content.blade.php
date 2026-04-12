<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="profile-block">
                         <form method="post" action="{{ action('CourseProgressController@checked', $course->id) }}"
                            data-parsley-validate class="form-horizontal form-label-left">
                            {{ csrf_field() }}

                            {{-- <div id="ck-button">
                                <label>
                                    <input type="checkbox" name="select-all" class="hidden"
                                        id="select-all" /><span>Select All</span>
                                </label>
                            </div> --}}

                            <div id="accordion" class="second-accordion">
                                <?php $i=0;?>                                        

                                @foreach($coursechapters as $coursechapter )

                                <?php $i++;?>

                                <div class="card btm-10">
                                    <div class="card-header" id="headingChapter{{ $coursechapter->id }}">
                                        <div class="mb-0">
                                            <button type="button" class="btn btn-link" data-toggle="collapse"
                                                data-target="#collapseChapter{{ $coursechapter->id }}"
                                                aria-expanded="true" aria-controls="collapseChapter">
                                                <div class="course-check-table">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                {{-- <td width="10px">
                                                                    <div class="form-check">
                                                                        <input
                                                                            class="form-check-input filled-in material-checkbox-input"
                                                                            type="checkbox" name="checked[]"
                                                                            value="{{$coursechapter->id}}"
                                                                id="checkbox{{$coursechapter->id}}"
                                                                {{ isset($progress->mark_chapter_id) && in_array($coursechapter->id, $progress->mark_chapter_id) ? "checked" : "" }}>
                                                                <label class="form-check-label" for="invalidCheck">
                                                                </label>
                                                </div>
                                                </td> --}}


                                                <td>
                                                    
                                                    <div class="row">
                                                        <div class="col-lg-6 col-6">
                                                            <div class="section">
                                                                {{ __('frontstaticword.Section') }}:
                                                                <?php echo $i;?></div>
                                                        </div>
                                                        <div class="col-lg-6 col-6">
                                                            <div class="section-dividation text-right">
                                                                @php
                                                                $classone =
                                                                App\CourseClass::where('coursechapter_id',
                                                                $coursechapter->id)->get();
                                                                if(count($classone)>0){

                                                                echo count($classone);
                                                                }
                                                                else{

                                                                echo "0";
                                                                }
                                                                @endphp
                                                                {{ __('frontstaticword.Classes') }}

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-10 col-8">

                                                            <div class="profile-heading">
                                                                {{ $coursechapter->chapter_name }}
                                                            </div>

                                                        </div>
                                                        <div class="col-lg-2 col-4">
                                                            <div class="text-right">
                                                                @php
                                                                echo $classtwo =
                                                                App\CourseClass::where('coursechapter_id',
                                                                $coursechapter->id)->sum("duration");
                                                                @endphp
                                                                min

                                                                @if($coursechapter->file != NULL)
                                                                <a href="{{ asset('files/material/'.$coursechapter->file) }}"
                                                                    download="{{$coursechapter->file}}"
                                                                    title="Learning Material"><i
                                                                        class="fa fa-download"></i></a>
                                                                @endif
                                                            </div>

                                                        </div>
                                                    </div>




                                                    {{-- continue --}}

                                                    <div class="row">
                                                        <div class="col-lg-10 col-8">
                                                        </div>
                                                        <div class="col-lg-2 col-4">
                                                            <div class="text-right">
                                                            </div>

                                                        </div>
                                                    </div>
                                                </td>
                                                </tr>
                                                </tbody>
                                                </table>
                                        </div>
                                        </button>
                                    </div>
                                </div>

                                <div id="collapseChapter{{ $coursechapter->id }}" class="collapse"
                                    aria-labelledby="headingChapter" data-parent="#accordion">

                                    @php
                                    // $user_id = auth()->user()->id;

                                    // $unlocked_class =
                                    // \Modules\UnlockClass\Entities\UnlockClass::where('user_id',$user_id)
                                    // ->get();





                                    $classes = App\CourseClass::select('*')
                                    ->where('coursechapter_id', $coursechapter->id)
                                    ->orderBy('position','ASC')
                                    ->get();



                                    $mytime = Carbon\Carbon::now();
                                    @endphp
                                    @foreach($classes as $class)
                                    @if($class->status == 1)
                                    <div class="card-body">
                                        <table class="table">
                                            <tbody>
                                                <tr>

                                                    <td class="class-type">
                                                        @if($class->type =='video' && $class->video )
                                                        <a href="{{ route('watchcourseclass',$class->id) }}"
                                                            title="Course" class="@if($z == 0)iframe @endif"><i
                                                                class="fa fa-play-circle"></i>&nbsp;{{ __('frontstaticword.class') }}</a>

                                                        @endif

                                                        @if($class->type =='video' && $class->aws_upload )
                                                        <a href="{{ route('watchcourseclass',$class->id) }}"
                                                            title="Course" class="@if($z == 0)iframe @endif"><i
                                                                class="fa fa-play-circle"></i>&nbsp;{{ __('frontstaticword.class') }}</a>

                                                        @endif



                                                        @php
                                                        $url = Crypt::encrypt($class->iframe_url);
                                                        @endphp
                                                        @if($class->type =='video' && $class->iframe_url )
                                                        <a href="{{ route('watchinframe',[$url, 'course_id' => $course->id]) }}"
                                                            title="Course"><i
                                                                class="fa fa-play-circle"></i>&nbsp;{{ __('frontstaticword.class') }}</a>
                                                        @endif



                                                        @if($class->type =='audio' && $class->audio)
                                                        <a href="{{ route('audiocourseclass',$class->id) }}"
                                                            title="class" class="@if($z == 0)iframe @endif"><i
                                                                class="fa fa-play-circle"></i>&nbsp;{{ __('frontstaticword.class') }}</a>
                                                        @endif
                                                        @if($class->type =='image' && $class->image )
                                                        <a href="{{ asset('images/class/'.$class->image) }}"
                                                            download="{{$class->image}}" title="Course"><i
                                                                class="fas fa-image"></i>&nbsp;{{ __('frontstaticword.save') }}</a>
                                                        @endif
                                                        @if($class->type =='pdf' && $class->pdf )
                                                        <a href="{{route('downloadPdf',$class->id)}}" title="Course"><i
                                                                class="fas fa-file-pdf"></i>&nbsp;{{ __('frontstaticword.save') }}</a>
                                                        @endif
                                                        @if($class->type =='zip' && $class->zip )
                                                        <a href="{{ asset('files/zip/'.$class->zip) }}"
                                                            download="{{$class->zip}}" title="Course"><i
                                                                class="far fa-file-archive"></i>&nbsp;{{ __('frontstaticword.save') }}</a>
                                                        @endif
                                                        @if($class->url)
                                                        @if($class->type =='video')
                                                        @if($mytime >= $class->date_time)
                                                        <a href="{{ route('watchcourseclass',$class->id) }}"
                                                            title="Course" class="@if($z == 0)iframe @endif">
                                                            <i class="fa fa-play-circle">
                                                                </i>&nbsp;{{ __('frontstaticword.class') }}</a>
                                                        @else
                                                        <a href="" title="Course"><i
                                                                class="fa fa-play-circle"></i>&nbsp;
                                                                {{ __('frontstaticword.class') }}</a>
                                                        @endif
                                                        @endif
                                                        @if($class->type =='image')
                                                        <a href="{{ $class->url }}" title="Course"><i
                                                                class="fas fa-image"></i>&nbsp;{{ __('frontstaticword.link') }}</a>
                                                        @endif
                                                        @if($class->type =='pdf')
                                                        <a href="{{ $class->url }}" title="Course"><i
                                                                class="fas fa-file-pdf"></i>&nbsp;{{ __('frontstaticword.link') }}</a>
                                                        @endif
                                                        @if($class->type =='zip')
                                                        <a href="{{ $class->url }}" title="Course"><i
                                                                class="far fa-file-archive">&nbsp;{{ __('frontstaticword.link') }}</i></a>
                                                        @endif
                                                        @if($class->type =='audio')
                                                        <a href="{{ route('audiocourseclass',$class->id) }}"
                                                            title="Course" class="@if($z == 0)iframe @endif"><i
                                                                class="fa fa-play-circle">&nbsp;{{ __('frontstaticword.class') }}</i></a>
                                                        @endif
                                                        @endif
                                                    </td>

                                                    <td class="class-name">
                                                        <a href="#" title="Course">{{ $class->title }}</a>&nbsp;
                                                        @if($class->date_time != NULL)
                                                        <div class="live-class">Live at: {{ $class->date_time }}
                                                        </div>
                                                        @endif
                                                    </td>

                                                    <td class="class-size txt-rgt">
                                                        @if($class->type =='video' || $class->type =='audio')
                                                        {{ $class->duration }} Min
                                                        @endif
                                                        @if($class->type =='image' || $class->type =='pdf' ||
                                                        $class->type =='zip' )
                                                        {{ $class->size }} Mb
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <a href="{{ route('course.single.page',[$course->slug,$coursechapter->id]) }}">Continue To Course</a>

                                    </div>
                                    @endif

                                    check if there is a quiz available or not                                     @php
                                    $quiz_topic = \App\QuizTopic::where('class_id',$class->id)->first();
                                    @endphp

                                    @if($quiz_topic)
                                    <a href="{{ url('start_quiz',$quiz_topic->id) }}">Start Quiz</a>
                                    @endif
                                    @endforeach
                                </div>
                            </div>



                            {{-- @if($unlocked_class->isEmpty())
                                    @break
                                @endif --}}

                            @endforeach
                    
                    
                    
                        </div>




                    {{-- <div class="mark-read-button">
                        <button type="submit" class="btn btn-md btn-primary">
                            Mark as Complete
                        </button>
                    </div> --}}

                    {{-- questions --}}

                    {{-- <p>Load questions</p> --}}
                    </form>
                </div>

