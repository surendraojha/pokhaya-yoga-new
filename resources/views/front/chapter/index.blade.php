@extends('theme.master')
{{-- @section('title', "$blog->heading") --}}
@section('content')

@include('admin.message')

<!-- blog-dtl start-->
<section id="blog-dtl" class="blog-dtl-main-block">
 <div class="container">
     <div class="blog-dtl-block-heading text-center btm-20">{{ @$information->title }}</div>

        {{-- chapters --}}

        <div class="blog-dtl-block">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <p class="btm-20">{{ $chapter->chapter_name }}</p>
                    <h3>Chapter Summary</h3>
                    <p>{{ $chapter->summary }}</p>
                    <h3>Objectives</h3>
                    <p>{!! $chapter->objective !!}</p>
                </div>
            </div>
        </div>

        {{-- content --}}

        <div class="blog-dtl-block">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h3>Study Materials</h3>
                    @foreach ($classes as $value)

                    <hr>

                        <p class="btm-20">{{ $value->title }}</p>

                        <p>{!! $value->detail !!}</p>

                        @if($value->image)
                            <p>
                                <strong>Images</strong>
                            </p>
                            <img src="{{ asset('images/class/'.$value->image) }}" alt="">
                        @endif

                        @if($value->zip)
                            <p>
                                <strong>Zip File</strong>
                            </p>

                            <a href="{{ asset('files/zip/'.$value->zip) }}" target="_blank">Download Zip</a>
                        @endif

                        @if($value->pdf)

                            <p>Pdf</p>

                            <a href="{{ route('read.pdf',$value->id) }}" target="_blank">View</a>

                            {{-- <a href="{{ asset('files/pdf/'.$value->pdf) }}" alt="">Download</a> --}}

                        @endif

                        @if($value->video)

                        <a href="{{ route('watchcourseclass',$value->id) }}"
                            title="Course" class="iframe">
                            <i class="fa fa-play-circle">
                                </i>&nbsp;


                                <video src="">
                                    
                                </video>


                            </a>

                        @endif

                        @if($value->audio)

                        <audio controls controlsList="nodownload" type="audio/ogg"

                        src="{{ asset('files/audio/'.$value->audio) }}">
                        </audio>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>




        {{-- Quiz --}}



        {{-- Discussion Forum --}}


        {{-- Assignment --}}


        {{-- Paggination --}}

<!-- Mark As Read -->
    <form action="{{ url('course/checked/'.$information->id )}}" method="post"  >
    {{ csrf_field() }}

    @if(@$course_progress->mark_chapter_id )

    @php
        $mark=$course_progress->mark_chapter_id;
        if(in_array($chapter->id,$mark)){

        }
        else{
            array_push($mark,$chapter->id);

        }

    @endphp

    <input  type="hidden" value="{{ json_encode($mark) }}" name="mark_chapter_id" id="value_r" />
    <input  type="hidden" value="{{ json_encode(@$chapter->id)}}" name="chapter_id" id="value_r" />

    @else
    <input  type="hidden" value="{{ json_encode(@$course_progress->mark_chapter_id) }}" name="mark_chapter_id" id="value_r" />

    <input  type="hidden" value="{{ json_encode(@$chapter->id )}}" name="chapter_id" id="value_r" />

    @endif
    <div class="card-header" id="headingChapter">
        <div class="mb-0">
        <button type="submit" name="check" class="btn btn-link">Mark As Read</button>
    </div>
    </form>




    <!-- next previous -->


<form action="{{ url('course-single/{slug}/{chapter}'.$information->slug)}} " method="get">

    {{ csrf_field() }}

        @if($next)
            <a href="{{ route('course.single.page',[$information->slug,$next ]) }}">Next</a>
        @endif

        @if($previous)
        <a href="{{ route('course.single.page',[$information->slug,$previous ]) }}">previous</a>
        @endif
    </form>




=
    <!-- next previous -->

</div>

</section>



<!-- blog-dtl end-->
@endsection

