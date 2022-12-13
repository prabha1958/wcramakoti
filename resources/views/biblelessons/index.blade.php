

<x-app-layout>
    <x-slot name="Bible Lessons">
        Bible Lessons
    </x-slot>
    <div class="min-h-screen bg-gradient-to-r from-amber-600 via-yellow-600 to-amber-700 p-3">
        <div class="max-w-7xl mx-auto p-3 mt-10 text-center">
                    <x-alert />
                  <h2 class="text-2xl mb-3">Bible Lessons Fuck you</h2>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center">

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
                                         Date
                                    </th>
                                    <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-2 text-left">
                                     Verse 1
                                    </th>

                                    <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-2 text-left">
                                       Verse2
                                     </th>

                                     <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-2 text-left">
                                       Verse3
                                     </th>

                                     <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-2 text-left">
                                       Verse4
                                     </th>

                                     <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-2 text-left">
                                     Edit
                                     </th>

                                </thead>

                              <tbody class="text-center">
                                @foreach($blessons as $index => $blesson)

                                 <tr >
                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                    {{ $index + 1}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap overflow-hidden">
                                        {{ $blesson->dt }}
                                    </td>

                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap overflow-hidden">
                                        {{ $blesson->verse1 }}
                                    </td>

                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap overflow-hidden">
                                        {{ $blesson->verse2}}
                                    </td>

                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap overflow-hidden">
                                        {{ $blesson->verse3 }}
                                    </td>

                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap overflow-hidden">
                                        {{ $blesson->verse4 }}
                                    </td>


                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                         @livewire('edit-bible-lesson',['id' => $blesson->id])
                                    </td>


                                 </tr>

                                 @endforeach

                              </tbody>
                            </table>

                        </div>

                    </form>
                  </div>
                </div>
                @livewire('add-bible-lesson')
            </div>
        </div>
    </div>
</div>




</x-app-layout>
