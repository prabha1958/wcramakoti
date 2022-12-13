<div>
    <div >
        <x-jet-button wire:click="showModal" wire:loading.attr="disabled" class="p-4 mt-4 text-theme-l4 cursor-pointer">
            Add New
         </x-jet-button>
         <x-jet-dialog-modal wire:model="showingModal"  >
                <x-slot name="title" >
                    ADD POOR FEEDING DETAILS
                </x-slot>
        <x-slot name="content" >

            <form wire:submit.prevent="store"  enctype="multipart/form-data">
                @csrf

                <div class="mt-4">
                   {{ __('Add Poor Feeding details')}}
                </div>


                <div class="mt-4">
                    <x-jet-label for="dt_of_pf" value="{{ __('Date of service') }}" />
                    <x-jet-input wire:model.lazy="dt_of_pf" id="dt_of_pf" class="block mt-1 max-w-xl mx-auto mb-4" type="date" name="dt_of_pf" :value="old('dt_of_pf')" required />
                </br>@error('dt_of_pf') <span class="text-sm text-red-300 mt-1">{{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                    <x-jet-label for="no_meals" value="{{ __('Total No of Meals served') }}" />
                    <x-jet-input wire:model.lazy="no_meals" id="no_meals" class="block mt-1 mx-auto mb-4" type="text" name="no_meals" :value="old('no_meals')" required />
                </br>@error('no_meals') <span class="text-sm text-red-300 mt-1">{{ $message }}</span> @enderror
                </div>
                <div>
                    <x-jet-label for="sponsored1" value="{{ __('Sponsored 1') }}" class="mb-8 text-xl text-theme-l5" />
                    <select wire:model.lazy="sponsored1" type="text" name="sponsored1" id="placeOfBirth" autocomplete="sponsored1"  placeholder="Education Qualifications"
                    class="selected mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2 w-full shadow-sm sm:text-sm @error('sponsored1') border-red-700  @enderror">

                    <option value="">-- select bible lessons  --</option>
                    @foreach ($users as $user )
                      <option value="{{ $user->id}}">{{ $user->first_name.''.$user->last_name.' '.$user->family_name }}</option>
                    @endforeach

                   </select>
                   @error('sponsored1') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                </div>
                <div>
                    <x-jet-label for="sponsored2" value="{{ __('Sponsored 2') }}" class="mb-8 text-xl text-theme-l5" />
                    <select wire:model.lazy="sponsored2" type="text" name="sponsored2" id="placeOfBirth" autocomplete="sponsored2"  placeholder="Education Qualifications"
                    class="selected mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2 w-full shadow-sm sm:text-sm @error('sponsored2') border-red-700  @enderror">

                    <option value="">-- select bible lessons  --</option>
                    @foreach ($users as $user )
                      <option value="{{ $user->id}}">{{ $user->first_name.''.$user->last_name.' '.$user->family_name }}</option>
                    @endforeach

                   </select>
                   @error('sponsored2') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                </div>
                <div>
                    <x-jet-label for="sponsored3" value="{{ __('Sponsored 3') }}" class="mb-8 text-xl text-theme-l5" />
                    <select wire:model.lazy="sponsored3" type="text" name="sponsored3" id="placeOfBirth" autocomplete="sponsored3"  placeholder="Education Qualifications"
                    class="selected mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2 w-full shadow-sm sm:text-sm @error('sponsored3') border-red-700  @enderror">

                    <option value="">-- select bible lessons  --</option>
                    @foreach ($users as $user )
                      <option value="{{ $user->id}}">{{ $user->first_name.''.$user->last_name.' '.$user->family_name }}</option>
                    @endforeach

                   </select>
                   @error('sponsored4') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                </div>
                <div>
                    <x-jet-label for="sponsored4" value="{{ __('Sponsored 3') }}" class="mb-8 text-xl text-theme-l5" />
                    <select wire:model.lazy="sponsored4" type="text" name="sponsored4" id="placeOfBirth" autocomplete="sponsored4"  placeholder="Education Qualifications"
                    class="selected mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2 w-full shadow-sm sm:text-sm @error('sponsored4') border-red-700  @enderror">

                    <option value="">-- select bible lessons  --</option>
                    @foreach ($users as $user )
                      <option value="{{ $user->id}}">{{ $user->first_name.''.$user->last_name.' '.$user->family_name }}</option>
                    @endforeach

                   </select>
                   @error('sponsored4') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                </div>


                <div>
                    <x-jet-label for="volunteer1" value="{{ __('volunteer 1') }}" class="mb-8 text-xl text-theme-l5" />
                    <select wire:model.lazy="volunteer1" type="text" name="volunteer1" id="placeOfBirth" autocomplete="volunteer1"  placeholder="Education Qualifications"
                    class="selected mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2 w-full shadow-sm sm:text-sm @error('volunteer1') border-red-700  @enderror">

                    <option value="">-- select bible lessons  --</option>
                    @foreach ($users as $user )
                      <option value="{{ $user->id}}">{{ $user->first_name.''.$user->last_name.' '.$user->family_name }}</option>
                    @endforeach

                   </select>
                   @error('volunteer1') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                </div>
                <div>
                    <x-jet-label for="volunteer2" value="{{ __('volunteer 2') }}" class="mb-8 text-xl text-theme-l5" />
                    <select wire:model.lazy="volunteer2" type="text" name="volunteer2" id="placeOfBirth" autocomplete="volunteer2"  placeholder="Education Qualifications"
                    class="selected mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2 w-full shadow-sm sm:text-sm @error('volunteer2') border-red-700  @enderror">

                    <option value="">-- select bible lessons  --</option>
                    @foreach ($users as $user )
                      <option value="{{ $user->id}}">{{ $user->first_name.''.$user->last_name.' '.$user->family_name }}</option>
                    @endforeach

                   </select>
                   @error('volunteer2') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                </div>
                <div>
                    <x-jet-label for="volunteer3" value="{{ __('volunteer 3') }}" class="mb-8 text-xl text-theme-l5" />
                    <select wire:model.lazy="volunteer3" type="text" name="volunteer3" id="placeOfBirth" autocomplete="volunteer3"  placeholder="Education Qualifications"
                    class="selected mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2 w-full shadow-sm sm:text-sm @error('volunteer3') border-red-700  @enderror">

                    <option value="">-- select bible lessons  --</option>
                    @foreach ($users as $user )
                      <option value="{{ $user->id}}">{{ $user->first_name.''.$user->last_name.' '.$user->family_name }}</option>
                    @endforeach

                   </select>
                   @error('volunteer3') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                </div>
                <div>
                    <x-jet-label for="volunteer4" value="{{ __('volunteer 3') }}" class="mb-8 text-xl text-theme-l5" />
                    <select wire:model.lazy="volunteer4" type="text" name="volunteer4" id="placeOfBirth" autocomplete="volunteer4"  placeholder="Education Qualifications"
                    class="selected mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2 w-full shadow-sm sm:text-sm @error('volunteer4') border-red-700  @enderror">

                    <option value="">-- select bible lessons  --</option>
                    @foreach ($users as $user )
                      <option value="{{ $user->id}}">{{ $user->first_name.''.$user->last_name.' '.$user->family_name }}</option>
                    @endforeach

                   </select>
                   @error('volunteer4') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                </div>
                <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4 mb-4">
                    <!-- Profile Photo File Input -->
                    <input type="file" class="hidden"
                                wire:model.lazy ="pf_photo1"
                                x-ref="photo"
                                x-on:change="
                                        photoName = $refs.photo.files[0].name;
                                        const reader = new FileReader();
                                        reader.onload = (e) => {
                                            photoPreview = e.target.result;
                                        };
                                        reader.readAsDataURL($refs.photo.files[0]);
                                " />

                    <x-jet-label for="photo" value="{{ __('Photo 1') }}" />

                    <!-- New Profile Photo Preview -->
                    <div class="mt-2 " x-show="photoPreview" style="display: none;">
                        <span class="block  w-20 h-20 bg-cover bg-no-repeat bg-center "
                              x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                        </span>
                    </div>

                    <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                        {{ __('Select  Photo 1') }}
                    </x-jet-secondary-button>
                    <x-jet-input-error for="pf_photo1" class="mt-2" />
                </div>

                <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4 mb-4">
                    <!-- Profile Photo File Input -->
                    <input type="file" class="hidden"
                                wire:model.lazy ="pf_photo2"
                                x-ref="photo"
                                x-on:change="
                                        photoName = $refs.photo.files[0].name;
                                        const reader = new FileReader();
                                        reader.onload = (e) => {
                                            photoPreview = e.target.result;
                                        };
                                        reader.readAsDataURL($refs.photo.files[0]);
                                " />

                    <x-jet-label for="photo" value="{{ __('Photo 2') }}" />

                    <!-- New Profile Photo Preview -->
                    <div class="mt-2 " x-show="photoPreview" style="display: none;">
                        <span class="block  w-20 h-20 bg-cover bg-no-repeat bg-center "
                              x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                        </span>
                    </div>

                    <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                        {{ __('Select  Photo 2') }}
                    </x-jet-secondary-button>
                    <x-jet-input-error for="pf_photo2" class="mt-2" />
                </div>
                <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4 mb-4">
                    <!-- Profile Photo File Input -->
                    <input type="file" class="hidden"
                                wire:model.lazy ="pf_photo3"
                                x-ref="photo"
                                x-on:change="
                                        photoName = $refs.photo.files[0].name;
                                        const reader = new FileReader();
                                        reader.onload = (e) => {
                                            photoPreview = e.target.result;
                                        };
                                        reader.readAsDataURL($refs.photo.files[0]);
                                " />

                    <x-jet-label for="photo" value="{{ __('Photo 3') }}" />

                    <!-- New Profile Photo Preview -->
                    <div class="mt-2 " x-show="photoPreview" style="display: none;">
                        <span class="block  w-20 h-20 bg-cover bg-no-repeat bg-center "
                              x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                        </span>
                    </div>

                    <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                        {{ __('Select  Photo 3') }}
                    </x-jet-secondary-button>
                    <x-jet-input-error for="pf_photo3" class="mt-2" />
                </div>
                <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4 mb-4">
                    <!-- Profile Photo File Input -->
                    <input type="file" class="hidden"
                                wire:model.lazy ="pf_photo4"
                                x-ref="photo"
                                x-on:change="
                                        photoName = $refs.photo.files[0].name;
                                        const reader = new FileReader();
                                        reader.onload = (e) => {
                                            photoPreview = e.target.result;
                                        };
                                        reader.readAsDataURL($refs.photo.files[0]);
                                " />

                    <x-jet-label for="photo" value="{{ __('Photo 4') }}" />

                    <!-- New Profile Photo Preview -->
                    <div class="mt-2 " x-show="photoPreview" style="display: none;">
                        <span class="block  w-20 h-20 bg-cover bg-no-repeat bg-center "
                              x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                        </span>
                    </div>

                    <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                        {{ __('Select  Photo 4') }}
                    </x-jet-secondary-button>
                    <x-jet-input-error for="pf_photo4" class="mt-2" />
                </div>
                <div>
                    <x-jet-label for="summary" value="{{ __('summary  ') }}" class="mb-8 text-xl text-theme-l5" />
                    <x-textarea  wire:model.lazy="summary" id="summary"  rows="4" cols="50"  name="summary" :value="old('summary')"  required autofocus></x-textarea>
                    </br>@error('summary') <span class="text-sm text-red-300 mt-1">{{ $message }}</span> @enderror
                </div>




                <x-jet-button class="ml-4 mt-4" wire:submit.prevent="store" wire:loading.attr="disabled">
                    {{ __('Submit') }}
                </x-jet-button>
            </div>
        </form>
        </x-slot>
        <x-slot name="footer" >
            <x-jet-secondary-button wire:click="$set('showingModal', false)" wire:loading.attr="disabled">
                {{ __('Cancel')  }}
             </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
    </div>

</div>

