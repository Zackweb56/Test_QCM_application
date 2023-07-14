<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    //-------------------------
    public function index(){
        $total_admins = User::where('user_type','admin')->count();
        $total_users_notapproved = User::where('user_type','user')->where('is_validated','0')->count();
        $total_users_approved = User::where('user_type','user')->where('is_validated','1')->count();
        $total_categories = Category::count();
        $total_questions = Question::count();

        return view('admin.analytics.index', compact('total_admins','total_users_notapproved','total_users_approved','total_categories','total_questions'));
    }
}
