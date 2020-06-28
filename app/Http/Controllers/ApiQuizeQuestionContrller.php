<?php

namespace App\Http\Controllers;

use App\Question;
use App\Quize;
use Illuminate\Http\Request;

class ApiQuizeQuestionContrller extends Controller
{
    public function quize() {
        return Quize::latest()->get();
    }

    public function quesstionWithOptions() {
        $questions = Question::with('answers')->where('quize_id',5)->get();

        return $questions;
    }
}
