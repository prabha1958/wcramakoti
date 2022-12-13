<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
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
                    @if(isset(Auth::user()->profile_photo_path))
                    <img src="{{Storage::url(Auth::user()->profile_photo_path)}}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                    @else
                    <img src="{{asset('images/dummy.jpeg')}}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
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

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="family_name" value="{{ __('Family Name') }}" />
            <x-jet-input id="family_name" type="text" class="mt-1 block w-full" wire:model.defer="state.family_name" autocomplete="family_name" />
            <x-jet-input-error for="family_name" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="first_name" value="{{ __('First Name') }}" />
            <x-jet-input id="first_name" type="text" class="mt-1 block w-full" wire:model.defer="state.first_name" autocomplete="first_name" />
            <x-jet-input-error for="first_name" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="last_name" value="{{ __('Last Name') }}" />
            <x-jet-input id="last_name" type="text" class="mt-1 block w-full" wire:model.defer="state.last_name" autocomplete="last_name" />
            <x-jet-input-error for="last_name" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="mobile" value="{{ __('Mobile') }}" />
            <x-jet-input id="mobile" type="text" class="mt-1 block w-full" wire:model.defer="state.mobile" autocomplete="mobile" />
            <x-jet-input-error for="mobile" class="mt-2" />
        </div>


        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Your email address is unverified.') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="dob" value="{{ __('Date of Birth') }}" />
            <x-jet-input id="dob" type="date" class="mt-1 block w-full" wire:model.defer="state.dob" autocomplete="dob" />
            <x-jet-input-error for="dob" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="line1" value="{{ __('Address Line 1') }}" />
            <x-jet-input id="line1" type="text" class="mt-1 block w-full" wire:model.defer="state.line1" autocomplete="line1" />
            <x-jet-input-error for="line1" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="line2" value="{{ __('Address Line 2') }}" />
            <x-jet-input id="line2" type="text" class="mt-1 block w-full" wire:model.defer="state.line2" autocomplete="line2" />
            <x-jet-input-error for="line2" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="city" value="{{ __('city Name') }}" />
            <x-jet-input id="city" type="text" class="mt-1 block w-full" wire:model.defer="state.city" autocomplete="city" />
            <x-jet-input-error for="city" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="state" value="{{ __('state Name') }}" />
            <x-jet-input id="state" type="text" class="mt-1 block w-full" wire:model.defer="state.state" autocomplete="state" />
            <x-jet-input-error for="state" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="pin" value="{{ __('PIN') }}" />
            <x-jet-input id="pin" type="text" class="mt-1 block w-full" wire:model.defer="state.pin" autocomplete="pin" />
            <x-jet-input-error for="pin" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
