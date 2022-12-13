<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('registration') }}">
            @csrf

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
                <x-jet-label for="dob" value="{{ __('Date of Birth') }}" />
                <x-jet-input id="dob" class="block mt-1 w-full" type="date" name="dob" :value="old('dob')" required />
            </div>
            <div>
                <x-jet-label for="area" value="{{ __('Area Number') }}"  />
                <select wire:model.lazy="area" type="text" name="area" id="area" autocomplete="area"   :value="old('area')"
                class="selected mt-1 focus:ring-indigo-500 focus:border-indigo-500 block bg-gray-100 p-2 w-full shadow-sm sm:text-sm @error('area') border-red-700  @enderror">

                <option value="">-- select area number  --</option>
                <option value="01" >-- 1 --</option>
                <option value="02" >-- 2 --</option>
                <option value="03" >-- 3 --</option>
                <option value="04" >-- 4 --</option>
                <option value="05" >-- 5 --</option>
                <option value="06" >-- 6 --</option>
                <option value="07" >-- 7 --</option>
                <option value="08" >-- 8 --</option>
                <option value="09" >-- 9 --</option>
                <option value="10" >-- 10 --</option>
                <option value="11" >-- 11 --</option>
                <option value="12" >-- 12 --</option>

               </select>
               @error('area') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
            </div>
            <div>
                <x-jet-label for="line1" value="{{ __('Address Line1') }}" />
                <x-jet-input id="line1" class="block mt-1 w-full" type="text" name="line1" :value="old('line1')" required autofocus autocomplete="house_no" />
            </div>
            <div>
                <x-jet-label for="line2" value="{{ __('Address Line2') }}" />
                <x-jet-input id="line2" class="block mt-1 w-full" type="text" name="line2" :value="old('line2')" required autofocus autocomplete="premises" />
            </div>
            <div>
                <x-jet-label for="city" value="{{ __('City') }}" />
                <x-jet-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required autofocus autocomplete="city" />
            </div>
            <div>
                <x-jet-label for="state" value="{{ __('State') }}" />
                <x-jet-input id="state" class="block mt-1 w-full" type="text" name="state" :value="old('state')" required autofocus autocomplete="city" />
            </div>
            <div>
                <x-jet-label for="pin" value="{{ __('PIN') }}" />
                <x-jet-input id="pin" class="block mt-1 w-full" type="text" name="pin" :value="old('pin')" required autofocus autocomplete="pin" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
