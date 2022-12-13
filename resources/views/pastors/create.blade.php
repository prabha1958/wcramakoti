<x-app-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />
        <x-alert/>

        <form method="POST" action="{{ route('create.pastor') }}" enctype="multipart/form-data">
            @csrf

            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            name ="photo"
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

            <div>
                <x-jet-label for="family_name" value="{{ __('Family Name') }}" />
                <x-jet-input id="family_name" class="block mt-1 w-full" type="text" name="family_name" :value="old('family_name')" required autofocus autocomplete="family_name" />
            </div>
            <div>
                <x-jet-label for="first_name" value="{{ __('First Name') }}" />
                <x-jet-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
            </div>
            <div>
                <x-jet-label for="last_name" value="{{ __('Last Name') }}" />
                <x-jet-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
            </div>
            <div>
                <x-jet-label for="mobile" value="{{ __('Mobile') }}" />
                <x-jet-input id="mobile" class="block mt-1 w-full" type="text" name="mobile" :value="old('mobile')" required autofocus autocomplete="mobile" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            <div class="mt-4">
                <x-jet-label for="dob" value="{{ __('Date of birth') }}" />
                <x-jet-input id="dob" class="block mt-1 w-full" type="date" name="dob" :value="old('dob')" required />
            </div>
            <div>
                <x-jet-label for="equal" value="{{ __('Educational Qualifications') }}" />
                <x-jet-input id="equal" class="block mt-1 w-full" type="text" name="equal" :value="old('equal')" required autofocus autocomplete="first_name" />
            </div>
            <div class="mt-4">
                <x-jet-label for="bio" value="{{ __('Bio') }}" />
                <textarea id="bio"  rows="4" cols="40"  name="bio" :value="old('bio')" required autofocus></textarea>
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-jet-button class="ml-4">
                    {{ __('Create Pastor') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-app-layout>
