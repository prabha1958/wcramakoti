<x-guest-layout>

   <x-slot name="header" >
    WELCOME
   </x-slot>
   <div class="p-3 min-h-screen bg-gradient-to-r from-indigo-400 via-violet-600 to-purple-400 ">

    <div class="flex flex-col md:flex-row justify-center items-center space-y-2 space-x-0 md:space-x-3 md:space-y-o max-w-7xl mx-auto text-start mt-32 bg-gradient-to-r from-purple-500 via-violet-700 to-purple-500">
      <div class="flex flex-col justify-center items-center space-y-2">
        <img src="{{ asset('images/logo1.png')}}" alt="" class=" w-36 h-auto">
        <div class="flex flex-col space-y-2 text-center" >
            <p class=" text-xl md:text-3xl text-theme-l3 font-bold">CSI CENTENARY WESLY CHURCH</p>
             <p class=" text-sm md:text-3xl text-theme-l3 font-bold text-center">Ramkote</p>
             <p class=" text-sm md:text-xl text-theme-l3 font-bold text-center">A living church</p>
        </div>
     </div>


        <div class="max-w-4xl p-2">
            <div class="gallery">
                <img src="{{ asset('images/services.png')}}" alt="A night sky">
                <img src="{{ asset('images/audience.png')}}" alt="Forest in the mist">
                <img src="{{ asset('images/choir.png')}}" alt="Green Aurora borealis">
                <img src="{{ asset('images/poorfeeding.png')}}" alt="A forest with a rising sun">
                <img src="{{ asset('images/church.png')}}" alt="csi centenary wesley church">
              </div>
        </div>

    </div>



   </div>
</x-guest-layout>
