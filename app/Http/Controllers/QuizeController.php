<?php

namespace App\Http\Controllers;

use App\Quize;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class QuizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->admin == 1){
            return view('admin.quize.index',['quizes' => Quize::latest()->get()]);

        }

        return redirect()->route('user.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quize.quize_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $quize_name = $this->validate($request,
            ['name' => ['required','string','max:255',Rule::unique('quizes')]]
        ) ;

        Quize::create($quize_name);

        return redirect()->route('quize.index')->with('success','new quize created succeffully');
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
    public function edit(Quize $quize)
    {
        return  view('admin.quize.quize_edit', ['quize' => $quize]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quize $quize)
    {
//        dd($request->all());
        $quize_name = $this->validate($request,
            ['name' => ['required','string','max:255',Rule::unique('quizes')->ignore($quize->name)]]
        ) ;

        $quize->update($quize_name);

        return redirect()->route('quize.index')->with('success','quize updated succeffully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quize $quize)
    {
//        dd($quize->name);
        $quize->delete();
        return redirect()->route('quize.index')->with('success', $quize->name .' quize deleted succeffully');
    }
}
