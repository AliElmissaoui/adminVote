<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use Illuminate\Support\Facades\Redirect;

class voteController extends Controller
{

    public function index()
    {
        return view('vote.create');
    }
    public function show()
    {
        $votes=Vote::all();
        return view('vote.index')->with('votes',$votes);
    }
    public function store(Request $request)
    {
      $vote=new Vote();
      $vote->title=$request->title;
      $vote->description=$request->description;
      $vote->save();
      return Redirect::to("admin/vote/{$vote->id}");
    }
    public function showvote($id)
    {
        $vots=Vote::where('id',$id)->first();
        return view('question.create')->with('vots',$vots);
    }
}
