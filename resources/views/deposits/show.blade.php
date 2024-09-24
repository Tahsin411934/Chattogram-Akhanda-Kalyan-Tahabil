<x-app-layout>
    @if(session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif
    <div class="grid grid-cols-10">
        <div class="col-span-2 border-r border-b border-gray-600 ">
            @include('layouts.sidebar')
        </div>

        <div id="printableArea"
            class="container  border border-gray-600 w-[70%] mt-2   col-span-8 mx-auto text-gray-100  p-4 rounded-lg shadow-lg">
            <img src="/logo.jpg" alt="" class="w-12 mx-auto pt-16  h-12 rounded-full">
            <h1 class="text-3xl font-bold text-center mb-4">Deposit Slip</h1>
            <div class="text-center">
                <p><strong>Date:</strong> {{ $deposit->created_at->format('d M Y H:i:s') }}</p>
            </div>

            <hr className='-ml-0 h-[1px] border-none bg-slate-200 mx-auto w-[80%] ' />
            <div class="mt-16 mx-auto p-4 rounded-lg">
                <h1 class="text-xl font-bold pb-5">Transaction Number: {{ $deposit->id }}</h1>
                <h1 class="text-xl font-bold">Member Information:</h1>
                <div class="text-gray-500 ml-5 pb-5">
                    <p><strong>ID:</strong> {{ $deposit->member_id }}</p>
                    <p><strong>Name:</strong> {{ $deposit->member->member_name }}</p>
                </div>

                <h1 class="text-xl font-bold pb-1">Deposit Details:</h1>
                <table class="w-full">
                    <tbody class="bg-gray-800 text-gray-400">
                        <tr>
                            <td class="py-2"><strong>Transaction Number:</strong></td>
                            <td class="py-2">{{ $deposit->id }}</td>
                        </tr>
                        <tr>
                            <td class="py-2"><strong>Deposit Amount:</strong></td>
                            <td class="py-2">${{ number_format($deposit->deposit_amount, 2) }}</td>
                        </tr>
                        <tr>
                            <td class="py-2"><strong>Current Balance:</strong></td>
                            <td class="py-2">${{ number_format($deposit->current_balance, 2) }}</td>
                        </tr>
                    </tbody>
                </table>


            </div>


            <div class="mt-4 text-center flex items-center justify-end">
                <button onclick="printDiv('printableArea')" class="bg-blue-500 px-6  text-white p-2 rounded">Print</button>
            </div>
        </div>

    </div>





    <script>
    function printDiv(divId) {
        var printContents = document.getElementById(divId).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
        location.reload(); // Reload the page to restore the original content
    }
    </script>
</x-app-layout>