<x-app-layout>
    <div class="grid border   grid-cols-10">
        <div class="col-span-2 ">
            @include('layouts.sidebar')
        </div>
        <div class="mx-auto   w-[90%]  col-span-8">
            @include("layouts.tab")
            <div class="font-poppins flex item-center gap-10 text-gray-200">
                <!-- <h1>Find Deposit Information :</h1> -->
                <form class="w-full" method="GET" action="{{ route('receipt.withdrawal') }}">
                    <input class="rounded-lg w-full text-gray-950" type="text" name="id"
                        placeholder="Enter Withdrawal Transaction id" required>
                    <button type="submit"
                        class="bg-blue-500 mt-3 text-white py-2 px-4 rounded hover:bg-blue-600">Find</button>
                </form>
            </div>


            @if ($withdraw)
            <div id="printableArea"
                class="container border border-gray-600 w-[70%] mt-2 col-span-8 mx-auto text-gray-100 p-4 rounded-lg shadow-lg">
                <img src="\logo.jpg" alt="" class="w-12 mx-auto  h-12 rounded-full">

                <h1 class="text-2xl font-bold text-center ">Chattogram Akhanda Kalyan Tahabil</h1>
                <div class="text-center text-sm text-slate-400">
                    <p>(Chittagong Akhondo Mondoli's Financial Organization)</p>
                    <p>Prayer Tempel, 98, Rohomatgonj, Chittagong.</p>
                    <p> Establised: 1983</p>
                </div>
                <hr className='-ml-0 h-[1px] border-none bg-slate-200 mx-auto w-[80%]' />
                <div class="text-center">
                    <h1 class="text-xl mt-5 font-bold">Withdrawal Receipt Slip</h1>
                    <div class="text-center text-sm text-slate-400">
                        <p>Date: {{ $withdraw->created_at->format('d M Y H:i:s') }}</p>
                    </div>
                </div>

                <div class="mt-6 mx-auto p-4 rounded-lg">
                    <h1 class="text-lg font-semibold pb-2">Transaction Number: {{ $withdraw->id }}</h1>
                    <h1 class="text-lg font-semibold">Member Information:</h1>
                    <div class="text-gray-500 ml-48 pb-1">
                        <p><strong>ID:</strong> {{ $withdraw->member_id }}</p>
                        <p><strong>Name:</strong> {{ $withdraw->member->member_name }}</p>
                    </div>

                    <h1 class="text-xl font-bold pb-1">Withdrawal Details:</h1>
                    <table class="w-full">
                        <tbody class="bg-gray-800 text-gray-400">
                            <tr>
                                <td class="py-2"><strong>Transaction Number:</strong></td>
                                <td class="py-2">{{ $withdraw->id }}</td>
                            </tr>
                            <tr>
                                <td class="py-2"><strong>Balance Before Withdrawal:</strong></td>
                                <td class="py-2">${{ number_format($withdraw->balance_before, 2) }}</td>
                            </tr>
                            <tr>
                                <td class="py-2"><strong>Withdrawal Amount:</strong></td>
                                <td class="py-2">${{ number_format($withdraw->withdraw_amount, 2) }}</td>
                            </tr>

                            <tr>
                                <td class="py-2"><strong>Balance After Withdrawal:</strong></td>
                                <td class="py-2">${{ number_format($withdraw->balance_after, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 text-center flex items-center justify-end">
                    <button onclick="printDiv('printableArea')"
                        class="bg-blue-500 px-6 text-white p-2 rounded">Print</button>
                </div>
            </div>
            @elseif (request('id'))
            <p>No deposit found with that ID.</p>
            @endif
        </div>
    </div>
    <script>
    function printDiv(divId) {
        var printContents = document.getElementById(divId).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
        location.reload();
    }
    </script>
</x-app-layout>