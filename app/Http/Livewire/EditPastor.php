<?php

namespace App\Http\Livewire;

use App\Models\Pastor;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Image;
use Illuminate\Support\Str;

class EditPastor extends Component
{
     use WithFileUploads;

 public $family_name,$first_name,$last_name,$email,$dob,$mobile,$equal,$bio,$profile_photo;
    public $showingModal = false;
    public $selpastor;
    public $selected_id;
    public $photo;
    public $pastor;


    public $rules = [
        'family_name' => ['required', 'string', 'max:255'],
        'first_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'mobile' => ['required', 'string','min:10', 'max:10'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'dob' => ['required', 'date','before:2002-02-01'],
        'equal' => ['required','string'],
        'bio'   => ['required','string'],
        'photo'  => ['required', 'mimes:png,jpg,svg,jpeg','max:2048'],
    ];

    public function updated($property){
        $this->validateOnly($property, $this->rules);
    }


    public function mount($id){
        $pastor = Pastor::find($id);

        $this->family_name = $pastor->family_name;
        $this->first_name  = $pastor->first_name;
        $this->last_name   = $pastor->last_name;
        $this->email       = $pastor->email;
        $this->mobile      = $pastor->mobile;
        $this->equal       = $pastor->equal;
        $this->bio         = $pastor->bio;
        $this->dob         = $pastor->dob;
        $this->profile_photo = $pastor->profile_photo;
        $this->selected_id = $id;

   }

    public $listeners = [
        'hideMe' => 'hideModal'
    ];


    public function render()
    {

        return view('livewire.edit-pastor');
    }

    public function showModal(){
        $this->showingModal = true;
    }

    public function hideModal(){
        $this->showingModal = false;
    }

    public function update(){
        $record = Pastor::find($this->selected_id);

        if(!empty($this->photo)){
            $image = $this->photo;
            $imageNewname = Str::random(20).'.'.$image->getClientOriginalExtension();
            $location       = public_path('pastors/' . $imageNewname);
            Image::make($image)->resize(636,650)->save($location, 80);

        }else{
             $imageNewname = $this->profile_photo;
        }

        $record->update([
                'family_name'   => $this->family_name,
                'first_name'    => $this->first_name,
                'last_name'     => $this->last_name,
                'mobile'        => $this->mobile,
                'email'         => $this->email,
                'dob'           => $this->dob,
                'equal'         => $this->equal,
                'bio'           => $this->bio,
                'profile_photo' => $imageNewname,
        ]);

        Alert::success('Pastor details updated successfully','CSICWCR');

        return redirect()->route('pastors.show');

         $this->reset();


    }





}
