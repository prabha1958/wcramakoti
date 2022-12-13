

<x-app-layout>
    <x-slot name="header">
        Pastors
    </x-slot>
    <div class="min-h-screen bg-gradient-to-r from-amber-600 via-yellow-600 to-amber-700">
        <div class="max-w-7xl mx-auto p-3  text-center">
                    <x-alert />

                  <h2 class="text-2xl mb-3">Bible Quiz Questions </h2>
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
                                       Question
                                    </th>
                                    <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-2 text-left">
                                      Option 1
                                    </th>
                                    <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-2 text-left">
                                      Option2
                                    </th>
                                    <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-2 text-left">
                                     Option 3
                                     </th>
                                     <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-2 text-left">
                                       Option 4
                                     </th>
                                     <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-2 text-left">
                                     Answer
                                     </th>

                                </thead>

                              <tbody class="text-center">
                                @foreach($bqs as $index => $bq)

                                 <tr class="border-b border-amber-100">
                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap ">
                                    {{ $index + 1}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                       {{ $bq->question}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                      {{ $bq->optn1}}
                                    </td>

                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                        {{ $bq->optn2}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                      {{ $bq->optn3}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                      {{ $bq->optn4}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">

                                       {{ $bq->ans}}
                                    </td>


                                 </tr>

                                 @endforeach

                              </tbody>
                            </table>
                              @livewire('add-bquiz')
                        </div>

                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>




</x-app-layout>
