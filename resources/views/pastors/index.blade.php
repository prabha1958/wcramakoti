

<x-app-layout>
    <x-slot name="header">
        Pastors
    </x-slot>
    <div class="min-h-screen bg-gradient-to-r from-amber-600 via-yellow-600 to-amber-700">
        <div class="max-w-7xl mx-auto p-3  text-center">
                    <x-alert />

                  <h2 class="text-2xl mb-3">List of Pastors</h2>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-amber-500" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-theme-l4 border-b border-gray-200">
                  <div class=" mx-auto bg-amber-500 p-5 shadow-lg">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                          <div class="overflow-hidden">
                            <table class="min-w-full text-center">
                                <thead class="bg-amber-400">
                                    <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-2 text-left">
                                        Sno
                                    </th>
                                    <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-2 text-left">

                                    </th>
                                    <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-2 text-left">
                                       Name
                                    </th>
                                    <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-2 text-left">
                                        Edl Qualifications
                                    </th>
                                    <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-2 text-left">
                                        Date of birth
                                     </th>
                                     <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-2 text-left">
                                        Mobile
                                     </th>
                                     <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-2 text-left">
                                     Edit
                                     </th>

                                </thead>

                              <tbody class="text-center">
                                @foreach($pastors as $index => $pastor)

                                 <tr class="border-b border-amber-100">
                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap ">
                                    {{ $index + 1}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                        <img src="{{ asset('pastors/'.$pastor->profile_photo)}}" class="h-8 shadow rounded-full mr-2" alt="">
                                    </td>
                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                        {{ $pastor->family_name.'  '.$pastor->first_name.'   '.$pastor->last_name}}
                                    </td>

                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                        {{ $pastor->equal}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                        {{ $pastor->dob}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                        {{ $pastor->mobile}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                        @livewire('edit-pastor',['id' => $pastor->id])

                                    </td>


                                 </tr>

                                 @endforeach

                              </tbody>
                            </table>
                            <x-modal.test-modal />
                        </div>

                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>




</x-app-layout>
