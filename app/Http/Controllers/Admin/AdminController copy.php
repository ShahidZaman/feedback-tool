<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\admin;

class AdminController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        return view('admin.index');
    }

    public function feedbacklist()
    {
        return view('admin.feedback');
    }


}