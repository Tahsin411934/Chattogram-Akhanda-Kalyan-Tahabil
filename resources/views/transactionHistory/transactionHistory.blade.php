<x-app-layout>
    <div class="grid border grid-cols-10">
        <div class="col-span-2">
            @include('layouts.sidebar')
        </div>
        <div class="col-span-8">
            @include('layouts.viewTransectionTab')

            <div class="container mx-auto">
                <h1 class="text-center mb-4">Daily Transaction History</h1>

                <!-- Display the date input form -->
                <form method="GET" action="{{ route('transactionHistory.transactionHistory') }}" id="transaction-form">
                    <div class="mb-3">
                        <label for="date" class="form-label">Select Date:</label>
                        <input type="date" id="date" name="date" class="form-control text-slate-950" 
                               value="{{ request('date', date('Y-m-d')) }}" required onchange="this.form.submit()">
                    </div>
                </form>

                @if(isset($transactions) && count($transactions) > 0)
                    <h2 class="mt-4 text-center">Transactions for {{ request('date', date('Y-m-d')) }}</h2>

                    <!-- Table styling for light and dark modes -->
                    <div class="overflow-x-auto w-[99%] ">
                        <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
                            <thead>
                                <tr class="bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                                    <th class="py-2 px-4 border-b">Transaction Type</th>
                                    <th class="py-2 px-4 border-b">Transaction ID</th>
                                    <th class="py-2 px-4 border-b">Member ID</th>
                                    <th class="py-2 px-4 border-b">Amount</th>
                                    <th class="py-2 px-4 border-b">Current Balance</th>
                                    <th class="py-2 px-4 border-b">Transaction Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $transaction)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-600 transition duration-150 ease-in-out">
                                        <td class="py-2 px-4 border-b">{{ $transaction->transaction_type }}</td>
                                        <td class="py-2 px-4 border-b">{{ $transaction->transaction_id }}</td>
                                        <td class="py-2 px-4 border-b">{{ $transaction->member_id }}</td>
                                        <td class="py-2 px-4 border-b">{{ $transaction->amount }}</td>
                                        <td class="py-2 px-4 border-b">{{ $transaction->current_balance }}</td>
                                        <td class="py-2 px-4 border-b">{{ $transaction->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="mt-4 text-center">No transactions found for the selected date.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
