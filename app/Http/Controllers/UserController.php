<?php

namespace App\Http\Controllers;

use App\Question;
use App\Quize;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show() {
        return view('frontend.index');
    }

    public function showQuestion(Quize $quize)
    {
        return view('frontend.question_exam', ['quize' => $quize]);
    }
}
