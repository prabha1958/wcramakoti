<div>
    <div>
        <x-jet-button wire:click="showModal" wire:loading.attr="disabled" class="p-4 text-theme-l4 cursor-pointer">
           Edit
        </x-jet-button>

        <x-jet-dialog-modal wire:model="showingModal" >

            <x-slot name="title">
              Edit Pastor details
            </x-slot>

            <x-slot name="content">

                <x-jet-authentication-card>
                    <x-slot name="logo">
                        <x-jet-authentication-card-logo  />
                    </x-slot>

                    <x-jet-validation-errors class="mb-4" />
                    <x-alert/>


        <form wire:submit.prevent="update" enctype="multipart/form-data">
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    @if(isset($this->profile_photo))
                    <img src="{{ asset('pastors/'.$this->profile_photo)}}" alt="{{ $this->first_name }}" class="rounded-full h-20 w-20 object-cover">
                    @else
                    <img src="{{asset('images/dummy.jpeg')}}" alt="{{ $this->first_name }}" class="rounded-full h-20 w-20 object-cover">
                    @endif

                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>



                <x-jet-input-error for="photo" class="mt-2" />
            </div>


            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="family_name" value="{{ __('Family Name') }}" />
                <x-jet-input wire:model.lazy="family_name" id="family_name" type="text" class="mt-1 block w-full"  autocomplete="family_name" />
                <x-jet-input-error for="family_name" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="first_name" value="{{ __('First Name') }}" />
                <x-jet-input wire:model.lazy="first_name" id="first_name" type="text" class="mt-1 block w-full"  autocomplete="first_name" />
                <x-jet-input-error for="first_name" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="last_name" value="{{ __('Last Name') }}" />
                <x-jet-input wire:model.lazy="last_name" id="last_name" type="text" class="mt-1 block w-full"  autocomplete="last_name" />
                <x-jet-input-error for="last_name" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="mobile" value="{{ __('Mobile') }}" />
                <x-jet-input wire:model.lazy="mobile" id="mobile" type="text" class="mt-1 block w-full" />
                <x-jet-input-error for="mobile" class="mt-2" />
            </div>


            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input wire:model.lazy="email" id="email" type="email" class="mt-1 block w-full"  />
                <x-jet-input-error for="email" class="mt-2" />


            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="dob" value="{{ __('Date of Birth') }}" />
                <x-jet-input wire:model.lazy="dob" id="dob" type="date" class="mt-1 block w-full" autocomplete="dob" />
                <x-jet-input-error for="dob" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="equal" value="{{ __('Address equal') }}" />
                <x-jet-input wire:model.lazy="equal" id="equal" type="text" class="mt-1 block w-full"  autocomplete="equal" />
                <x-jet-input-error for="equal" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="bio" value="{{ __('Bio') }}" />
                <textarea wire:model.lazy="bio" id="bio" type="text" class="mt-1 block w-full"  autocomplete="bio">{{ $this->bio}} </textarea>
                <x-jet-input-error for="bio" class="mt-2" />
            </div>


            <div class="mt-4 col-span-6 sm:col-span-4">
                <x-jet-button  wire:loading.attr="disabled" >
                    {{ __('Update') }}
                </x-jet-button>
            </div>

        </form>
                </x-jet-authentication-card>



            </x-slot>


            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('showingModal', false)" wire:loading.attr="disabled">
                    {{ __('Cancel')  }}
                 </x-jet-secondary-button>
            </x-slot>

        </x-jet-dialog-modal>

    </div>

</div>
