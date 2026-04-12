@if($coursechapters->isNotEmpty())
<div class="course-content-block btm-30">
    <h3>Course module </h3>
    <div class="faq-block">
        <div class="faq-dtl">
            <div id="accordion" class="second-accordion">
                @foreach($coursechapters as $chapter)
                @if($chapter->status == 1 and $chapter->count() > 0 )

                <div class="card">
                    <div class="card-header" id="headingTwo{{ $chapter->id }}">
                        <div class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse"
                                data-target="#collapseTwo{{ $chapter->id }}"
                                aria-expanded="false" aria-controls="collapseTwo">

                                <div class="row">
                                    <div class="col-lg-8 col-6">
                                        {{ $chapter['chapter_name'] }}
                                    </div>
                                    <div class="col-lg-2 col-6">
                                        <div class="text-right">
                                            @php
                                            $classone =
                                            App\CourseClass::where('coursechapter_id',
                                            $chapter->id)->orderBy('position','ASC')->get();
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

                                    <div class="col-lg-2 col-12">
                                        <div class="chapter-total-time">
                                            @php
                                            echo $classtwo =
                                            App\CourseClass::where('coursechapter_id',
                                            $chapter->id)->sum("duration");
                                            @endphp
                                            min
                                        </div>
                                    </div>
                                </div>

                            </button>
                        </div>

                    </div>
                    <div id="collapseTwo{{ $chapter->id }}"
                        class="collapse {{ $loop->first ? "show" : "" }}"
                        aria-labelledby="headingTwo" data-parent="#accordion">

                        <div class="card-body">
                            <table class="table">
                                <tbody>
                                    @foreach($courseclass as $class)
                                    @if($class->status == 1)
                                    @if($class->coursechapter_id == $chapter->id)
                                    <tr>
                                        <th class="class-icon">
                                            @if($class->type =='video' )
                                            <a href="#" title="Course"><i
                                                    class="fa fa-play-circle"></i></a>
                                            @endif
                                            @if($class->type =='audio' )
                                            <a href="#" title="Course"><i
                                                    class="fas fa-play"></i></a>
                                            @endif
                                            @if($class->type =='image' )
                                            <a href="#" title="Course"><i
                                                    class="fas fa-image"></i></a>
                                            @endif
                                            @if($class->type =='pdf' )
                                            <a href="#" title="Course"><i
                                                    class="fas fa-file-pdf"></i></a>
                                            @endif
                                            @if($class->type =='zip' )
                                            <a href="#" title="Course"><i
                                                    class="far fa-file-archive"></i></a>
                                            @endif
                                        </th>

                                        <td>

                                            <div class="koh-tab-content">
                                                <div class="koh-tab-content-body">
                                                    <div class="koh-faq">
                                                        <div class="koh-faq-question">

                                                            <span class="koh-faq-question-span">
                                                                {{ $class['title'] }} </span>
                                                            @if($class->date_time != NULL)
                                                            <div class="live-class">Live at:
                                                                {{ $class->date_time }}</div>
                                                            @endif
                                                            @if($class->detail != NULL)
                                                            <i class="fa fa-sort-down"
                                                                aria-hidden="true"></i>
                                                            @endif
                                                        </div>
                                                        <div class="koh-faq-answer">
                                                            {!! $class->detail !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            @if($class->preview_url != NULL ||
                                            $class->preview_video
                                            !=
                                            NULL )

                                            <a href="{{ route('lightbox',$class->id) }}"
                                                class="iframe"
                                                style="display: block;">preview</a>

                                            @endif

                                        </td>

                                        <td class="txt-rgt">
                                            @if($class->type =='video')
                                            {{ $class['duration'] }}min
                                            @else
                                            {{ $class['size'] }}mb
                                            @endif
                                        </td>

                                    </tr>
                                    @endif
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
