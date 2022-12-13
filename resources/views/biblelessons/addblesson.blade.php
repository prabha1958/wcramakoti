<x-app-layout>
    <div class="min-h-screen bg-theme-l1 p-3">
        <div class="max-w-4xl mx-auto p-3 mt-28 text-center">
            <x-jet-validation-errors class="mb-4" />


            <form method="POST" action="{{ route('sploffsel.post') }}">
                @csrf

                <div class="mt-4">
                   {{ __('Bible Lessons')}}
                </div>


                <div class="mt-4">
                    <x-jet-label for="dt_of_service" value="{{ __('Date of service') }}" />
                    <x-jet-input id="dt_of_service" class="block mt-1 max-w-xl mx-auto mb-10" type="date" name="dt_of_service" :value="old('dt_of_service')" required />
                </div>

                <div>
                    <x-jet-label for="verse1" value="{{ __('Lesson1verse') }}" class="mb-8 text-xl text-theme-l5" />
                    <x-jet-input id="verse1" class="mt-1 p-2 w-40 mb-7" type="text" name="verse1" :value="old('verse1')" required autofocus />
                </div>
                <div>
                    <x-jet-label for="lesson1" value="{{ __('Lesson1 ') }}" class="mb-8 text-xl text-theme-l5" />
                    <textarea id="lesson1"  rows="4" cols="60"  name="lesson1" :value="old('lesson1')" required autofocus></textarea>
                </div>
                <div>
                    <x-jet-label for="verse1" value="{{ __('Lesson2verse') }}" class="mb-8 text-xl text-theme-l5" />
                    <x-jet-input id="verse1" class="mt-1 p-2 w-40 mb-7" type="text" name="verse1" :value="old('verse1')" required autofocus />
                </div>
                <div>
                    <x-jet-label for="lesson1" value="{{ __('Lesson2 ') }}" class="mb-8 text-xl text-theme-l5" />
                    <textarea id="lesson1"  rows="4" cols="60"  name="lesson1" :value="old('lesson1')" required autofocus></textarea>
                </div>
                <div>
                    <x-jet-label for="verse1" value="{{ __('Lesson3verse') }}" class="mb-8 text-xl text-theme-l5" />
                    <x-jet-input id="verse1" class="mt-1 p-2 w-40 mb-7" type="text" name="verse1" :value="old('verse1')" required autofocus />
                </div>
                <div>
                    <x-jet-label for="lesson1" value="{{ __('Lesson3 ') }}" class="mb-8 text-xl text-theme-l5" />
                    <textarea id="lesson1"  rows="4" cols="60"  name="lesson1" :value="old('lesson1')" required autofocus></textarea>
                </div>
                <div>
                    <x-jet-label for="verse1" value="{{ __('Lesson4verse') }}" class="mb-8 text-xl text-theme-l5" />
                    <x-jet-input id="verse1" class="mt-1 p-2 w-40 mb-7" type="text" name="verse1" :value="old('verse1')" required autofocus />
                </div>
                <div>
                    <x-jet-label for="lesson1" value="{{ __('Lesson4 ') }}" class="mb-8 text-xl text-theme-l5" />
                    <textarea id="lesson1"  rows="4" cols="60"  name="lesson1" :value="old('lesson1')" required autofocus></textarea>
                </div>

                <x-jet-button class="ml-4">
                    {{ __('Submit') }}
                </x-jet-button>
            </div>
        </div>
    </div>
</x-app-layout>
