<x-app-layout>
    <slot name="header">
        Admin
    </slot>
    <div class="min-h-screen bg-gradient-to-r from-amber-600 via-yellow-600 to-amber-700">
        <div class="max-w-4xl mx-auto p-3  text-center">
           <div class="flex flex-col p-3 mt-7 items-center max-w-3xl mx-auto">
            <h1 class="block w-full border border-amber-100 px-4 py-2 mb-4 border-1 mt-2 rounded-lg text-2xl font-bold bg-gradient-to-r from-amber-600 via-yellow-600 to-amber-700 text-amber-200">
                ADMIN PANEL
            </h1>

                <a href="" class="block w-full px-4 py-2 mb-2 shadow-lg text-2xl font-bold bg-gradient-to-r from-amber-600 via-yellow-600 to-amber-700 text-amber-200">
                    Users
                </a>
                <a href="{{ route('pastors.show')}}" class="block w-full px-4 py-2 mb-2 shadow-lg text-2xl font-bold bg-gradient-to-r from-amber-600 via-yellow-600 to-amber-700 text-amber-200">
                    Pastors
                </a>
                <a href="{{ route('blesson.show')}}" class="block w-full px-4 py-2 mb-2 shadow-lg text-2xl font-bold bg-gradient-to-r from-amber-600 via-yellow-600 to-amber-700 text-amber-200">
                    Bible lessons
                </a>
                <a href="{{ route('chservice.show')}}" class="block w-full px-4 py-2 mb-2 shadow-lg text-2xl font-bold bg-gradient-to-r from-amber-600 via-yellow-600 to-amber-700 text-amber-200">
                   Church Services
                </a>
                <a href="{{ route('poorfeeding.show')}}" class="block w-full px-4 py-2 mb-2 shadow-lg text-2xl font-bold bg-gradient-to-r from-amber-600 via-yellow-600 to-amber-700 text-amber-200">
                    Poorfeeding
                 </a>
           </div>
        </div>
    </div>
</x-app-layout>
