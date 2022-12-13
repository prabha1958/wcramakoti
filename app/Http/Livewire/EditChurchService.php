<?php

namespace App\Http\Livewire;

use App\Models\BibleLesson;
use App\Models\ChurchService;
use App\Models\Pastor;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class EditChurchService extends Component
{

    use WithFileUploads;

    public $dt_service,$time,$theme,$theme_photo,$sermon,$audience_photo,$choir_photo,$pastor_photo,
            $pastor_id,$blesson_id;

    public $selected_id;
    public $chservice;

            public function mount($id){
                $this->chservice = ChurchService::find($id);

                $this->dt_service       = $this->chservice->dt_service;
                $this->time             = $this->chservice->time;
                $this->theme_photo      = $this->chservice->theme_photo;
                $this->theme            = $this->chservice->theme;
                $this->sermon           = $this->chservice->sermon;
                $this->audience_photo   = $this->chservice->audience_photo;
                $this->choir_photo      = $this->chservice->choir_photo;
                $this->pastor_photo     = $this->chservice->pastor_photo;
                $this->pastor_id        = $this->chservice->pastor_id;
                $this->blesson_id       = $this->chservice->biblelesson_id;
                $this->selected_id      = $id;
            }


            public $rules = [
                'dt_service'   => ['required','date'],
                'time'         => ['required'],
                'theme'        => ['required','string'],
                'theme_photo'  => ['required','mimes:png,jpg,jpeg,svg','max:2048'],
                'sermon'       => ['required','string'],
                'audience_photo' => ['required','mimes:png,jpg,jpeg,svg','max:2048'],
                'choir_photo'   => ['required','mimes:png,jpg,jpeg,svg','max:2048'],
                'pastor_photo'  => ['required','mimes:png,jpg,jpeg,svg','max:2048'],
                'pastor_id'     => ['required'],
                'blesson_id'    => ['required'],
            ];

            public function updated($property){
                $this->validateOnly($property, $this->rules);
            }

            public function render()
            {

                $pastors = Pastor::all();
                $blessons = BibleLesson::all();

                return view('livewire.edit-church-service',[
                    'pastors' => $pastors,
                    'blessons' => $blessons,
                ]);
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

            public function update(){


            if($this->theme_photo !== $this->chservice->theme_photo){
                $imageTheme = $this->theme_photo;
                $imageNewName1 = Str::random(20).'.'.$imageTheme->getClientOriginalExtension();
                $imageNewName2 = Str::random(20).'.'.$imageTheme->getClientOriginalExtension();
                $imageNewName3 = Str::random(20).'.'.$imageTheme->getClientOriginalExtension();
                $location1       = storage_path('app/public/themes/' . $imageNewName1);
                $location2       = storage_path('app/public/themes/' . $imageNewName2);
                $location3       = storage_path('app/public/themes/' . $imageNewName3);
                Image::make($imageTheme)->resize(200,150)->save($location1, 80);
                Image::make($imageTheme)->resize(500,450)->save($location2, 80);
                Image::make($imageTheme)->resize(1080,720)->save($location3, 80);
            }else{
                $imageNewName1 = $this->chservice->theme_photo;
            }


            if($this->choir_photo !== $this->chservice->choir_photo){
                $imageChoir = $this->choir_photo;
                $imageChoir1 = Str::random(20).'.'.$imageChoir->getClientOriginalExtension();
                $imageChoir2 = Str::random(20).'.'.$imageChoir->getClientOriginalExtension();
                $imageChoir3 = Str::random(20).'.'.$imageChoir->getClientOriginalExtension();
                $location1       = storage_path('app/public/choirs/' . $imageChoir1);
                $location2       = storage_path('app/public/choirs/' . $imageChoir2);
                $location3       = storage_path('app/public/choirs/' . $imageChoir3);
                Image::make($imageChoir)->resize(200,150)->save($location1, 80);
                Image::make($imageChoir)->resize(500,450)->save($location2, 80);
                Image::make($imageChoir)->resize(1080,720)->save($location3, 80);
            }else{
                $imageChoir1 = $this->chservice->choir_photo;
            }


            if($this->audience_photo !== $this->chservice->audience_photo){
                $imageAudience = $this->audience_photo;
                $imageAudience1 = Str::random(20).'.'.$imageAudience->getClientOriginalExtension();
                $imageAudience2 = Str::random(20).'.'.$imageAudience->getClientOriginalExtension();
                $imageAudience3 = Str::random(20).'.'.$imageAudience->getClientOriginalExtension();
                $location1       = storage_path('app/public/audiences/' . $imageAudience1);
                $location2       = storage_path('app/public/audiences/' . $imageAudience2);
                $location3       = storage_path('app/public/audiences/' . $imageAudience3);
                Image::make($imageAudience)->resize(200,150)->save($location1, 80);
                Image::make($imageAudience)->resize(500,450)->save($location2, 80);
                Image::make($imageAudience)->resize(1080,720)->save($location3, 80);
            }else{
                $imageAudience1 = $this->chservice->audience_photo;
            }

            if($this->pastor_photo !== $this->chservice->pastor_photo){
                $imagePastor = $this->pastor_photo;
                $imagePastor1 = Str::random(20).'.'.$imagePastor->getClientOriginalExtension();
                $imagePastor2 = Str::random(20).'.'.$imagePastor->getClientOriginalExtension();
                $imagePastor3 = Str::random(20).'.'.$imagePastor->getClientOriginalExtension();
                $location1       = storage_path('app/public/priests/' . $imagePastor1);
                $location2       = storage_path('app/public/priests/' . $imagePastor2);
                $location3       = storage_path('app/public/priests/' . $imagePastor3);
                Image::make($imagePastor)->resize(200,150)->save($location1, 80);
                Image::make($imagePastor)->resize(500,450)->save($location2, 80);
                Image::make($imagePastor)->resize(1080,720)->save($location3, 80);
            }else{
                $imagePastor1 = $this->chservice->pastor_photo;
            }





                $record  = ChurchService::find($this->selected_id);

                $record->update([
                    'dt_service'     => $this->dt_service,
                    'time'           => $this->time,
                    'theme'          => $this->theme,
                    'theme_photo'    => $imageNewName1,
                    'sermon'         => $this->sermon,
                    'choir_photo'    => $imageChoir1,
                    'audience_photo' => $imageAudience1,
                    'pastor_photo'   => $imagePastor1,
                    'pastor_id'     => $this->pastor_id,
                    'biblelesson_id'    => $this->blesson_id,
                ]);


                Alert::success("church service has been successfully Updated", "CSICWCR");
                return redirect()->route('chservice.show');

                $this->reset();
            }



}
