
<x-app-layout>
    <div class="min-h-screen bg-theme-l1 p-3">
        <div class="max-w-7xl mx-auto p-3 mt-28 text-center">

                  <h2 class="text-2xl mb-3">Your Special Offerings details</h2>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-theme-l4 border-b border-gray-200">
                  <div class=" mx-auto bg-theme-l3 p-5 shadow-lg">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                          <div class="overflow-hidden">
                            <table class="min-w-full text-center">
                                <thead>
                                    <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-4 text-left">
                                        Sno
                                    </th>
                                    <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-4 text-left">
                                        Date of Payment
                                    </th>
                                    <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-4 text-left">
                                        Purpose
                                    </th>
                                    <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-4 text-left">
                                       Amount
                                    </th>
                                    <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-4 text-left">
                                        OrderId
                                     </th>
                                     <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-4 text-left">
                                       Payment Id
                                     </th>
                                     <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-4 text-left">

                                      </th>
                                </thead>

                              <tbody class="text-center">
                                @foreach($sploff as $index => $spl)

                                 <tr>
                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                    {{ $index + 1}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                        {{ $spl->date_of_payment}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                        {{ $spl->purpose}}
                                    </td>

                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                        {{ $spl->amount}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                        {{ $spl->order_id}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                        {{ $spl->payment_id}}
                                    </td>
                                    @if($spl->payment_id == '')
                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                        <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('sploffpayment',$spl->id)}}" class="py-2 px-3 bg-theme-d4 text-sm text-theme-l3 font-bold"> PAY </a>
                                        </td>
                                    </td>
                                    @else
                                    <td></td>
                                    @endif
                                 </tr>

                                 @endforeach

                              </tbody>
                            </table>

                        </div>

                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
