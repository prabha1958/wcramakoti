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

class AddChurchService extends Component
{

    use WithFileUploads;

    public $dt_service,$time,$theme,$theme_photo,$sermon,$audience_photo,$choir_photo,$pastor_photo,
            $pastor_id,$blesson_id;


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
                return view('livewire.add-church-service',[
                    'pastors'  => $pastors,
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

            public function store(){
            if(!empty($this->theme_photo)){
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
            }


            if(!empty($this->choir_photo)){
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
            }


            if(!empty($this->audience_photo)){
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

            }

            if(!empty($this->pastor_photo)){
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

            }







                ChurchService::create([
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


                Alert::success("church service has been successfully added", "CSICWCR");
                return redirect()->route('chservice.show');

                $this->reset();
            }



}
