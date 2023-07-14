<?php

namespace App\Http\Controllers;

// use App\Models\Option;
use App\Models\Category;
// use App\Models\Question;
use Illuminate\Http\Request;

class ReadyController extends Controller
{
    public function index($id)
    {
        // $options = Option::paginate(1);
        // $questions = Question::get();
        // if(Auth::user()->is_validated == true){
            return view('candidate.tests.ready')->with('categories', Category::where('id', $id)->first());
        // }elseif(Auth::user()->is_validated == false){
        //     return view('candidate.tests.index')->with('failed', 'You are not Approved yet !');
        // }

    }
}
