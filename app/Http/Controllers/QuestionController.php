<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use App\Models\Question;

class QuestionController extends Controller
{


    public function index()
    {
        $question = Question::with('votes')->get();
        return view('question.create',compact('question'));
    }
    // public function showvote($id)
    // {
    //     $vots=Vote::where('id',$id)->first();
    //     return view('question.create')->with('vots',$vots);
    // }
    // public function showvquestion($id)
    // {
    //     $question = Question::with('votes')->where('vote_id',$id)->distinct()->get();
    //     return view('question.create')->with('question',$question);
    // }
    public function storequestion(Request $request)
    {
      $question=new Question();

      $question->question_type=$request->question_type;
      $question->title=$request->title;
      $question->save();
      return redirect()->back();
    }
}
