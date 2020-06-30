<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Quize;
use App\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function questionAnswerAnalysis(Request $request, Quize $quize) {

//        dd(auth()->user());
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

       $result = $this->saveToResult($right,$wrong_answer->count(),$quize->name);

//        return view('frontend.feedback_with_solution',
//            [
//                "quize_name" => $quize->name,
//                "user_name" => \auth()->user()->name,
//                'user_email' => \auth()->user()->email,
//                'right_answer'=>$right,
//                "wrong_answer" => $wrong_answer->count(),
//                "get_points" => $right * 1,
//                "fix_answer" => $wrong_answer
//            ]
//        );

        return view('frontend.feedback_with_solution',["result" => $result,"fix_answer" => $wrong_answer]);






    }

    public function saveToResult($right, $wrong, $quize_name) {
        $user = auth()->user();
//        Result::create([
//            'name' => $user->name,
//            'email' => $user->email,
//            'quize_name' => $quize_name,
//            'right_answer' => $right,
//            'wrong_answer' => $wrong,
//            'get_points' => $right * 1
//        ]);

        $result = new Result();
        $result->name = $user->name;
        $result->email = $user->email;
        $result->quize_name = $quize_name;
        $result->right_answer = $right;
        $result->wrong_answer = $wrong;
        $result->get_points = $right*1;

        $result->save();

        return $result;

    }
}
