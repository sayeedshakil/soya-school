<?php


namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Notice;
use App\Models\Post;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $notifications = auth()->user()->unreadNotifications;
        // $posts = Post::where('user_id',auth()->user()->id)->get();
        $students = Student::count();
        $teachers = Teacher::count();
        $notice = Notice::with('category','studentclass')->get();

        return view('backend.dashboard', compact('students','teachers','notice'));
    }

    // public function markNotification(Request $request)
    // {
    //     auth()->user()
    //         ->unreadNotifications
    //         ->when($request->input('id'), function ($query) use ($request) {
    //             return $query->where('id', $request->input('id'));
    //         })
    //         ->markAsRead();

    //     return response()->noContent();
    // }
}
