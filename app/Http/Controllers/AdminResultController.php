<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;

class AdminResultController extends Controller
{
    // --------------------------------------------------
    public function index()
    {
        $results = Result::paginate(4);

        return view('admin.adminResults.index', compact('results'));
    }
    // --------------------------------------------------
    public function show($id)
    {
        $showResults = Result::where('id', $id)->first();

        $questions = json_decode($showResults->questions);
        $userAnswers = json_decode($showResults->userAnswers);
        $correct_answers = json_decode($showResults->correct_answers);

        return view('admin.adminResults.show', compact('showResults','questions','userAnswers','correct_answers'));
    }
}
