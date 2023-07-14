<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Result;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultsController extends Controller
{
// --------------------------------------------------
    public function index()
    {
        $results = Result::where('user_id',Auth::user()->id)->latest()->first();
        // foreach ($results as $result) {
            $questions = json_decode($results->questions);
            $userAnswers = json_decode($results->userAnswers);
            $correct_answers = json_decode($results->correct_answers);
        // }
        return view('candidate.results.index',compact('results','questions','userAnswers','correct_answers'));
    }

// --------------------------------------------------
    public function create()
    {
        //
    }
// --------------------------------------------------

    public function store(Request $request)
    {
        $category_name = $request->input('category_name');
        $question_name = $request->input('question_name', []);
        $submitQuestions = $request->input('questionId', []);
        // dd($submitQuestions);
        $correct_answers = [];

        foreach ($submitQuestions as $submitQuestion) {
            // dd($submitQuestion);
            $option_question_id = Option::find($submitQuestion);
            $correct_answers[$submitQuestion] = $option_question_id->correct_answer;
        }
        // dd($submitQuestion);
        $score = 0;
        $userAnswers = $request->input('answers', []);
        // dd($category_name);
        // dd($question_name);
        foreach ($userAnswers as $questionId => $answer) {
            // dd($questionId, $answer, $correct_answers[$questionId]);
            if ($answer == $correct_answers[$questionId]) {
                $score = $score + 1;
            }
        }

        $totalOfQuestion = count($submitQuestions);
        $status = ($score / $totalOfQuestion) * 100;

        // dd($option_question_id->id);
        // dd($status."%");

        // if ($status >= 70) {
        //     $status = "لقد نجحت";
        // }else{
        //     $status = "لقد فشلت";
        // }

        // dd($score . " - " . $status);

        Result::create([
            'user_id'         =>  Auth::user()->id,
            'category'        =>  $category_name,
            'questions'       =>  json_encode($question_name),
            'userAnswers'     =>  json_encode($userAnswers),
            'correct_answers' =>  json_encode($correct_answers),
            'score'           =>  $score,
            'status'          =>  $status,
        ]);

        // dd($score . "-" . $status . "%");

        return redirect()->route('results.index');

    }
// --------------------------------------------------

    public function show(string $id)
    {
        //
    }
// --------------------------------------------------

    public function edit(string $id)
    {
        //
    }
// --------------------------------------------------

    public function update(Request $request, string $id)
    {
        //
    }
// --------------------------------------------------

    public function destroy(string $id)
    {
        //
    }
}
