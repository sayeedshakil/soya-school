<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\FeatureBox;
use App\Models\FrontPage;
use App\Models\InstitutionDetail;
use App\Models\MainSlider;
use App\Models\Notice;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliderImage = MainSlider::where('is_active','1')->get();
        $frontPage = FrontPage::where('is_active','1')
                    ->take(1)
                    ->get();
        $notices = Notice::with('category','studentclass')
                ->where('is_active','1')
                ->orderBy('updated_at','desc')
                ->take(10)
                ->get();
        $featureBox = FeatureBox::where('is_active','1')
                ->orderBy('updated_at','desc')
                ->get();
        //dd($frontPage);
        return view('frontend.home.index', compact('sliderImage','frontPage','notices','featureBox'));
    }

    public function aboutus(){
        $frontPage = FrontPage::where('is_active','1')->take(1)->get();
        $aboutus = InstitutionDetail::where('is_active','1')->orderBy('updated_at','desc')->take(1)->get();
        return view('frontend.home.aboutus',compact('frontPage','aboutus'));
    }
    public function contactus(){
        $frontPage = FrontPage::where('is_active','1')->take(1)->get();
        $contactus = InstitutionDetail::where('is_active','1')->orderBy('updated_at','desc')->take(1)->get();
        return view('frontend.home.contactus',compact('frontPage','contactus'));
    }
    public function viewnotice($id){
        $frontPage = FrontPage::where('is_active','1')->take(1)->get();
        $notice = Notice::find($id)->load('category','studentclass');
        // return response()->file('storage/images/attachment/'.$notice->attachment);
        // dd($notice);
        return view('frontend.home.viewnotice',compact('frontPage','notice'));
    }
    public function allnotice(){
        $notices = Notice::with('category','studentclass')
                ->where('is_active','1')
                ->orderBy('updated_at','desc')
                ->get();
        $frontPage = FrontPage::where('is_active','1')->take(1)->get();
        return view('frontend.home.allnotice',compact('frontPage','notices'));
    }
    // public function how_to_submit_post(){
    //     $categories = Category::whereHas('posts')->pluck('name');
    //     return view('frontend.home.writePost',compact('categories'));
    // }

}
