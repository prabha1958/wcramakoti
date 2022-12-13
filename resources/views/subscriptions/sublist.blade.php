
<x-app-layout>
    <div class="min-h-screen bg-theme-l1 p-3">
        <div class="max-w-7xl mx-auto p-3 mt-28 text-center">

                  <h2 class="text-2xl mb-3">Your Monthly subscription details</h2>
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-theme-l4 border-b border-gray-200">
                  <div class=" mx-auto bg-theme-l3 p-5 shadow-lg">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                          <div class="overflow-hidden">
                            <table class="min-w-full text-center">

                              <tbody class="text-center">
                                <tr class="border-b">
                                    <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-4 text-left">
                                        Subscription ID
                                    </th>
                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                    {{ $sub->id}}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-4 text-left">
                                        Name
                                    </th>
                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                    {{ $plan->item->name}}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-4 text-left">
                                        Payment interval
                                    </th>
                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                    Monthly
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-4 text-left">
                                        Amount
                                    </th>
                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                       {{ $plan->item->amount/100}}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-4 text-left">
                                        Initiated on
                                    </th>
                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                    {{date('d-m-Y', $sub->created_at)}}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-4 text-left">
                                        Total number of instarments
                                    </th>
                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                    {{ $sub->total_count}}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-4 text-left">
                                        Instalments Paid
                                    </th>
                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                    {{ $sub->paid_count}}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-4 text-left">
                                        Next Due on
                                    </th>
                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                    {{date('d-m-Y', $sub->charge_at)}}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-4 text-left">
                                        Status
                                    </th>
                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                    {{ $sub->status}}
                                    </td>
                                </tr>
                                @if(Auth::user()->subscription->charge_at)
                                <tr class="border-b">
                                    <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-4 text-left">
                                        Payment link
                                    </th>
                                    <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                      <a href="{{ $sub->short_url}}" class="py-1 px-2 bg-theme-d4 text-sm text-theme-l3 font-bold">click here to pay </a>
                                    </td>
                                </tr>
                                @else
                                <td></td>
                                @endif
                                @if($sub->status = 'authenticated')
                                <tr class="border-b">


                                    <td></td>

                                </tr>
                                @else
                                <th scope="col" class="text-xl font-medium text-gray-900 px-6 py-4 text-left">
                                    Start your subscription by submitting card details
                                </th>

                                <td class="text-sm text-gray-900 font-bold px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('subscribe.post',Auth::user()->subscription->id)}}" class="py-2 px-3 bg-theme-d4 text-sm text-theme-l3 font-bold">Start Your Subscription </a>
                                  </td>
                                <td></td>
                                @endif



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
