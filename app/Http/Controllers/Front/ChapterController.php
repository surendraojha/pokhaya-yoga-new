<?php

namespace App\Http\Controllers\Front;

use App\Blog;
use App\Course;
use App\CourseChapter;
use App\CourseProgress;

use App\CourseClass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ChapterController extends Controller
{


     public function index(){
         $course = Course::all();
         $chapters = CourseChapter::all();

        return view('front.chapter.index',compact('course','chapters'));

     }


    public function detail($slug,$chapter){

        $course = Course::all();

         $chapters = CourseChapter::select('*');

        //  $information_course

        $information = Course::where('slug',$slug)->first();
      //dd($slug);
        $user_id=auth()->user()->id;

        $course_progress=CourseProgress::where('user_id',$user_id)
            ->where('course_id',$information->id)->first();


        $chapter = CourseChapter::find($chapter);

        $next=CourseChapter::where('id', '>',$chapter->id)->where('course_id',$information->id)->min('id');

        $previous=CourseChapter::where('id', '<',$chapter->id)->where('course_id',$information->id)->max('id');

        //dd($chapter->id);
        //dd($slug);


        $class = CourseClass::where('course_id',$information->id)->pluck('id','id');

        $blogs = Blog::whereIn('class_id',$class)->get();


        $classes = CourseClass::where('course_id',$information->id)->where('coursechapter_id',$chapter->id)->get();

        return view('front.chapter.index',

        compact('information',
            'blogs',
            'chapter',
            'classes',
            'course',
            'chapters',
            'course_progress',
            'next',
            'previous',
            'information',
            'slug'


        )
    );
    }



    public function readPdf($class){
        $information = CourseClass::find($class);

        return view('front.chapter.view-pdf',

            compact('information')
        );
    }

    public function checked(Request $request, $id)
	{
        $request->validate([
            'checked' => 'required',
        ]);

		$progress = CourseProgress::where('course_id','=',$id)
			->where('user_id', Auth::User()->id)->first();

		if(isset($progress))
		{
			CourseProgress::where('course_id', $id)->where('user_id', '=', Auth::user()
                    ->id)
                    ->update(['mark_chapter_id' => $request->checked]);
		}
		else
        {

		   	$chapter = CourseChapter::where('course_id', $id)->get();

		   	$chapter_id = array();

		   	foreach($chapter as $c)
	        {
	           array_push($chapter_id, "$c->id");
	        }

		   	$created_progress = CourseProgress::create([
	            'course_id' => $id,
	            'user_id' => Auth::User()->id,
	            'mark_chapter_id' => $request->checked,
	            'all_chapter_id' => $chapter_id,
	            'created_at'  => \Carbon\Carbon::now()->toDateTimeString(),
	            'updated_at'  => \Carbon\Carbon::now()->toDateTimeString(),
	            ]
	        );
		}


        return back();
	}



}
