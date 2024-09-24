<x-app-layout>
    <div class="">
        <div class="grid grid-cols-10">
            <div class="col-span-2 border-r border-b border-gray-600 ">
                @include('layouts.sidebar')
            </div>

            @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('withdrawals.store') }}"
                class="col-span-8 w-[65%] mx-auto bg-gray-900 py-3 border border-gray-600 mt-2 rounded-xl px-16" method="POST">
                @csrf
                <div class="col-span-3 text-center text-xl font-bold font-prata text-gray-400">
                            <h1 >Make A Withdrawal</h1>
                            <div class="font-base text-sm mt-6">
                                <div id="date"></div>
                                <div id="time"></div>
                            </div>

                        </div>
                <div class="flex items-center justify-center gap-5">
                    <div>
                        <label class="block text-gray-50">Member Image</label>
                        <div class="mb-4 w-32 h-32 border border-gray-400 ">
                            <img id="member_image" src="" alt="Member Image" class=" w-32 h-32 object-cover rounded"
                                style="display: none;">
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-50">Member Signature</label>
                        <div class="mb-4 border border-gray-400 w-32 h-32">
                            <img id="member_signature" src="" alt="Member Signature"
                                class=" w-32 h-32 object-cover rounded" style="display: none;">
                        </div>
                    </div>
                    
                </div>

                <div class="mb-4">
                    <label for="member_id" class="block text-gray-50">Member ID</label>
                    <input list="members_list" id="member_id" name="member_id"
                        class="border rounded-lg p-2 w-full text-gray-900" required placeholder="Type to search..."
                        oninput="updateMemberDetails()">
                    <datalist id="members_list">
                        @foreach($members as $member)
                        <option value="{{ $member->member_id }}">{{ $member->member_id }} - {{ $member->member_name }}
                        </option>
                        @endforeach
                    </datalist>
                    @error('member_id')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="member_name" class="block text-gray-50">Member Name</label>
                    <input type="text" id="member_name" name="member_name" class="border rounded-lg p-2 w-full"
                        value="{{ old('member_name') }}" readonly>
                </div>

                <div class="mb-4">
                    <label for="balance" class="block text-gray-50">Balance</label>
                    <input type="text" id="balance" name="balance" class="border rounded-lg p-2 w-full"
                        value="{{ old('balance') }}" readonly>
                </div>

                <div class="mb-4">
                    <label for="withdraw_amount" class="block text-gray-50">Withdrawal Amount</label>
                    <input type="number" id="withdraw_amount" name="withdraw_amount"
                        class="border rounded-lg p-2 w-full" value="{{ old('withdraw_amount') }}" required
                        oninput="updateBalanceAfter()">
                    @error('withdraw_amount')
                    <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="balance_after" class="block text-gray-50">Balance After Withdrawal</label>
                    <input type="text" id="balance_after" name="balance_after" class="border rounded-lg p-2 w-full"
                        value="{{ old('balance_after') }}" readonly>
                </div>

                <div class="text-center">
                    <button type="submit" class="bg-blue-500 text-white p-2 rounded">Make A Withdrawal</button>
                </div>
            </form>
        </div>

        <script>
        // Convert PHP variable to JavaScript object
        const members = @json($members);

        function updateMemberDetails() {
            const memberId = document.getElementById('member_id').value.trim();
            const member = members.find(member => member.member_id === memberId);

            if (member) {
                document.getElementById('member_name').value = member.member_name;
                document.getElementById('balance').value = member.balance;
                document.getElementById('member_image').src = member.image ? `/${member.image}` : '';
                document.getElementById('member_image').style.display = member.image ? 'block' :
                'none'; // Show the image if it exists
                document.getElementById('member_signature').src = member.signature ? `/${member.signature}` : '';
                document.getElementById('member_signature').style.display = member.signature ? 'block' :
                'none'; // Show the signature if it exists
                updateBalanceAfter(); // Update balance after when member changes
            } else {
                document.getElementById('member_name').value = '';
                document.getElementById('balance').value = '';
                document.getElementById('balance_after').value = '';
                document.getElementById('member_image').src = '';
                document.getElementById('member_image').style.display = 'none'; // Hide the image
                document.getElementById('member_signature').src = '';
                document.getElementById('member_signature').style.display = 'none'; // Hide the signature
            }
        }

        function updateBalanceAfter() {
            const withdrawAmount = parseFloat(document.getElementById('withdraw_amount').value) || 0;
            const currentBalance = parseFloat(document.getElementById('balance').value) || 0;
            document.getElementById('balance_after').value = (currentBalance - withdrawAmount).toFixed(2);
        }
        </script>
    </div>
</x-app-layout>