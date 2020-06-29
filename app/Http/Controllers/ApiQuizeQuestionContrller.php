<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Quize;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Generic;
use Illuminate\Database\Eloquent\Builder;
use function foo\func;

class ApiQuizeQuestionContrller extends Controller
{
    public function quize() {
        return Quize::latest()->get();
    }

    public function quesstionWithOptions(Quize $quize) {
        $questions = Question::with('answers')->where('quize_id',$quize->id)->get();

        return $questions;
    }

    public function questionAnswerAnalysis(Request $request) {
        $quize_answer = $request->input('questions');

//        return  $quize_answer;


        $right = 0;
        $wrong = 0;
//        Result analysis

        $right = Answer::whereIn('id',$quize_answer)->where('is_correct',1)->count();

//        $wrong_answer_id = Answer::whereIn('id',$quize_answer)->where('is_correct',0)->pluck('question_id');
        $wrong_answer_id = Answer::whereIn('id',$quize_answer)->where('is_correct',0)->pluck('question_id');

        $wrong_answer = Answer::whereIn('question_id',$wrong_answer_id)->where('is_correct',1)
                                ->rightJoin('questions','answers.question_id','=','questions.id')
                                ->get();



//        return $wrong_answer;

//        return response()->json([
//            "data"=>[
//                "right_answer" => $right,
//                "wrong_answer" => $wrong_answer->count(),
//                "fix-answer" => $wrong_answer
//
//            ]
//        ]);

        return view('frontend.feedback_with_solution',
            [
                'right_answer'=>$right,
                "wrong_answer" => $wrong_answer->count(),
                "fix_answer" => $wrong_answer
            ]
        );






    }
}
