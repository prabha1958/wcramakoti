<x-app-layout>
    <div class="min-h-screen bg-theme-l1 p-3">
        <div class="max-w-4xl mx-auto p-3 mt-52 text-center">
            <x-jet-validation-errors class="mb-4" />
            <form method="POST" action="{{ route('selsub.post') }}">
                @csrf

                <div>
                    <x-jet-label for="sub_amount" value="{{ __('Enter your monthly subscription amount') }}" class="mb-8 text-xl text-theme-l5" />
                    <x-jet-input id="amount" class="mt-1 p-2 w-40 mb-7" type="text" name="amount" :value="old('amount')" required autofocus />
                </div>
                <div>
                    <x-jet-label for="start_at" value="{{ __('Starting From ') }}" class="mb-8 text-xl text-theme-l5" />
                    <x-jet-input id="start_at" class="mt-1 p-2 w-40 mb-7" type="date" name="start_at" :value="old('start_at')" required autofocus />
                </div>

                <x-jet-button class="ml-4">
                    {{ __('Update') }}
                </x-jet-button>
            </div>
        </div>
    </div>
</x-app-layout>
