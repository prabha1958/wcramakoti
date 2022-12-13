<div>
    <div >
        <x-jet-button wire:click="showModal" wire:loading.attr="disabled" class="p-4 mt-4 text-theme-l4 cursor-pointer">
            Add New
         </x-jet-button>
         <x-jet-dialog-modal wire:model="showingModal"  >
                <x-slot name="title" >
                    ADD CHURCH SERVICE
                </x-slot>
        <x-slot name="content" >

            <form wire:submit.prevent="store"  enctype="multipart/form-data">
                @csrf

                <div class="mt-4">
                   {{ __('Add Church Service')}}
                </div>


                <div class="mt-4">
                    <x-jet-label for="dt_service" value="{{ __('Date of service') }}" />
                    <x-jet-input wire:model.lazy="dt_service" id="dt_service" class="block mt-1 max-w-xl mx-auto mb-4" type="date" name="dt_service" :value="old('dt_service')" required />
                </br>@error('dt_service') <span class="text-sm text-red-300 mt-1">{{ $message }}</span> @enderror
                </div>

                <div>
                    <x-jet-label for="time" value="{{ __('Time of Service') }}" class="mb-8 text-xl text-theme-l5" />
                    <select wire:model.lazy="time" type="text" name="time" id="placeOfBirth" autocomplete="time"  placeholder="Education Qualifications"
                    class="selected mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2 w-full shadow-sm sm:text-sm @error('edufield_id') border-red-700  @enderror">

                    <option value="">-- select time of service --</option>
                    <option value="6.30 AM">-- 6.30 AM --</option>
                    <option value="9.30 AM">-- 9.30 AM --</option>
                    <option value="6.30 PM">-- 6.30 PM --</option>
                   </select>
                   @error('time') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                </div>
                <div class="mt-4">
                    <x-jet-label for="theme" value="{{ __('Theme of Service') }}" />
                    <x-jet-input wire:model.lazy="theme" id="theme" class="block mt-1 mx-auto mb-4" type="text" name="theme" :value="old('theme')" required />
                </br>@error('theme') <span class="text-sm text-red-300 mt-1">{{ $message }}</span> @enderror
                </div>
                <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4 mb-4">
                    <!-- Profile Photo File Input -->
                    <input type="file" class="hidden"
                                wire:model.lazy ="theme_photo"
                                x-ref="photo"
                                x-on:change="
                                        photoName = $refs.photo.files[0].name;
                                        const reader = new FileReader();
                                        reader.onload = (e) => {
                                            photoPreview = e.target.result;
                                        };
                                        reader.readAsDataURL($refs.photo.files[0]);
                                " />

                    <x-jet-label for="photo" value="{{ __('Theme Photo') }}" />

                    <!-- New Profile Photo Preview -->
                    <div class="mt-2 " x-show="photoPreview" style="display: none;">
                        <span class="block  w-20 h-20 bg-cover bg-no-repeat bg-center "
                              x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                        </span>
                    </div>

                    <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                        {{ __('Select Theme Photo') }}
                    </x-jet-secondary-button>
                    <x-jet-input-error for="theme_photo" class="mt-2" />
                </div>
                <div>
                    <x-jet-label for="sermon" value="{{ __('Sermon  ') }}" class="mb-8 text-xl text-theme-l5" />
                    <x-textarea  wire:model.lazy="sermon" id="sermon"  rows="4" cols="50"  name="sermon" :value="old('sermon')"  required autofocus></x-textarea>
                    </br>@error('sermon') <span class="text-sm text-red-300 mt-1">{{ $message }}</span> @enderror
                </div>
                <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                    <!-- Profile Photo File Input -->
                    <input type="file" class="hidden"
                                wire:model.lazy ="audience_photo"
                                x-ref="photo"
                                x-on:change="
                                        photoName = $refs.photo.files[0].name;
                                        const reader = new FileReader();
                                        reader.onload = (e) => {
                                            photoPreview = e.target.result;
                                        };
                                        reader.readAsDataURL($refs.photo.files[0]);
                                " />

                    <x-jet-label for="photo" value="{{ __('Audience Photo') }}" />

                    <!-- New Profile Photo Preview -->
                    <div class="mt-2 " x-show="photoPreview" style="display: none;">
                        <span class="block  w-20 h-20 bg-cover bg-no-repeat bg-center "
                              x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                        </span>
                    </div>

                    <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                        {{ __('Select Audience Photo') }}
                    </x-jet-secondary-button>
                    <x-jet-input-error for="audience_photo" class="mt-2" />
                </div>

                <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                    <!-- Profile Photo File Input -->
                    <input type="file" class="hidden"
                                wire:model.lazy ="choir_photo"
                                x-ref="photo"
                                x-on:change="
                                        photoName = $refs.photo.files[0].name;
                                        const reader = new FileReader();
                                        reader.onload = (e) => {
                                            photoPreview = e.target.result;
                                        };
                                        reader.readAsDataURL($refs.photo.files[0]);
                                " />

                    <x-jet-label for="photo" value="{{ __('Choir Photo') }}" />

                    <!-- New Profile Photo Preview -->
                    <div class="mt-2 " x-show="photoPreview" style="display: none;">
                        <span class="block  w-20 h-20 bg-cover bg-no-repeat bg-center "
                              x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                        </span>
                    </div>

                    <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                        {{ __('Select Choir Photo') }}
                    </x-jet-secondary-button>
                    <x-jet-input-error for="choir_photo" class="mt-2" />
                </div>
                <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                    <!-- Profile Photo File Input -->
                    <input type="file" class="hidden"
                                wire:model.lazy ="pastor_photo"
                                x-ref="photo"
                                x-on:change="
                                        photoName = $refs.photo.files[0].name;
                                        const reader = new FileReader();
                                        reader.onload = (e) => {
                                            photoPreview = e.target.result;
                                        };
                                        reader.readAsDataURL($refs.photo.files[0]);
                                " />

                    <x-jet-label for="photo" value="{{ __('Pastor Photo') }}" />

                    <!-- New Profile Photo Preview -->
                    <div class="mt-2 " x-show="photoPreview" style="display: none;">
                        <span class="block  w-20 h-20 bg-cover bg-no-repeat bg-center "
                              x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                        </span>
                    </div>

                    <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                        {{ __('Select Pastor Photo') }}
                    </x-jet-secondary-button>
                    <x-jet-input-error for="pastor_photo" class="mt-2" />
                </div>
                <div>
                    <x-jet-label for="pastor_id" value="{{ __('Sermon by') }}" class="mb-8 text-xl text-theme-l5" />
                    <select wire:model.lazy="pastor_id" type="text" name="pastor_id" id="placeOfBirth" autocomplete="pastor_id"  placeholder="Education Qualifications"
                    class="selected mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2 w-full shadow-sm sm:text-sm @error('pastor_id') border-red-700  @enderror">

                    <option value="">-- select pastor  --</option>
                    @foreach ($pastors as $pastor )
                      <option value="{{ $pastor->id}}">{{ $pastor->first_name.''.$pastor->last_name}}</option>
                    @endforeach

                   </select>
                   @error('pastor_id') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                </div>
                <div>
                    <x-jet-label for="blesson_id" value="{{ __('Bible lessons') }}" class="mb-8 text-xl text-theme-l5" />
                    <select wire:model.lazy="blesson_id" type="text" name="blesson_id" id="placeOfBirth" autocomplete="blesson_id"  placeholder="Education Qualifications"
                    class="selected mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2 w-full shadow-sm sm:text-sm @error('blesson_id') border-red-700  @enderror">

                    <option value="">-- select bible lessons  --</option>
                    @foreach ($blessons as $blesson )
                      <option value="{{ $blesson->id}}">{{ $blesson->dt }}</option>
                    @endforeach

                   </select>
                   @error('blesson_id') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                </div>


                <x-jet-button class="ml-4 mt-4" wire:loading.attr="disabled">
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
