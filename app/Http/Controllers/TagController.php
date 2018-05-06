<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function create($question)
    {
        //$question= Question::find($question);
        $tag = new Tag;
        $edit = FALSE;
        return view('tagForm', ['tag' => $tag,'edit' => $edit, 'question' =>$question  ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $question)
    {

        $input = $request->validate([
            'tagname' => 'required',
        ], [

            'tagname.required' => 'Tag Name is required',

        ]);
        $input = request()->all();
        $question = Question::find($question);
        $Tag = new Tag($input);

        $Tag->question()->associate($question);
        $Tag->save();

        return redirect()->route('tags.show',['question_id' => $question->id])->with('message', 'Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($question)
    {
        $question= Question::find($question);
        return view('tag')->with('question', $question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($question, $tag)
    {
        $tag = Tag::find($tag);
        $edit = TRUE;
        return view('tagForm', ['tag' => $tag, 'edit' => $edit, 'question'=>$question ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $question, $tag)
    {
        $input = $request->validate([
            'tagname' => 'required',
        ], [

            'tagname.required' => 'Tag Name is required',

        ]);

        $tag = Tag::find($tag);
        $tag->tagname = $request->tagname;
        $tag->save();

        return redirect()->route('tags.edit',['question_id' => $question, 'tag_id' => $tag])->with('message', 'Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($question, $tag)
    {
        $tag = Tag::find($tag);

        $tag->delete();
        return redirect()->route('tags.show',['id' => $question])->with('message', 'Deleted');

    }
}