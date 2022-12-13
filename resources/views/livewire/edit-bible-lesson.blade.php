<div>
    <x-jet-button wire:click="showModal" wire:loading.attr="disabled" class="p-4 text-theme-l4 cursor-pointer">
        Edit
      </x-jet-button>
      <x-jet-dialog-modal wire:model="showingModal"  >
             <x-slot name="title" >
                 EDIT BIBLE LESSON
             </x-slot>
     <x-slot name="content" >


         <form wire:submit.prevent="update">
             @csrf

             <div class="mt-4">
                {{ __('Bible Lessons')}}
                {{ $this->dt_of_service}}
             </div>


             <div class="mt-4">
                 <x-jet-label for="dt_of_service" value="{{ __('Date of service') }}" />
                 <x-jet-input wire:model.lazy="dt_of_service" id="dt_of_service" class="block mt-1 max-w-xl mx-auto mb-10" type="date" name="dt_of_service" :value="old('dt_of_service')" required />
             </br>@error('dt_of_service') <span class="text-sm text-red-300 mt-1">{{ $message }}</span> @enderror
             </div>

             <div>
                 <x-jet-label for="verse1" value="{{ __('Lesson1verse') }}" class="mb-8 text-xl text-theme-l5" />
                 <x-jet-input  wire:model.lazy="verse1" id="verse1" class="mt-1 p-2 w-40 mb-7" type="text"  name="verse1" :value="old('verse1')" required autofocus />
                 </br>@error('verse1') <span class="text-sm text-red-300 mt-1">{{ $message }}</span> @enderror
             </div>
             <div>
                 <x-jet-label for="lesson1" value="{{ __('Lesson1 ') }}" class="mb-8 text-xl text-theme-l5" />
                 <x-textarea  wire:model.lazy="lesson1" id="lesson1"  rows="4" cols="50"  name="lesson1" :value="old('lesson1')"  required autofocus></x-textarea>
                 </br>@error('lesson1') <span class="text-sm text-red-300 mt-1">{{ $message }}</span> @enderror
             </div>
             <div>
                 <x-jet-label for="verse2" value="{{ __('Lesson2verse') }}" class="mb-8 text-xl text-theme-l5" />
                 <x-jet-input wire:model.lazy="verse2" id="verse2"  class="mt-1 p-2 w-40 mb-7" type="text" name="verse2" :value="old('verse2')" required autofocus />
                 </br>@error('verse2') <span class="text-sm text-red-300 mt-1">{{ $message }}</span> @enderror
             </div>
             <div>
                 <x-jet-label for="lesson2" value="{{ __('Lesson2 ') }}" class="mb-8 text-xl text-theme-l5" />
                 <x-textarea wire:model.lazy="lesson2" id="lesson2"   rows="4" cols="60"  name="lesson2" :value="old('lesson2')" required autofocus></x-textarea>
             </br> @error('lesson2') <span class="text-sm text-red-300 mt-1">{{ $message }}</span> @enderror
             </div>
             <div>
                 <x-jet-label for="verse3" value="{{ __('Lesson3verse') }}" class="mb-8 text-xl text-theme-l5" />
                 <x-jet-input wire:model.lazy="verse3" id="verse3"  class="mt-1 p-2 w-40 mb-7" type="text" name="verse3" :value="old('verse3')" required autofocus />
                 </br>@error('verse3') <span class="text-sm text-red-300 mt-1">{{ $message }}</span> @enderror
             </div>
             <div>
                 <x-jet-label for="lesson3" value="{{ __('Lesson3 ') }}" class="mb-8 text-xl text-theme-l5" />
                 <x-textarea wire:model.lazy="lesson3" id="lesson3"   rows="4" cols="60"  name="lesson3" :value="old('lesson3')" required autofocus></x-textarea>
                 </br>@error('lesson3') <span class="text-sm text-red-300 mt-1">{{ $message }}</span> @enderror
             </div>
             <div>
                 <x-jet-label for="verse4" value="{{ __('Lesson4verse') }}" class="mb-8 text-xl text-theme-l5" />
                 <x-jet-input wire:model.lazy="verse4" id="verse4" class="mt-1 p-2 w-40 mb-7" type="text" name="verse4" :value="old('verse4')" required autofocus />
                 </br>@error('verse4') <span class="text-xs text-red-300 mt-1">{{ $message }}</span> @enderror
             </div>
             <div>
                 <x-jet-label for="lesson4" value="{{ __('Lesson4 ') }}" class="mb-8 text-xl text-theme-l5" />
                 <x-textarea wire:model.lazy="lesson4" id="lesson4"  rows="4" cols="60"  name="lesson4" :value="old('lesson4')" required autofocus></x-textarea>
             </br> @error('lesson4') <span class="text-sm text-red-300 mt-1">{{ $message }}</span> @enderror
             </div>

             <x-jet-button class="ml-4" wire:submit-prevent="update" wire:loading.attr="disabled">
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
