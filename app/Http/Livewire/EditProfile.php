<?php

namespace App\Http\Livewire;

use App\Mail\ProfileMail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class EditProfile extends Component
{
    use WithFileUploads;

    public $selected_id, $family_name,$first_name,$last_name,$mobile,$email,$dob,$line1,$line2,
    $city,$state,$pin,$profile_photo,$profile_photo_path;

    public $editprofile;
    public $newmail;
    public $token;
    public $email_verified_at;




    public function mount(){
        $this->editprofile = User::find(Auth::user()->id);

        $this->family_name    = $this->editprofile->family_name;
        $this->first_name     = $this->editprofile->first_name;
        $this->selected_id    = $this->editprofile->id;
        $this->last_name      = $this->editprofile->last_name;
        $this->mobile         = $this->editprofile->mobile;
        $this->email          = $this->editprofile->email;
        $this->dob            = $this->editprofile->dob;
        $this->line1          = $this->editprofile->line1;
        $this->line2          = $this->editprofile->line2;
        $this->city           = $this->editprofile->city;
        $this->state          = $this->editprofile->state;
        $this->pin            = $this->editprofile->pin;
        $this->mth_sub        = $this->editprofile->mth_sub;
        $this->profile_photo_path = $this->editprofile->profile_photo_path;
        $this->email_verified_at = $this->editprofile->email_verified_at;
        $this->newmail       = $this->editprofile->email;
    }


    public $rules = [
        'family_name' => ['required', 'string', 'max:255'],
        'first_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'mobile' => ['required', 'string','min:10', 'max:10', 'unique:users'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'dob' => ['required', 'date','before:2018-02-01'],
        'line1' => ['required', 'string', 'max:255'],
        'line2' => ['required', 'string', 'max:255'],
        'city' => ['required', 'string', 'max:255'],
        'state' => ['required', 'string', 'max:255'],
        'pin' => ['required', 'string', 'max:6'],
        'profile_photo' => ['sometimes','mimes:jpg,png,svg','max:1024'],
    ];

    public function updated($property){
        $this->validateOnly($property, $this->rules);
    }




    public function render(EditProfile $editprofile)
    {
        return view('livewire.edit-profile',compact('editprofile'));
    }

    public function store(){

        $user = User::find($this->selected_id);

        if(!empty($this->profile_photo)){
            $image = $this->profile_photo->store('public/profile_photo');
            $oldImage = File::delete($this->editprofile->profile_photo_path);


        }else{
            $image = $this->editprofile->profile_photo_path;
        }



        if($user->update([
            'family_name' => $this->family_name,
            'first_name'  => $this->first_name,
            'last_name'   => $this->last_name,
            'mobile'      => $this->mobile,
            'email'       => $this->email,
            'dob'         => $this->dob,
            'line1'       => $this->line1,
            'line2'       => $this->line2,
            'city'        => $this->city,
            'state'       => $this->state,
            'pin'         => $this->pin,
            'profile_photo_path' => $image,

        ])){


          if($this->newmail !== $this->email){

             Alert::info('Since you changed you email, kindly verify your email','CSICWCR');
             Auth::logout();
             return redirect()->to('login');
             $this->reset();

          }else{
            Alert::success('Your profile has been updated successfully','CSICWCR');

            return redirect()->to('edit-profile');

            $this->reset();

          }
            Alert::success('Your profile has been updated successfully','CSICWCR');

            return redirect()->to('edit-profile');

             $this->reset();

        }else{
          Alert::error('there was some problem in updating your profile, try after sometime','CSICWCR');
          $this->reset();
        }


    }
}
