<x-app-layout>
    <div class="grid border grid-cols-10">
        <div class="col-span-2">
            @include('layouts.sidebar')
        </div>
        <div class="col-span-8">
        @include('layouts.viewTransectionTab')
            <div class="container mx-auto w-[98%]">
                <h1 class="text-center mb-4 text-gray-800 dark:text-gray-200">Member Transaction History</h1>

                <!-- Display the member selection form -->
                <form method="GET"  action="{{ route('transactionHistory.memberTransactionHistory') }}">
                    <div class="mb-4">
                        <label for="member_id" class="block text-gray-700 dark:text-gray-300">Member ID</label>
                        <input list="members_list" id="member_id" name="member_id"
                            class="border rounded-lg p-2 w-[80%] text-gray-900 dark:text-gray-300 dark:bg-gray-800 border-gray-300 dark:border-gray-600"
                            required placeholder="Type to search..."
                            oninput="updateMemberDetails()">
                        <datalist id="members_list">
                            @foreach($members as $member)
                                <option value="{{ $member->member_id }}">{{ $member->member_id }} - {{ $member->member_name }}</option>
                            @endforeach
                        </datalist>
                        @error('member_id')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 dark:bg-blue-700 dark:hover:bg-blue-600">
                        See Transactions
                    </button>
                </form>

                @if(isset($transactions) && count($transactions) > 0)
                    <h2 class="mt-4 text-center text-gray-800 dark:text-gray-200">Transactions for Member ID: {{ request('member_id') }}</h2>

                    <div class="overflow-x-auto">
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
                    <p class="mt-4 text-center text-gray-800 dark:text-gray-300">No transactions found for the selected member.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
