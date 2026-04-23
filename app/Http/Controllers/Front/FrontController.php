<?php

namespace App\Http\Controllers\Front;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\AboutUs;
use App\Models\AccommodationAndFood;
use App\Models\AllPage;
use App\Models\Announcement;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\BlogUsers;
use App\Models\Booking;
use App\Models\BookRoom;
use App\Models\CommunitySupport;
use App\Models\ContactUs;
use App\Models\Course;
use App\Models\Curriculam;
use App\Models\CurriculamCategory;
use App\Models\Customer;
use App\Models\Faq;
use App\Models\Feature;
use App\Models\FeeCategory;
use app\Models\FeeList;
use App\Models\Notice;
use App\Models\Offer;
use App\Models\OurTeam;
use App\Models\PhotoList;
use App\Models\Question;
use App\Models\Quote;
use App\Models\ReferSetting;
use App\Models\Retreats;
use App\Models\Room;
use App\Models\Schedule;
use App\Models\SeoMeta;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\VideoTestimonial;
use App\Models\Welcome;
use App\Models\WhyChooseUs;
use App\Models\WhyComeToPokhara;
use App\Models\YogaClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        $minutes = 10;
        // $data = Cache::remember('index_data', $minutes, function () {
        //     return [
        //         'sliders'        => Slider::all(),
        //         'aboutUs'        => AboutUs::first(),
        //         'testimonials'   => Testimonial::latest()->take(3)->get(),
        //         'videoTestimonials' => VideoTestimonial::latest()->take(3)->get(), // ADD THIS
        //         'photoList'      => PhotoList::latest()->take(8)->get(),
        //         'trainings'      => Course::latest()->get(),
        //         'teachers'       => OurTeam::orderBy('order', 'asc')->take(3)->get(),
        //         'popularCourses' => YogaClass::latest()->take(3)->get(),
        //         'blogs'          => Blog::latest()->take(3)->get(),
        //         'whyChooseUs'    => WhyChooseUs::first(),
        //         'features'       => Feature::orderBy('order', 'asc')->get(),
        //         'feeCategory'    => FeeCategory::orderBy('created_at', 'asc')->with('feeList')->get(),
        //         'seoMeta'        => SeoMeta::where('name', 'index')->first(),
        //         'announcements'  => Announcement::orderBy('id', 'desc')->get(),
        //         'faqs'           => Faq::where('page_slug', 'index')->get(),
        //     ];
        // });

        $data = [
            'sliders' => Slider::all(),
            'welcome' => Welcome::first(),
            'aboutUs' => AboutUs::first(),
            'testimonials' => Testimonial::latest()->take(3)->get(),
            'videoTestimonials' => VideoTestimonial::latest()->take(3)->get(), // ADD THIS
            'photoList' => PhotoList::latest()->take(8)->get(),
            'trainings' => Course::latest()->get(),
            'teachers' => OurTeam::orderBy('order', 'asc')->take(3)->get(),
            'popularCourses' => YogaClass::latest()->take(3)->get(),
            'blogs' => Blog::latest()->take(3)->get(),
            'whyChooseUs' => WhyChooseUs::first(),
            'features' => Feature::orderBy('order', 'asc')->get(),
            'feeCategory' => FeeCategory::orderBy('created_at', 'asc')->with('feeList')->get(),
            'seoMeta' => SeoMeta::where('name', 'index')->first(),
            'announcements' => Announcement::orderBy('id', 'desc')->get(),
            'faqs' => Faq::where('page_slug', 'index')->get(),
            'quotes' => Quote::all(),
            'offers' => Offer::where('is_active', true)->get(),
            'communitySupport' => CommunitySupport::first(),
            'whyComeToPokhara' => WhyComeToPokhara::first(),
            'accommodationAndFoods' => AccommodationAndFood::active()->get(),
            'question' => Question::first(),
        ];

        return view('front.index', $data);
    }

    public function loadGallery()
    {

        $photoList = PhotoList::latest()->limit(8)->get();

        $notLazyLoad = true;

        $view = view('front.ajax-rendering.gallery', compact('photoList', 'notLazyLoad'));

        return $view;
        // return $view;
    }

    public function aboutUs()
    {
        $aboutUs = AboutUs::all();
        $faqs = Faq::where('page_slug', 'faq')->limit(5)->get();

        $seoMeta = SeoMeta::where('name', 'about-us')->first();
        $photoList = PhotoList::latest()->limit(8)->get();
        $testimonials = Testimonial::limit(4)->get(); // 9 per page = 3 rows of 3
        $videoTestimonials = VideoTestimonial::limit(4)->get();

        return view('front.about-us-new', compact('aboutUs', 'faqs', 'seoMeta', 'photoList', 'testimonials', 'videoTestimonials'));

        return view('front.about-us', compact('aboutUs', 'ourTeam', 'seoMeta'));
    }

    // public function ourTeam(){
    // 	$categories = TeamCategory::all();
    //  	return view('front.our-team', compact('categories'));

    // }

    public function ourTeam()
    {
        $lists = OurTeam::orderBy('order', 'asc')->get();

        return view('front.our-team-list', compact('lists'));
    }

    public function popularCourse()
    {
        $popularCourses = YogaClass::all();
        $seoMeta = SeoMeta::where('name', 'popular-courses')->first();
        $banner = Banner::where('title', 'popular-courses')->first();

        return view('front.courses', compact('popularCourses', 'seoMeta', 'banner'));
    }

    public function testimonial()
    {
        $seoMeta = SeoMeta::where('name', 'testimonials')->first();
        // $testimonials = Testimonial::all();
        $testimonials = Testimonial::paginate(9); // 9 per page = 3 rows of 3

        $banner = Banner::where('title', 'testimonial-banner')->first();

        return view('front.testimonial-new', compact('testimonials', 'banner', 'seoMeta'));

        return view('front.testimonial-all', compact('testimonials', 'banner', 'seoMeta'));
    }

    public function videoTestimonial()
    {
        $seoMeta = SeoMeta::where('name', 'video-testimonials')->first();
        $videoTestimonials = VideoTestimonial::paginate(15);
        $banner = Banner::where('title', 'video-testimonial-banner')->first();

        return view('front.video-testimonial-new', compact('videoTestimonials', 'banner', 'seoMeta'));

        return view('front.video-testimonial-all', compact('videoTestimonials', 'banner', 'seoMeta'));
    }

    public function videoTestimonialDetail($title)
    {

        $videoTestimonial = VideoTestimonial::where('title', $title)->first();

        return view('front.video-testimonial-detail-new', compact('videoTestimonial'));

        return view('front.video-testimonial-detail', compact('videoTestimonial'));
    }

    public function photoList()
    {
        $seoMeta = SeoMeta::where('name', 'gallery')->first();
        $photoList = PhotoList::orderBy('created_at', 'desc')->get();

        return view('front.photo-list-new', compact('photoList', 'seoMeta'));

        return view('front.photo-list', compact('photoList', 'seoMeta'));
    }

    public function thankYou()
    {

        return view('front.thankyou');
    }

    public function roomList()
    {
        $informations = Room::where('is_active', true)->paginate(9);
        $banner = Banner::where('title', 'room-banner')->first();

        return view('front.room-list', compact('informations', 'banner'));
    }

    public function roomDetail($id)
    {
        $room = Room::find($id);
        $banner = Banner::where('title', 'room-banner')->first();

        return view('front.room-details', compact('room', 'banner'));
    }

    public function room()
    {
        return view('front.room');
    }

    public function contactUs()
    {
        $seoMeta = SeoMeta::where('name', 'contact-us')->first();

        $setting = Setting::first();
        $aboutUs = AboutUs::first();
        $banner = Banner::where('title', 'contact-banner')->first();

        return view('front.contact-us-new', compact('setting', 'aboutUs', 'seoMeta', 'banner'));

        return view('front.contact-us', compact('setting', 'aboutUs', 'seoMeta', 'banner'));
    }

    public function contactUsPost(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'number' => 'required',
            'subject' => 'required',
            'message' => 'required',
            // 			'g-recaptcha-response'=>'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $formData = [
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'subject' => $request->subject,
            'message' => $request->message,
        ];
        // AI Spam Detection
        // if (Helper::isSpamByAI($formData)) {
        //     return redirect()->back()
        //         ->withInput()
        //         ->withErrors(['message' => 'Your message appears to be spam and was not sent.']);
        // }

        if (env('APP_ENV') == 'production') {
            $isSpam = Helper::isSpamSubmission(
                $request,
                ['message', 'subject'], // freeTextFields:
                ['number'], //    phoneFields:
                'name', // nameField:
                'email' // emailField:
            );
            // spam detection manually
            if ($isSpam) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['message' => 'Your message appears to be spam and was not sent.']);
            }
        }

        $information = new ContactUs;
        $information->name = $request->name;
        $information->email = $request->email;
        $information->number = $request->number;
        $information->subject = $request->subject;
        $information->message = $request->message;

        $information->save();

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'subject' => $request->subject,
            'message' => $request->message,

        ];
        $email = 'info@pokharayogaschoolandretreatcenter.com';

        Mail::to($email)->send(new SendMail($data));

        return redirect()->route('thankyou');

        // return redirect()->back()->with('msg', 'Thank you For your messaging us , we will contact you as soon as possible');
    }

    // this is check book
    public function checkBook(Request $request)
    {
        $request->session()->put('check_in', $request->input('check_in'));
        $checkIn = $request->session()->get('check_in');
        $request->session()->put('check_out', $request->input('check_out'));
        $checkOut = $request->session()->get('check_out');
        $request->session()->put('children', $request->input('children'));
        $children = $request->session()->get('children');
        $request->session()->put('room', $request->input('room'));
        $room = $request->session()->get('room');

        return view('front.get-book', compact('checkIn', 'checkOut', 'children', 'room'));
    }

    public function postBook(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'number' => 'required',
            'room' => 'required',
            'room_type' => 'required',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after_or_equal:check_in',
            'children' => 'required',
        ]);

        $duplicate = BookRoom::where('name', $request->name)
            ->where('email', $request->email)
            ->where('number', $request->number)
            ->where('address', $request->address)
            ->where('room', $request->room)
            ->where('room_type', $request->room_type)
            ->where('check_in', $request->check_in)
            ->where('check_out', $request->check_out)
            ->where('children', $request->children)
            ->exists();

        if ($duplicate) {
            return redirect()->back()
                ->with('success', 'Your booking request is already received. We will contact you soon.')
                ->with('title', 'Booked Already');
        }

        $information = new BookRoom;
        $information->name = $request->name;
        $information->email = $request->email;
        $information->address = $request->address;
        $information->number = $request->number;
        $information->room = $request->room;
        $information->room_type = $request->room_type;
        $information->check_in = $request->check_in;
        $information->check_out = $request->check_out;
        $information->children = $request->children;
        $information->save();

        return redirect()->back()
            ->with('success', 'Your booking request has been received. We will contact you soon.')
            ->with('title', 'Booked Successfully');
    }

    public function newsEvent()
    {
        $notices = Notice::orderBy('created_at', 'desc')->paginate(10);

        return view('front.news-event', compact('notices'));
    }

    public function Course()
    {
        $courses = Course::orderBy('created_at', 'desc')->paginate(10);

        return view('front.course', compact('courses'));
    }

    public function singlePost($id)
    {
        $list = Course::find($id);

        return view('front.single-post', compact('list'));
    }

    public function riverSystem()
    {
        return view('front.river-system');
    }

    public function raftingKayaking()
    {
        return view('front.rafting-kayaking');
    }

    // single page
    public function singlePage($slug)
    {
        $information = AllPage::where('slug', '=', $slug)->firstOrFail();
        // $feeCategory = FeeCategory::orderBy('created_at', 'asc')->with('feeList')->get();
        // $faqs = Faq::where('page_slug', $slug)->get();
        // $retreat = Retreats::all();
        // $seoMeta = SeoMeta::where('name', 'single-page')->first();

        return view('front.all-page-detail', compact('information'));

        return view('front.single-page', compact('information', 'retreat', 'feeCategory', 'faqs'));
    }

    public function singleCourse($slug)
    {
        $singlePage = Course::where('slug', '=', $slug)->firstOrFail();

        return view('front.single-page', compact('singlePage'));
    }

    public function singleEvent($slug)
    {
        $singlePage = Notice::where('slug', '=', $slug)->firstOrFail();

        return view('front.single-page', compact('singlePage'));
    }

    public function singleBlog($slug)
    {
        $information = Blog::where('slug', '=', $slug)->firstOrFail();
        $blog_views = session()->get('blog_views');
        $faqs = Faq::where('page_slug', $slug)->get();
        $popularBlogs = Blog::orderBy('views', 'DESC')->take(8)->get();
        if ($information->id == $blog_views) {
        } else {
            $information->incrementViewsCount();
            session()->put('blog_views', $information->id);
        }

        return view('front.single-page-new', compact('information', 'faqs', 'popularBlogs'));

        return view('front.single-page', compact('information', 'faqs'));
    }

    public function blogs()
    {
        $seoMeta = SeoMeta::where('name', 'blog')->first();
        // 		$blogs = Blog::orderBy('id', 'DESC')->get();
        $blogs = Blog::latest()->paginate(15);
        $banner = Banner::where('title', 'blog-banner')->first();

        return view('front.blog-new', compact('blogs', 'seoMeta', 'banner'));

        return view('front.blog', compact('blogs', 'seoMeta', 'banner'));
    }

    public function blogUser($name)
    {
        $name = str_replace('-', ' ', $name);
        $blogUser = BlogUsers::where('name', $name)->first();
        $blogs = Blog::where('blog_user_id', $blogUser->id)->get();

        return view('front.blog-user', compact('blogs', 'blogUser'));
    }

    public function yogaClass(string $slug)
    {
        $yogaClassCacheKey = 'yoga_class_info_' . $slug;
        $cacheDuration = 120;

        // $renderedView = Cache::remember($yogaClassCacheKey, $cacheDuration, function () use ($slug) {
            $information = YogaClass::where('slug', $slug)->firstOrFail();
            $faqs = Faq::where('page_slug', $slug)->get();
            $popularClasses = YogaClass::where('slug', '!=', $slug)->take(3)->get();
            $schedules = Schedule::where('class_id', $information->id)
                ->orderBy('day')
                ->orderBy('time_slot')
                ->get()
                ->groupBy('day');

            return view('front.class-new', compact('information', 'faqs', 'popularClasses', 'schedules'))->render();
        // });

        // return $renderedView;
    }

    public function faq()
    {
        $seoMeta = SeoMeta::where('name', 'faqs')->first();
        // 		$faqs = Faq::orderBy('created_at', 'asc')->get();
        $faqs = Faq::where('page_slug', 'faq')->get();

        return view('front.faq-new', compact('faqs', 'seoMeta'));

        return view('front.faq', compact('faqs', 'seoMeta'));
    }

    public function curriculam()
    {
        $information = Curriculam::first();
        $categories = CurriculamCategory::with('curriculamList')->get();

        return view('front.curriculam-new', compact('information', 'categories'));

        return view('front.curriculam', compact('information', 'categories'));
    }

    public function teacher($id)
    {
        $information = OurTeam::find($id);

        return view('front.teacher-new', compact('information'));

        return view('front.teacher', compact('information'));
    }

    public function teacherAll()
    {

        $information = OurTeam::paginate(12);

        return view('front.teacher-all-new', compact('information'));

        return view('front.teacher-all', compact('information'));
    }

    public function training($slug)
    {
        $information = Course::where('slug', $slug)->firstOrFail();

        return view('front.training', compact('information'));
    }

    // public function login()
    // {
    // 	return view('front/login');
    // }

    // public function __construct()
    // {
    // 	$this->middleware('auth:customer');
    // }

    public function loginAuth(Request $request)
    {
        $email = $request->post('email');
        $password = $request->post('password');

        $result = Customer::where(['email' => $email])->first();
        if ($result) {
            if (Hash::check($password, $result->password)) {
                $request->session()->put('User', true);
                $request->session()->put('User_id', $result->id);
                $request->session()->put('name', $result->name);

                return redirect('userprofile_dashboard')->with('msg', 'Success');
            } else {
                // $request->session()->flash('error', 'Please enter correct password');
                return redirect('login')->with('msg', 'Please enter correct password');
            }
        } else {
            // $request->session()->flash('error', 'Please enter valid details');
            return redirect('login')->with('msg', 'Please enter valid Email address');
        }
    }

    // public function logout(Request $request)
    // {
    // 	// Auth::logout();
    // 	$request->session()->flush();
    // 	$request->session()->regenerate();
    // 	return redirect('login');
    // }
    public function set_price($id, $numberOfAttendants)
    {
        $result = FeeList::find($id);

        // referer discount type percentage

        // $result * 100/amount
        $result->share_room = $result->share_room * $numberOfAttendants;
        $result->private_room = $result->private_room * $numberOfAttendants;

        return response()->json($result);
    }

    public function discounted_price($id, $numberOfAttendants, $token, $room_type)
    {
        $result = FeeList::find($id);
        $refer_setting = ReferSetting::first();
        $customer = Customer::where('referral_token', $token)->first();
        // referer discount type percentage

        // $result * 100/amount
        if ($room_type == 'share') {
            $result->share_room = $result->share_room * $numberOfAttendants;
            // calculate commussion

            if ($refer_setting->commission_type == 'percentage') {
                $amount = $result->share_room * $refer_setting->comission_amount / 100;
                // $discounted = $result->share_room - $amount;
            } else {
                $amount = $refer_setting->comission_amount;
            }

            // calculate disount

            if ($refer_setting->discount_type == 'percentage') {
                $discount_amount = $result->share_room * $refer_setting->discount_amount / 100;
                // $discounted = $result->share_room - $amount;
            } else {
                $discount_amount = $refer_setting->discount_amount;
            }
        } else {
            $result->private_room = $result->private_room * $numberOfAttendants;

            if ($refer_setting->commission_type == 'percentage') {
                $amount = $result->private_room * $refer_setting->comission_amount / 100;
            } else {
                $amount = $refer_setting->comission_amount;
            }

            // discount_amount
            if ($refer_setting->discount_type == 'percentage') {
                $discount_amount = $result->private_room * $refer_setting->discount_amount / 100;
            } else {
                $discount_amount = $refer_setting->discount_amount;
            }
        }
        $customer->referred_earning = $customer->referred_earning + $amount;
        $customer->save();

        // After disocunt actual price is
        // credit customer amount
        // settings baata percentage or amount tannne
        $result->private_room = $result->private_room - $discount_amount;
        $result->share_room = $result->share_room - $discount_amount;

        return response()->json($result);
    }

    public function bookings(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'numberOfAttendants' => 'required',
            'room_type' => 'required',
            'actual_price' => 'required',

        ]);
        // $referral = Customer::select('email', 'status')->first();
        // $data_referral_one = $referral[0]->email;
        // $data_referral = $referral[1]->status;
        if (session('User_id')) {
            $result = Booking::create([
                'name' => trim($request->input('name')),
                'customer_id' => session('User_id'),
                'email' => strtolower($request->input('email')),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'numberOfAttendants' => $request->input('numberOfAttendants'),
                'room_type' => $request->input('room_type'),
                'actual_price' => $request->input('actual_price'),
                'status' => 0,
                'referred_by' => $request->input('referred_by'),

            ]);

            session()->flash('message', 'Your Booking is Done');

            return redirect('register_yoga');
        } else {
            $result = Booking::create([
                'name' => trim($request->input('name')),
                // 'customer_id' => session('User_id'),
                'email' => strtolower($request->input('email')),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'numberOfAttendants' => $request->input('numberOfAttendants'),
                'room_type' => $request->input('room_type'),
                'actual_price' => $request->input('actual_price'),
                'status' => 0,
                'referred_by' => $request->input('referred_by'),

            ]);

            session()->flash('message', 'Your Booking is Done');

            return redirect('profile');
        }
    }

    public function register_yoga($token = '')
    {
        // $results = FeeList::all();
        // $user = session('User_id');

        // if ($token == '') {
        // 	return view('front.yoga_register', compact('results'));
        // } else {
        // 	$customer = Customer::find($user);
        // 	return view('front.yoga_register', compact('results', 'customer', 'token'));
        // }

        $results = FeeList::all();
        $valid_token = Customer::where('referral_token', session('refer_id'))->first();
        // $user = session('User_id');

        if (session('refer_id') == '') {
            return view('front.yoga_package', compact('results'));
        } else {
            if ($valid_token) {
                $referral_name = $valid_token->name;
                if ($referral_name == session('name')) {
                    session()->flash('msg', 'Self Refer Denied Token');

                    return view('front.yoga_package', compact('results'));
                } else {
                    session()->flash('msg', 'Success Token Received');

                    return view('front.yoga_package', compact('results', 'referral_name', 'token'));
                }
                // $compare = Customer::find('name')->get();

            } else {
                session()->flash('error', 'Token Invalid Access Denied');

                return view('front.yoga_package', compact('results', 'token'));
            }
        }

        // return view('front.yoga_register', compact('results', 'customer', 'token'));
    }

    public function generate_token()
    {
        $user = session('User_id');
        $bookings = Booking::where('customer_id', $user)->where('status', '1')->first();
        if ($bookings) {

            $token = Str::random(12);
            $customer = Customer::find($user);
            $customer->referral_token = $token;
            $customer->save();
            session()->flash('msg', 'Token Generated Successfully');
        } else {
            session()->flash('msg', 'Token Cannot be Generated... At least One booking Required');
        }

        return redirect()->back();
    }

    public function refer_link($url)
    {
        session()->put('url', $url);

        // $result = Booking::create([
        // 	'referred_by' => $referred_by
        // ]);
        return redirect('login');
    }

    // public function yoga_package($token = '')
    // {
    // 	$results = FeeList::all();
    // 	$valid_token = Customer::where('referral_token', session('refer_id'))->first();
    // 	//$user = session('User_id');

    // 	if (session('refer_id')== '') {
    // 		session()->flash('message', 'Invalid');
    // 		return view('front.yoga_package', compact('results'));
    // 	} else {
    // 		if ($valid_token) {
    // 			//$compare = Customer::find('name')->get();
    // 			$referral_name = $valid_token->name;
    // 			session()->flash('message', 'Success');
    // 			return view('front.yoga_package', compact('results', 'referral_name', 'token'));
    // 		} else {
    // 			session()->flash('message', 'token invalid');
    // 			return view('front.yoga_package', compact('results', 'token'));
    // 		}
    // 	}
    // }

    // public function yoga_package_bookings(Request $request)
    // {
    // 	$request->validate([
    // 		'name' => 'required',
    // 		'email' => 'required',
    // 		'phone' => 'required',
    // 		'address' => 'required',
    // 		'numberOfAttendants' => 'required',
    // 		'room_type' => 'required',
    // 		'actual_price' => 'required',
    // 	]);

    // 	$result = Booking::create([
    // 		'name' => trim($request->input('name')),
    // 		//'customer_id' => session('User_id'),
    // 		'email' => strtolower($request->input('email')),
    // 		'phone' => $request->input('phone'),
    // 		'address' => $request->input('address'),
    // 		'numberOfAttendants' => $request->input('numberOfAttendants'),
    // 		'room_type' => $request->input('room_type'),
    // 		'actual_price' => $request->input('actual_price'),
    // 		'status' => 0,
    // 		'referred_by' => $request->input('referred_by')

    // 	]);
    // }

    public function getReferralLink($token = '')
    {
        $try = Customer::where('referral_token', $token)->first();
        if ($try) {
            $valid_token = Customer::where('referral_token', $token)
                ->select('referral_token')
                ->first();
            $check_token = $valid_token->referral_token;
            if ($token = $check_token) {
                if (empty(session('User_id'))) {
                    // dd('session error');
                    session()->put('refer_id', $token);

                    return redirect('login')->with('msg', 'Please Login');
                }
            }

            if ($token = $check_token) {
                if (session('User_id')) {
                    // dd('all good');
                    session()->put('refer_id', $token);

                    return redirect('register_yoga')->with('msg', 'Success Token Received');
                }
            }
        } else {

            if (empty(session('User_id'))) {
                // dd('error token User_id error');
                return redirect('register')->with('msg', 'Token invalid');
            }

            if (session('User_id')) {
                // dd('token error user id success');
                return redirect('register_yoga')->with('msg', 'Token Invalid');
            }
        }
        // $valid_token = Customer::where('referral_token', $token)
        // 	->select("referral_token")
        // 	->first();
        // $check_token = $valid_token->referral_token;
        // if ($valid_token = 'null') {
        // 	if (empty(session('User_id'))) {
        // 		dd('error');
        // 	}
        // }

        // if ($valid_token = 'null') {
        // 	if (session('User_id')) {
        // 		dd('token error');
        // 	}
        // }

        // $check_token = $valid_token->referral_token;

        // if ($token == $check_token) {
        // 	if (session('User_id')) {
        // 	}
        // }

        // yesma error vao valid token with session validation for redirection in either login or signup[ page]
        // $check_token = $valid_token;
        // session()->put('refer_id', $token);
        // elseif ($token == $valid_token->referral_token  && session('User_id')) {
        // 	//dd($valid_token->referral_token);
        // 	// session()->put('refer_id', $token);
        // 	// return redirect('yoga_package');
        // 	//return redirect('register_yoga');
        // 	//return redirect('front/login');
        // } elseif ($token == $check_token && empty(session('User_id'))) {
        // 	//dd($valid_token->referral_token);
        // 	//session()->flash('errors', 'Token Invalid Access Denied');
        // 	//return redirect('login');
        // } elseif ($valid_token = 'null') {
        // 	dd('null');
        // 	//session()->flash('error', 'Token Invalid Access Denied');
        // 	return redirect('front.yoga_package')->with('msg', 'Token Invalid Access Denied');
        // }
        // elseif ($token == !$valid_token && empty(session('User_id'))) {

        // return redirect('login');
        // session()->flash('errors', 'Token Invalid Access Denied');
        // return redirect('login');
        // else {
        // 	//dd($valid_token->referral_token);
        // 	//return $valid_token;
        // 	//session()->put('refer_id', $token);
        // 	return redirect('register');
        // }
    }

    public function userprofile_dashboard($token = '')
    {
        $user = session('User_id');
        // $bookings = Booking::where('customer_id', $user)->select("customer_id")->get();
        // $bookings = Booking::find($user);
        // $id = $bookings->customer_id;
        $customer = Customer::find($user);

        return view(
            'front.userprofile_dashboard',
            compact('customer', 'token')
        );
    }

    public function privacyPolicy()
    {
        $information = AllPage::where('slug', '=', 'privacy-policy')->first();

        return view('front.privacy-policy.privacy-policy', compact('information'));
    }

    public function schedule()
    {
        $dayMap = [
            '0' => 'Sunday',
            '1' => 'Monday',
            '2' => 'Tuesday',
            '3' => 'Wednesday',
            '4' => 'Thursday',
            '5' => 'Friday',
            '6' => 'Saturday',
            'Sunday' => 'Sunday',
            'Monday' => 'Monday',
            'Tuesday' => 'Tuesday',
            'Wednesday' => 'Wednesday',
            'Thursday' => 'Thursday',
            'Friday' => 'Friday',
            'Saturday' => 'Saturday',
        ];

        $dayOrder = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

        $schedules = Schedule::all()->map(function ($schedule) use ($dayMap) {
            $dayValue = (string) $schedule->day;

            if (array_key_exists($dayValue, $dayMap)) {
                $schedule->day = $dayMap[$dayValue];
            }

            return $schedule;
        });

        $timeSlots = $schedules->pluck('time_slot')->unique()->values();

        $scheduleEntries = $schedules
            ->groupBy('day')
            ->map(function ($dayGroup) {
                return $dayGroup->keyBy('time_slot');
            });

        $days = collect($dayOrder)->values();
        $banner = Banner::where('title', 'schedule-banner')->first();


        return view('front.schedule', compact('scheduleEntries', 'days', 'timeSlots', 'banner'));
    }
}
