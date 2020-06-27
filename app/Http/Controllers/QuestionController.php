<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Question;
use App\Quize;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Quize $quize){
//          $questions = $quize->questions()->get();
            return  view('admin.question.index', ['quize' => $quize]);

    }

    public function questionsView(Quize $quize) {
//        dd($quize);
//        $quize = Quize::with('questions')->where('id',$quize->id)->get();
//        $quesions = Question::where('quize_id',$quize->id)->paginate(5);
        $quesions = Question::where('quize_id',$quize->id)->get();
//        dd($quize);
        return view('admin.question.question_view', ['questions' => $quesions, 'quize'=>$quize]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Quize $quize)
    {
        return view('admin.question.question_create',['quize' => $quize]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Quize $quize)
    {
//                dd($request->all());
          $this->validate($request, [
              'question' => ['required','string'],
              'options' => ['required','array', 'min:4'],
              'options.*' => ['required','string', 'max:255'],
          ]);

            $options = $request->input('options');
            $answers = $request->has('answers')  ?   $request->input('answers') : [];
//        dd($request->all());
//        var_dump($answers);

//        Answer Create

//        $quize = Quize::find(2);
        $question = $quize->questions()->create(
            [
                'question' => $request->input('question')
            ]
        );
        foreach ($options as $index=>$value) {
            if(in_array(($index),$answers)) {
//                echo $index.'YES<br>';
                $question->answers()->create([
                    'answer' => $value,
                    'is_correct' => true
                ]);

            }else {
                $question->answers()->create([
                    'answer' => $value,
                ]);
//                echo $index.'No<br>';
            }
        }

        return back()->with('success','new questions created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Quize $quize, Question $question)
    {
        return view('admin.question.question_edit', ['question' => $question]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request,Quize $quize, Question $question)
    {
//        dd($request->all());

        $question->update(['question' => $request->input('question')]);

        $options = $request->input('options');
        $options_id = $request->input('id');
        $answers = $request->has('answers')  ?   $request->input('answers') : [];

        foreach($options_id as $index=>$id_value) {
            if(in_array(($index), $answers)) {
                $question->answers()->where('id',$id_value)->update([
                    'answer' => $options[$index],
                    'is_correct' => true
                ]);
            }else {
                $question->answers()->where('id',$id_value)->update([
                   'answer' => $options[$index],
                   'is_correct' => false
                ]);
            }
        }


        return back()->with('success','question updated successfully.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quize $quize,Question $question)
    {
        $question->delete();

        return back()->with('success', 'question deleted successfully.');
    }
}
