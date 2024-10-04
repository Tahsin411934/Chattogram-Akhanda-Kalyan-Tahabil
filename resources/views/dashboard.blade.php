<x-app-layout>
    <div class="grid grid-cols-11">
        <div class="col-span-2 shadow-2xl">
            @include('layouts.sidebar')
        </div>

        <div class="col-span-9">
            <section class="p-6 my-6 bg-gray-200 dark:bg-gray-800 text-gray-800 dark:text-gray-100">
                <div class="container grid grid-cols-1 gap-6 mx-auto sm:grid-cols-2 xl:grid-cols-4">

                    <!-- Total Members -->
                    <div class="flex p-4 space-x-4 rounded-lg md:space-x-6 bg-slate-300 dark:bg-gray-900 text-gray-800 dark:text-gray-100">
                        <div class="flex justify-center p-2 align-middle rounded-lg sm:p-4 bg-violet-600 dark:bg-violet-400">
                            <!-- Member Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="h-9 w-9 text-gray-100 dark:text-gray-800">
                                <path d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5zm0 2c-3.309 0-10 1.659-10 5v3h20v-3c0-3.341-6.691-5-10-5z" />
                            </svg>
                        </div>
                        <div class="flex flex-col justify-center align-middle">
                            <p class="text-3xl font-semibold leading-none">{{ \App\Models\Member::count() }}</p>
                            <p class="capitalize">Total Members</p>
                        </div>
                    </div>

                    <!-- Total Withdrawals -->
                    <div class="flex p-4 space-x-4 bg-slate-300 rounded-lg md:space-x-6  dark:bg-gray-900 text-gray-800 dark:text-gray-100">
                        <div class="flex justify-center p-2 align-middle rounded-lg sm:p-4 bg-violet-600 dark:bg-violet-400">
                            <!-- New Withdrawal Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="h-9 w-9 text-gray-100 dark:text-gray-800">
                                <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10zm1-14h-2v5H8l4 4 4-4h-3v-5z" />
                            </svg>
                        </div>
                        <div class="flex flex-col justify-center align-middle">
                            <p class="text-3xl font-semibold leading-none">{{ \App\Models\Withdrawal::count() }}</p>
                            <p class="capitalize">Withdrawals</p>
                        </div>
                    </div>

                    <!-- Total Deposits -->
                    <div class="flex p-4 bg-slate-300 space-x-4 rounded-lg md:space-x-6  dark:bg-gray-900 text-gray-800 dark:text-gray-100">
                        <div class="flex justify-center p-2 align-middle rounded-lg sm:p-4 bg-violet-600 dark:bg-violet-400">
                            <!-- New Deposit Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="h-9 w-9 text-gray-100 dark:text-gray-800">
                                <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm0 16-4-4h3V9h2v5h3l-4 4z" />
                            </svg>
                        </div>
                        <div class="flex flex-col justify-center align-middle">
                            <p class="text-3xl font-semibold leading-none">{{ \App\Models\Deposit::count() }}</p>
                            <p class="capitalize">Total Deposits</p>
                        </div>
                    </div>

                    <!-- Total Nominees -->
                    <div class="flex p-4 bg-slate-300 space-x-4 rounded-lg md:space-x-6  dark:bg-gray-900 text-gray-800 dark:text-gray-100">
                        <div class="flex justify-center p-2 align-middle rounded-lg sm:p-4 bg-violet-600 dark:bg-violet-400">
                            <!-- Nominee Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="h-9 w-9 text-gray-100 dark:text-gray-800">
                                <path d="M16 11h1a3 3 0 000-6h-1V4a4 4 0 00-8 0v1H7a3 3 0 000 6h1v2.138A7.5 7.5 0 002 20.5V21h20v-.5a7.5 7.5 0 00-6-7.362V11z" />
                            </svg>
                        </div>
                        <div class="flex flex-col justify-center align-middle">
                            <p class="text-3xl font-semibold leading-none">{{ \App\Models\Nominee::count() }}</p>
                            <p class="capitalize">Total Nominees</p>
                        </div>
                    </div>

                </div>
            </section>

            <!-- Flex wrapper for chart and table -->
            <div class="flex  mt-10 w-full space-x-4 my-6">
                <!-- Chart section -->
                
                <section class="flex-1 p-6 bg-gray-200 dark:bg-gray-800 text-gray-800 dark:text-gray-100">
               
                    <div class="w-1/2 mx-auto"> <!-- Smaller chart size -->
                        <canvas id="transactionsChart" width="200" height="200"></canvas> <!-- Set width and height -->
                    </div>
                </section>

                <!-- Table section -->
                <div class="flex-1  mr-5">
                    
                    @if($withdrawals->isEmpty())
                        <p class="text-gray-500 dark:text-gray-400">No Recent tansection found.</p>
                    @else
                        <table class="min-w-full bg-white dark:bg-gray-900  rounded-lg shadow-md">
                          
                        <thead>
                        
                                <tr class="bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-200 uppercase text-sm leading-normal">
                                <h2 class="text-lg text-center font-semibold  dark:bg-gray-700 border-b">Recent Transaction </h2>   
                                <th class="py-3 px-6 text-left">Transaction Id</th>
                                    <th class="py-3 px-6 text-left">Transaction Type</th>
                                    <th class="py-3 px-6 text-left">Transaction Amount</th>
                                    <th class="py-3 px-6 text-left">Current Amount</th>
                                    
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 dark:text-gray-300 text-sm font-light">
                                @foreach($withdrawals as $withdrawal)
                                <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800">
                                    <td class="py-3 px-6 text-left">{{ $withdrawal->id }}</td>
                                    <th class="py-3 px-6 text-left">Withdrawal</th>
                                    <td class="py-3 px-6 text-left">{{ $withdrawal->withdraw_amount }}</td>
                                    <td class="py-3 px-6 text-left">{{ $withdrawal->balance_after }}</td>                                   
                                </tr>
                                @endforeach
                                @foreach($deposits as $deposit)
                                <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800">
                                    <td class="py-3 px-6 text-left">{{ $deposit->id }}</td>
                                    <th class="py-3 px-6 text-left">Deposit</th>
                                    <td class="py-3 px-6 text-left">{{ $deposit->deposit_amount }}</td>
                                    <td class="py-3 px-6 text-left">{{ $deposit->current_balance }}</td>                                   
                                </tr>
                                @endforeach
                                
                            </tbody>
                           
                        </table>
                        
                    @endif
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Chart.js Datalabels Plugin -->
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

    <script>
        const withdrawalsCount = {{ \App\Models\Withdrawal::count() }};
        const depositsCount = {{ \App\Models\Deposit::count() }};
        const totalCount = withdrawalsCount + depositsCount;

        const ctx = document.getElementById('transactionsChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Total Transactions', 'Withdrawals', 'Deposits'],
                datasets: [{
                    data: [totalCount, withdrawalsCount, depositsCount],
                    backgroundColor: ['#165BAA', '#A155B9', '#4ADE80'],
                    hoverBackgroundColor: ['#3B82F6', '#E11D48', '#15803D'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    datalabels: {
                        formatter: (value, context) => {
                            let percentage = (value / totalCount * 100).toFixed(2) + "%";
                            return percentage;
                        },
                        color: '#fff'
                    }
                }
            }
        });
    </script>
</x-app-layout>
