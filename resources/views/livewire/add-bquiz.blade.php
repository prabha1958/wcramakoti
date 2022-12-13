<div>
    <x-jet-button wire:click="showModal" wire:loading.attr="disabled" class="p-4 mt-4 text-theme-l4 cursor-pointer">
        Add New
     </x-jet-button>
     <x-jet-dialog-modal wire:model="showingModal"  >
            <x-slot name="title" >
                ADD BIBLE QUIZ QUESTION
            </x-slot>
    <x-slot name="content" >

     <x-jet-authentication-card>
            <x-slot name="logo">
                <x-jet-authentication-card-logo />
            </x-slot>
        <form wire:submit.prevent="store">
            @csrf

            <div class="mt-4">
               {{ __('Bible Quiz Questions')}}

            </div>



            <div>
                <x-jet-label for="question" value="{{ __('Question') }}" class="mb-8 text-xl text-theme-l5" />
                <x-jet-input  wire:model.lazy="question" id="question" class="mt-1 p-2 w-80 mb-7" type="text"  name="question" :value="old('question')" required autofocus />
                </br>@error('question') <span class="text-sm text-red-300 mt-1">{{ $message }}</span> @enderror
            </div>
            <div>
                <x-jet-label for="option1" value="{{ __('Option 1') }}" class="mb-8 text-xl text-theme-l5" />
                <x-jet-input  wire:model.lazy="option1" id="option1" class="mt-1 p-2 w-80 mb-7" type="text"  name="option1" :value="old('option1')" required autofocus />
                </br>@error('option1') <span class="text-sm text-red-300 mt-1">{{ $message }}</span> @enderror
            </div>
            <div>
                <x-jet-label for="option2" value="{{ __('Option 2') }}" class="mb-8 text-xl text-theme-l5" />
                <x-jet-input  wire:model.lazy="option2" id="option2" class="mt-1 p-2 w-80 mb-7" type="text"  name="option2" :value="old('option2')" required autofocus />
                </br>@error('option2') <span class="text-sm text-red-300 mt-1">{{ $message }}</span> @enderror
            </div>
            <div>
                <x-jet-label for="option3" value="{{ __('Option 3') }}" class="mb-8 text-xl text-theme-l5" />
                <x-jet-input  wire:model.lazy="option3" id="option3" class="mt-1 p-2 w-80 mb-7" type="text"  name="option3" :value="old('option3')" required autofocus />
                </br>@error('option3') <span class="text-sm text-red-300 mt-1">{{ $message }}</span> @enderror
            </div>
            <div>
                <x-jet-label for="option4" value="{{ __('Option 4') }}" class="mb-8 text-xl text-theme-l5" />
                <x-jet-input  wire:model.lazy="option4" id="option4" class="mt-1 p-2 w-80 mb-7" type="text"  name="option4" :value="old('option4')" required autofocus />
                </br>@error('option4') <span class="text-sm text-red-300 mt-1">{{ $message }}</span> @enderror
            </div>
            <div>
                <x-jet-label for="ans" value="{{ __('Answer') }}" class="mb-8 text-xl text-theme-l5" />
                <x-jet-input  wire:model.lazy="ans" id="ans" class="mt-1 p-2 w-80 mb-7" type="text"  name="ans" :value="old('ans')" required autofocus />
                </br>@error('ans') <span class="text-sm text-red-300 mt-1">{{ $message }}</span> @enderror
            </div>


            <x-jet-button class="ml-4" wire:submit-prevent="store" wire:loading.attr="disabled">
                {{ __('Submit') }}
            </x-jet-button>
        </div>
    </form>
    </x-authentication-card>
    </x-slot>
    <x-slot name="footer" >
        <x-jet-secondary-button wire:click="$set('showingModal', false)" wire:loading.attr="disabled">
            {{ __('Cancel')  }}
         </x-jet-secondary-button>
    </x-slot>
</x-jet-dialog-modal>
</div>
