<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\Post;
use App\Models\Comment;


class AdminController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth', ['except' => ['index', 'show']]);

    }


    public function index()
    {
        if(session()->has('logged_in') && session()->get('logged_in') == true){
            $data['title'] = "Users List";
            $data['users'] = user::all();
            return view('admin.index', $data);
        }else{
            
            return redirect()->route('admin.signin');
        }
        
    }

    public function feedbacklist()
    {
        if(session()->has('logged_in') && session()->get('logged_in') == true){
            $data['title'] = "Feedback List";
            $data['posts'] = Post::all();
            return view('admin.feedback', $data);
        }else{
            return redirect()->route('admin.signin');
        }
    }


        /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('admin.feedback_detail')
            ->with('post', Post::where('slug', $slug)->first());
    }

    public function feedbackdetail($id)
    {
        if(session()->has('logged_in') && session()->get('logged_in') == true){
            $data['title'] = "Feedback Detail";
            $data['posts'] = Post::all();
            $comments = Comment::where('post_id', $id)->get();
            // echo "<pre>";
            // print_r($comments);
            return view('admin.feedback_detail')
            ->with(['post'=> Post::where('id', $id)->first(),'comments'=> $comments,'title' =>'Feedback Detail']);
        }else{
            return redirect()->route('admin.signin');
        }
    }

    public function logout(){
        Session::flush();
        return redirect()->route('admin.signin');
    }

    public function login(Request $request){
        return view('admin.login');
    }

}