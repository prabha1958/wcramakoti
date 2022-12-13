<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\BibleQuiz;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class AddBquiz extends Component
{
    public $question,$option1,$option2,$option3,$option4,$ans;


    public $rules = [

         'question'   => ['required','string'],
         'option1'   => ['required','string'],
         'option2'   => ['required','string'],
         'option3'   => ['required','string'],
         'option4'   => ['required','string'],
         'ans'   => ['required','string'],

    ];

    public function updated($property){
        $this->validateOnly($property, $this->rules);
    }

    public function render()
    {
        return view('livewire.add-bquiz');
    }

    public $showingModal = false;

    public $listeners = [
        'hideMe' => 'hideModal'
    ];


    public function showModal(){
        $this->showingModal = true;
    }

    public function hideModal(){
        $this->showingModal = false;
    }

     public function store(){
        BibleQuiz::create([
            'question'   => $this->question,
            'optn1'    => $this->option1,
            'optn2'    => $this->option2,
            'optn3'    => $this->option3,
            'optn4'    => $this->option4,
            'ans'     => $this->ans,

        ]);

        Alert::success('The bible quiz question successfully','CSICWCR');

        return redirect()->route('bquiz.show');
         $this->reset();
     }

}
