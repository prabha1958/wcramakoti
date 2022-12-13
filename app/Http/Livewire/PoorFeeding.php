<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;


class PoorFeeding extends Component
{

    use WithFileUploads;

    public $dt_of_pf, $sponsored1,$sponsored2,$sponsored3,$sponsored4,$no_meals,$volunteer1,$volunteer2,$volunteer3,$volunteer4,
            $summary,$pf_photo1,$pf_photo2,$pf_photo3,$pf_photo4;


            public $rules = [
                'dt_of_pf'      => ['required','date'],
                'sponsored1'    => ['required'],
                'sponsored2'    => ['sometimes'],
                'sponsored3'    => ['sometimes'],
                'sponsored4'    => ['sometimes'],
                'no_meals'      => ['required'],
                'volunteer1'    => ['required'],
                'volunteer2'    => ['sometimes'],
                'volunteer3'    => ['sometimes'],
                'volunteer4'    => ['sometimes'],
                'pf_photo1'    => ['required','mimes:png,jpg,jpeg,svg','max:2048'],
                'pf_photo2'    => ['sometimes','mimes:png,jpg,jpeg,svg','max:2048'],
                'pf_photo3'    => ['sometimes','mimes:png,jpg,jpeg,svg','max:2048'],
                'pf_photo4'    => ['sometimes','mimes:png,jpg,jpeg,svg','max:2048'],
                'summary'      => ['required','string'],

            ];

            public function updated($property){
                $this->validateOnly($property, $this->rules);
            }


            public function render()
            {
                $users = User::all();
                return view('livewire.poor-feeding',['users' => $users]);
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

            public function store() {

                if(!empty($this->pf_photo1)){
                    $imagePfphotoa = $this->pf_photo1;
                    $imageNewName1 = Str::random(20).'.'.$imagePfphotoa->getClientOriginalExtension();
                    $imageNewName2 = Str::random(20).'.'.$imagePfphotoa->getClientOriginalExtension();
                    $imageNewName3 = Str::random(20).'.'.$imagePfphotoa->getClientOriginalExtension();
                    $location1       = storage_path('app/public/poorfeeding/' . $imageNewName1);
                    $location2       = storage_path('app/public/poorfeeding/' . $imageNewName2);
                    $location3       = storage_path('app/public/poorfeeding/' . $imageNewName3);
                    Image::make($imagePfphotoa)->resize(200,150)->save($location1, 80);
                    Image::make($imagePfphotoa)->resize(500,450)->save($location2, 80);
                    Image::make($imagePfphotoa)->resize(1080,720)->save($location3, 80);
                }else{
                    $imageNewName1 = '';
                }


                if(!empty($this->pf_photo2)){
                    $imagePfphotob = $this->pf_photo2;
                    $imagePfphotob1 = Str::random(20).'.'.$imagePfphotob->getClientOriginalExtension();
                    $imagePfphotob2 = Str::random(20).'.'.$imagePfphotob->getClientOriginalExtension();
                    $imagePfphotob3 = Str::random(20).'.'.$imagePfphotob->getClientOriginalExtension();
                    $location1       = storage_path('app/public/poorfeeding/' . $imagePfphotob1);
                    $location2       = storage_path('app/public/poorfeeding/' . $imagePfphotob2);
                    $location3       = storage_path('app/public/poorfeeding/' . $imagePfphotob3);
                    Image::make($imagePfphotob)->resize(200,150)->save($location1, 80);
                    Image::make($imagePfphotob)->resize(500,450)->save($location2, 80);
                    Image::make($imagePfphotob)->resize(1080,720)->save($location3, 80);
                }else{
                    $imagePfphotob1 = '';
                }

                if(!empty($this->pf_photo3)){
                    $imagePfphotoc = $this->pf_photo3;
                    $imagePfphotoc1 = Str::random(20).'.'.$imagePfphotoc->getClientOriginalExtension();
                    $imagePfphotoc2 = Str::random(20).'.'.$imagePfphotoc->getClientOriginalExtension();
                    $imagePfphotoc3 = Str::random(20).'.'.$imagePfphotoc->getClientOriginalExtension();
                    $location1       = storage_path('app/public/poorfeeding/' . $imagePfphotoc1);
                    $location2       = storage_path('app/public/poorfeeding/' . $imagePfphotoc2);
                    $location3       = storage_path('app/public/poorfeeding/' . $imagePfphotoc3);
                    Image::make($imagePfphotoc)->resize(200,150)->save($location1, 80);
                    Image::make($imagePfphotoc)->resize(500,450)->save($location2, 80);
                    Image::make($imagePfphotoc)->resize(1080,720)->save($location3, 80);
                }else{
                    $imagePfphotoc1 = '';
                }

                if(!empty($this->pf_photo4)){
                    $imagePfphotod = $this->pf_photo4;
                    $imagePfphotod1 = Str::random(20).'.'.$imagePfphotod->getClientOriginalExtension();
                    $imagePfphotod2 = Str::random(20).'.'.$imagePfphotod->getClientOriginalExtension();
                    $imagePfphotod3 = Str::random(20).'.'.$imagePfphotod->getClientOriginalExtension();
                    $location1       = storage_path('app/public/poorfeeding/' . $imagePfphotod1);
                    $location2       = storage_path('app/public/poorfeeding/' . $imagePfphotod2);
                    $location3       = storage_path('app/public/poorfeeding/' . $imagePfphotod3);
                    Image::make($imagePfphotod)->resize(200,150)->save($location1, 80);
                    Image::make($imagePfphotod)->resize(500,450)->save($location2, 80);
                    Image::make($imagePfphotod)->resize(1080,720)->save($location3, 80);
                }else{
                    $imagePfphotod1 = '';
                }


                 PoorFeeding::create([
                    'dt_of_pf'     => $this->dt_of_pf,
                    'sponsored1'   => $this->sponsored1,
                    'sponsored2'   => $this->sponsored2,
                    'sponsored3'   => $this->sponsored3,
                    'sponsored4'   => $this->sponsored4,
                    'no_meals'     => $this->no_meals,
                    'volunteer1'   => $this->volunteer1,
                    'volunteer2'   => $this->volunteer2,
                    'volunteer3'   => $this->volunteer3,
                    'volunteer4'   => $this->volunteer4,
                    'pf_photo1'    => $imageNewName1,
                    'pf_photo2'    => $imagePfphotob1,
                    'pf_photo3'    => $imagePfphotoc1,
                    'pf_photo4'    => $imagePfphotod1,
                    'summary'     => $this->summary,

                 ]);


                 Alert::success("poor feeding details have been successfully added", "CSICWCR");
                 return redirect()->route('poorfeeding.show');

                 $this->reset();

            }
}
