<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\BibleLesson;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class AddBibleLesson extends Component
{

    public $dt_of_service,$verse1,$lesson1,$verse2,$lesson2,$verse3,$lesson3,$verse4,$lesson4;



    public $rules = [
        'dt_of_service' => ['required', 'date'],
         'verse1'    => ['required','string','max:30'],
         'lesson1'   => ['required','string'],
         'verse2'    => ['required','string','max:30'],
         'lesson2'   => ['required','string'],
         'verse3'    => ['required','string','max:30'],
         'lesson3'   => ['required','string'],
         'verse4'    => ['required','string','max:30'],
         'lesson4'   => ['required','string'],
    ];

    public function updated($property){
        $this->validateOnly($property, $this->rules);
    }


    public function render()
    {
        return view('livewire.add-bible-lesson');
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

        BibleLesson::create([
            'dt'              =>  $this->dt_of_service,
            'verse1'          => $this->verse1,
            'lesson1'         => $this->lesson1,
            'verse2'          => $this->verse2,
            'lesson2'         => $this->lesson2,
            'verse3'          => $this->verse3,
            'lesson3'         => $this->lesson3,
            'verse4'          => $this->verse4,
            'lesson4'         => $this->lesson4,
        ]);

  Alert::success('The bible lesson added successfully','CSICWCR');

        return redirect()->route('blesson.show');
         $this->reset();

    }
}
