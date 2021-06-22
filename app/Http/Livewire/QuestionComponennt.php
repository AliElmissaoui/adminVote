<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Question;

use App\Models\vote;

class QuestionComponennt extends Component
{

    public $ide;
    public $question_type;
    public $title;
    public function mount($id)
    {
      $this->ide=$id;
    }
    public function AddQuestion()
    {
        $question=new Question();
        $question->vote_id=$this->ide;
        $question->question_type=$this->question_type;
        $question->title=$this->title;
        $question->save();
        $this->question_type="";
        $this->title="";



    }
    public function render()
    {
        $question = Question::with('votes')->where('vote_id',$this->ide)->distinct()->get();
        $vots=vote::where('id',$this->ide)->first();
        return view('livewire.question-componennt',['question'=>$question,'vots'=>$vots])->layout('layouts.base');
    }
}
