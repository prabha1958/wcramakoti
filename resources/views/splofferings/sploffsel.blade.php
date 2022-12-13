<x-app-layout>
    <div class="min-h-screen bg-theme-l1 p-3">
        <div class="max-w-4xl mx-auto p-3 mt-52 text-center">
            <x-jet-validation-errors class="mb-4" />
            <form method="POST" action="{{ route('sploffsel.post') }}">
                @csrf

                <div>
                    <x-jet-label for="sploff_amount" value="{{ __('Enter your special offering amount') }}" class="mb-8 text-xl text-theme-l5" />
                    <x-jet-input id="amount" class="mt-1 p-2 w-40 mb-7" type="text" name="amount" :value="old('amount')" required autofocus />
                </div>
                <div>
                    <x-jet-label for="purpose" value="{{ __('Purpose ') }}" class="mb-8 text-xl text-theme-l5" />
                    <textarea id="purpose"  rows="4" cols="50"  name="purpose" :value="old('purpose')" required autofocus></textarea>
                </div>

                <x-jet-button class="ml-4">
                    {{ __('Submit') }}
                </x-jet-button>
            </div>
        </div>
    </div>
</x-app-layout>
